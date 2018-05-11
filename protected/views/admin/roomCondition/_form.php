<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'room-condition-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="control-group ">
    <label class="control-label" for="title">Condition</label>
    <div class="controls">
<?php echo EMHelper::megaOgogo($model, 'condition', array('class' => 'span8', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>

<?php echo $form->textFieldRow($model, 'persons_no', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'price', array('class' => 'span5', 'maxlength' => 10, 'append' => 'L.E')); ?>

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
