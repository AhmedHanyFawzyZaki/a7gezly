<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="CarBooking_search_value" class="span5" type="text" name="CarBooking[search_value]" maxlength="100">

			<select id="CarBooking_search_key" class="span5" name="CarBooking[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="days">days</option>
												<option value="price">price</option>
												<option value="start_date">start_date</option>
												<option value="start_time">start_time</option>
												<option value="deliver_date">deliver_date</option>
												<option value="delivery_time">delivery_time</option>
												<option value="name">name</option>
												<option value="phone">phone</option>
												<option value="email">email</option>
												<option value="passport">passport</option>
												<option value="driving_licence">driving_licence</option>
												<option value="accomodation_licence">accomodation_licence</option>
												<option value="location_id">location_id</option>
												<option value="car_id">car_id</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
