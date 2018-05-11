<?php
$this->breadcrumbs=array(
	'Drivers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Driver','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Driver';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>