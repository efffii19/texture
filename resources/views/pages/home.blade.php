<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

@php
    $siteTitle = 'Texture Property';
@endphp

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $siteTitle }}</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    @livewireStyles
</head>

<body>
    {{-- Header --}}
    @livewire('header')

    <div class="banner_section">
        <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider4">
                <li><img src="images/banner1.jpg" alt="" class="img-responsive" /></li>
                <li><img src="images/banner2.jpg" alt="" class="img-responsive" /></li>
                <li><img src="images/banner3.jpg" alt="" class="img-responsive" /></li>
            </ul>
            <div class="on_banner_blocks">
                <form action="{{ route('listing') }}" method="GET">
                    <div class="box_one form_banner">
                        <label><input type="radio" name="transaction_type" value="rent" />Rent</label>
                        <label><input type="radio" name="transaction_type" value="sale" />Sale</label>
                        <label><input type="radio" name="transaction_type" value=""
                                checked="checked" />All</label>
                        <input type="text" name="location" class="form-control"
                            placeholder="Area...(leave empty for all Dubai)" />
                        <select name="property_type" class="form-control">
                            <option value="">Property Type</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Villa">Villa</option>
                            <option value="House">House</option>
                        </select>
                        <select name="bedrooms" class="form-control">
                            <option value="">Bedrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5+</option>
                        </select>
                        <div class="two_select">
                            <input type="text" name="min_price" class="form-control" placeholder="Min Price" />
                            <input type="text" name="max_price" class="form-control" placeholder="Max Price" />
                            <input type="submit" class="btn" value="Search" />
                        </div><!--END OF TWO SELECT-->
                    </div><!--END OF BOX ONE-->
                </form>
            </div><!--END OF ON BANNER BOX-->
        </div><!--END OF SLIDER-->

    </div><!--END OF BANNER SECTION-->
    <div class="clearfix"></div>
    <div class="container">
        @livewire('featured-properties-for-sale')
        @livewire('featured-properties-for-rent')
        <div class="clearfix"></div>

        <div class="welcome">
            <h3>WELCOME TO <span>TEXTURE PROPERTIES</span></h3>
            <p>Our passion for detail is expressed in our name: Texture represents the importance of every feature. An
                unwavering dedication to finishes that look and feel right means we're only
                satisfied when every single element of the design feels right. This is the Texture Holdings standard of
                excellence.
            </p>
            <p>Texture is a UAE-based real estate group. offering premium Development, Investment and Brokerage
                services.</p>
            <p>A reputation for excellence is built only by experience, professionalism and an inspirational set of
                values. As one of the important real estate companies in the UAE, Texture Holdings
                has all these attributes. We are proud to have gained the trust of our clients, stakeholders and
                partners. This trust is our biggest asset and defines who we are.
            </p>
            <p>Each of our four subsidiaries offer specialist knowledge to meet a broad range of business needs.</p>
        </div><!--END OF WELCOME-->
        <div class="clearfix"></div>

        <div class="bottom_two">

            @livewire('latest-properties')

            <div class="col-lg-3">
                <div class="blog">
                    <h3>blog</h3>
                    <div id="top" class="callbacks_container">
                        <ul class="rslides" id="slider5">
                            <li>
                                <h4>Rents in Dubai's Springs up 71% from 2010-11</h4>
                                <p>Rents of three-bed villas and townhouses in The Meadows and The Springs communities
                                    are still 29 percent lower than their peak rentals in 2008, a report by Asteco, a
                                    real estate consultancy, reveals.</p>
                                <p>However, average rentals for The Meadows are up 29.44 per cent to Dh233,000 per annum
                                    (pa) in 2015 from the lows of Dh180,000 pa in 2010/11.</p>
                            </li>
                            <li>
                                <h4>Sale in Dubai's Summer up 60% from 2013-2015</h4>
                                <p>Rents of three-bed villas and townhouses in The Meadows and The Springs communities
                                    are still 29 percent lower than their peak rentals in 2008, a report by Asteco, a
                                    real estate consultancy, reveals.</p>
                                <p>However, average rentals for The Meadows are up 29.44 per cent to Dh233,000 per annum
                                    (pa) in 2015 from the lows of Dh180,000 pa in 2010/11.</p>
                            </li>
                        </ul>
                    </div><!--END OF CALL BACS-->
                    <div class="facebook_page">
                        <img src="images/page.jpg" alt="" class="img-responsive" />
                    </div><!--END OF FACEBOOK PAGE-->
                </div><!--END OF BLOG-->
            </div><!--END OF COL LG 4-->
        </div><!--END OF BOTTOM 2-->
    </div><!--END OF CONTAINER-->
    <div class="clearfix"></div>
    {{-- Footer --}}
    @livewire('footer')

    <script type='text/javascript' src='{{ asset("js/jquery.js") }}'></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
    <script>
        $(function() {
            // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function() {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
            $("#slider5").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function() {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
        });
    </script>
    <!--SCROLLER CODE STARTS HERE---->
    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo1").flexisel({
                visibleItems: 2,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 5000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });
            $("#flexiselDemo2").flexisel({
                visibleItems: 2,
                animationSpeed: 1200,
                autoPlay: true,
                autoPlaySpeed: 5200,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
    <script type="text/javascript" src="{{ asset('js/jquery.flexisel.js') }}"></script>
    @livewireScripts

</body>

</html>
