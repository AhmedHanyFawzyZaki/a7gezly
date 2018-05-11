<?php
$this->breadcrumbs=array(
	'Hotels Levels'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HotelsLevel','url'=>array('index')),
	array('label'=>'Create HotelsLevel','url'=>array('create')),
	array('label'=>'View HotelsLevel','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update HotelsLevel #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>