<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="BookingDetails_search_value" class="span5" type="text" name="BookingDetails[search_value]" maxlength="100">

			<select id="BookingDetails_search_key" class="span5" name="BookingDetails[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="booking_id">booking_id</option>
												<option value="room_type_id">room_type_id</option>
												<option value="condition_id">condition_id</option>
												<option value="price">price</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
