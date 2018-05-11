<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="RoomCondition_search_value" class="span5" type="text" name="RoomCondition[search_value]" maxlength="100">

			<select id="RoomCondition_search_key" class="span5" name="RoomCondition[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="condition">condition</option>
												<option value="condition_ar">condition_ar</option>
												<option value="persons_no">persons_no</option>
												<option value="price">price</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
