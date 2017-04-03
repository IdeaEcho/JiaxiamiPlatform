<?php
use yii\helpers\Html;
use app\assets\FrontendAsset;
use yii\helpers\Url;

FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="夹虾米">
    <link rel="shortcut icon" type="image/x-icon" href="/imgs/favicon.ico">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Fontawesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>
<body class="animsition">
    <?php $this->beginBody() ?>
<!-- Border -->
<span class="frame-line top-frame visible-lg"></span>
<span class="frame-line right-frame visible-lg"></span>
<span class="frame-line bottom-frame visible-lg"></span>
<span class="frame-line left-frame visible-lg"></span>
<!-- HEADER  -->
<header class="main-header">
    <div class="container-fluid">
            <!-- box header -->
            <div class="box-header">
                    <div class="box-logo">
                            <a href="index.html"><img src="/imgs/logo.png" width="80" alt="Logo"></a>
                    </div>
                    <!-- box-nav -->
                    <a class="box-primary-nav-trigger" href="#0">
                            <span class="box-menu-icon"></span>
                    </a>
                    <!-- box-primary-nav-trigger -->
            </div>
            <!-- end box header -->

            <!-- nav -->
            <nav>
                    <ul class="box-primary-nav">
                            <li class="box-label">夹虾米</li>
                            <li><a href="#">主页</a> <i class="lnr lnr-home"></i></li>
                            <li><a href="#">提供的服务</a></li>
                            <li><a href="#">产品剪影</a></li>
                            <li><a href="#">联系我们</a></li>
                    </ul>
            </nav>
            <!-- end nav -->

            <!-- box-intro -->
            <section class="box-intro">
                    <div class="table-cell">
                            <h3 class="box-headline letters rotate-2">
                                    <span class="box-words-wrapper">
                                            <b class="is-visible">WHAT TO EAT ? CREATIVE.</b>
                                            <b>&nbsp;SIMPLE &nbsp;&amp;&nbsp; POWERFUL.</b>
                                    </span>
                            </h3>
                            <h1>夹虾米</h1>
                    </div>
                    <!-- 登陆/注册表单 -->
                    <div class="form-box">
                        <?= $content ?>
                    </div>
                    <div class="mouse">
                            <div class="scroll"></div>
                    </div>
            </section>
            <!-- end box-intro -->
    </div>
</header>

<!-- HISTORY OF AGENCY -->
<section id="about" class="about mt-150 mb-50">
    <div class="container">
        <div class="row center">
            <div class="col-md-8 col-md-offset-2">
                <img src="/imgs/about.png" alt="Khaki HTML Template" width="300">
                <div class="km-space"></div>
                <h5 class="lead">夹虾米的由来：因与一句常用的闽南语"吃什么"同音而命名。</h5>
            </div>
        </div><!-- description text -->
    </div>
</section>

<!-- TEAM -->
<section id="team" class="team mbr-box mbr-section mbr-section--relative">
    <svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 0 L50 100 L100 0 Z" fill="#ffeedb" stroke="#ffeedb"></path>
    </svg>
    <div class="container">
        <div class="col-md-8 col-md-offset-2 col-sm-12">
            <div class="row center mb-100">
                <div class="section-title-parralax">
                    <div class="process-numbers">01</div>
                    <h2>夹虾米是什么?</h2>
                    <p class="module-subtitle">为取代纸质菜单而生，扫码即可获取最新的菜单，商家修改更方便，用户点餐更快捷。
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- ITEM -->
            <div class="team-member col-md-4 col-sm-4 text-center">
                <div class="member-thumb">
                    <div class="cover"><div class="cover-inner-left"></div></div>
                    <img src="/imgs/team/member-1.jpg" alt="Team Member" class="img-responsive">
                    <div class="team_cover"><div class="team_cover_inner"></div></div>
                        <div class="overlay">
                            <h6>饮食爱好分析! </h6>
                            <p>通过每次的点餐记录，分析您的喜好，为您推荐你可能喜欢的菜品</p>
                        </div>
                </div>
                    <h6>饮食爱好分析</h6>
            </div>
            <!-- end single member -->

            <!-- single member -->
            <div class="team-member col-md-4 col-sm-4 text-center">
                <div class="member-thumb">
                    <div class="cover"><div class="cover-inner-middle"></div></div>
                    <img src="/imgs/team/member-2.jpg" alt="Team Member" class="img-responsive">
                    <div class="team_cover"><div class="team_cover_inner"></div></div>
                        <div class="overlay">
                            <h6>做菜顺序 &amp; 我们来! </h6>
                            <p>通过研究每道菜的制作时间，来安排更佳的做菜顺序.</p>
                        </div>
                </div>
                    <h6>做菜顺序我们来</h6>
            </div>
            <!-- end single member -->

            <!-- single member -->
            <div class="team-member col-md-4 col-sm-4 text-center ">
                <div class="member-thumb">
                    <div class="cover"><div class="cover-inner-right"></div></div>
                    <img src="/imgs/team/member-3.jpg" alt="Team Member" class="img-responsive">
                    <div class="team_cover"><div class="team_cover_inner"></div></div>
                        <div class="overlay">
                            <h6>挑战活动! </h6>
                            <p>定期的调整活动。邀请您来挑战您的味蕾，而不是只局限于一种口味</p>
                            <div class="social-links">
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google"></i></a>
                            </div>
                        </div>
                </div>
                    <h6>挑战活动</h6>
            </div>
            <!-- end single member -->
        </div>
    </div>
    <div class="bottom-separator hidden-xs"></div>
</section>
<!-- FEATURES -->
<div id="features" class="features mbr-box mbr-section mbr-section--relative">
    <div class="container">
                    <div class="row center">
                        <div class="feature-item">
                            <div class="col-md-3 col-sm-6">
                                <div class="item-head">
                                    <i class="lnr lnr-diamond"></i>
                                </div>
                                <h6>更环保</h6>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                        <!-- End features-item -->
                        <div class="feature-item">
                            <div class="col-md-3 col-sm-6">
                                <div class="item-head">
                                    <i class="lnr lnr-rocket"></i>
                                </div>
                                <h6>更快捷</h6>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.e</p>
                            </div>
                        </div>
                        <!-- End features-item -->

                        <div class="feature-item">
                            <div class="col-md-3 col-sm-6">
                                <div class="item-head">
                                    <i class="lnr lnr-mustache"></i>
                                </div>
                                <h6>更有趣</h6>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                        <!-- End features-item -->

                        <div class="feature-item">
                            <div class="col-md-3 col-sm-6">
                                <div class="item-head">
                                    <i class="lnr lnr-phone"></i>
                                </div>
                                <h6>更周到</h6>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                        <!-- End features-item -->
                    </div>
                </div>
</div>

<!-- SERVICES PARALAX -->
<section id="services" class="services mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background"  style="background-image: url(/imgs/services.jpg);">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row center">
            <div class="col-md-8 col-md-offset-2 col-sm-12">
                <div class="section-title-parralax">
                    <div class="process-numbers">02</div>
                    <h2>我们提供服务</h2>
                    <p class="module-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 right col-full right-0">
                <i class="lnr lnr-rocket"></i>
                <h6>unlimited options</h6>
                <p>Quisque eget hendrerit eros, ut interdum magna.
                    <br>Donec urna ante, lobortis nec dictum eget, porta non turpis.
                </p>
            </div>
            <div class="col-lg-6 left col-full left-0">
                <i class="lnr lnr-laptop-phone"></i>
                <h6>design &amp; development</h6>
                <p>Quisque eget hendrerit eros, ut interdum magna.
                    <br>Donec urna ante, lobortis nec dictum eget, porta non turpis.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 right col-full right-0">
                <i class="lnr lnr-cart"></i>
                <h6>e-commerce</h6>
                <p>Quisque eget hendrerit eros, ut interdum magna.
                    <br>Donec urna ante, lobortis nec dictum eget, porta non turpis.
                </p>
            </div>
            <div class="col-lg-6 left col-full left-0">
                <i class="lnr lnr-cog"></i>
                <h6>customizable design</h6>
                <p>Quisque eget hendrerit eros, ut interdum magna.
                    <br>Donec urna ante, lobortis nec dictum eget, porta non turpis.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- PORTFOLIO -->
<section class="portfolio">
    <div class="top-right-separator hidden-xs"></div>
    <div class="container">
        <div class="col-md-8 col-md-offset-2 col-sm-12">
            <div class="row center">
                <div class="section-title mb-100">
                    <div class="process-numbers">03</div>
                    <h2>产品剪影</h2>
                    <p class="module-subtitle">产品分为商家管理平台和用户点餐App，App已兼容Android和iOS。</p>
                </div>
            </div>
        </div>
        <!-- categories  -->
        <div class="col-md-3">
            <div class="row categories-grid">
                <nav class="categories">
                    <ul class="portfolio_filter">
                        <li><a href="" class="active" data-filter="*">all</a></li>
                        <li><a href="" data-filter=".photography">photography</a></li>
                        <li><a href="" data-filter=".web">webdesign</a></li>
                        <li><a href="" data-filter=".logo">logo</a></li>
                        <li><a href="" data-filter=".graphics">graphics</a></li>
                        <li><a href="" data-filter=".ads">advertising</a></li>
                        <li><a href="" data-filter=".fashion">fashion</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- all works -->
        <div class="col-md-9">
            <div class="row portfolio_container">
                <!-- single work -->
                <div class="col-md-4 photography">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-1.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>Brave man</span>
                                <em>photography</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 fashion logo">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-2.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>super man</span>
                                <em>photography</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 ads graphics">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-5.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>bat man</span>
                                <em>photography</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 fashion ads">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-4.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>spider man</span>
                                <em>photography</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 graphics ads">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-3.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>iron man</span>
                                <em>photography</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 logo web photography">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-6.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>iron man</span>
                                <em>photography</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 ads graphics">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-2.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>iron man</span>
                                <em>photography</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 web fashion photography">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-3.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>iron man</span>
                                <em>photography</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 fashion logo">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-1.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>iron man</span>
                                <em>photography</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->
            </div>
            <!-- end row -->
        </div>
        <!-- all works end -->
    </div>
    <!-- end container -->
</section>
<!-- portfolio -->

<!-- Contact -->
<section id="contact" class="contact mbr-box mbr-section mbr-section--relative mbr-section--bg-adapted">
    <div class="container">
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <h4> 加入我们</h4>
                    <p class="libre-text mt-50">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                        there live the blind texts.
                    </p>

                <a href="site/register.html" class="default-btn"> 商家入驻 <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Subscribe block -->
        <div class=" col-md-offset-1 col-md-5 col-sm-12">
            <div class="row center">
                <div class="newsletter">
                    <h4>联系我们</h4>
                    <p class="libre-text mb-50">
                        Contact Us
                    </p>
                    <form action="#" method="post">
                        <div class="input_1">
                            <input type="text" name="email">
                            <span>请输入你的邮箱地址</span>
                        </div>
                        <button id="submit_btn" class="default-btn"> 发送 <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="main-footer">
    <svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="svgcolor-light">
        <path d="M0 0 L50 100 L100 0 Z" fill="#fff" stroke="#fff"></path>
    </svg>
        <div class="container">
            <div class="row mt-100 mb-50 footer-widgets">
                <!-- Start Contact Widget -->
                <div class="col-md-6 col-xs-12">
                    <div class="footer-widget contact-widget">
                        <img src="/imgs/footerlogo.png" class="logo-footer img-responsive" alt="Footer Logo" />
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        <ul class="social-icons">
                            <li>
                                <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="google" href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div><!-- .col-md-3 -->
                <!-- End Contact Widget -->

                <!-- Start Contact Widget -->
                <div class="col-md-3 col-xs-12">
                    <div class="footer-widget twitter-widget">
                        <h4>联系方式</h4>Email: 6044407@qq.com <br>Phone: 18959386000
                    </div>
                </div><!-- .col-md-3 -->
                <!-- End Contact Widget -->

                <!-- Start Flickr Widget -->
                <div class="col-md-3 col-xs-12">
                    <div class="footer-widget company-links">
                        <h4>公司</h4>
                        <ul class="footer-links">
                            <li><a href="#">关于</a></li>
                            <li><a href="#">提供服务</a></li>
                            <li><a href="#">我们的App</a></li>
                            <li><a href="#">特色</a></li>
                        </ul>
                    </div>
                </div><!-- .col-md-3 -->
                <!-- End Flickr Widget -->
            </div><!-- .row -->

            <!-- Start Copyright -->
            <div class="copyright-section">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; 2017 夹虾米 -  All Rights Reserved <a href="#">Chen Shuyao</a> </p>
                    </div><!-- .col-md-6 -->
                </div><!-- .row -->
            </div>
            <!-- End Copyright -->
        </div>
</footer>

<?php $this->endBody() ?>
<script type="text/javascript">
    $(window).load(function() {
        new WOW().init();

        smoothScroll.init();

        // initialize isotope
        var $container = $('.portfolio_container');
        $container.isotope({
            filter: '*',
        });

        $('.portfolio_filter a').click(function(){
            $('.portfolio_filter .active').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 500,
                    animationEngine : "jquery"
                }
            });
            return false;
        });
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
