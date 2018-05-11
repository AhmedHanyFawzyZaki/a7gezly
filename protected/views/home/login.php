<?php
$this->pageTitle = Yii::app()->name . ' - Login';
?>




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
                            <li class="active">  <?= Helper::t('تسجيل الدخول') ?> </li>
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>

                <!--Start login -->
                <div class="row-fluid">
                    <div class="span12 color_div minheight">
                        <?php
                        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                            'id' => 'login',
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'htmlOptions' => array(
                                'class' => 'no_margin login_sys pull-right rtl',
                            )
                        ));
                        ?>
                        <?php
                        if (Yii::app()->user->hasFlash('ErrorMsg')) {
                            ?>

                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error !</strong> <?php echo Yii::app()->user->getFlash('ErrorMsg'); ?>.
                            </div>

                            <?php
                        }
                        ?>

                        <?php echo $form->errorSummary($model, $header = Yii::t('app', 'please fix')); ?>

                        <div class="myrow"> 
                            <?php // echo $form->labelex($model, 'username', array('class' => 'required')); ?>
                            <?php echo $form->textField($model, 'username', array('class' => '', 'placeholder' =>  Helper::t('من فضلك ادخل اسم المستخدم'))); ?>
                        </div>
                                                                             
                        <div class="myrow">
                            <?php // echo $form->labelEx($model, 'password', array('class' => 'required')); ?>
                            <?php echo $form->passwordField($model, 'password', array('class' => '', 'placeholder' => Helper::t('من فضلك ادخل كلمة السر'))); ?>
                        </div>

                        <div class="myrow">
                            <label class="checkbox">
                                <label>
                                    <?php echo $form->checkBox($model, 'rememberMe', array('class' => '')); ?>
                                    <?php echo $form->labelEx($model, 'rememberMe'); ?></label>
                            </label>
                        </div>
                        <div class="myrow">
                            <a href="<?= Yii::app()->baseurl ?>/home/forgotpass" class="rem-pass"><?=Helper::t('نسيت كلمة المرور')?> ؟</a>
                        </div>

                        <div class="myrow">
                            <label></label>
                            <?php echo CHtml::submitButton(Helper::t('سجل دخولك'), array('class' => 'btn btn-large our-btn-sty pull-right')); ?>
                        </div>
                        <div class="myrow">
                            <label></label>
                            <button type="button"
                                    class="btn btn-default our-btn-sty facebook-btn pull-right" , onclick='js:document.location.href = "<?php echo Yii::app()->request->baseUrl; ?>/home/loginFB"'><?= Helper::t('سجل دخولك عن طريق الفيس بوك') ?></button>
                        </div>
                        <span class="required">&nbsp;</span>


                        <?php $this->endWidget(); ?>
                        <form class="no_margin login_sys rtl pull-right top10px" id="forget">

                            <h4><?= Helper::t('فقط ادخل البريد الالكتروني الذي قمت بتسجيل حسابك به') ?></h4>

                            <div class="myrow">
                                <label><label for=""> <?= Helper::t('البريد الالكتروني') ?></label></label>
                                <input type="text" class="" placeholder="<?= Helper::t('من فضلك ادخل البريد الالكتروني الخاص بك') ?>">
                            </div>

                            <div class="myrow"> 
                                <button type="submit" class="btn btn-large our-btn-sty pull-right"><?= Helper::t('استعاده كلمه المرور') ?></button>
                            </div>

                            <div class="myrow">
                                <a id="back_btn" class="btn btn-large our-btn-sty  pull-right"><?= Helper::t('الغاء') ?></a>
                            </div>

                        </form>
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
<!-- End page content -->




