@extends('template.skeleton')

@section('title')
Déposer une annonce gratuite !
@stop

@section('description')
Déposer une petite annonce. Gratuit, simple et écolo.
@stop

@section('keywords')
déposer, petite, annonce, écologique, pratique, france, facile, simple
@stop

@section('body')

        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    <section class="container">
        <h1 class="head-title text-center">{{ trans('messages.post_an_ad') }}</h1>
            {!! Form::open(array("route" => "advertisement.add", "class" => "form-horizontal", "files" => true, "id" => "post_advertisement")) !!}
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
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'ads_type'])
                    <label class="col-sm-3 text-right control-label">{{ trans('form.ads_type') }} * :</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <input id="ads_type_offer" type="radio" name="ads_type" value="1" checked="checked" required="">
                                <label class="input-radio" for="ads_type_offer">{{ trans('form.ads_type_offer') }}</label>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <input id="ads_type_need" type="radio" name="ads_type" value="2" required="">
                                <label class="input-radio" for="ads_type_need">{{ trans('form.ads_type_need') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'category'])
                    <label for="category" class="col-sm-3 text-right control-label" for="category">{{ trans('form.category') }} * :</label>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                {!! Form::selectOpt('category', $categories, 'parent_name', 'name', 'id', ["class" => "form-control", "id" =>"category", "name" => "category", "required" => ""]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="spacer20 point">
                <div class="form-group">
                    <label for="region" class="col-sm-3 text-right control-label">{{ trans('form.region') }} * :</label>
                    @include('partials.error_form', ['name' => 'region'])
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <?php $regions->prepend(trans_choice('form.select_message', 0, ["field" =>  strtolower(trans('form.region'))])); ?>
                                {!! Form::select('region', $regions, null, ["class" => "form-control", "id" =>"region", "name" => "region", "required" => ""]) !!}
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
                                {!! Form::select('department', array(), null, ["class" => "form-control", "id" =>"department", "name" => "department", "required" => ""]) !!}
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
                    @include('partials.error_form', ['name' => 'phone'])
                    <label class="mandatory col-sm-3 control-label" for="phone">{{ trans('form.phone') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="phone" name="phone" id="phone" placeholder="{{ trans('form.placeholder_messsage', array("field" => trans('form.phone'))) }}" maxlength="10" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-7">
                        <input type="checkbox" name="phone_mask" id="phone_mask" value="1">
                        <label class="mandatory input-radio" for="phone_mask">{{ trans('form.phone_mask') }}</label>
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
                    <div class="col-sm-7 col-md-offset-3 col-xs-12 col-xs-offset-3">
                    @include('partials.error_form', ['name' => 'ads_email'])
                    </div>
                    <label class="mandatory col-sm-3 control-label" for="email">{{ trans('form.email') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="email" name="email" id="email" placeholder="{{ trans('form.placeholder_messsage', array("field" => trans('form.email'))) }}" maxlength="255" required="">
                    </div>
                </div>

                <hr class="spacer20 point">
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'title'])
                    <label class="mandatory col-sm-3 control-label" for="title">{{ trans('form.title') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="title" id="title" placeholder="{{ trans_choice('form.placeholder_messsage_another', 1, array("field" => lcfirst(trans('form.title')))) }}" maxlength="45" required="">
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'description'])
                    <label class="mandatory col-sm-3 control-label" for="description">{{ trans('form.description') }} * :</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" style="height: 200px;" name="description" id="description" placeholder="{{ trans_choice('form.placeholder_messsage_another', 0, array("field" => lcfirst(trans('form.description')))) }}" required=""></textarea>
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'price'])
                    <label class="mandatory col-sm-3 control-label" for="price">{{ trans('form.price') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="text" name="price" id="price" placeholder="{{ trans_choice('form.placeholder_messsage_another', 1, array("field" => lcfirst(trans('form.price')))) }}" required="">
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.error_form', ['name' => 'images'])
                    @include('partials.error_form', ['name' => 'images[]'])
                    <div class="col-sm-7 col-sm-offset-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="image_photography">
                                    <div class="hidden thumbnail_upload">
                                        <img src="" />
                                    </div>
                                    <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
                                </div>
                                <button type="button" class="btn btn-default btn-danger hidden">{{ trans('form.cancel') }}</button>
                                <label class="btn btn-lg btn-primary" for="image0">{{ trans('form.image_message') }}</label>
                                <input class="hidden" type="file" name="images[]" id="image0" accept="image/*">
                            </div>
                            <div class="col-sm-4">
                                <div class="image_photography">
                                    <div class="hidden thumbnail_upload">
                                        <img src="" />
                                    </div>
                                    <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
                                </div>
                                <button type="button" class="btn btn-default btn-danger hidden">{{ trans('form.cancel') }}</button>
                                <label class="btn btn-lg btn-primary" for="image1">{{ trans('form.image_message') }}</label>
                                <input class="hidden" type="file" name="images[]" id="image1" accept="image/*">
                            </div>
                            <div class="col-sm-4">
                                <div class="image_photography">
                                    <div class="hidden thumbnail_upload">
                                        <img src="" />
                                    </div>
                                    <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
                                </div>
                                <button type="button" class="btn btn-default btn-danger hidden">{{ trans('form.cancel') }}</button>
                                <label class="btn btn-lg btn-primary" for="image2">{{ trans('form.image_message') }}</label>
                                <input class="hidden" type="file" name="images[]" id="image2" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-7">
                        <input class="btn btn-lg btn-primary" type="submit" value="{{ trans('form.submit_ad') }}" required="">
                    </div>
                </div>
            </div>
        </form>
        <div>
            <img id="crop_image" src="">
        </div>
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
   
    <script>

        $(function () {
            $('#crop_image').hide();
            $('#post_advertisement').find('input[type="file"]').change(function() {
                var files = $(this)[0].files;
            
                if (files.length > 0) {
                      var file = files[0];

                    $image_preview = $(this).parent();
                    $image_preview.find('.thumbnail_upload').removeClass('hidden');
                    $image_preview.find('.btn-danger').removeClass('hidden');
                    $image_preview.find('.btn-primary').addClass('hidden');
                    $image_preview.find('.glyphicon-camera').addClass('hidden');
                    $('#crop_image').attr('src', window.URL.createObjectURL(file));
                   setTimeout(function(){

                        $image_preview.find('.image_photography').css("background-image", "url("+window.URL.createObjectURL(file)+")");  
                        if($('#crop_image').width() >= $('#crop_image').height()){
                            $image_preview.find('.image_photography').css("background-size", "100% auto");                      
                        }else{
                            $image_preview.find('.image_photography').css("background-size", "auto 100%");
                        }
                    },0);
                    
                }

            });


            $('#post_advertisement').find('button[type="button"]').on('click', function (e) {
                $image_preview = $(this).parent();
                $image_preview.find('.thumbnail_upload').addClass('hidden');
                $image_preview.find('.image_photography').removeAttr("style");
                $image_preview.find('.btn-danger').addClass('hidden');
                $image_preview.find('.btn-primary').removeClass('hidden');
                $image_preview.find('.glyphicon-camera').removeClass('hidden');
                $image_preview.find('input[name="image"]').val('');
            });

        });
    </script>
    @include('partials.javascript.form_with_region_company', ['departments' => $departments])
@stop
