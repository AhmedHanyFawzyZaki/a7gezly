<?php
$this->breadcrumbs=array(
	'Room Conditions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomCondition','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create RoomCondition';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>