<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categories','url'=>array('index')),
	array('label'=>'Create Categories','url'=>array('create')),
	array('label'=>'View Categories','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Categories #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>