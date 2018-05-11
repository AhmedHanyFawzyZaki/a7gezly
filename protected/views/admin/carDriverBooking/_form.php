<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'car-driver-booking-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'number',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'location_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'picked_date',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'picked_time',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'with_return',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'area',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'return_date',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'return_time',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'driver_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'car_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
