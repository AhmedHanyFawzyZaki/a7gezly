<?php
$this->breadcrumbs=array(
	'Advirtise With Uses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AdvirtiseWithUs','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create AdvirtiseWithUs';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>