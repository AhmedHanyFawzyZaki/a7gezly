<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="Comments_search_value" class="span5" type="text" name="Comments[search_value]" maxlength="100">

			<select id="Comments_search_key" class="span5" name="Comments[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="title">title</option>
												<option value="comment">comment</option>
												<option value="trip_id">trip_id</option>
												<option value="user_id">user_id</option>
												<option value="date">date</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
