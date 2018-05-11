<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'car-price-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model, 'car_id', CHtml::listData(Car::model()->findAll(), 'id', 'title'), array('empty' => 'select Car')); ?>

<?php echo $form->textFieldRow($model, 'price', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php $numbers = range(1, 30); 
 array_unshift($numbers, "");
 unset($numbers[0]);
?>

<?php echo $form->dropDownListRow($model, 'start_days', $numbers); ?>

<?php echo $form->dropDownListRow($model, 'end_days', $numbers); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
