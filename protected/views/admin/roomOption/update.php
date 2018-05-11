<?php
$this->breadcrumbs=array(
	'Room Options'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomOption','url'=>array('index')),
	array('label'=>'Create RoomOption','url'=>array('create')),
	array('label'=>'View RoomOption','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update RoomOption #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>