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
                    <p class="module-subtitle">将一本本不易更新又不环保的纸质菜单替换为桌角萌萌的二维码君，扫码即可获取最新的菜单，实时为用户提供最新的菜品信息。
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
                                <p>假设一家餐厅有10本菜单，一本菜单有5页，一个月更新一次菜单，一家餐厅一年至少就要600张纸。而据统计2015年全国餐厅达5074852家。而所有餐厅每年仅仅是更新菜单就要浪费3,044,911,200张纸。</p>
                            </div>
                        </div>
                        <!-- End features-item -->
                        <div class="feature-item">
                            <div class="col-md-3 col-sm-6">
                                <div class="item-head">
                                    <i class="lnr lnr-rocket"></i>
                                </div>
                                <h6>更快捷</h6>
                                <p>在这个提倡高效率的时代，本平台省去用户等待服务员递菜单，用户点餐后把菜单交给服务员等流程。只需用手机APP扫描桌角二维码获取菜单信息，所见即所得，立即点餐。</p>
                            </div>
                        </div>
                        <!-- End features-item -->

                        <div class="feature-item">
                            <div class="col-md-3 col-sm-6">
                                <div class="item-head">
                                    <i class="lnr lnr-mustache"></i>
                                </div>
                                <h6>更有趣</h6>
                                <p>通过用户日常的点餐记录分析数据、整合数据，为用户量身打造个人饮食喜好分析图。立志打造用户饮食习惯的全身镜，清楚了解自己，培养良好的饮食习惯。做成真正让人爱不释手的生活必备软件。</p>
                            </div>
                        </div>
                        <!-- End features-item -->

                        <div class="feature-item">
                            <div class="col-md-3 col-sm-6">
                                <div class="item-head">
                                    <i class="lnr lnr-phone"></i>
                                </div>
                                <h6>更周到</h6>
                                <p>假设一家餐厅有10本菜单，一本菜单有5页，一个月更新一次菜单，一家餐厅一年至少就要600张纸。而据统计2015年全国餐厅达5074852家。而所有餐厅每年仅仅是更新菜单就要浪费3,044,911,200张纸。</p>
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
                    <p class="module-subtitle">将一本本不易更新又不环保的纸质菜单替换为桌角萌萌的二维码君，扫码即可获取最新的菜单，实时为用户提供最新的菜品信息。
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 right col-full right-0">
                <i class="lnr lnr-rocket"></i>
                <h6>更快捷</h6>
                <p>实时更新菜单
                    <br>直接扫码下单, 无需等待, 快速查看订单详情
                </p>
            </div>
            <div class="col-lg-6 left col-full left-0">
                <i class="lnr lnr-laptop-phone"></i>
                <h6>web &amp; app</h6>
                <p>我们支持PC端、iOS和Android
                    <br>商家web管理平台更易管理, 用户移动平台更便捷
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 right col-full right-0">
                <i class="lnr lnr-cart"></i>
                <h6>消费记录</h6>
                <p>通过用户日常的点餐记录分析数据、整合数据
                    <br>为用户量身打造个人饮食喜好分析图，为用户量身打造个人饮食喜好分析图
                </p>
            </div>
            <div class="col-lg-6 left col-full left-0">
                <i class="lnr lnr-cog"></i>
                <h6>design</h6>
                <p>做成真正让人爱不释手的生活必备软件。
                    <br>立志打造用户饮食习惯的全身镜，清楚了解自己，培养良好的饮食习惯
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
                        <li><a href="" data-filter=".platform">平台</a></li>
                        <li><a href="" data-filter=".web">网页</a></li>
                        <li><a href="" data-filter=".logo">logo</a></li>
                        <li><a href="" data-filter=".graphics">图表</a></li>
                        <li><a href="" data-filter=".ads">广告</a></li>
                        <li><a href="" data-filter=".mobile">移动端</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- all works -->
        <div class="col-md-9">
            <div class="row portfolio_container">
                <!-- single work -->
                <div class="col-md-4 web platform">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-1.png" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>夹虾米</span>
                                <em>平台</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 mobile logo">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-2.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>夹虾米</span>
                                <em>LOGO</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 web ads graphics">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-5.png" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>统计数据</span>
                                <em>一目了然</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 mobile ads">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-4.png" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>购物车</span>
                                <em>移动端</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 mobile ads">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-7.png" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>电子菜单</span>
                                <em>移动端</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 web platform graphics">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-6.png" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>菜品列表</span>
                                <em>平台</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 ads">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-2.jpg" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>夹虾米</span>
                                <em>Icon</em>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single work -->

                <!-- single work -->
                <div class="col-md-4 mobile platform">
                    <a href="single-project.html" class="portfolio_item work-grid">
                        <img src="/imgs/work-3.png" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>Android&iOS</span>
                                <em>平台</em>
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
                        如果对此您也有些想法，欢迎加入我们。
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
                        <p>产品名称“夹虾米”。<br/>定位为“轻巧的线下点餐及菜品推荐平台，同时提供个人口味分析的功能”。</p>
                        <ul class="social-icons">
                            <li>
                                <a class="github" href="https://github.com/IdeaEcho/RnProject"><i class="fa fa-github"></i></a>
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
