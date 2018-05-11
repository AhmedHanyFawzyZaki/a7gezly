<?php
$this->breadcrumbs=array(
	'Room Option Relations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RoomOptionRelation','url'=>array('index')),
	array('label'=>'Create RoomOptionRelation','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('room-option-relation-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Room Option Relations';?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div> <!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'room-option-relation-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'htmlOptions'=>array('class'=>'table table-bordered table-condensed table-hover table-striped'),
	'columns'=>array(
		'id',
		'room_type_id',
		'room_option_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
