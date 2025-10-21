<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Texture Property - About</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="css/nice-select.css">
</head>

<body>
    {{-- Header --}}
    @livewire('header')

    <div class="clearfix"></div>
    <div class="searchinf_area">
        <div class="container">
            <div class="search_bar">
                <div class="inner_search">
                    <div class="col-lg-2">
                        <label><input type="radio" name="one" /> Rent</label>
                        <label><input type="radio" name="one" /> Sale</label>
                        <label><input type="radio" name="one" /> All</label>
                    </div><!--END OF COL MD 3-->

                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Area" />
                        <div class="nice-select">
                            <p class="current">Property Type</p>
                            <ul class="list">
                                <li class="option selected">Type One</li>
                                <li class="option">Type Two </li>
                                <li class="option">Type Three</li>
                                <li class="option">Type Four</li>
                            </ul>
                        </div>
                        <div class="nice-select">
                            <p class="current">Bedrooms</p>
                            <ul class="list">
                                <li class="option selected">Three</li>
                                <li class="option">Four </li>
                                <li class="option">Five</li>
                                <li class="option">Six</li>
                            </ul>
                        </div>
                    </div><!--END OF COL MD 6-->
                    <div class="col-lg-4 col-md-6 range">
                        <div class="search_content ">
                            <input type="hidden" id="slider_range" class="flat-slider" />
                        </div><!--END OF SEARCH CONTENT-->
                        <a href="#"><img src="images/search_btn.png" alt="" /></a>
                    </div><!--END OF COL MD 4-->
                </div><!--END OF INNER SEARCH-->
            </div><!--END OF SEARCH BAR-->
        </div><!--END OF CONTAINER-->
        <div class="container">

            <div class="click_to_show">
                <input type="button" class="btn click_me" value="property search" />
            </div><!--END OF COL LG 12-->
        </div><!--END OF CONTAINER-->
    </div><!--END OF SEARCHINF AREA-->
    <div class="container">
        <div class="about">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">About</li>
            </ol>
            <h2>why<span> texture property</span></h2>
            <p>Our passion for detail is expressed in our name: Texture represents the importance of every feature. An
                unwavering dedication to finishes that look and feel right means we're only satisfied when every single
                element of the design feels right. This is the Texture Holdings standard of excellence.</p>
            <p>Texture is a UAE-based real estate group, offering premium Development, Investment and Brokerage
                services.</p>
            <p>A reputation for excellence is built only by experience, professionalism and an inspirational set of
                values. As one of the important real estate companies in the UAE, Texture Holdings
                has all these attributes. We are proud to have gained the trust of our clients, stakeholders and
                partners. This trust is our biggest asset and defines who we are.</p>
            <p>Each of our four subsidiaries offer specialist knowledge to meet a broad range of business needs.</p>
            <p>
                <img src="images/ab1.jpg" alt="" class="img-responsive" />
                <img src="images/ab2.jpg" alt="" class="img-responsive" />
                <img src="images/ab3.jpg" alt="" class="img-responsive" />
            </p>
            <div class="clearfix"></div>
            <p>Our passion for detail is expressed in our name: Texture represents the importance of every feature. An
                unwavering dedication to finishes that look and feel right means we're only satisfied when every single
                element of the design feels right. This is the Texture Holdings standard of excellence.</p>
            <p>Texture is a UAE-based real estate group, offering premium Development, Investment and Brokerage
                services.</p>
            <p>A reputation for excellence is built only by experience, professionalism and an inspirational set of
                values. As one of the important real estate companies in the UAE, Texture Holdings
                has all these attributes. We are proud to have gained the trust of our clients, stakeholders and
                partners. This trust is our biggest asset and defines who we are.</p>
            <p>Each of our four subsidiaries offer specialist knowledge to meet a broad range of business needs.Our
                passion for detail is expressed in our name: Texture represents the importance
                of every feature. An unwavering dedication to finishes that look and feel right means we're only satisfied
                when every single element of the design feels right. This is the Texture Holdings standard of
                excellence.</p>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <p>Texture is a UAE-based real estate group, offering premium Development, Investment and Brokerage
                        services.</p>
                    <p>A reputation for excellence is built only by experience, professionalism and an inspirational set
                        of values. As on
                        e of the important real estate companies in the UAE, Texture Holdings has all these attributes.
                        We are proud to have gained the trust of our clients, stakeholders and partners. This trust is
                        our biggest asset and defines who we are.</p>
                    <p>Each of our four subsidiaries offer specialist knowledge to meet a broad range of business needs.
                    </p>
                </div><!--END OF COL LG 8-->
                <div class="col-lg-4 col-md-4"><img src="images/ab4.jpg" alt="" class="img-responsive" />
                </div><!--END OF COL LG 8-->
            </div><!--ENDO OF ROW-->
        </div><!--END OF ABOUT-->
    </div><!--END OF CONTAINER-->

    <div class="clearfix"></div>

    {{-- Footer --}}
    @livewire('footer')

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- script -->
    <script src="js/jquery.nice-select.js"></script>
    <script>
        $(document).ready(function() {
            $('select').niceSelect();
        });
    </script>

    <script src="js/slider.js"></script>
    <script>
        jQuery(function() {
            jQuery("#slider_range").flatslider({
                min: 10000,
                max: 100000000,
                step: 1,
                values: [10000, 100000000],
                range: true,
                einheit: ''
            });
        });
    </script>
    <script>
        $(".click_to_show .btn").toggle(function() {
            $(".search_bar").slideDown(120);
            $(".search_bar").css('overflow', 'visible');
        }, function() {
            $(".search_bar").slideUp(100);
            $(".search_bar").css('overflow', 'hidden');
        });
    </script>
</body>

</html>
