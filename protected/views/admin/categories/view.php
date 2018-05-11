<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Categories','url'=>array('index')),
	array('label'=>'Create Categories','url'=>array('create')),
	array('label'=>'Update Categories','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Categories','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Categories # '. $model->title; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
//		'title',
//		'title_ar',
		//'temp1',
               array(
            'label' => 'Arabic Title',
            'name' => 'title'
        ),
        array(
            'label' => 'English Title',
            'name' => 'title_en'
        ),
              array(
		'name'=>'image',
		'type'=>'raw',
		'value'=>CHtml::image(Yii::app()->request->baseUrl.'/media/categories/'.$model->image,$model->title,array('width'=>150)),
		),
	),
)); ?>
