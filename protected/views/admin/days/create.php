<?php
$this->breadcrumbs=array(
	'Days'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Days','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Days';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>