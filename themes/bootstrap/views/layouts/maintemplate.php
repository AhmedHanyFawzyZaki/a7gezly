<!DOCTYPE html>
<!--[if lt IE 7]>       <html class="no-js lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>          <html class="no-js lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>          <html class="no-js lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true); ?>/img/favicon.png"> 
        <meta name="description" content="UkProSolutions: Bootstrap Responsive Admin Theme">

        <?php Yii::app()->bootstrap->register(); ?>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>

        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">

        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Font-awesome/css/font-awesome.min.css"/>

    </head>
    <?php
    if (Yii::app()->user->getState('wide_screen') == 1) {
        $classN = "hide-sidebar";
    } else {
        $classN = '';
    }
    ?>
    <body class="<?= $classN; ?>"  >
        <!-- BEGIN WRAP -->
        <div id="wrap">


            <!-- BEGIN TOP BAR -->
            <div id="top">
                <!-- .navbar -->
                <div class="navbar navbar-inverse navbar-static-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <a class="brand" href="<?php echo Yii::app()->request->baseUrl; ?>/admin"> <?= Yii::app()->name; ?></a>
                            <!-- .topnav -->
                            <div class="btn-toolbar topnav">
                                <!--             <div class="btn-group">
                                                 <a id="changeSidebarPos" class="btn btn-success" rel="tooltip"
                                                    data-original-title="Show / Hide Sidebar" data-placement="bottom" onClick="alert('change')">
                                                     <i class="icon-resize-horizontal"></i>
                                                 </a>
             
             
             
                                             </div>-->
                                <div class="btn-group">
                                    <?php
                                    echo CHtml::ajaxLink(
                                            "<i class='icon-resize-horizontal'></i>", Yii::app()->createUrl('dashboard/ajaxRequest'), array(// ajaxOptions
                                        'type' => 'POST',
                                        'beforeSend' => "function( request )
                         {
                           // Set up any pre-sending stuff like initializing progress indicators
                         }",
                                        'success' => "function( data )
                        {
                        // handle return data
                        //alert( data );
                        }",
                                        'data' => array('val1' => '1',)
                                            ), array(//htmlOptions
                                        'href' => Yii::app()->createUrl('dashboard/ajaxRequest'),
                                        'class' => 'btn btn-success',
                                        'id' => 'changeSidebarPos',
                                        'data-original-title' => 'Show / Hide Sidebar',
                                            )
                                    );
                                    ?>
                                </div>

                                <!--                                <div class="btn-group dropdown">
                                
                                                                    <a class="btn btn-inverse dropdown-toggle" rel="tooltip" href="#" data-original-title="Lists"
                                                                       data-placement="bottom" data-toggle="dropdown" >
                                
                                                                        <i class="icon-list"></i>
                                
                                                                    </a>
                                
                                                                </div>-->
                                <div class="btn-group dropdown">

                                    <a class="btn btn-inverse dropdown-toggle" rel="tooltip" href="<?php echo Yii::app()->request->baseUrl; ?>/admin/settings" data-original-title="Settings"
                                       data-placement="bottom" data-toggle="" >

                                        <i class="icon-gear"></i>

                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/user">Manage users</a> </li>
                                        <li> <a href="#">b</a> </li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-inverse" data-placement="bottom" data-original-title="Logout" rel="tooltip"
                                       href="<?php echo Yii::app()->request->baseUrl; ?>/admin/dashboard/logout"><i class="icon-off"></i></a></div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.navbar -->
            </div>
            <!-- END TOP BAR -->


            <!-- BEGIN HEADER.head -->
            <header class="head">
                <div class="search-bar">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="search-bar-inner">

                                <a id="menu-toggle" class="accordion-toggle btn btn-inverse visible-phone" data-toggle="collapse"
                                   data-target=".menu"rel="tooltip" data-placement="bottom" data-original-title="Show/Hide Menu">
                                    <i class="icon-sort"></i>
                                </a>

                                <form class="main-search">
                                    <input class="input-block-level" type="text" placeholder="Live search...">
                                    <button id="searchBtn" type="submit" class="btn btn-inverse"><i class="icon-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ."main-bar -->
                <div class="main-bar">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="span12">



                            </div>
                        </div>
                        <!-- /.row-fluid -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.main-bar -->
            </header>
            <!-- END HEADER.head -->

            <!-- BEGIN LEFT  -->
            <div id="left">
                <!-- .user-media -->
                <div class="media user-media hidden-phone">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/user/update/id/<? echo yii::app()->user->id; ?>" class="user-link">
                        <?php
                        $user = User::model()->findByPk(Yii::app()->user->id);
                        if ($user->image == '') {
                            $AdminImage = 'img/user.gif';
                        } else {
                            $AdminImage = 'media/members/' . Yii::app()->user->admin_image;
                        }
                        ?>
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $AdminImage ?>" alt="" class="media-object img-polaroid user-img" width="150" height="150">
                                         <!--<span class="label user-label">16</span>-->
                    </a>

                    <div class="media-body hidden-tablet">
                        <h5 class="media-heading"><?php echo Yii::app()->name; ?></h5>
                        <ul class="unstyled user-info">

                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/admin/user/update/id/<?= Yii::app()->user->id; ?>"><?= Yii::app()->user->username ?></a></li>
                            <li>Last Access : <br/>
                                <small><i class="icon-calendar"></i>
                                    <?= Yii::app()->dateFormatter->formatDateTime(Yii::app()->user->getState('admin_last_login'), 'long', null); ?>
                                </small>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.user-media -->

                <!-- BEGIN MAIN NAVIGATION -->

                <div  class="menu"><div class="unstyled accordion">
                        <?php
                        $this->widget('bootstrap.widgets.TbMenuUKPROM', array(
                            'type' => "list",
                            'items' => array(
                                array('label' => 'Main Site', 'url' => array('/home/index'), 'itemOptions' => array('class' => ''), "icon" => "fa fa-home", "parent" => ""),
                                array('label' => 'Dashboard', 'url' => array('admin/dashboard'), 'itemOptions' => array('class' => Helper::active_admin('dashboard')),
                                    "icon" => "fa fa-tachometer", "parent" => ""),
                                array('label' => 'Categories & Trips', "icon" => "fa fa-user", "parent" => "", 'linkOptions' => array("data-toggle" => "collapse",
                                        "data-target" => "#subnav8", 'class' => ''), 'url' => '#',
                                    'items' => array(
                                        array('label' => 'Manage Categories', 'url' => array('admin/categories'), "icon" => "fa fa-user"),
                                        array('label' => 'Manage Location', 'url' => array('admin/location'), "icon" => "fa fa-user"),
                                        array('label' => 'Manage Trips', 'url' => array('admin/trip'), "icon" => "fa fa-user"),
                                        array('label' => 'Manage Days', 'url' => array('admin/days'), "icon" => "fa fa-user"),
                                        array('label' => 'Manage prices', 'url' => array('admin/priceRange'), "icon" => "fa fa-user"),
                                    ),
                                    'itemOptions' => array('class' => 'main-site-link3'), 'visible' => User::CheckAdmin()),
                                array('label' => 'Booking', "icon" => "fa fa-cogs", "parent" => "", 'url' => array('admin/booking'),
                                    'itemOptions' => array('class' => Helper::active_admin('booking')), 'visible' => User::CheckAdmin()),
                                array('label' => 'Hotels', "parent" => "", "icon" => "fa fa-shopping-cart", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#subnav9", 'class' => ''), 'url' => array('#'),
                                    'items' => array(
                                        array('label' => 'Hotels', 'url' => array('admin/hotels'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Hotel Level', 'url' => array('admin/hotelsLevel'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Room Type', 'url' => array('admin/roomType'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Room Condition', 'url' => array('admin/roomCondition'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Room Option', 'url' => array('admin/roomOption'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Bed Type', 'url' => array('admin/bedType'), "icon" => "fa fa-bar-chart-o"),
                                    ),
                                    'itemOptions' => array('class' => 'main-site-link1'), 'visible' => User::CheckAdmin()),
                                array(
                                    'label' => 'Cars', "parent" => "", 'icon' => "fa fa-shopping-cart", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#subnav20", 'class' => ''), 'url' => array('#'),
                                    'items' => array(
                                        array('label' => 'Drivers', 'url' => array('admin/driver'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Car Categories', 'url' => array('admin/carCategory'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Car Models', 'url' => array('admin/carModel'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Car Emission', 'url' => array('admin/carEmission'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Car Fuel type', 'url' => array('admin/carFuelType'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Car Properties', 'url' => array('admin/property'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Cities', 'url' => array('admin/city'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Locations', 'url' => array('admin/CarLocation'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Cars', 'url' => array('admin/car'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Car Packages', 'url' => array('admin/carPrice'), "icon" => "fa fa-bar-chart-o"),
                                        
                                    ),
                                    'itemOptions' => array('class' => 'main-site-link1'), 'visible' => User::CheckAdmin()),
                                array(
                                    'label' => 'Car Bookings', "parent" => "", 'icon' => "fa fa-shopping-cart", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#subnav21", 'class' => ''), 'url' => array('#'),
                                    'items' => array(
                                        array('label' => 'Car Without driver', 'url' => array('admin/carBooking'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Car With driver', 'url' => array('admin/carDriverBooking'), "icon" => "fa fa-bar-chart-o"),
                                    ),
                                    'itemOptions' => array('class' => 'main-site-link1'), 'visible' => User::CheckAdmin()),
                                array('label' => 'Static Page', 'url' => array('admin/pages'), 'itemOptions' => array('class' => Helper::active_admin('pages')),
                                    "icon" => "fa fa-leaf", "parent" => ""),
                                array('label' => 'Banner & Slider', "parent" => "", "icon" => "fa fa-shopping-cart", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#subnav7", 'class' => ''), 'url' => array('#'),
                                    'items' => array(
                                        array('label' => 'Banner', 'url' => array('admin/banner'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Slider', 'url' => array('admin/homeSlider'), "icon" => "fa fa-bar-chart-o"),
                                    ),
                                    'itemOptions' => array('class' => 'main-site-link1'), 'visible' => User::CheckAdmin()),
                                array('label' => 'Advertising ', "parent" => "", "icon" => "fa fa-shopping-cart", 'linkOptions' => array("data-toggle" => "collapse", "data-target" => "#subnav6", 'class' => ''), 'url' => array('#'),
                                    'items' => array(
                                        array('label' => 'Ads', 'url' => array('admin/ads'), "icon" => "fa fa-bar-chart-o"),
                                        array('label' => 'Advertise with us', 'url' => array('admin/advirtiseWithUs'), "icon" => "fa fa-bar-chart-o"),
                                    ),
                                    'itemOptions' => array('class' => 'main-site-link1'), 'visible' => User::CheckAdmin()),
                                array('label' => 'Settings', "icon" => "fa fa-cogs", "parent" => "", 'url' => array('admin/settings'),
                                    'itemOptions' => array('class' => Helper::active_admin('settings')), 'visible' => User::CheckAdmin()),
                                array('label' => 'Users', "icon" => "fa fa-cogs", "parent" => "", 'url' => array('admin/user'),
                                    'itemOptions' => array('class' => Helper::active_admin('settings')), 'visible' => User::CheckAdmin()),
                                array('label' => 'Newsletters', "icon" => "fa fa-cogs", "parent" => "", 'url' => array('admin/newsletterMessage'),
                                    'itemOptions' => array('class' => Helper::active_admin('newsletterMessage')), 'visible' => User::CheckAdmin()),
                                array('label' => 'Logout', "parent" => "", 'url' => array('admin/dashboard/logout'), "icon" => "fa fa-power-off"
                                    , 'itemOptions' => array('class' => ''),
                                    'visible' => User::CheckAdmin()),
                                array('label' => 'divide', "divider" => "nav-divider"),
                            ),
                        ));
                        ?>
                    </div></div>



                <!-- END MAIN NAVIGATION -->

            </div>
            <!-- END LEFT -->

            <!-- BEGIN MAIN CONTENT -->
            <!-- #content -->
            <div id="content">
                <!-- .outer -->
                <div class="container-fluid outer">
                    <div class="row-fluid">
                        <!-- .inner -->
                        <div class="span12 inner">
                            <!--Begin Datatables-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box dark">

                                        <header>
                                            <div class="icons"><i class="icon-eye-open"></i></div>
<?php
if (Yii::app()->controller->id == 'dashboard' and Yii::app()->controller->action->id == 'index') {
    // load the script for graphs or anything related to the index page
} else {
    echo "<h5>" . $this->pageTitlecrumbs . "</h5>";
}
?>

                                            <?php ?>

                                            <!-- .toolbar -->

                                            <div class="toolbar">
                                                <ul class="nav">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-th-large"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
<?php
$this->beginWidget('zii.widgets.CPortlet', array(
));
$this->widget('bootstrap.widgets.TbMenu', array(
    'items' => $this->menu,
    'htmlOptions' => array('class' => 'nav'),
));
$this->endWidget();
?>
                                                            <!-- <li><a href="Accounts-create.html">Create Account</a></li>
                                                            <li><a href="Accounts.html">View Accounts</a></li>
                                                            <li><a href="Accounts.html">View Account Reports</a></li>
                                                            <li><a href="Accounts-import.html">Import Accounts</a></li> -->
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <!-- <a href="#div-1" data-toggle="collapse" class="accordion-toggle minimize-box">
                                                        <i class="icon-chevron-up"></i>
                                                        </a> -->
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.toolbar -->

                                        </header>


                                        <div id="collapse4" class="body">
<?php echo $content; ?>

                                        </div>

                                    </div>
                                </div>
                                <!--End Datatables-->
                            </div>
                            <!-- /.row-fluid -->
                        </div>
                        <!-- /.outer -->
                    </div>
                    <!-- /#content -->
                    <!-- #push do not remove -->
                    <div id="push"></div>
                    <!-- /#push -->
                </div>
            </div>
            <!-- END CONTENT -->



        </div>


        <!-- END WRAP -->



        <!-- BEGIN FOOTER -->
        <div id="footer">
            <p><?php echo date('Y'); ?> &copy; Ukprosolutions</p>
        </div>
        <!-- END FOOTER -->




        <script>
            $(".collapse").collapse('hide')
        </script>
        <script>
            $("document").ready(function() {
                $("#changeSidebarPos").click(function() {
                    $.ajax({
                        url: "<?php echo Yii::app()->createUrl('admin/dashboard/ajaxRequest'); ?>",
                        success: function() {
                        }
                    });
                });
            });
        </script>
    </body>
</html>
