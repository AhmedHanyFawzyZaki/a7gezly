<?php
$this->breadcrumbs=array(
	'Car Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Locations','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Location';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>