<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="Gallery_search_value" class="span5" type="text" name="Gallery[search_value]" maxlength="100">

			<select id="Gallery_search_key" class="span5" name="Gallery[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="versions_data">versions_data</option>
												<option value="name">name</option>
												<option value="description">description</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>