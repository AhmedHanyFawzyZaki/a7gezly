<?php
$this->breadcrumbs=array(
	'Car Driver Bookings'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CarDriverBooking','url'=>array('index')),
	array('label'=>'Create CarDriverBooking','url'=>array('create')),
	array('label'=>'View CarDriverBooking','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update CarDriverBooking #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>