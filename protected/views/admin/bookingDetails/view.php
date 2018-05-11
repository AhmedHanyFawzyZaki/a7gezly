<?php
$this->breadcrumbs=array(
	'Booking Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BookingDetails','url'=>array('index')),
	array('label'=>'Create BookingDetails','url'=>array('create')),
	array('label'=>'Update BookingDetails','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete BookingDetails','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View BookingDetails #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'booking_id',
             array(
            'name' => 'booking_id',
            'value' => $model->GetTripName($model->booking_id),
         ),
		'room_type_id',
		'condition_id',
		'price',
	),
)); ?>

