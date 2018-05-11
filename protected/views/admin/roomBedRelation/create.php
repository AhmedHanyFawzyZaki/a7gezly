<?php
$this->breadcrumbs=array(
	'Room Bed Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomBedRelation','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create RoomBedRelation';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>