<?php
$this->breadcrumbs=array(
	'Room Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomType','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create RoomType';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>