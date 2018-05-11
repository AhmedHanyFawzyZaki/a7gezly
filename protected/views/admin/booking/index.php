<?php
$this->breadcrumbs = array(
    'Bookings' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Booking', 'url' => array('index')),
//	array('label'=>'Create Booking','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('booking-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Bookings'; ?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
<?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
?>
</div>  search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'booking-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped  condensed',
    'filter' => $model,
//    'htmlOptions' => array('class' => 'table table-bordered table-condensed table-hover table-striped'),
    'columns' => array(
        //'id',
//        'trip_id',
//         'user_id',
        array(
            'name' => 'trip_id',
            'value' => '$data->trip->title_ar',
            'filter' => Helper::getalltitles($model = 'Trip', 'title_ar'),
        ),
//        array(
//            'name' => 'user_id',
//            'value' => '$data->user->username',
//            'filter' => Helper::getalltitles($model = 'User', 'username'),
//        ),
         'created',
       'fullName',
        'total_price',
        //'payment_way',
        //'payment_status',
       
        /*
          'fullName',
          'email',
          'address',
          'phone',*/
         
         /* 'total_persons',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
