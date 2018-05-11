<?php
$this->breadcrumbs=array(
	'Trip Room Codition Relations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TripRoomCoditionRelation','url'=>array('index')),
	array('label'=>'Create TripRoomCoditionRelation','url'=>array('create')),
	array('label'=>'View TripRoomCoditionRelation','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update TripRoomCoditionRelation #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>