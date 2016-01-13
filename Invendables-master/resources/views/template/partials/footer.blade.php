    <footer id="main-footer">
        <div class="pre-footer">
        </div>
        <section>
            <div class="wrap-footer container">
                <div class="clearfix">
                    {!! Html::image('img/logofooter.png', trans('messages.logo_footer_title'), array("class" => 'pull-left')) !!}

                    <ul class="pull-right">
                        <li class="links">
                            <p class="first">
                                <a href="#">{{ trans('menu.who_are_we') }}</a>
                                <a href="#">{{ trans('menu.our_goals') }}</a>
                                <a href="#">{{ trans('menu.our_solution') }}</a>
                                <a href="#">{{ trans('menu.legals') }}</a>
                                <a href="#">{{ trans('menu.general_condition') }}</a>
                                <a href="#">{{ trans('menu.contact') }}</a>
                            </p>
                            <p class="second">
                                {{ trans('messages.footer_copyright') }}
                            </p>
                        </li>
                    </ul>
                </div>
                <hr class="point">
                <a href="#" class="credits">{{ trans('messages.footer_realisation') }}</a>
                <br />
                <a href="#" class="credits">{{ trans('messages.footer_idea') }} </a>
            </div>
        </section>
    </footer>