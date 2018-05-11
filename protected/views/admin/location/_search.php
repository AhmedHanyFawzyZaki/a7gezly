<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="Location_search_value" class="span5" type="text" name="Location[search_value]" maxlength="100">

			<select id="Location_search_key" class="span5" name="Location[search_key]">
				<option value="all">All</option>
												<option value="id"><?php echo CHtml::activeLabel($model,'id'); ?></option>
												<option value="title"><?php echo CHtml::activeLabel($model,'title'); ?></option>
												<option value="title_ar"><?php echo CHtml::activeLabel($model,'title_ar'); ?></option>
												<option value="country_id"><?php echo CHtml::activeLabel($model,'country_id'); ?></option>
												<option value="image"><?php echo CHtml::activeLabel($model,'image'); ?></option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
