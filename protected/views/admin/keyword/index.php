<?php
$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Keyword','url'=>array('index')),
	array('label'=>'Create Keyword','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('keyword-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $this->pageTitlecrumbs = 'View Keywords # ' . $model->title; ?>
 

<p class="span11 alert">
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<br/>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn center_btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'keyword-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'type'=>'striped  condensed',
	'columns'=>array(
//		'id',
		'title',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
