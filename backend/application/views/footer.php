<section class="intro-part">
    <div class="container">
        <div class="row intro-content">
            <div class="col-sm-6 col-lg-3">
                <div class="intro-wrap">
                    <div class="intro-icon"><i class="fas fa-truck"></i></div>
                    <div class="intro-content">
                        <h5>free home delivery</h5>
                        <p>Anywhere delivery in minimun days. </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="intro-wrap">
                    <div class="intro-icon"><i class="fas fa-sync-alt"></i></div>
                    <div class="intro-content">
                        <h5>instant return policy</h5>
                        <p>The number of days or deadline to return the product.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="intro-wrap">
                    <div class="intro-icon"><i class="fas fa-headset"></i></div>
                    <div class="intro-content">
                        <h5>quick support system</h5>
                        <p>24/7 our contact line is oline.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="intro-wrap">
                    <div class="intro-icon"><i class="fas fa-lock"></i></div>
                    <div class="intro-content">
                        <h5>secure payment way</h5>
                        <p>100% secure payment gateway </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="news-part" style="background: url(images/newsletter.jpg) no-repeat center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-6 col-xl-7">
                <div class="news-text">
                    <h2>Subscribe Now</h2>
                    <p>Enter your email and get updates for latest stocks and offers</p>
                </div>
            </div>
            <div class="col-md-7 col-lg-6 col-xl-5">
                <form class="news-form"><input id="email" type="text" placeholder="Enter Your Email Address"><button type="button" onclick="subscribe();"><span>Subscribe Now</span></button></form>
                <p id="msg"></p>
            </div>

        </div>
    </div>
</section>

<footer class="footer-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="footer-widget"><a class="footer-logo" href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
                    <p class="footer-desc">greeny is founded by a team of avid entrepreneurs in the year 2015. greeny is India’s leading Agri Digital Platform transforming <a href="<?php echo base_url('about-us'); ?>">Read more..</a></p>
                    <ul class="footer-social">
                        <li><a class="fa-brands fa-facebook-f" href="https://www.facebook.com/profile.php?id=100089680628528" target="_blank" title="Facebook"></a></li>
                        <li><a class="fa-brands fa-twitter" href="https://twitter.com/Agrogreeny" target="_blank" title="Twitter"></a></li>
                        <li><a class="fa-regular fa-envelope" href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSMVJJvxnWJlcwRThgmKnbHHbpGRrwnmKRqFrZxvPDJwcpkhnBxJpLWrrxnzJKQpMZwBbJWT" target="_blank" title="Email"></a></li>
                        <li><a class="fab fa-whatsapp" href="https://wtsi.me/918320488092" target="_blank" title="Whatsapp"></a></li>
                        <li><a class="fa-brands fa-instagram" href="https://www.instagram.com/greenyagro__/" target="_blank" title="Instagram"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="footer-widget contact">
                    <h3 class="footer-title">contact us</h3>
                    <ul class="footer-contact">
                        <li><i class="icofont-ui-email"></i>
                            <p><span>greenyagro2025@gmail.com</span></p>
                        </li>
                        <li><i class="icofont-ui-touch-phone"></i>
                            <p><span>+91 99248 91535</span><span>+91 9316082841</span><span>+91 8849955196</span></p>
                        </li>
                        <li><i class="icofont-location-pin"></i>
                            <p>Mota-Varachha, Surat-394101, Gujarat, India.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="footer-widget">
                    <h3 class="footer-title">quick Links</h3>
                    <div class="footer-links">
                        <ul>
                            <?php
                            if ($this->session->userdata('member')) {
                                ?>
                                <li>
                                    <a href="<?php echo base_url('member-wishlist'); ?>" > My Wish List</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url('member-home'); ?>" > My Account</a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li>
                                    <a href="<?php echo base_url('sign-in'); ?>"> My Wish List</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url('sign-in'); ?>"> My Account</a>
                                </li>
                                <?php
                            }
                            ?>
                                
                        <li><a href="#">My Cart</a></li>
                        <li><a href="<?php echo base_url('frequently-asked-question'); ?>">FAQ's</a></li>
                        </ul>
                        <ul>
                            <li><a href="<?php echo base_url('about-us'); ?>">About Us</a></li>
                            <li><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
                            <li><a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url('terms-and-conditions'); ?>">Terms & Conditions</a></li>
                            <li><a href="<?php echo base_url('feedback'); ?>">Feedback</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Download App</h3>
                    <p class="footer-desc"></p>
                    <div class="footer-app"><a href="https://play.google.com/store/apps?hl=en_IN" target="_blank"><img src="<?php echo base_url(); ?>assets/images/google-store.png" alt="google"></a><br><a href="https://apps.apple.com/in/developer/apple/id284417353?mt=12" target="_blank""><img src="<?php echo base_url(); ?>assets/images/app-store.png" alt="app"></a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="footer-bottom">
                    <p class="footer-copytext">Copyright &#169; 2025 greeny.&nbsp All Rights Reserved. Design By: &nbsp Kunj </a>&nbsp Dhruvik </a>&nbsp Sunny</p>
                    <div class="footer-card"><a href="#"><img src="<?php echo base_url(); ?>assets/images/payment/jpg/01.jpg" alt="payment"></a><a href="#"><img src="<?php echo base_url(); ?>assets/images/payment/jpg/02.jpg" alt="payment"></a><a href="#"><img src="<?php echo base_url(); ?>assets/images/payment/jpg/03.jpg" alt="payment"></a><a href="#"><img src="<?php echo base_url(); ?>assets/images/payment/jpg/04.jpg" alt="payment"></a></div>
                </div>
            </div>
        </div>
    </div>
</footer>   