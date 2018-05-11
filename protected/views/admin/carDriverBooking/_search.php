<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="CarDriverBooking_search_value" class="span5" type="text" name="CarDriverBooking[search_value]" maxlength="100">

			<select id="CarDriverBooking_search_key" class="span5" name="CarDriverBooking[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="name">name</option>
												<option value="number">number</option>
												<option value="email">email</option>
												<option value="location_id">location_id</option>
												<option value="picked_date">picked_date</option>
												<option value="picked_time">picked_time</option>
												<option value="with_return">with_return</option>
												<option value="city">city</option>
												<option value="area">area</option>
												<option value="return_date">return_date</option>
												<option value="return_time">return_time</option>
												<option value="driver_id">driver_id</option>
												<option value="car_id">car_id</option>
												<option value="price">price</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
