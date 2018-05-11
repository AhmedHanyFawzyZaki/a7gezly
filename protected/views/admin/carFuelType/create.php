<?php
$this->breadcrumbs=array(
	'Car Fuel Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Car Fuel Types','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Car Fuel Type';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>