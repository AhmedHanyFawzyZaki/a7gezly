<?php
$this->breadcrumbs=array(
	'Car Locations'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Locations','url'=>array('index')),
	array('label'=>'Create Location','url'=>array('create')),
	array('label'=>'View Location','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Location "'. $model->title . '"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>