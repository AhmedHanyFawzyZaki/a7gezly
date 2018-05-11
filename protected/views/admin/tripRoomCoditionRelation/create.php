<?php
$this->breadcrumbs=array(
	'Trip Room Codition Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TripRoomCoditionRelation','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create TripRoomCoditionRelation';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>