<?php
$this->breadcrumbs=array(
	'Room Option Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomOptionRelation','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create RoomOptionRelation';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>