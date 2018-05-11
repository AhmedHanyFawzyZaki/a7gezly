<?php
$this->breadcrumbs=array(
	'Car Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Car Categories','url'=>array('index')),
	array('label'=>'Create Car Category','url'=>array('create')),
	array('label'=>'View Car Categories','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Car Category "'. $model->title . '"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>