@extends('template.skeleton')

@section('title')
Connexion
@stop

@section('description')
Accéder à votre compte en vous connectant ! Ou alors inscrivez-vous !
@stop

@section('keywords')
Se, connecter, connexion, gratuit, inscription
@stop

@section('body')


    <section class="container">
    <div class="row">
        <h1 class="head-title col-md-offset-3 col-md-7 col-sm-12 text-center">{{ trans('messages.connect_message') }}</h1>
        {!! Form::open(array("route" => "auth.login", "class" => "form-horizontal")) !!}
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'email'])
                    <label class="mandatory col-sm-3 control-label" for="email">{{ trans('form.email') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="email" id="email" placeholder="{{ trans('form.placeholder_messsage', array("field" => trans('form.email'))) }}" maxlength="45" required="">
                    </div>
                </div>
                <div class="form-group">                                    
                    @include('partials.error_form', ['name' => 'password'])
                    <label class="mandatory col-sm-3 control-label" for="name">{{ trans('form.password') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="password" name="password" id="password" placeholder="{{ trans('form.placeholder_messsage', array("field" => trans('form.password'))) }}" maxlength="45" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input class="btn btn-lg btn-primary" type="submit" value="{{trans('form.submit_connect')}}">
                    </div>
                </div>
            </div>
        </form>
    </div>
    
        
         <div class="row">
         <div class="col-md-offset-3 col-md-7 col-sm-12 ">
                   <h1 class="head-title text-center">{{ trans('messages.sign_in_citation') }}</h1>
              <a class="btn btn-lg btn-primary" href="{{ route('auth.register') }}">{{ trans('messages.sign_in_message') }}<a/>
         </div>

        </div>
    </section>
@stop