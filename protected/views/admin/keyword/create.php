<?php
$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Keyword','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Keyword';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>