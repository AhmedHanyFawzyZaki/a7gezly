<?php
$this->breadcrumbs=array(
	'Car Models'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Car Models','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Car Model';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>