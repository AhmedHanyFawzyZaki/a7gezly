<?php

$this->breadcrumbs = array(
    'Car Driver Bookings' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Car Booking(with driver)', 'url' => array('index')),
        //array('label'=>'Create CarDriverBooking','url'=>array('create')),
        //array('label'=>'Update CarDriverBooking','url'=>array('update','id'=>$model->id)),
        //array('label'=>'Delete CarDriverBooking','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Car Booking driver with client "' . $model->name . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'name',
        'number',
        'email',
        array(
            'name' => 'location_id',
            'type' => 'raw',
            'value' => $model->location->title . " - " . $model->location->country->title
        ),
        'city',
        'area',
        array(
            'name' => 'picked_date',
            'type' => 'raw',
            'value' => date("Y-m-d", strtotime($model->picked_date))
        ),
        array(
            'name' => 'picked_time',
            'type' => 'raw',
            'value' => date("H:i:s", strtotime($model->picked_time))
        ),
        array(
            'name' => 'return_date',
            'type' => 'raw',
            'value' => date("Y-m-d", strtotime($model->return_date))
        ),
        array(
            'name' => 'return_time',
            'type' => 'raw',
            'value' => date("H:i:s", strtotime($model->return_time))
        ),
        array(
            'name' => 'with_return',
            'type' => 'raw',
            'value' => $model->with_return == 1?"نعم":""
        ),
        array(
            'name' => 'driver_id',
            'type' => 'raw',
            'value' => $model->driver->full_name
        ),
        array(
            'name' => 'car_id',
            'type' => 'raw',
            'value' => $model->car->title
        ),
        'price',
    ),
));
?>