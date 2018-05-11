<?php
$this->breadcrumbs=array(
	'Hotels'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Hotels','url'=>array('index')),
	array('label'=>'Create Hotels','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hotels-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Hotels';?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
<?php // $this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div>  search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'hotels-grid',
    'type'=>'striped  condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
//	'htmlOptions'=>array('class'=>'table table-bordered table-condensed table-hover table-striped'),
	'columns'=>array(
	//	'id',
		'title',
//		'title_ar',
	//	'desc',
	//	'desc_ar',
		array(
			'name'=>'image',
			'type'=>'html',
			'value'=>'(!empty($data->image))?CHtml::image(Yii::app()->request->baseUrl."/media/hotels/".$data->image,"",array("style"=>"width:100px;height:75px;")):"no image"',
		) ,
		/*
		'map',
		'video',
		'level_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
