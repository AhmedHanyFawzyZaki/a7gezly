<?php
$this->breadcrumbs=array(
	'Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Banner','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Banner';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>