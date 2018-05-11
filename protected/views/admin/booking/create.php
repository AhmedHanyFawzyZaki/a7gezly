<?php
$this->breadcrumbs=array(
	'Bookings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Booking','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Booking';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>