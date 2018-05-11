<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="CarPrice_search_value" class="span5" type="text" name="CarPrice[search_value]" maxlength="100">

			<select id="CarPrice_search_key" class="span5" name="CarPrice[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="car_id">car_id</option>
												<option value="price">price</option>
												<option value="start_days">start_days</option>
												<option value="end_days">end_days</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
