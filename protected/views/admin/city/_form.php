<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'city-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model, 'country_id', CHtml::listData(Country::model()->findAll(), 'id', 'title'), array('empty' => 'select Country')); ?>

<div class="control-group ">
    <label class="control-label required" for="City_title">
        Title
        <span class="required">*</span>
    </label>
    <div class="controls">
<?php echo EMHelper::megaOgogo($model, 'title', array('class' => 'span8', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>

    <?php //echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 200)); ?>

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
