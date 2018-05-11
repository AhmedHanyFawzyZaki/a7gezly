<?php
$this->breadcrumbs=array(
	'Room Bed Relations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomBedRelation','url'=>array('index')),
	array('label'=>'Create RoomBedRelation','url'=>array('create')),
	array('label'=>'View RoomBedRelation','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update RoomBedRelation #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>