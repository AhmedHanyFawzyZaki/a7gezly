<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
)); ?>

	<div class="control-group adv-search">
			<input id="Trip_search_value" class="span5" type="text" name="Trip[search_value]" maxlength="100">

			<select id="Trip_search_key" class="span5" name="Trip[search_key]">
				<option value="all">All</option>
												<option value="id">id</option>
												<option value="title">title</option>
												<option value="title_ar">title_ar</option>
												<option value="details">details</option>
												<option value="details_ar">details_ar</option>
												<option value="import_info">import_info</option>
												<option value="import_info_ar">import_info_ar</option>
												<option value="safari_details">safari_details</option>
												<option value="safari_details_ar">safari_details_ar</option>
												<option value="category_id">category_id</option>
												<option value="gallery_id">gallery_id</option>
												<option value="hotel_id">hotel_id</option>
												<option value="location_id">location_id</option>
												<option value="start_date">start_date</option>
												<option value="end_date">end_date</option>
												<option value="offerd">offerd</option>
												<option value="price">price</option>
												<option value="price_range_id">price_range_id</option>
												<option value="days_id">days_id</option>
												<option value="temp1">temp1</option>
												<option value="temp2">temp2</option>
												<option value="temp3">temp3</option>
												<option value="temp4">temp4</option>
							</select>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
