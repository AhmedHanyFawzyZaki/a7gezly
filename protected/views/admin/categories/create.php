<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Categories','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Categories';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>