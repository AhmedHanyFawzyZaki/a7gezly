<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'booking-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="control-group ">
    <label class="control-label" for="Trip">Trip</label>
    <div class="controls">
        <?php echo $form->hiddenField($model, 'trip_id', array('value' => $model->trip_id)); ?>
        <input type="text" value="<?php echo $model->trip->title_ar; ?>" readOnly="readonly" />
    </div>
</div>

<?php // echo $form->textFieldRow($model, 'user_id', array('class' => 'span5')); ?>
<div class="control-group ">
    <label class="control-label" for="User">User</label>
    <div class="controls">
        <?php echo $form->hiddenField($model, 'user_id', array('value' => $model->user_id)); ?>
        <input type="text" value="<?php echo $model->user->username; ?>" readOnly="readonly" />
    </div>
</div>

<?php echo $form->textFieldRow($model, 'total_price', array('class' => 'span25', 'append' => 'L.E' , 'readOnly'=>'readOnly')); ?>

<?php // echo $form->textFieldRow($model, 'payment_way', array('class' => 'span5')); ?>

<?php // echo $form->textFieldRow($model, 'payment_status', array('class' => 'span5')); ?>
<div class="control-group ">
    <label class="control-label" for="payment_status">Payment Status</label>
    <div class="controls">
        <?php echo $form->dropDownList($model, 'payment_status', array("1" => "completed", "2" => "canceled", "3" => "pending"), array('empty'=>'')); ?>
    </div>
</div>


<div class="control-group ">
    <label class="control-label" for="payment_way">Payment Way</label>
    <div class="controls">
        <?php echo $form->dropDownList($model, 'payment_way', array("1" => "cash", "2" => "paypal"), array('empty'=>'')); ?>
    </div>
</div>




<?php echo $form->textFieldRow($model, 'fullName', array('class' => 'span5', 'maxlength' => 255, 'readOnly'=>'readOnly')); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 255, 'readOnly'=>'readOnly')); ?>

<?php echo $form->textFieldRow($model, 'address', array('class' => 'span5', 'maxlength' => 255, 'readOnly'=>'readOnly')); ?>

<?php echo $form->textFieldRow($model, 'phone', array('class' => 'span5', 'maxlength' => 255, 'readOnly'=>'readOnly')); ?>

<?php echo $form->textFieldRow($model, 'created', array('class' => 'span5', 'maxlength' => 255, 'readOnly'=>'readOnly')); ?>

<?php // echo $form->textFieldRow($model,'total_persons',array('class'=>'span5'));  ?>

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
