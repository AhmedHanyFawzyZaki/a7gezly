<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="RoomType_search_value" class="span5" type="text" name="RoomType[search_value]" maxlength="100">

			<select id="RoomType_search_key" class="span5" name="RoomType[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="title">title</option>
												<option value="title_ar">title_ar</option>
												<option value="room_option_id">room_option_id</option>
												<option value="size">size</option>
												<option value="gallery_id">gallery_id</option>
												<option value="max_person">max_person</option>
												<option value="min_person">min_person</option>
												<option value="tax_included">tax_included</option>
												<option value="tax_excluded">tax_excluded</option>
												<option value="temp1">temp1</option>
												<option value="temp2">temp2</option>
												<option value="temp3">temp3</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
