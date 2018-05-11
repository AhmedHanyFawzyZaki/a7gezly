<!-- Begin page content -->
<div class="row-fluid">
    <div class="containerfull">
        <div class="row-fluid">
            <div class="span1 right-ads">
                <?php $right_ad = $this->getadv(2); ?>
                <a href="<?php echo $right_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $right_ad->image; ?>" ></a>
            </div>
            <div class="span10 content top10px">
                <div class="row-fluid">
                    <div class="span12">
                        <ol class="breadcrumb rtl">
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>">
                                    <?= Helper::t('الرئيسية') ?>
                                </a>
                            </li>
                            <li class="active"><?php echo $category->title; ?></li>
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>

                <div class="ads-cats">
                    <img style="width:1111px;height:175px;" src="<?php echo Yii::app()->request->baseUrl; ?>/media/categories/<?php echo $category->image; ?>" class="img-responsive">
                </div>

                <div class="row-fluid cats">
                    <div class="cats-search">
                        <?php $this->renderPartial('searchForm'); ?>
                        <!--End search-->

                        <div role="toolbar" class="btn-toolbar rtl">
                            <span class="show-items rtl">:<?= Helper::t('اختر شكل العرض') ?></span>
                            <div class="btn-group">
                                <a id="grid"  href="#tab7"  data-toggle="tab" class="btn btn-default"><i class="fa fa-2x fa-th"></i></a>
                                <a  id="list"  href="#tab8"  data-toggle="tab" class="btn btn-default"><i class="fa fa-2x fa-list"></i></a>
                            </div>
                        </div>
                        <!--grid view*****------------------------------------>        
                        <div  class="tab-pane active" id="tab7" >
                            <div class="row-fluid grid">
                                <?php
                                // print_r($trips);
                                foreach ($trips as $trip) {
                                    ?>
                                    <div class="span3 thumb categort_grid">
                                        <div  class="row-fluid">
                                            <div class="span12 slide-photo">
                                                <?php
                                                $criteria = new CDbCriteria;
                                                $criteria->condition = 'id=' . $trip->gallery_id;
                                                $getImage = Gallery::model()->find($criteria);

                                                if (!empty(Helper::getphoto($trip->gallery_id)->rank)) {
                                                    ?>
                                                    <img src=" <?php echo Yii::app()->request->baseUrl; ?>/gallery/_<?php echo Helper::getphoto($trip->gallery_id)->rank; ?>.jpg" alt="<?php echo $trip->title ?>"/>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src=" <?php echo Yii::app()->request->baseUrl; ?>/media/default.png" alt="<?php echo $trip->title ?>"/> 
                                                    <?php
                                                }
                                                ?>


                                            </div>
                                        </div>
                                        <a href="<?php echo Yii::app()->request->baseUrl . '/trip-' . $trip->url; ?>">
                                            <div class="row-fluid">
                                                <div class="span12 slide-title">

                                                    <p><?php echo $trip->title; ?></p>
                                                    <div class="tag orange">
                                                        <div class="left_tag orange_left"></div>
                                                        <div class="hole_tag orange_hole"></div>
                                                        <div class="right_tag orange_right"><span><?php echo $trip->price; ?></span></div>
                                                    </div>
                                                    <div class="row-fluid bginner">

                                                        <div class="span6 tripadvisor">
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/TripAdvisor-logo.png"/>
                                                        </div>
                                                        <div class="span6 lead">
                                                            <div id="stars" class="starrr"></div>
                                                        </div>

                                                    </div>
                                                    <div class="circle-more"><p><?= Helper::t('شوف التفاصيل') ?></p></div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>    
                        </div>    


                        <!--list view***************-------------------------->

                        <div class="tab-pane" id="tab8" style="display:none;">
                            <div class="row-fluid list">
                                <?php
                                foreach ($trips as $trip) {
                                    ?>
                                    <div class="span6">
                                        <div class="well-sm list-cats-item">

                                            <div class="row-fluid bottom10px">

                                                <div class="span7 section-box rtl">
                                                    <h5><a href="<?php echo Yii::app()->request->baseUrl . '/trip-' . $trip->url; ?>"><?php echo $trip->title; ?></a></h5>

                                                    <p><a href="<?php echo Yii::app()->request->baseUrl . '/trip-' . $trip->url; ?>">
                                                            <?php
                                                            $short_detail = strip_tags($trip->details);
                                                            echo substr($short_detail, 0, 100) . '...';
                                                            ?>
                                                        </a></p>
                                                    <div class="tag orange">
                                                        <div class="left_tag orange_left"></div>
                                                        <div class="hole_tag orange_hole"></div>
                                                        <div class="right_tag orange_right"><span><?php echo $trip->price; ?>  <?= Helper::t('جنيه') ?></span></div>
                                                    </div>
                                                </div>
                                                <div class="span5 thumb relative" >
                                                    <?php
                                                    $criteria = new CDbCriteria;
                                                    $criteria->condition = 'id=' . $trip->gallery_id;
                                                    $getImage = Gallery::model()->find($criteria);

                                                    if (!empty(Helper::getphoto($trip->gallery_id)->rank)) {
                                                        ?>
                                                        <a href="<?php echo Yii::app()->request->baseUrl . '/trip-' . $trip->url; ?>">
                                                            <img style="width:200px;height:150px" src=" <?php echo Yii::app()->request->baseUrl; ?>/gallery/_<?php echo Helper::getphoto($trip->gallery_id)->rank; ?>.jpg" alt="<?php echo $trip->title ?>"/>
                                                            <div class="circle-more cats-price list-cats-price">
                                                                <p><?= Helper::t('شوف التفاصيل') ?></p>
                                                            </div>

                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="<?php echo Yii::app()->request->baseUrl . '/trip-' . $trip->url; ?>">
                                                            <img style="width:200px;height:150px" src=" <?php echo Yii::app()->request->baseUrl; ?>/media/default.png" alt="<?php echo $trip->title ?>"/> 
                                                            <div class="circle-more cats-price list-cats-price">
                                                                <p><?= Helper::t('شوف التفاصيل') ?></p>
                                                            </div>

                                                        </a>

                                                        <?php
                                                    }
                                                    ?>

                                                </div>

                                            </div>

                                            <div class="row-fluid list-item-footer">
                                                <?php
                                                $criteria_com = new CDbCriteria;
                                                $criteria_com->condition = 'trip_id=' . $trip->id;
                                                $commetsCount = count(Comments::model()->find($criteria_com));
                                                ?>
                                                <div class="span4 lead"><div id="stars" class="starrr"></div></div>
                                                <div class="span4 comments"><i class="fa fa-comments"></i> <p> (<?php echo $commetsCount; ?>) <?= Helper::t('تعليق') ?> </p></div>
                                                <div class="span4 tripadvisor"><img src="images/TripAdvisor-logo.png"></div>
                                            </div>

                                        </div>
                                    </div>
                                  
                                    <?php
                                }
                                ?>   
                            </div>
                        </div>      
                        <div class="pagin">
                            <?php
                            $this->widget('CLinkPager', array(
                                'pages' => $pages,
                                //   'cssFile' => Yii::app()->theme->baseUrl . "/css/bootstrap.css",
                                'firstPageLabel' => '<<',
                                'prevPageLabel' => '<',
                                'nextPageLabel' => '&gt;',
                                'lastPageLabel' => '&gt;&gt;',
                                'header' => '',
                                'htmlOptions' => array(
                                    'class' => 'pagination',
                                )
                            ))
                            ;
                            ?>
                        </div>                                   

                    </div>
                </div>

                <div class="row-fluid bottom-ads">
                    <?php
                    $inner_ads = $this->getadv(5);
                    foreach ($inner_ads as $inner_ad) {
                        ?>
                        <div class="span6 bt-ads">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $inner_ad->image; ?>">
                        </div>
                        <?php
                    }
                    ?>

                </div>

            </div><!--End Content-->
            <div class="span1 left-ads">
                <?php $left_ad = $this->getadv(2); ?>
                <a href="<?php echo $left_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $left_ad->image; ?>" ></a>
            </div>
        </div>
    </div>
</div>
<!-- End page content --> 
