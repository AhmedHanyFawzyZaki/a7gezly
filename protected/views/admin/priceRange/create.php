<?php
$this->breadcrumbs=array(
	'Price Ranges'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PriceRange','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create PriceRange';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>