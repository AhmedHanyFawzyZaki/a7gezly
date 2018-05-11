<?php
$this->breadcrumbs=array(
	'Room Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomOption','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create RoomOption';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>