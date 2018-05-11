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
                            <li class="active"><?= Helper::t('استعادة كلمة السر') ?></li> 
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>

                <!--Start login -->
                <div class="row-fluid">
    <?php if($flag==1){?>    
                    <div class="span12 color_div minheight">  
                        <?php
                       $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'=>'user-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
              'validateOnSubmit'=>true,
            ),
               'htmlOptions' => array(
                                'class' => 'no_margin login_sys pull-right rtl',
                            ),
            ));

              if(Yii::app()->user->hasFlash('ErrorMsg') )
              {
                ?>

                  <div class="alert alert-error">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Notification !</strong> <?php echo Yii::app()->user->getFlash('ErrorMsg'); ?>.
                </div>

                <?php

              }
                                ?>
             
          <?php echo $form->errorSummary($model); ?>

                        <div class="myrow">
                            <div class="">
                                <?php echo $form->passwordField($model, 'newpassword', array('class'=>'span6','placeholder'=>Helper::t('كلمة المرور الجديدة '))); ?>
                            </div>

                        </div>
          
                       <div class="myrow">
                            <div class="">
                               <?php echo $form->passwordField($model, 'newpassword_repeat', array('class'=>'span6','placeholder'=>Helper::t('اعادة كلمة السر الجديدة'))); ?>
                            </div>

                        </div>          
          


                        <div class="myrow">

                            <div class="">
                                <?php echo CHtml::submitButton(Helper::t('حفظ'), array('class' => 'btn btn-large our-btn-sty pull-right')); ?>
                            </div>

                        </div>




                        <div class="clear"></div>
                        <?php $this->endWidget(); ?>
                    </div>
          <?php  }?>
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
