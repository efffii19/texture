<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Texture Property</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    @livewireStyles
</head>

<body>
    @php
        use Illuminate\Support\Str;
    @endphp

    <div class="container">
        <div class="header">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="#"><img src="images/logo.jpg" alt="" class="img-responsive" /></a>
                </div><!--END OF LOGO-->
            </div><!--END OF COL LG 4-->

            <div class="col-lg-8">
                <div class="top_bar">
                    <ul>
                        <li>call us: +971 4 3232455</li>
                        <li><a href="#">submit your property</a></li>
                        <li><a href="#">make an enquiry</a></li>
                    </ul>
                </div><!---END OF TOP BAR-->
                <div class="clearfix"></div>
                <div class="social">
                    <ul>
                        <li><a href="#" class="facebook" title="Facebook"></a></li>
                        <li><a href="#" class="twitter" title="Twitter"></a></li>
                        <li><a href="#" class="googleplus" title="Googleplus"></a></li>
                        <li><a href="#" class="insta" title="Instagram"></a></li>
                        <li><a href="#" class="link" title="Linkedin"></a></li>
                        <li><a href="#" class="youtube" title="Youtube"></a></li>
                    </ul>
                </div><!--END OF SOCIAL-->
                <div class="clearfix"></div>
                <div id='cssmenu'>
                    <ul>
                        <li class="active"><a href='#'>Home</a></li>
                        <li class='has-sub'><a href='#'>properties for rent</a>
                            <ul>
                                <li><a href='#'>Property 1</a></li>
                                <li><a href='#'>Property 2</a></li>
                                <li><a href='#'>Property 3</a></li>
                                <li><a href='#'>Property 4</a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'>properties for sale</a>
                            <ul>
                                <li><a href='#'>Property 1</a></li>
                                <li><a href='#'>Property 2</a></li>
                                <li><a href='#'>Property 3</a></li>
                                <li><a href='#'>Property 4</a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'>About us</a>
                            <ul>
                                <li><a href='#'>About 1</a></li>
                                <li><a href='#'>About 2</a></li>
                                <li><a href='#'>About 3</a></li>
                                <li><a href='#'>About 4</a></li>
                            </ul>
                        </li>

                        <li class='has-sub'><a href='#'>our services</a>
                            <ul>
                                <li><a href='#'>services 1</a></li>
                                <li><a href='#'>services 2</a></li>
                                <li><a href='#'>services 3</a></li>
                                <li><a href='#'>services 4</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>Contact us</a></li>
                    </ul>
                </div><!--END OF CSS MENU-->
            </div><!--END OF COL LG 8-->
        </div><!---END OF HEADER-->
    </div><!--END OF CONTAINER-->
    <div class="clearfix"></div>

    <div class="banner_section">
        <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider4">
                <li><img src="images/banner1.jpg" alt="" class="img-responsive" /></li>
                <li><img src="images/banner2.jpg" alt="" class="img-responsive" /></li>
                <li><img src="images/banner3.jpg" alt="" class="img-responsive" /></li>
            </ul>
            <div class="on_banner_blocks">
                <div class="box_one form_banner">
                    <label><input type="radio" name="one" />Rent</label>
                    <label><input type="radio" name="one" />Sale</label>
                    <label><input type="radio" name="one" checked="checked" />All</label>
                    <input type="text" class="form-control" placeholder="Area...(leave empty for all Dubai)" />
                    <select class="form-control">
                        <option>Property Type</option>
                        <option>Property Type</option>
                    </select>
                    <select class="form-control">
                        <option>Bedrooms</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <div class="two_select">
                        <select class="form-control">
                            <option>Min Price</option>
                            <option>Price</option>
                        </select>
                        <select class="form-control">
                            <option>Max Price</option>
                            <option>Price</option>
                        </select>
                        <input type="submit" class="btn" />
                    </div><!--END OF TWO SELECT-->
                </div><!--END OF BOX ONE-->
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
                unwavering dedication to ﬁnishes that look and feel right means we‘re only
                satisﬁed when every single element of the design feels right. This is the Texture Holdings standard of
                excellence.
            </p>
            <p>Texture is a UAE-based real estate group. offering premium Development, Investment and Brokerage
                services.</p>
            <p>A reputation for excellence is built only by experience, professionalism and an inspirational set of
                values. As one of the important real estate companies in the UAE, Texture Holdings
                has all these attributes. We are proud to have gained the trust of our clients, stakeholders and
                partners. This trust is our biggest asset and deﬁnes who we are.
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
    <div class="footer">
        <div class="container">
            <div class="col-lg-3">
                <div class="footer_block">
                    <h4>useful links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Meet the Team</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Selling process</a></li>
                        <li><a href="#">Leasing process</a></li>
                    </ul>
                </div><!--END OF FOOTER BLOCK-->
            </div><!--END OF COL LG 3-->
            <div class="col-lg-6">
                <div class="footer_block">
                    <h4>subscribe with us</h4>
                    <p>Sign up to our newsletter to recive offers and hot <br /> properties straight to your e-mal.</p>
                    <div class="subscribe_form">
                        <form>
                            <input type="text" class="form-control" placeholder="Full Name"
                                required="required" />
                            <input type="email" class="form-control" placeholder="Email Address"
                                required="required" />
                            <input type="submit" class="btn" value="Go" />
                        </form>
                        <ul>
                            <li><a href="#">Buy</a></li>
                            <li><a href="#">Villas</a></li>
                            <li><a href="#">Rent</a></li>
                            <li><a href="#">Apartment</a></li>
                            <li><a href="#">Dubai Marina</a></li>
                            <li><a href="#">Palm Jumeirah</a></li>
                            <li><a href="#">Downtown Dubai</a></li>
                            <li><a href="#">Emirates Living</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <p>Copyright &copy 2016. All Rights Reserved, Texture Properties</p>
                    </div><!--END OF SUBSCRIBE FORM-->
                </div><!--END OF FOOTER BLOCK-->
            </div><!--END OF COL LG 3-->
            <div class="col-lg-3">
                <div class="footer_block">
                    <h4>reach us</h4>
                    <ul class="cont">
                        <li><img src="images/add.jpg" /> A Post Box 391981, Dubai, UAE</li>
                        <li><img src="images/email.jpg" /> <a href="#">Esales@testureproperties.com</a></li>
                        <li><img src="images/call.jpg" /> T +9714 3232455</li>
                        <li><img src="images/fax.jpg" /> F +9714 3232456</li>
                    </ul>
                </div><!--END OF FOOTER BLOCK-->
            </div><!--END OF COL LG 3-->
        </div><!--END OF CONTAINER--->
    </div><!--END OF FOOTER-->

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
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
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    @livewireScripts

</body>

</html>
