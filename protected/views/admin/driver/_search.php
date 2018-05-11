<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="Driver_search_value" class="span5" type="text" name="Driver[search_value]" maxlength="100">

			<select id="Driver_search_key" class="span5" name="Driver[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="full_name">full_name</option>
												<option value="email">email</option>
												<option value="phone">phone</option>
												<option value="address">address</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
