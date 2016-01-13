@extends('template.skeleton')

@section('title')
L'invendable | Les petites annonces d'une autre façons !
@stop

@section('description')
Bienvenue sur l'invendable, les petites annonces pratiques et écologique !
@stop

@section('keywords')
invendable, invendables, petites, annonces, gratuite, gratuit, écologie, annonce
@stop

@section('body')
    <hr class="separator">
    <section class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="wrapper">
                    <div id="hp_map" class="text-center"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12 box-logo">
                <h1 class="headline">{!! trans('messages.home_message') !!}</h1>

                <div class="row">
                <ul class="region-list col-md-4 col-sm-4 col-xs-12">
                <?php $i = 1; ?>
                @foreach ($regions as $region)
                     <li><a href="{{ route('advertisement.offerList', $region->slug) }}" data-map="{{ $region->data_map }}" title="{{ trans('messages.title_link_region') }} {!! $region->name !!}">{{ $region->name }}</a></li>
                    @if ($i % 8 == 0)
                    </ul>
                    <ul class="region-list col-md-4 col-sm-4 col-xs-12">
                    @endif
                    <?php $i++; ?>
                @endforeach
                <li><a href="{{ route('advertisement.offerList') }}" title="{{ trans('messages.map_france') }}">{{ trans('messages.map_france') }}</a></li>
                </ul>
                </div>
                <br class="spacer20">
   
                <a href="deposer-une-annonce" class="btn btn-lg btn-primary btn-home">Passer une annonce gratuite</a>
    
            </div>
        </div>
    </section>
@stop

@section('javascripts')
    <script src="js/raphael-min.js"></script>
    <script>
    var Homepage = {
        init: function() {
            if ($('#hp_map').length > 0) {
                function fixWebkitHeightBug() {
                    var w = 5000;
                    var h = 5000;
                    var cur_w = $('#hp_map').width();
                    var new_h = heightInRatio(h, w, cur_w);
                    $('#hp_map').height(new_h);

                    function heightInRatio(oH, oW, nW) {
                        return (oH / oW * nW);
                    }
                }

                function mapAutoAdjustOnXsScreen() {
                    if ($(window).width() <= 768) {
                        $('#hp_map').find('svg')[0].setAttribute("viewBox", "210 0 450 470");
                    } else if ($(window).width() <= 992) {
                        $('#hp_map').find('svg')[0].setAttribute("viewBox", "240 30 420 450");
                    } else {
                        $('#hp_map').height(500);
                        $('#hp_map').find('svg')[0].setAttribute("viewBox", "185 130 550 240");
                    }
                }
                $(window).resize(function() {
                    fixWebkitHeightBug();
                    mapAutoAdjustOnXsScreen();
                });
                $(document).ready(function() {
                    fixWebkitHeightBug();
                    mapAutoAdjustOnXsScreen();
                });
                var rsr = new Raphael(document.getElementById('hp_map'), '100%', '100%');
                rsr.setViewBox(100, 73, 800, 512, true);
                rsr.canvas.setAttribute('preserveAspectRatio', 'xMidYMid meet');
                var attr = {
                    fill: "#689F38",
                    stroke: "#ffffff",
                    "stroke-width": 1,
                    "stroke-linejoin": "round",
                    "stroke-miterlimit": '10'
                };
                var mRegions = {};

                @foreach ($regions as $region)
                    mRegions.{{ $region->data_map }} = rsr.path("{{ $region->vector }}").attr(attr);
                    mRegions.{{ $region->data_map }}.attr({
                        title: "{!! $region->name !!}",
                        href: '{{ route('advertisement.offerList', $region->slug) }}'
                    });
                @endforeach
               
                var highlight = function(element) {
                    if (element && element.mouseovered == false) {
                        element.toFront();
                        element.mouseovered = true;
                        element.animate({
                            fill: element.color,
                            transform: 's1.2 1.2'
                        }, 100);

                    }
                };
                var restore = function(element) {
                    if (element) {
                        element.animate({
                            fill: "#689F38",
                            transform: 's1 1'
                        }, 200);
                        element.mouseovered = false;
                        element.toBack();

                    }
                };
                var current = null;
                for (var state in mRegions) {
                    mRegions[state].color = "#795548";
                    mRegions[state].click(function() {
                        title = this.attr('title');
                        document.location = this.attr('href');
                        ga('send', 'event', 'Homepage', 'Clic sur la région', title);
                        if ('ontouchstart' in window) highlight(this);
                    });
                    (function(st, state) {
                        st.mouseovered = false;
                        st[0].style.cursor = "pointer";
                        if (!('ontouchstart' in window)) {
                            st[0].onmouseover = function() {
                                highlight(st);
                                $('.reg-list a[data-map="' + state + '"]').addClass('active');
                            };
                            st[0].onmouseout = function() {
                                restore(st);
                                $('.reg-list a[data-map="' + state + '"]').removeClass('active');
                            };
                        }
                    })(mRegions[state], state);
                }
            }
            Homepage.addTrackers();
            $('.reg-list a').hover(function() {
                var st = mRegions[$(this).data('map')];
                if (!('ontouchstart' in window)) highlight(st);
            }, function() {
                var st = mRegions[$(this).data('map')];
                restore(st);
            });
            $('#categories-select a').on('click', function() {
                ga('send', 'event', 'Homepage', 'Clic sur la catégorie ' + $(this).text());
            });
        },
        addTrackers: function() {
            $('.reg-list a').click(function(e) {
                e.preventDefault();
                var link = $(this);
                ga('send', 'event', 'Homepage', 'Clic sur region', $(this).text(), {
                    'hitCallback': function() {
                        document.location = link.attr('href');
                    }
                });
            });
            $('#regions-select a').click(function(e) {
                e.preventDefault();
                var link = $(this);
                ga('send', 'event', 'Homepage', 'Clic sur ville', $(this).text(), {
                    'hitCallback': function() {
                        document.location = link.attr('href');
                    }
                });
            });
            $('.overlay h3 a').click(function(e) {
                e.preventDefault();
                var link = $(this);
                ga('send', 'event', 'Homepage', 'Clic sur catégorie', $(this).text(), {
                    'hitCallback': function() {
                        document.location = link.attr('href');
                    }
                });
            });
        },
    }
    $(document).ready(function() {
        Homepage.init();
    });
    </script>
@stop