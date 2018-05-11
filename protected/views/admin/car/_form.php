<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'car-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model, 'driver_id', CHtml::listData(Driver::model()->findAll(), 'id', 'full_name'), array('empty' => 'select Driver')); ?>

<div class="control-group ">
    <label class="control-label required" for="Car_title">
        Title 
        <span class="required">*</span>
    </label>
    <div class="controls">
<?php echo EMHelper::megaOgogo($model, 'title', array('class' => 'span3', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>

<div class="control-group ">
    <label class="control-label required" for="Car_age">
        Age
        <span class="required">*</span>
    </label>
    <div class="controls">
<?php echo EMHelper::megaOgogo($model, 'age', array('class' => 'span3', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>
<?php //echo $form->textFieldRow($model, 'title', array('class' => 'span3', 'maxlength' => 200)); ?>

<?php //echo $form->textFieldRow($model, 'age', array('class' => 'span3', 'maxlength' => 200)); ?>

<?php echo $form->textFieldRow($model, 'no_of_laggages', array('class' => 'span1', 'maxlength' => 200)); ?>

<?php echo $form->textFieldRow($model, 'no_of_doors', array('class' => 'span1', 'maxlength' => 200)); ?>

<?php echo $form->textFieldRow($model, 'no_of_seats', array('class' => 'span1', 'maxlength' => 200)); ?>

<?php echo $form->dropDownListRow($model, 'transmission', array(1 => 'Manual', 2 => 'Automatic', 3 => 'Half Automatic')); ?>

<?php echo $form->textFieldRow($model, 'price_per_day', array('class' => 'span2', 'maxlength' => 200)); ?>

<?php echo $form->dropDownListRow($model, 'model_id', CHtml::listData(CarModel::model()->findAll(), 'id', 'title'), array('empty' => 'select Model')); ?>

<?php echo $form->dropDownListRow($model, 'category_id', CHtml::listData(CarCategory::model()->findAll(), 'id', 'title'), array('empty' => 'select Category')); ?>

<?php echo $form->dropDownListRow($model, 'emission', CHtml::listData(CarEmission::model()->findAll(), 'id', 'title'), array('empty' => 'select Emission')); ?>

<?php echo $form->dropDownListRow($model, 'fuel', CHtml::listData(CarFuelType::model()->findAll(), 'id', 'title'), array('empty' => 'select Fuel')); ?>

<div class="control-group ">
    <label class="control-label required" for="Car_power">
        Power
        <span class="required">*</span>
    </label>
    <div class="controls">
<?php echo EMHelper::megaOgogo($model, 'power', array('class' => 'span4', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>

<?php //echo $form->textFieldRow($model, 'power', array('class' => 'span4', 'maxlength' => 200)); ?>

<?php echo $form->fileFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php
if ($model->isNewRecord != '1' && !empty($model->image)) {
    echo "<p>";
    echo CHtml::image(Yii::app()->request->baseUrl . '/media/cars/' . $model->image, '', array('width' => 200, 'id' => 'preview_image'));
    echo "<br/>" . CHtml::ajaxLink(
            $text = 'Delete', $url = Yii::app()->request->baseUrl . '/admin/car/deleteimage/id/' . $model->id, $ajaxOptions = array(
        'type' => 'POST',
        'dataType' => 'text',
        'success' => 'function(response){ $("#preview_image").fadeOut("slow"); }'
            ), $htmlOptions = array()
    );
    echo "</p>";
}
?>

<div class="control-group ">
    <label class="control-label required" for="Car_mileage">
        Mileage
        <span class="required">*</span>
    </label>
    <div class="controls">
<?php echo EMHelper::megaOgogo($model, 'mileage', array('class' => 'span5', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>

<?php //echo $form->textFieldRow($model, 'mileage', array('class' => 'span5', 'maxlength' => 200)); ?>


<div class="control-group ">
    <label class="control-label" for="Car_price_includes">Price includes</label>
    <div class="controls">

        <?php echo EMHelper::megaOgogo($model, 'price_includes', array(), 'ckeditor'); ?>
    </div>
</div>
<div class="control-group ">
    <label class="control-label" for="Car_price_excludes">Price excludes</label>
    <div class="controls">

        <?php echo EMHelper::megaOgogo($model, 'price_excludes', array(), 'ckeditor'); ?>
    </div>
</div>
<!--<label for="Car_price_includes" class="control-label">Price includes</label>
<div class="controls">
    <?php
    /*$this->widget('application.extensions.eckeditor.ECKEditor', array(
        'model' => $model,
        'attribute' => 'price_includes',
    ));*/
    ?>
</div>
<label for="Car_price_excludes" class="control-label">Price excludes</label><br/>
<div class="controls">
    <?php
    /*$this->widget('application.extensions.eckeditor.ECKEditor', array(
        'model' => $model,
        'attribute' => 'price_excludes',
    ));*/
    ?>
</div>-->
<br/>
<?php echo $form->dropDownListRow($model, 'driving_type', array(1 => 'With driver', 2 => 'Without driver', 3 => 'Both')); ?>

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