<?php
$this->breadcrumbs=array(
	'Car Packages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Car Packages','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create package';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>