<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="RoomBedRelation_search_value" class="span5" type="text" name="RoomBedRelation[search_value]" maxlength="100">

			<select id="RoomBedRelation_search_key" class="span5" name="RoomBedRelation[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="room_type_id">room_type_id</option>
												<option value="bed_type_id">bed_type_id</option>
												<option value="temp1">temp1</option>
												<option value="temp2">temp2</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
