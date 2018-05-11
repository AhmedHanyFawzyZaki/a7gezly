<h2 class="ftitle rtl">انضم الى القائمة البريدية</h2>
<div class="row-fluid news-letter rtl">
    <p>كن أول من يعلم</p>
    <p>احصل على عروضنا الأقل سعراً</p>
    <?php
    $model = new Newsletter;
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'newsletter-form',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->createUrl('home/newsletter'),
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

<?php echo $form->textField($model, 'email', array('class' => 'mailfoot', placeholder => "اكتب بريديك هنا")); ?>

    <div class="form-actions">
<?php echo CHtml::submitButton('ارسل بياناتك', array('class' => 'btn btn-block our-btn-sty')); ?>

    </div>

<?php $this->endWidget(); ?>
</div>
