<?php
$this->breadcrumbs=array(
	'Properties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Properties','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Property';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>