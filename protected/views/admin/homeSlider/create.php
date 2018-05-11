<?php
$this->breadcrumbs=array(
	'Home Sliders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HomeSlider','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create HomeSlider';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>