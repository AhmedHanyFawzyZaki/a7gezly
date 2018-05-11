<?php
$this->breadcrumbs=array(
	'Room Conditions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomCondition','url'=>array('index')),
	array('label'=>'Create RoomCondition','url'=>array('create')),
	array('label'=>'View RoomCondition','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update RoomCondition : '. $model->condition_ar; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>