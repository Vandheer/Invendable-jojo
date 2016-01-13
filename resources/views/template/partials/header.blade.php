<header id="main-header">
    <div class="color">
    </div>
    <section class="container">
        <div class="row">
            <div class="navbar navbar-default">
                <div class="col-md-4 col-sm-12">
                    <a class="logo" href="{{ route('home') }}">
                        {!! Html::image('img/logo.png', trans('messages.logo_title'), array('class' => 'img-responsive')) !!}
                    </a>
                </div>
                <div class="col-md-8 col-sm-12">           
                    <nav id="navbar" class="">
                    <ul class="navbar-header">
                        <li class="navbar-toggle menu_item {!! Request::is(Route::getRoutes()->getByName('advertisement.add')->getUri()) ? 'active' : '' !!}" data-toggle="collapse" data-target=".navbar-collapse">
                        {!! trans('menu.menu') !!}
                        </li>
                        <ul class="nav navbar-nav navbar-collapse collapse">
                            <li class="menu_item {!! Request::is(Route::getRoutes()->getByName('advertisement.add')->getUri()) ? 'active' : '' !!}">
                                {!! link_to_route('advertisement.add', trans('menu.post_an_ad')) !!}
                            </li>
                            <li class="menu_item {!! Request::is(Route::getRoutes()->getByName('advertisement.offerList')->getUri()) ? 'active' : '' !!}">
                                {!! link_to_route('advertisement.offerList', trans('menu.offers'), NULL) !!}
                            </li>
                            <li class="menu_item {!! Request::is(Route::getRoutes()->getByName('advertisement.askList')->getUri()) ? 'active' : '' !!}">
                                {!! link_to_route('advertisement.askList', trans('menu.asks'), NULL) !!}
                            </li>
                            @if(!Auth::check())
                            <li class="menu_item {!! Request::is(Route::getRoutes()->getByName('auth.login')->getUri()) ? 'active' : '' !!}">
                                {!! link_to_route('auth.login', trans('menu.connect')) !!}
                            </li>
                            @endif
                            @if(Auth::check())
                            <li class="menu_item {!! Request::is(Route::getRoutes()->getByName('auth.logout')->getUri()) ? 'active' : '' !!}">
                                {!! link_to_route('auth.logout', trans('menu.account')) !!}
                            </li>
                            @endif
                            <li class="menu_item {!! Request::is(Route::getRoutes()->getByName('help.index')->getUri()) ? 'active' : '' !!}">
                                {!! link_to_route('help.index', trans('menu.help')) !!}
                            </li>
                        </ul>
                    </ul>
                        @if(Auth::check())
                        <div class="welcome_message">
                            <p>{{trans('messages.welcome_message')}} {{ Auth::user()->first_name }} !</p>
                            {!! link_to_route('auth.logout', trans('menu.deconnect')) !!}
                        </div>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </section>
</header>