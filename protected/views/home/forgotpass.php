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
                            <li class="active"> </li> <?= Helper::t('استعادة كلمة السر') ?> 
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>

                <!--Start login -->
                <div class="row-fluid">
                    <div class="span12 color_div minheight">  
                        <p align ="right"><b><?= Helper::t('من فضلك ادخل بريد الكترونى وسوف تصلك رسالة استعادة كلمة السر') ?></b>  </p>
                       <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                            'id'=>'user-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                    'validateOnSubmit'=>true,
                            ),
                             'htmlOptions' => array(
                                'class' => 'no_margin login_sys pull-right rtl',
                            ),
                            ));

                        if (Yii::app()->user->hasFlash('success')) {
                            ?>
                            <div class="alert alert-success w">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo Yii::app()->user->getFlash('success'); ?>.
                            </div>
                       <?php
                        }
                        ?>


                        <?php echo $form->errorSummary($model); ?>

                        <div class="myrow">
                            <?php // echo $form->labelEx($model, 'name');  ?>
                            <div class="">
                               <?php echo $form->textField($model, 'email', array('placeholder' => Helper::t('البريد الالكترونى ') ."....")); ?>
                            </div>

                        </div>

                        <div class="myrow">

                            <div class="">
                                <?php echo CHtml::submitButton(Helper::t('ارسل'), array('class' => 'btn btn-large our-btn-sty pull-right')); ?>
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
