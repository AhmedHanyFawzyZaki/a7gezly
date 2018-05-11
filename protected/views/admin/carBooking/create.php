<?php
$this->breadcrumbs=array(
	'Car Bookings'=>array('index'),
	//'Create',
);

$this->menu=array(
	array('label'=>'List Car Bookings','url'=>array('index')),
);
?>

<?php //$this->pageTitlecrumbs = 'Create CarBooking';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>