<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <title> <?= Helper::t('مرحبا بكم فى موقع احجز لى') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="">

        <!-- Le styles -->
         <?php Yii::app()->bootstrap->register(); ?>
        <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/js/google-code-prettify/prettify.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/datepicker.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/flexslider.css" rel="stylesheet">
        <?php if (Yii::app()->language == 'ar') { ?>
            <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/style.css" rel="stylesheet">
        <?php } else { ?>
            <link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/en_style.css" rel="stylesheet">
        <?php } ?>


        <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>-->

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true); ?>/img/favicon.png">


    </head>
    <body data-spy="scroll" data-target=".bs-docs-sidebar">

        <!-- header
        ================================================== -->
        <!--Start Lang Bar-->
        <div class="row-fluid top_header">
            <div class="container">
                <div class="row-fluid">
                    <div class="span12 rtl">
                        <table>
                            <tr>
                                <td>
                                    <p class="navbar-text"><i class="fa fa-2x fa-globe"></i>   <?= Helper::t('اختر لغتك') ?></p>
                                </td>
                                <td>

 <?php
                                    $this->widget('ext.EasyMultiLanguage.widgets.LanguageSelectorWidget', array(
                                        'style' => 'dropDown', // "dropDown" or "inline". Optional. Default is "dropDown"
                                        'cssClass' => 'bla-bla', // Optional. Additional css class for selector.
                                    ));
                                    ?>  



                                  <!--  <form class="navbar-form navbar-right">
                                        <select class="lang" >
                                            <option onclick="location = '<?php echo Yii::app()->getBaseUrl(true); ?>/home/index/_language/ar'" value="1" <?php echo (Yii::app()->language == 'ar' ? 'selected' : ''); ?> >العربية</option>
                                            <option onclick="location = '<?php echo Yii::app()->getBaseUrl(true); ?>/home/index/_language/en'" value="2" <?php echo (Yii::app()->language == 'en' ? 'selected' : ''); ?>>English</option>
                                        </select>
                                    </form>-->
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--End Lang Bar-->
        <header>
            <div class="row-fluid">
                <div class="container">
                    <div class="row-fluid">
                        <!--Start logo and banner section-->
                        <div class="span6 padd8bx">
                            <?php $top_ad = $this->getadv(1); ?>

                            <a href="<?php echo $top_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $top_ad->image; ?>"/></a>

                        </div>
                        <div class="span6 padd8bx">
                            <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/" class="pull-right"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/logo.png"/></a>
                        </div>
                        <!--End logo and banner section-->
                    </div>
                </div>
            </div>

            <!-- NAVBAR
             ================================================== -->
            <div class="navbar-wrapper top_border">
                <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
                <div class="container">

                    <div class="navbar">
                        <div class="navbar-inner navbar-inner_nobg">
                            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
                            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".menu1">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!--<a class="brand active" href="#"><img src="img/home.png"/></a>-->
                            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->

                            <div class="nav-collapse collapse pull-right menu1">
                                <ul class="nav rtl">
                                    <?php
                                    $categories = $this->getcategories();
                                    foreach ($categories as $category) {
                                        $criteria = new CDbCriteria;
                                        $criteria->condition = 'category_id =' . $category->id;
                                        $criteria->group = "location_id";
                                        $getLocations = Trip::model()->findall($criteria);
                                        ?>

                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category->title; ?></a>
                                            <?php if (!empty($getLocations)) { ?>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                    foreach ($getLocations as $location) {
                                                        $location_id = $location->location_id;

                                                        $getLocationInfo = Location::model()->findByPk($location->location_id);
                                                        // print_r($getLocationInfo);
                                                        ?>
                                                        <li><a href="<?php echo Yii::app()->request->baseUrl . '/trips-' . $getLocationInfo->url ?>"><?php echo $getLocationInfo->title; ?></a></li>
                                                        <?php
                                                    }
                                                    ?>

                                                </ul>
                                            <?php } ?>
                                        </li>
                                    <?php }
                                    ?>


                                </ul>
                            </div><!--/.nav-collapse -->
                        </div><!-- /.navbar-inner -->
                    </div><!-- /.navbar -->

                </div> <!-- /.container -->
            </div><!-- /.navbar-wrapper -->



            <!-- NAVBAR
            ================================================== -->


            <div class="navbar-wrapper bgmain">
                <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
                <div class="container">

                    <div class="navbar no_margin">
                        <div class="navbar-inner navbar-inner_main">
                            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
                            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".menu2">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!--<a class="brand active" href="#"><img src="img/home.png"/></a>-->
                            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
                            <div class="nav-collapse collapse pull-right menu2">
                                <ul class="nav rtl">
                                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/"><i class="fa fa-home"></i> <?= Helper::t('الصفحة الرئيسية ') ?> </a></li>
                                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/contact"><i class="fa fa-envelope"></i> <?= Helper::t('كلمنا  ') ?>  </a></li>
                                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/advirtiseWithUs"> <i class="fa fa-bullhorn"></i> <?= Helper::t('للاعلان معنا') ?></a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-phone"></i> <?= Helper::t('أرقامنا للاتصال') ?> </a>
                                        <ul class="dropdown-menu">
                                            <li><a><?= Helper::t('موبايل') ?>  : <?php echo Helper::yiiparam('mobile') ?></a></li>
                                            <li><a><?= Helper::t('هاتف') ?>  :<?php echo Helper::yiiparam('phone') ?></a></li>
                                            <li><a><?= Helper::t('فاكس') ?>  : <?php echo Helper::yiiparam('fax') ?></a></li>
                                        </ul>
                                    </li>

                                    <?php
                                    if (isset(Yii::app()->user->id)) {
                                        ?>
                                        <li><a class="login-btn" href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/logout"><i class="fa fa-lock"></i> <?= Helper::t('خروج') ?> </a></li>
                                        <li>
                                            <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/profile"><i class="fa fa-user"></i> <?= Helper::t('حسابك') ?>  </a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li><a class="login-btn" href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/login"><i class="fa fa-lock"></i> <?= Helper::t('تسجيل الدخول') ?> </a></li>
                                        <li>
                                            <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/register"><i class="fa fa-user"></i> <?= Helper::t('فتح حسابك') ?></a>
                                        </li>

                                        <?php
                                    }
                                    ?>
                                </ul>

                            </div><!--/.nav-collapse -->
                        </div><!-- /.navbar-inner -->
                    </div><!-- /.navbar -->

                </div> <!-- /.container -->
            </div><!-- /.navbar-wrapper -->
        </header>
        <!--End Header-->




