<?php
$this->breadcrumbs=array(
	'Room Codition Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomCoditionRelation','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create RoomCoditionRelation';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>