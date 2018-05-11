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
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>">
                                     <?= Helper::t('الرئيسية') ?> 
                                </a>
                            </li>
                            <li class="active"><?= Helper::t('اضف تعليق') ?> </li> 
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>

                <!--Start login -->
                <div class="row-fluid">
                    <div class="span12 color_div minheight">  
                        <?php
                         $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                            'id' => 'comments-form',
                            'enableAjaxValidation' => false,
                            'type' => 'horizontal',
                            'htmlOptions' => array(
                                'class' => 'no_margin login_sys pull-right rtl',
                            ),
                        ));

                        if (Yii::app()->user->hasflash('comment')) {
                            ?>
                            <div   class="alert alert-success"><?php echo Yii::app()->user->getFlash('comment') ?></div>
<?php } ?>



                      <?php //echo $form->errorSummary($model); ?>

                        <div class="myrow">
                          <?php //echo $form->labelEx($model, 'title'); ?>
                            <div class="">
                              <?php echo $form->textField($model, 'title', array('class' => '', 'maxlength' => 255,'placeholder'  => Helper::t('عنوان'))); ?>
                              <?php echo $form->error($model, 'title'); ?>
                            </div>

                        </div>

                        <div class="myrow">
                          <?php //echo $form->labelEx($model, 'comment'); ?>
                            <div class="">
                              <?php echo $form->textArea($model, 'comment', array('rows' => 6, 'cols' => 50, 'class' => '','placeholder'  => Helper::t('التعليق'))); ?>
                              <?php echo $form->error($model, 'comment'); ?>
                            </div>
                        </div>




                        <div class="myrow">

                            <div class="">
<?php echo CHtml::submitButton(Helper::t('اضف تعلقيك'), array('class' => 'btn btn-large our-btn-sty pull-right')); ?>
                            </div>

                        </div>




                        <div class="clear"></div>
<?php $this->endWidget(); ?>
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