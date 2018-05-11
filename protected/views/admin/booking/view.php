<?php
$this->breadcrumbs = array(
    'Bookings' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Booking', 'url' => array('index')),
//	array('label'=>'Create Booking','url'=>array('create')),
    array('label' => 'Update Booking', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Booking', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Booking of ' . $model->trip->title_ar; ?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
        //'trip_id',
//         'user_id',
        //       'payment_way',
        array(
            'name' => 'trip',
            'value' => $model->trip->title_ar,
            'type' => 'raw',
        ),
        array(
            'name' => 'user',
            'value' => $model->user->username,
            'type' => 'raw',
        ),
        array(
            'name' => 'payment way',
            'type' => 'raw',
            'value' => $model->getPaymentWay($model->payment_way),
        ),
        array(
            'name' => 'payment Status',
            'type' => 'raw',
            'value' => $model->getPaymentStatus($model->payment_status),
        ),
        'total_price',
//        'payment_status',
        'fullName',
        'email',
        'address',
        'phone',
        'created',
//        'total_persons',
    ),
));
?>


<div class="control-group " style="padding-left: 100px;border-top:1px solid #ccc">
    <label class="control-label" for="Trip"><b>Booking details</b></label>
    <div class="controls" style=" border-top:1px solid #ccc">
<?php
$details = $model->GetBookDetails($model->id);

foreach ($details as $detail) {
//$detail->condition_id is the id of relation table not condition id
    echo '<p style="border-top:1px solid #ccc"><b>Room Type: </b>' . $roomType = $detail->roomType->title_ar . '</p>';
    $detail->room_type_id;
    $detail->condition_id;
    $criteria1 = new CDbCriteria;
    $criteria1->condition = 'id=:id and room_type_id=:room_type_id';
    $criteria1->params = array(':id' => $detail->condition_id, ':room_type_id' => $detail->room_type_id);
    $conditions = RoomCoditionRelation::model()->find($criteria1);

    $condition = RoomCondition::model()->findByPk($conditions->condition_id);

    echo '<p style="border-top:1px solid #ccc"><b>Room Condition: </b>' . $condition->condition_ar . '</p><br>';
}
?>

    </div>
</div>