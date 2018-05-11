<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="CarEmission_search_value" class="span5" type="text" name="CarEmission[search_value]" maxlength="100">

			<select id="CarEmission_search_key" class="span5" name="CarEmission[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="title">Title</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
