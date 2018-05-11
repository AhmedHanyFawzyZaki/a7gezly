<?php
$this->breadcrumbs=array(
	'Hotels Levels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HotelsLevel','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create HotelsLevel';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>