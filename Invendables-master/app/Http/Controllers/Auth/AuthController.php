<?php 

namespace App\Http\Controllers\Auth;

use Redirect;
use Auth;
use Session;
use Input;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as User;
use App\Repositories\CompanyRepository as Company;
use App\Repositories\RegionRepository as Region;
use App\Repositories\DepartmentRepository as Department;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests\Front\Auth\UserLoginRequest;
use App\Http\Requests\Front\Auth\UserRegisterRequest;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

/**
 * This controller handles the registration of new users, as well as the
 * authentication of existing users.
 * 
 * @author Thibault Marboud
 * @package default
 * @since 1.0
 * 
 * @see Redirect
 * @see Auth
 * @see Hash
 * @see Input
 * @see App\User
 * @see Illuminate\Support\MessageBag;
 * @see App\Repositories\UserRepository;
 * @see App\Http\Controllers\Controller;
 * @see App\Repositories\RegionRepository;
 * @see App\Repositories\DepartmentRepository;
 * @see Illuminate\Foundation\Auth\ThrottlesLogins;
 * @see App\Http\Requests\Front\Auth\UserLoginRequest;
 * @see Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
 */

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
     * @return redirect
     */
    public function postLogin(UserLoginRequest $request){

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
     * Handle the register form for user.
     * 
     * @param type Department $department
     * @param type Region $region
     * @return type view
     */  
    public function getRegister(Department $department, Region $region){
        $regions = $region->lists();
        $departments = $department->listsWithRegion();

        return view('front.auth.register', compact('departments', 'regions'));
    }

    /**
     * Handle the registration of user.
     * 
     * @param type UserRegisterRequest $request 
     * @return type view
     */
    public function postRegister(UserRegisterRequest $request, User $user, Company $company){
        $newUser = $user->store($request);
        if($request->user_type){
            $company->store($request, $newUser->id);
        }
        return Redirect::route('auth.register.success')->with('user', $newUser);
    }

    /**
     * Handle the display of a success registration.
     * @uses $_SESSION['user'] 
     * @return type view or 404 error
     */
    public function getRegisterSuccess(){
        if(Session::has('user')){
            $user = Session::get('user');
            return view('front.auth.success', compact('user')); 
        }
        return response()->view('errors.404', [], 404);
    }


    /**
     * Handle the logout of logged user
     * Return nothing and redirect the user.
     * 
     * @return redirection
     */
    public function doLogout()
    {
        Auth::logout(); 
        return Redirect::route('auth.login');
    }
}
