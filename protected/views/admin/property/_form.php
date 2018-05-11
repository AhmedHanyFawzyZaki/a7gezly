<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'property-form',
    'enableAjaxValidation' => true,
    'type' => 'horizontal',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="control-group ">
    <label class="control-label required" for="Property_title">
        Title
        <span class="required">*</span>
    </label>
    <div class="controls">
<?php echo EMHelper::megaOgogo($model, 'title', array('class' => 'span8', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>

<?php //echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->fileFieldRow($model, 'icon', array('class' => 'span5', 'maxlength' => 200)); ?>


<?php
if ($model->isNewRecord != '1' && !empty($model->icon)) {
    echo "<p>";
    echo CHtml::image(Yii::app()->request->baseUrl . '/media/car_properties/' . $model->icon, '', array('width' => 200, 'id' => 'preview_image'));
    echo "<br/>" . CHtml::ajaxLink(
            $text = 'Delete', $url = Yii::app()->request->baseUrl . '/admin/property/deleteimage/id/' . $model->id, $ajaxOptions = array(
        'type' => 'POST',
        'dataType' => 'text',
        'success' => 'function(response){ $("#preview_image").fadeOut("slow"); }'
            ), $htmlOptions = array()
    );
    echo "</p>";
}
?>

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