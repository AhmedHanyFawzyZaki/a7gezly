<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="RoomOptionRelation_search_value" class="span5" type="text" name="RoomOptionRelation[search_value]" maxlength="100">

			<select id="RoomOptionRelation_search_key" class="span5" name="RoomOptionRelation[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="room_type_id">room_type_id</option>
												<option value="room_option_id">room_option_id</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
