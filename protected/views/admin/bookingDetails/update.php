<?php
$this->breadcrumbs=array(
	'Booking Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BookingDetails','url'=>array('index')),
	array('label'=>'Create BookingDetails','url'=>array('create')),
	array('label'=>'View BookingDetails','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update BookingDetails #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>