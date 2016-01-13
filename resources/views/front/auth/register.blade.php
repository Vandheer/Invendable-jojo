@extends('template.skeleton')

@section('title')
Inscription
@stop

@section('description')
Inscrivez-vous ! Vous pourrez accéder à toutes les fonctionalitées du site.
@stop

@section('keywords')
inscription, s'inscrire, inscrire, gratuit, petite, annonce, professionnel, particulier
@stop

@section('body')

    <hr class="separator">
    <section class="container">
        <h1 class="head-title col-sm-offset-3 col-sm-7  text-center">{{ trans('messages.sign_in_message') }}</h1>
        {!! Form::open(array("route" => "auth.register", "class" => "form-horizontal", "files" => true)) !!}
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'user_type'])
                    <label class="col-sm-3 text-right control-label">{{ trans('form.user_type') }} * :</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <input id="user_type_normal" type="radio" name="user_type" value="0" checked="checked" required="">
                                <label class="input-radio" for="user_type_normal">{{ trans('form.user_type_normal') }}
                                </label>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <input id="user_type_pro" type="radio" name="user_type" value="1" required="">
                                <label class="input-radio" for="user_type_pro">{{ trans('form.user_type_pro') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="spacer20 point">
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'region'])
                    <label for="department" class="col-sm-3 text-right control-label">{{ trans('form.region') }} * :</label>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">                    
                                <?php $regions->prepend(trans_choice('form.select_message', 0, array("field" => strtolower(trans('form.region')) ))); ?>
                                {!! Form::select('region', $regions, 'region', ["class" => "form-control", "id" =>"region", "required" => ""]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'department'])
                    <label for="department" class="col-sm-3 text-right control-label">{{ trans('form.department') }} * :</label>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                {!! Form::select('department', array(), null, ["class" => "form-control", "id" =>"department", "required" => ""]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'postal_code'])
                    @include('partials.error_form', ['name' => 'city'])
                    <label class="mandatory col-sm-3 control-label" for="postal_code">{{ trans('form.postal_code') }} * :</label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" name="postal_code" id="postal_code" placeholder="{{ trans('form.postal_code') }}" maxlength="5" required="">
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="city" id="city" placeholder="{{ trans('form.city') }}" disabled="" required="">
                        <input class="form-control" type="hidden" name="id_city" id="id_city" required="">
                    </div>
                </div>
                <hr class="spacer20 point">
                <div class="form-group company-unique">
                    @include('partials.error_form', ['name' => 'siren'])
                    <label class="mandatory col-sm-3 control-label" for="siren">{{ trans('form.siren') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="siren" id="siren" placeholder="{{ trans_choice('form.placeholder_messsage_company', 1, array("field" => lcfirst(trans('form.siren')))) }}" maxlength="45" required="">
                    </div>
                </div>
                <div class="form-group company-unique">
                    @include('partials.error_form', ['name' => 'company_name'])             
                    <label class="mandatory col-sm-3 control-label" for="company_name">{{ trans('form.company_name') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="company_name" id="first_name" placeholder="{{ trans_choice('form.placeholder_messsage_company', 1, array("field" => lcfirst(trans('form.last_name')))) }}" maxlength="45" required="">
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'phone'])     
                    <label class="mandatory col-sm-3 control-label" for="phone">{{ trans('form.phone') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="phone" name="phone" id="phone" placeholder="{{ trans_choice('form.placeholder_messsage', 1, array("field" => lcfirst(trans('form.phone')))) }}" maxlength="10" required="">
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'last_name'])
                    <label class="mandatory col-sm-3 control-label" for="last_name">{{ trans('form.last_name') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="last_name" id="last_name" placeholder="{{ trans('form.placeholder_messsage', array("field" => trans('form.last_name'))) }}" maxlength="45" required="">
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'first_name'])
                    <label class="mandatory col-sm-3 control-label" for="first_name">{{ trans('form.first_name') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="first_name" id="first_name" placeholder="{{ trans('form.placeholder_messsage', array("field" => trans('form.first_name'))) }}" maxlength="45" required="">
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'pseudo'])
                    <label class="mandatory col-sm-3 control-label" for="pseudo">{{ trans('form.pseudo') }}  * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="pseudo" id="pseudo" placeholder="{{ trans('form.placeholder_messsage', array("field" => trans('form.pseudo'))) }}" maxlength="45" required="">
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'email'])
                    <label class="mandatory col-sm-3 control-label" for="email">{{ trans('form.email') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="email" name="email" id="email" placeholder="{{ trans('form.placeholder_messsage', array("field" => trans('form.email'))) }}" maxlength="255" required="">
                    </div>
                </div>
                <hr class="spacer20 point">
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'password'])
                    <label class="mandatory col-sm-3 control-label" for="password">{{ trans('form.password') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="password" name="password" id="password" placeholder="{{ trans('form.placeholder_messsage', array("field" => trans('form.password'))) }}" maxlength="45" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="mandatory col-sm-3 control-label" for="password_confirmation">{{ trans('form.confirmation') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="{{ trans('form.placeholder_confirmation', array("field" => lcfirst(trans('form.password')))) }}" maxlength="45" required="">
                    </div>
                </div>
                <hr class="spacer20 point">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-7">
                        <input type="checkbox" name="optin" id="check" value="1" checked="checked">
                        <label class="mandatory input-radio" for="check">{{ trans('messages.uses_condition') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-7">
                        <input class="btn btn-lg btn-primary" type="submit" value="{{ trans('messages.sign_in_message') }}" required="">
                    </div>
                </div>
            </div>
        </form>
    </section>

@stop

@section('javascripts')
    {!! Html::script('js/autocomplete.js') !!}
    <script>
    $(document).ready(function() {
        $('#postal_code').autocomplete({
            serviceUrl: '{{route('ajax.city')}}',
            secondInput: true,
            secondInputId: $("#city"),
            hiddenInput: true,
            hiddenInputId: $("#id_city"),
            tokenValue: '{{csrf_token()}}',
            width: '400',
            attributeName: 'real_name',
            secondAttributeName: 'id',
            dataType: 'json'
        });
    });
    </script>
    @include('partials.javascript.form_with_region_company', ['departments' => $departments])
@stop