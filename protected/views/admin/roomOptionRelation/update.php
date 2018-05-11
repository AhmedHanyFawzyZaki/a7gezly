<?php
$this->breadcrumbs=array(
	'Room Option Relations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomOptionRelation','url'=>array('index')),
	array('label'=>'Create RoomOptionRelation','url'=>array('create')),
	array('label'=>'View RoomOptionRelation','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update RoomOptionRelation #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>