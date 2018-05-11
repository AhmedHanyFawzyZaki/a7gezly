<?php
$this->breadcrumbs=array(
	'Bed Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BedType','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create BedType';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>