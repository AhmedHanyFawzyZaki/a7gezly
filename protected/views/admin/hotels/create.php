<?php
$this->breadcrumbs=array(
	'Hotels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Hotels','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Hotels';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>