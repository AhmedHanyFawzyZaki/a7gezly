<?php
$this->breadcrumbs=array(
	'Car Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Car Categories','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Car Category';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>