<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'car-booking-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'days',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'start_date',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'start_time',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'deliver_date',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'delivery_time',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'passport',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'driving_licence',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'accomodation_licence',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'location_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'car_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
