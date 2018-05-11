<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="City_search_value" class="span5" type="text" name="City[search_value]" maxlength="100">

			<select id="City_search_key" class="span5" name="City[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="title">Title</option>
												<option value="country_id">Country</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
