<?php 

namespace App\Http\Controllers\User;



/**
 * This controller is useless
 */
class UserController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Return login form view
     * 
     * @return Login form view
     */
    public function getLogin(){
        return view('front.auth.login');
    }

    /**
     * Handle the login of existing user.
     * Return nothing and redirect the user.
     * 
     * @param type UserLoginRequest $request 
     * @param type UserRepository $user_gestion 
     * @return redirect
     */
    public function postLogin(UserLoginRequest $request, UserRepository $user_gestion){

       $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        if (Auth::attempt($userdata)) {
            return Redirect::to('/');
        } else {       
            $errors = new MessageBag(['password' => [trans('messages.login_failed')]]); 
            return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
            
        }
    }

    /**
       * 
       * Handle the register form for user.
       * 
       * @param type DepartmentRepository $department_gestion 
       * @param type RegionRepository $region_gestion 
       * @return type view
       */  
    public function getRegister(DepartmentRepository $department_gestion, RegionRepository $region_gestion){
        $regions = $region_gestion->lists();
        $departments = $department_gestion->listsWithRegion();

        return view('front.auth.register', compact('departments', 'regions'));
    }

    /**
     * Handle the registration of user.
     * 
     * @param type UserRegisterRequest $request 
     * @return type view
     */
    public function postRegister(UserRegisterRequest $request, UserRepository $user_gestion){
        if($request->user_type == 1){
            if(is_null($request->siren)){
                $errors = new MessageBag(['siren' => [trans('validation.required', ['attribute' => trans('form.siren')])]]);
                return Redirect::back()->withErrors($errors)->withInput(Input::except('siren'));
            }
            if(is_null($request->company_name)){
                $errors = new MessageBag(['company_name' => [trans('validation.required', ['attribute' => trans('form.company_name')])]]);
                return Redirect::back()->withErrors($errors)->withInput(Input::except('company_name'));
            }
        }   

        $user_id = $user_gestion->store($request);
        if($request->user_type == 1){
            $company_gestion = new CompanyRepository(new Company());
            $company_gestion->store($request, $user_id);
        }
        return Redirect::route('auth.register.success')->with('data_user', ['email' => $request->email, 'first_name' => $request->first_name, 'last_name' => $request->last_name] );
    }

    public function getRegisterSuccess(){
        if(Session::has('data_user')){
            $data_user = Session::get('data_user');
            return view('front.auth.success', compact('data_user')); 
        }

    }
    /**
     * Handle the logout of logged user
     * Return nothing and redirect the user.
     * 
     * @param type UserLoginRequest $request 
     * @param type UserRepository $user_gestion 
     * @return redirection
     */
    public function doLogout()
    {
        Auth::logout(); 
        return Redirect::route('auth.login');
    }
}
