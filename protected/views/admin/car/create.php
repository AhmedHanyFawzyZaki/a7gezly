<?php
$this->breadcrumbs=array(
	'Cars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cars','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Car';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>