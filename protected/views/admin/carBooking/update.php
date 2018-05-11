<?php
$this->breadcrumbs=array(
	'Car Bookings'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Car Bookings','url'=>array('index')),
	//array('label'=>'Create CarBooking','url'=>array('create')),
	array('label'=>'View CarBooking','url'=>array('view','id'=>$model->id)),
);
?>

<?php //$this->pageTitlecrumbs = 'Update CarBooking #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>