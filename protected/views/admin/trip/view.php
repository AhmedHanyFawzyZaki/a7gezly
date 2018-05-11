<?php

$this->breadcrumbs = array(
    'Trips' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Trip', 'url' => array('index')),
    array('label' => 'Create Trip', 'url' => array('create')),
    array('label' => 'Update Trip', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Trip', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Trip # ' . $model->title; ?>

<?php

$room_type_id = TripRoomCoditionRelation::model()->findAll(array('condition' => ' trip_id=' . $model->id, 'group' => 'room_type_id'));
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'label' => 'Arabic Title',
            'name' => 'title'
        ),
        array(
            'label' => 'English Title',
            'name' => 'title_en'
        ),
        array(
            'name' => 'category_id',
            'value' => $model->category->title,
            'type' => 'raw',
        ),
        // 'gallery_id',
        array(
            'name' => 'hotel_id',
            'value' => $model->hotel->title,
            'type' => 'raw',
        ),
        array('name' => 'rooms',
            'value' => $model->tripRooms($room_type_id),
            'type' => 'raw',
        ),
        array(
            'name' => 'location_id',
            'value' => $model->location->title,
            'type' => 'raw',
        ),
        'start_date',
        'end_date',
        array(
            'name' => 'offerd',
            'value' => $model->getStatus($model->offerd),
            'type' => 'raw',
        ),
        'price',
        array(
            'name' => 'price_range_id',
            'value' => $model->priceRange->title,
            'type' => 'raw',
        ),
        array(
            'name' => 'days_id',
            'value' => $model->days->title,
            'type' => 'raw',
        ),
        array(
            'label' => 'Arabic Details',
            'name' => 'details',
            'type' => 'raw',
        ),
        array(
            'label' => 'English Details',
            'name' => 'details_en',
            'type' => 'raw',
        ),
          array(
            'label' => 'Arabic Import info',
            'name' => 'import_info',
            'type' => 'raw',
        ),
        array(
            'label' => 'English Import info',
            'name' => 'import_info_en',
            'type' => 'raw',
        ),
             array(
            'label' => 'Arabic Safari details',
            'name' => 'safari_details',
            'type' => 'raw',
        ),
        array(
            'label' => 'English Safari details',
            'name' => 'safari_details_en',
            'type' => 'raw',
        ),
    /* 'temp1',
      'temp2',
      'temp3',
      'temp4', */
    ),
));
?>
