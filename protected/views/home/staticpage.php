<?php
$this->pageTitle = Yii::app()->name . ' -' . $pages->title;
?>



<div class="row-fluid">
    <div class="containerfull">
        <div class="row-fluid">
            <div class="span1 right-ads">
                <?php $left_ad = $this->getadv(2); ?>
                <a href="<?php echo $left_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $left_ad->image; ?>" ></a>
            </div>
            <div class="span10 content top10px">

                <div class="row-fluid">
                    <div class="span12">
                        <ol class="breadcrumb rtl">
                            <li>
                                <a href="<?php echo Yii::app()->getBaseUrl(true); ?>">
                                   <?= Helper::t('الرئيسية') ?> 
                                </a>
                            </li>
                            <li class="active"><?php echo $pages->title; ?></li>
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>

                <!--Start login -->
                <div class="row-fluid">
                    <div class="span12 color_div minheight">
                        <div class="no_margin login_sys pull-right rtl">
                            <h2><?= $pages->title; ?></h2>

                            <?php echo $pages->details; ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <!--End login -->

            </div><!--End Content-->
            <div class="span1 right-ads">
                <?php $right_ad = $this->getadv(2); ?>
                <a href="<?php echo $right_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $right_ad->image; ?>" ></a>
            </div>
        </div>
    </div>
</div>

