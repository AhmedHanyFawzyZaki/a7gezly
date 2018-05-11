<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Comments','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Comments';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>