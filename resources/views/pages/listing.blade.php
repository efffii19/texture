<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Texture Property</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="css/nice-select.css">
    @livewireStyles
</head>

<body>
    <div class="inner_header">
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
    </div><!--END OF INNER HEADER-->
    <div class="clearfix"></div>
    <div class="container">
        @livewire('property-listing')
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
        /*   $(function(){
        	$(".click_to_show .btn").click(function(){
        		$(".search_bar").toggle(600);
        		});
        });*/
    </script>
    @livewireScripts
</body>

</html>
