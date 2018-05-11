<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="Booking_search_value" class="span5" type="text" name="Booking[search_value]" maxlength="100">

			<select id="Booking_search_key" class="span5" name="Booking[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="trip_id">trip_id</option>
												<option value="user_id">user_id</option>
												<option value="total_price">total_price</option>
												<option value="payment_way">payment_way</option>
												<option value="payment_status">payment_status</option>
												<option value="fullName">fullName</option>
												<option value="email">email</option>
												<option value="address">address</option>
												<option value="phone">phone</option>
												<option value="created">created</option>
												<option value="total_persons">total_persons</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
