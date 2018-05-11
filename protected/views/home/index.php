<!-- Wrap all page content here -->
<div class="row-fluid">
    <div><!--class="containerfull"-->
        <div class="row-fluid">
            <!-- Start big slider -->
            <div class="big-slider">
                <div class="slider">
                    <div id="bgslider" class="carousel slide">
                        <!-- Carousel items -->
                        <div class="Carousel carousel-inner">
                            <?php
                            $i = 1;
                            foreach ($banners as $banner) {

                                if ($i == 1) {
                                    $class = ' active';
                                } else {
                                    $class = '';
                                }
                                ?>
                                <div class="item <?php echo $class; ?>">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/media/banner/<?php echo $banner->image; ?>" class="">
                                    <div class="carousel-caption"> <?php echo $banner->title; ?> </div>
                                </div>
                                <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <a class="carousel-control left" href="#bgslider" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#bgslider" data-slide="next">&rsaquo;</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End big slider -->


<!-- Begin page content -->
<div class="row-fluid">
    <div class="containerfull">
        <div class="row-fluid">
            <div class="span1 left-ads">
                <?php $left_ad = $this->getadv(3); ?>
                <a href="<?php echo $left_ad->url ?>" target="blank" > <img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $left_ad->image; ?>" ></a>
            </div>
            <div class="span10 content">

                <!--Start search-offers-->
                <div class="row-fluid search-offers">

                    <div class="span8 offers-slider">
                        <!-- Place somewhere in the <body> of your page -->
                        <div id="slider" class="flexslider">
                            <ul class="slides">

                                <?php
                                foreach ($homeSlider as $slider) {
                                    ?>
                                    <li>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/media/homeSlider/<?php echo $slider->image; ?>" />
                                    </li>
                                    <?php
                                }
                                ?>
                                <!-- items mirrored twice, total of 12 -->
                            </ul>
                        </div>
                        <div id="carousel" class="flexslider">
                            <ul class="slides">
                                <?php
                                foreach ($homeSlider as $slider) {
                                    ?>
                                    <li>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/media/homeSlider/<?php echo $slider->image; ?>" />
                                    </li>
                                    <?php
                                }
                                ?>
                                <!-- items mirrored twice, total of 12 -->
                            </ul>
                        </div>
                    </div>

                    <div class="span4 search">
                        <ul class="nav nav-tabs" id="myTab">
                            <li><a href="#search" data-toggle="tab" class="active"><i class="fa fa-2x fa-search"></i></a></li>
                            <li><a href="#rating" data-toggle="tab"><i class="fa fa-2x fa-star-o"></i></a></li>
                        </ul>
                        <div class="tab-content relative">
                            <div class="tab-pane fade in active" id="search">
                                <!--start search-->

                                <?php
                                $model = new Trip;
                                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                    'id' => 'trip-form',
                                    'enableAjaxValidation' => false,
                                    'type' => 'horizontal',
                                    'htmlOptions' => array('class' => 'form-horizontal no_margin'),
                                    'action' => array('home/search'),
                                ));
                                ?>
                                <table class="rtl full_width srchright">
                                    <tr class="height0px">
                                        <th width="30%"></th>
                                        <th width="70%"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form->textField($model, 'title', array('class' => 'inputsrch', 'placeholder' => Helper::t('ابحث فى رحلاتنا واختار رحلتك'))); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <?= Helper::t('اختر المدينة') ?> </td>
                                        <td>
                                            <?php
                                            echo $form->dropDownList($model, 'location_id', CHtml::listData(Location::model()->findAll(), 'id', 'title'), array('prompt' => Helper::t('اختر المدينة'),
                                                'class' => 'form-control',
                                                    )
                                            );
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?= Helper::t('مستوى الفندق') ?></td>
                                        <td>
                                            <?php
                                            $model2 = new Hotels;
                                            echo $form->dropDownList($model2, 'level_id', HotelsLevel::getlevels(), array('class' => 'form-control',
                                                'prompt' =>  Helper::t('مستوى الفندق')));
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?= Helper::t('عدد الايام') ?> </td>
                                        <td>

<?php
echo $form->dropDownList($model, 'days_id', CHtml::listData(Days::model()->findAll(), 'id', 'title'), array('prompt' => Helper::t(' الايام'),
    'class' => 'form-control',
        )
);
?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?= Helper::t('السعر') ?> </td>
                                        <td>

<?php
echo $form->dropDownList($model, 'price_range_id', CHtml::listData(PriceRange::model()->findAll(), 'id', 'title'), array('prompt' => Helper::t('اختر السعر'),
    'class' => 'form-control',
        )
);
?>
                                        </td>
                                    </tr>
                                </table>
                                <div class="row-fluid btn-form-footer">
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => Helper::t('ابحث'),
    'htmlOptions' => array('class' => 'tn btn-large our-btn-sty margin_r25px pull-right'),
));
?>
                                </div>
                                    <?php $this->endWidget(); ?>

                                <!--end search -->
                            </div>
                            
                            
                                 <div class="tab-pane fade" id="rating">
                                        <div class="methods rtl">
                                        <p><?= Helper::t('طرق الدفع  ') ?> </p>
                                       
                                        <ul class="pay">
                                        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/paypal" class="link-img"><img src="<?php echo Yii::app()->request->baseUrl;?>/media/<?=$paypal_page->image?>"></a><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/paypal" class="title2"><?=$paypal_page->title?></a>
 <p><?=substr($paypal_page->details , 0, 50) . '...'?><span><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/paypal"><?= Helper::t('المزيد') ?></a></span></p>                                       
                                        </li>
                                        
                                        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/contact-us" class="link-img"><img src="<?php echo Yii::app()->request->baseUrl;?>/media/<?=$contactUs_page->image?>"></a><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/contact-us" class="title2"><?=$contactUs_page->title?></a>
 <p><?=substr($contactUs_page->details , 0, 50) . '...'?><span><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/contact-us"><?= Helper::t('المزيد') ?></a></span></p>                                       
                                        </li>
                                        
                                         <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/cash-on-delivery" class="link-img"><img src="<?php echo Yii::app()->request->baseUrl;?>/media/<?=$cash_page->image?>"></a><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/cash-on-delivery" class="title2"><?=$cash_page->title?></a>
 <p><?=substr($cash_page->details , 0, 50) . '...'?><span><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/cash-on-delivery"><?= Helper::t('المزيد') ?></a></span></p>                                       
                                        </li>
                                        
                                        <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/request-a-call-back" class="link-img"><img src="<?php echo Yii::app()->request->baseUrl;?>/media/<?=$callBack_page->image?>"></a><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/request-a-call-back" class="title2"><?=$callBack_page->title?></a>
 <p><?=substr($callBack_page->details , 0, 50) . '...'?><span><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/request-a-call-back"><?= Helper::t('المزيد') ?> </a></span></p>                                       
                                        </li>
                                        </ul>
                                       
                                        </div>
                                    </div>
                            <!--                            <div class="tab-pane fade" id="rating">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae odio ac arcu sollicitudin dapibus eget a ligula.
                                                                Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla mollis, neque et malesuada
                                                                sodales, metus neque vehicula quam, in pulvinar magna ante in dolor. Morbi accumsan eleifend sagittis. Quisque volutpat
                                                                sem at felis elementum, a egestas ipsum venenatis. Donec non auctor magna, ut posuere mi. Mauris eget viverra massa.</p>
                                                        </div>-->
                        </div>
                    </div>

                </div>
                <!--End search-offers-->

                <!--Start latest-trips-sidemenu-->
                <div class="row-fluid latest-trips-sidemenu">

                    <div class="span9 latest-trips-ads-banner">

                        <div class="row-fluid">
                            <div class="span12 ads-banner" >

<?php $middle_ad = $this->getadv(4); ?>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $middle_ad->image; ?>" >
<!--                                    <a href="<?php echo $middle_ad->url ?>" target="blank" > <img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $middle_ad->image; ?>" ></a>-->

   <!--<img src="images/page-ads.jpg">-->
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="span12 latest-trips">

                                <div class="row-fluid sidemenu-head">
                                    <div class="span11 head-blue rtl"><p><?= Helper::t('استمتع بعروض احجز لى') ?>  </p></div>
                                    <div class="span1 head-icon"><i class="fa fa-2x fa-gift"></i></div>
                                </div>

                                <div class="row-fluid">
                                    <div class="span12 well">
                                        <div id="offers" class="carousel slide">

                                            <!-- Carousel items -->
                                            <div class="carousel-inner">

<?php
foreach ($offers as $key => $offer) {
    $category = Categories::model()->findByPk($offer->category_id);
    $photos = Helper::getGalleryImages($offer->gallery_id);
    //  echo $photos->rank.'88888888888888';die;
    if ($key == 0)
        echo'<div class="item active">
                                                      <div class="row-fluid">';

    echo '<div class="span4 thumb">

                                                     <div class="row-fluid">
                                                          <div class="span12 slide-photo">
                                                          <img src="' . Yii::app()->request->baseUrl . '/gallery/' . $photos[0]->rank . '.jpg">
                                                          </div>
                                                     </div>

                                                     <div class="row-fluid">
                                                        <div class="span12 slide-title">
                                                           <a href="' . Yii::app()->request->baseUrl . '/trip-' . $offer->url . '">
                                                             <p>' . $offer->title . '</p>
                                                                 <div class="circle-more">
                                                                    <p> '.Helper::t('شوف التفاصيل').'  </p>
                                                                       </div>
                                                                       </a>
                                                                     </div>
                                                     </div>

                                                      </div>';
    if ($key % 3 == 2) {
        echo '</div></div>';
        if ($key < count($offers) - 1)
            echo'<div class="item">
                                                       <div class="row-fluid">';
    }
} if (count($offers) % 3 != 0)
    echo '</div></div>';
?>
                                            </div>
                                            <!--/carousel-inner-->
                                            <a class="left carousel-control" href="#offers" data-slide="prev">‹</a>
                                            <a class="right carousel-control" href="#offers" data-slide="next">›</a>

                                        </div>
                                        <!--/offers-->
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="span3 sidemenu">

                        <div class="row-fluid sidemenu-head">
                            <div class="span9 head-blue rtl"><p><?= Helper::t('اختر رحلتك') ?></p></div>
                            <div class="span3 head-icon"><i class="fa fa-2x fa-th-large"></i></div>
                        </div>

                        <div class="row-fluid sidemenu-body rtl">
                            <ul>
<?php
$categories = $this->getcategories();
foreach ($categories as $category) {
    ?>
                                    <li><i class="fa fa-reply-all "></i>
                                        <a href="<?php echo Yii::app()->request->baseUrl . '/category-' . $category->url ?>">
                                    <?php echo $category->title; ?>
                                        </a>
                                    </li>
                                            <?php
                                        }
                                        ?>
                            </ul>
                        </div>
                    </div>

                </div>
                <!--End latest-trips-sidemenu-->
                <!--Start trips Places -->
                <div class="row-fluid places">

                    <div class="row-fluid sidemenu-head">
                        <div class="span11 head-blue rtl"><p><?= Helper::t('أماكن على قائمة رحلاتنا') ?> </p></div>
                        <div class="span1 head-icon full_i"><i class="fa fa-2x fa-briefcase"></i></div>
                    </div>

                    <div class="row-fluid">
                        <div class="span12 paddingfull">
<?php
foreach ($locations as $key => $location) {
    if ($key == 0)
        echo '<div class="row-fluid">';
    ?>


                                <?php
                                echo '<div class="span4 place">
                                    <a href="' . Yii::app()->request->baseUrl . '/trips-' . $location->url . '">
                                        <img src="' . Yii::app()->request->baseUrl . '/media/locations/' . $location->image . '">
                                        <div class="place-hover">
                                            <div class="x place-title">
                                            <p>' . $location->title . '</p>
                                            </div>
                                            <div class="x circle-more-plc">
                                            <p> '.Helper::t('شوف التفاصيل ').'</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>';

                                if ($key % 3 == 2) {
                                    echo '</div>';
                                    if ($key < count($locations) - 1)
                                        echo '<div class="row-fluid">';
                                }
                            } if (count($locations) % 3 != 0)
                                echo '</div>';
                            ?>



                        </div>
                    </div>

                </div>
                <!--End trips Places -->

            </div><!--End Content-->
            <div class="span1 right-ads">
<?php $right_ad = $this->getadv(2); ?>
                <a href="<?php echo $right_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $right_ad->image; ?>" ></a>
            </div>
        </div>
    </div>
</div>
<!-- End page content -->
