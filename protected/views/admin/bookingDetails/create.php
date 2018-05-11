<?php
$this->breadcrumbs=array(
	'Booking Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BookingDetails','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create BookingDetails';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>