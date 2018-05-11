<?php
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Country','url'=>array('index')),
);
?>

<h1>Create Country</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>