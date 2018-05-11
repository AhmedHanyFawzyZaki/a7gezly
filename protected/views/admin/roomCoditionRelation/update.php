<?php
$this->breadcrumbs=array(
	'Room Codition Relations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomCoditionRelation','url'=>array('index')),
	array('label'=>'Create RoomCoditionRelation','url'=>array('create')),
	array('label'=>'View RoomCoditionRelation','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update RoomCoditionRelation #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>