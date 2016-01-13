@extends('template.skeleton')

@section('title')
N'oubliez de vérifier votre annonce
@stop

@section('description')
Vérifiez votre annonce avant de la mettre en ligne ! 
@stop

@section('keywords')
déspoer, petite, annonce, verification, pratique, france, facile, simple
@stop

@section('body')

        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    <section class="container">
        <h1 class="head-title text-center">{{ trans('messages.validation_message') }}</h1>
            {!! Form::open(array("route" => "advertisement.invite.validation", "class" => "form-horizontal", "files" => true, "id" => "post_advertisement")) !!}
                <div class="form-group">
                    <p for="region" class="col-sm-3 text-right control-label">{{ trans('form.city') }} * :</p>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <p>{!! $advertisement->city->real_name !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p for="region" class="col-sm-3 text-right control-label">{{ trans('form.category') }} * :</p>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <p>{!! $advertisement->category->name !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p for="region" class="col-sm-3 text-right control-label">{{ trans('form.ads_type') }} * :</p>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <p>{!! $advertisement->type->name !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <p for="region" class="col-sm-3 text-right control-label">{{ trans('form.first_name') }} * :</p>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <p>{!! $advertisement->user->first_name !!}</p>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <p for="region" class="col-sm-3 text-right control-label">{{ trans('form.last_name') }} * :</p>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <p>{!! $advertisement->user->last_name !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p for="region" class="col-sm-3 text-right control-label">{{ trans('form.pseudo') }} * :</p>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <p>{!! $advertisement->user->pseudo !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p for="region" class="col-sm-3 text-right control-label">{{ trans('form.email') }} * :</p>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <p>{!! $advertisement->user->email !!}</p>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <p for="region" class="col-sm-3 text-right control-label">{{ trans('form.phone') }} * :</p>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <p>{!! $advertisement->user->phone !!}</p>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <p for="region" class="col-sm-3 text-right control-label">{{ trans('form.title') }} * :</p>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <p>{!! $advertisement->title !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p for="region" class="col-sm-3 text-right control-label">{{ trans('form.description') }} * :</p>
                    <div class="col-sm-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <p>{!! $advertisement->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    @foreach ($advertisement->picture as $picture)
                        <div class="col-sm-4">
                            <div class="image_photography" style="background-image: url({{ $picture->url }}); background-size: 100%;">
                                <div class="thumbnail_upload">
                                    
                                 </div>
                                <span class="glyphicon glyphicon-camera hidden" aria-hidden="true"></span>
                            </div>
                        </div>
                    @endforeach
                </div>



               <div class="form-group">
                    @include('partials.error_form', ['name' => 'password'])
                    <label class="mandatory col-sm-3 control-label" for="password">{{ trans('form.password') }} * :</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="password" name="password" id="password" placeholder="{{ trans_choice('form.placeholder_messsage_another',1, array("field" => strtolower(trans('form.password')))) }}" maxlength="45" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-7">
                        <input class="btn btn-lg btn-primary" type="submit" value="{{ trans('form.validation') }}" required="">
                    </div>
                </div>
            </div>
        </form>

    </section>
@stop
