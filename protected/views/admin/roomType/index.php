<?php
$this->breadcrumbs=array(
	'Room Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RoomType','url'=>array('index')),
	array('label'=>'Create RoomType','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('room-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Room Types';?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div>  search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'room-type-grid',
	'dataProvider'=>$model->search(),
    'type'=>'striped  condensed',
	'filter'=>$model,
//	'htmlOptions'=>array('class'=>'table table-bordered table-condensed table-hover table-striped'),
	'columns'=>array(
	//	'id',
		'title',
		//'title_ar',
		
		'size',
		//'gallery_id',
		/*
		'max_person',
		'min_person',
		'tax_included',
		'tax_excluded',
		'temp1',
		'temp2',
		'temp3',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
