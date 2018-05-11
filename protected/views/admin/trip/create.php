<?php
$this->breadcrumbs=array(
	'Trips'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Trip','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Trip';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>