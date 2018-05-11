

<div class="row-fluid">
    <div class="containerfull">
        <div class="row-fluid">
            <div class="span1 left-ads">
                <?php $left_ad = $this->getadv(3); ?>
                <a href="<?php echo $left_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $left_ad->image; ?>" ></a>
            </div>
            <div class="span10 content top10px">

                <div class="row-fluid">
                    <div class="span12">
                        <ol class="breadcrumb rtl">
                            <li>
                                <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/index">
                                    <?= Helper::t('الرئيسية') ?>
                                </a>
                            </li>
                            <li class="active"><?= Helper::t('فتح حساب') ?></li>
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>

                <!--Start login -->
                <div class="row-fluid">
                    <div class="span12 color_div minheight">

                        <?php
                        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                            'id' => 'user-register-form',
                            'enableAjaxValidation' => false,
                            'htmlOptions' => array(
                                'class' => 'no_margin login_sys pull-right rtl',
                            )
                        ));
                        ?>
                        <?php if (Yii::app()->user->hasFlash('register-success')) { ?>

                            <div class="alert alert-success">
                                <?php echo Yii::app()->user->getFlash('register-success'); ?>
                            </div>
                            <?php
                        } else {
                          echo $form->errorSummary($model, $header = Yii::t('app', Helper::t('يرجى مراجعة')));
                            ?>

                            <div class="myrow">
                                <?php //echo $form->labelEx($model, 'username', array('class' => 'required')); ?> 
                                <?php echo $form->textField($model, 'username', array('class' => '', 'placeholder' => Helper::t('من فضلك ادخل اسم المستخدم'))); ?>
                            </div>

                            <div class="myrow">
                                <?php //echo $form->labelEx($model, 'email', array('class' => 'required')); ?>
                                <?php echo $form->textField($model, 'email', array('class' => '', 'placeholder' =>Helper::t('من فضلك ادخل بريدك الالكتروني') )); ?>
                            </div>

                            <div class="myrow">
                                <?php //echo $form->labelEx($model, 'password', array('class' => 'required')); ?>
                                <?php echo $form->passwordField($model, 'password', array('class' => '', 'placeholder' =>Helper::t('من فضلك ادخل كلمة السر') )); ?>
                            </div>

                            <div class="myrow">
                                <?php //echo $form->labelEx($model, 'كلمة السر تأكيد:', array('class' => 'required')); ?>
                                <?php echo $form->passwordField($model, 'password_repeat', array('class' => '', 'placeholder' => Helper::t('من فضلك ادخل تأكيد كلمة السر'))); ?>
                            </div>


                        
                             <?php if (CCaptcha::checkRequirements()): ?>

                            <div class="myrow ">



                               <!-- <label class="control-label">Enter Code</label>-->

                                <div class="">

                                    <?php echo $form->textField($model, 'verifyCode', array('placeholder' =>Helper::t('رمز التحقق') )); ?>
                                  <?php //echo $form->error($model, 'verifyCode', array('class' => 'log-error')); ?>

                                    <?php $this->widget('CCaptcha'); ?>
                                </div>

                            </div>

                        <?php endif; ?>  

                        
                             
                            <div class="myrow">
                                <label></label>
                                <?php echo CHtml::submitButton(Helper::t('افتح حسابك'), array('class' => 'btn btn-large our-btn-sty pull-right')); ?>

                            <?php } ?>
                            <?php $this->endWidget(); ?>

                            <div class="clear"></div>
                        </div>
                    </div>
                    <!--End login -->

                </div><!--End Content-->
            </div>
            <div class="span1 right-ads">
                <?php $right_ad = $this->getadv(2); ?>
                <a href="<?php echo $right_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $right_ad->image; ?>" ></a>
            </div>

        </div>
    </div>