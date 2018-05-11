<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'room-type-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="control-group ">
    <label class="control-label" for="title">Title</label>
    <div class="controls">
        <?php echo EMHelper::megaOgogo($model, 'title', array('class' => 'span8', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" >Hotel</label>
    <div class="controls">
        <?php echo $form->dropDownList($model, 'hotel_id', CHtml::listData(Hotels::model()->findAll(), 'id', 'title')); ?>

    </div>
</div>
<?php // echo $form->textFieldRow($model, 'room_option_id', array('class' => 'span5')); ?>
<div class="control-group">
    <label class="control-label" >Room Options</label>
    <div class="controls">
        <?php echo $form->checkBoxList($model, 'roomOptionRelations', CHtml::listData(RoomOption::model()->findAll(), 'id', 'title')); ?>

    </div>
</div>

<div class="control-group">
    <label class="control-label" >Room Conditions</label>
    <div class="controls">
        <?php echo $form->checkBoxList($model, 'roomCoditionRelations', CHtml::listData(RoomCondition::model()->findAll(), 'id', 'condition')); ?>

    </div>
</div>

<div class="control-group">
    <label class="control-label" >Bed prefer</label>
    <div class="controls">
        <?php echo $form->checkBoxList($model, 'roomBedRelations', CHtml::listData(BedType::model()->findAll(), 'id', 'title')); ?>

    </div>
</div>

<?php echo $form->textFieldRow($model, 'size', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php // echo $form->textFieldRow($model, 'gallery_id', array('class' => 'span5')); ?>
<?php
if ($model->isNewRecord != '1') {
    ?>

    <div class="control-group">
        <label for=\"UserDetails_city\" class="control-label">Gallery</label>
        <div class="controls">
            <div class="span<?php echo(isset($_GET['w']) ? $_GET['w'] : '12') ?>" style="width:700px;">
                <?php
                $this->widget('GalleryManager', array(
                    'gallery' => $gallery,
                ));
                ?>

            </div>
        </div>
    </div>

    <?php
} else {
    ?>
    <div class="control-group ">
        <label class="control-label" for="Motor_address">Gallery</label>
        <div class="controls">
            <input id="" class="span5" type="text" name="" value="Please save Your product before Uploading images" readonly>
        </div>
    </div>
    <?php
}
?>

<?php echo $form->textFieldRow($model, 'max_person', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'min_person', array('class' => 'span5')); ?>

<div class="control-group ">
    <label class="control-label" for="tax_included">Tax included</label>
    <div class="controls">
        <?php echo EMHelper::megaOgogo($model, 'tax_included', array('class' => 'span8', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>
<div class="control-group ">
    <label class="control-label" for="tax_excluded">Tax excluded</label>
    <div class="controls">
        <?php echo EMHelper::megaOgogo($model, 'tax_excluded', array('class' => 'span8', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>



<?php // echo $form->textFieldRow($model,'temp1',array('class'=>'span5','maxlength'=>255)); ?>

<?php // echo $form->textFieldRow($model,'temp2',array('class'=>'span5','maxlength'=>255)); ?>

<?php // echo $form->textFieldRow($model,'temp3',array('class'=>'span5','maxlength'=>255));  ?>

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
