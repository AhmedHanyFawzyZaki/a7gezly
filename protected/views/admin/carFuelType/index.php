<?php
$this->breadcrumbs=array(
	'Car Fuel Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Car Fuel Types','url'=>array('index')),
	array('label'=>'Create Car Fuel Type','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('car-fuel-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Car Fuel Types';?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div>--> <!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'car-fuel-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	//'htmlOptions'=>array('class'=>'table table-bordered table-condensed table-hover table-striped'),
	'columns'=>array(
		'title',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
