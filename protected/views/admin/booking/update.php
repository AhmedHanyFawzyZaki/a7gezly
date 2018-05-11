<?php
$this->breadcrumbs=array(
	'Bookings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Booking','url'=>array('index')),
//	array('label'=>'Create Booking','url'=>array('create')),
	array('label'=>'View Booking','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Booking of '. $model->trip->title_ar; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>