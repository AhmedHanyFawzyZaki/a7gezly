<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="Hotels_search_value" class="span5" type="text" name="Hotels[search_value]" maxlength="100">

			<select id="Hotels_search_key" class="span5" name="Hotels[search_key]">
				<option value="all">All</option>
												<option value="id"><?php echo CHtml::activeLabel($model,'id'); ?></option>
												<option value="title"><?php echo CHtml::activeLabel($model,'title'); ?></option>
												<option value="title_ar"><?php echo CHtml::activeLabel($model,'title_ar'); ?></option>
												<option value="desc"><?php echo CHtml::activeLabel($model,'desc'); ?></option>
												<option value="desc_ar"><?php echo CHtml::activeLabel($model,'desc_ar'); ?></option>
												<option value="image"><?php echo CHtml::activeLabel($model,'image'); ?></option>
												<option value="map"><?php echo CHtml::activeLabel($model,'map'); ?></option>
												<option value="video"><?php echo CHtml::activeLabel($model,'video'); ?></option>
												<option value="level_id"><?php echo CHtml::activeLabel($model,'level_id'); ?></option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
