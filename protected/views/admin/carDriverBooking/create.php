<?php
$this->breadcrumbs=array(
	'Car Driver Bookings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CarDriverBooking','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create CarDriverBooking';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>