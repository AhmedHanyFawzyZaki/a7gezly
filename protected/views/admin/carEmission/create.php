<?php
$this->breadcrumbs=array(
	'Car Emissions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Car Emissions','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Car Emission';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>