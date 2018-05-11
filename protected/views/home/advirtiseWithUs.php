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
                            <li class="active"> <?= Helper::t('اعلن معنا') ?> </li>
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>

                <!--Start login -->
                <div class="row-fluid">
                    <div class="span12 color_div minheight">  
                        <?php
                        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                            'id' => 'advirtise-with-us-form',
                            'enableAjaxValidation' => false,
                            'type' => 'horizontal',
                            'htmlOptions' => array(
                                'class' => 'no_margin login_sys pull-right rtl',
                            ),
                        ));
                        if (Yii::app()->user->hasFlash('contact')) {
                            ?>
                            <div class="alert alert-success w">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo Yii::app()->user->getFlash('contact'); ?>.
                            </div>
                            <?
                        }
                        if (Yii::app()->user->hasflash('contact')) {
                            ?>
                            <div   class="alert alert-success"><?php echo Yii::app()->user->getFlash('contact') ?></div>
                        <?php } ?>



                        <?php // echo $form->errorSummary($model); ?>
                        <div class="myrow ">
                            <?php // echo $form->labelEx($model, 'name'); ?>
                            <div class="">
                                <?php echo $form->textField($model, 'name', array('placeholder' => Helper::t('الاسم') ."....", "maxlength" => "200")); ?>
                                <?php echo $form->error($model, 'name'); ?>

                            </div>

                        </div>

                        <div class="myrow">
                            <?php // echo $form->labelEx($model, 'title_ar'); ?>
                            <div class="">
                                <?php echo $form->textField($model, 'title', array("maxlength" => "200", 'placeholder'  => Helper::t('العنوان') ." ....")); ?>
                                <?php echo $form->error($model, 'title'); ?>
                            </div>

                        </div>

                        <div class="myrow">
                            <?php // echo $form->labelEx($model, 'url'); ?>
                            <div class="">
                                <?php echo $form->textField($model, 'url', array('placeholder'  => Helper::t('الرابط') ." ....")); ?>
                                <?php echo $form->error($model, 'url'); ?>
                            </div>
                        </div>


                        <div class="myrow">
                            <?php // echo $form->labelEx($model, 'email'); ?>
                            <div class="">
                                <?php echo $form->textField($model, 'email', array('placeholder' => Helper::t('البريد الالكترونى ') ."....")); ?>
                                <?php echo $form->error($model, 'email'); ?>

                            </div>

                        </div>




                        <div class="myrow">
                            <?php // echo $form->labelEx($model, 'phone'); ?>
                            <div class="">
                                <?php echo $form->textField($model, 'phone', array('placeholder'  => Helper::t('الهاتف') ." ....")); ?>
                                <?php echo $form->error($model, 'phone'); ?>

                            </div>

                        </div>


                        <div class="myrow ">
                            <?php // echo $form->labelEx($model, 'image'); ?>
                            <div class="">
                                 <?= Helper::t('الصورة') ?> 
                                <?php echo $form->fileField($model, 'image', array('rows' => 3)); ?>
                                <?php echo $form->error($model, 'image'); ?>
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