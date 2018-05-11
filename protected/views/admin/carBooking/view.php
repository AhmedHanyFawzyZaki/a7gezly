<?php

$this->breadcrumbs = array(
    'Car Bookings' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Car Bookings', 'url' => array('index')),
        //array('label'=>'Create CarBooking','url'=>array('create')),
        //array('label'=>'Update CarBooking','url'=>array('update','id'=>$model->id)),
        //array('label'=>'Delete CarBooking','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Car Booking with client "' . $model->name . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'days',
        'price',
        array(
            'name' => 'start_date',
            'type' => 'raw',
            'value' => date("Y-m-d", strtotime($model->start_date))
        ),
        array(
            'name' => 'start_time',
            'type' => 'raw',
            'value' => date("H:i:s", strtotime($model->start_date))
        ),
        array(
            'name' => 'deliver_date',
            'type' => 'raw',
            'value' => date("Y-m-d", strtotime($model->deliver_date))
        ),
        array(
            'name' => 'delivery_time',
            'type' => 'raw',
            'value' => date("H:i:s", strtotime($model->delivery_time))
        ),
        'name',
        'phone',
        'email',
        'passport',
        'driving_licence',
        'accomodation_licence',
        array(
            'name' => 'location_id',
            'type' => 'raw',
            'value' => $model->location->title . " - " . $model->location->country->title
        ),
        array(
            'name' => 'car_id',
            'type' => 'raw',
            'value' => $model->car->title
        ),
    ),
));
?>
