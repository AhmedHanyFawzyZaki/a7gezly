<?php
$this->breadcrumbs=array(
	'Locations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Location','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Location';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>