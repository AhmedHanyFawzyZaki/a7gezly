<?php
$this->breadcrumbs = array(
    'Booking Details' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List BookingDetails', 'url' => array('index')),
    array('label' => 'Create BookingDetails', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('booking-details-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Booking Details'; ?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
<?php
// $this->renderPartial('_search',array(
//'model'=>$model,
//)); 
?>
</div>  search-form -->

<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'booking-details-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    //'htmlOptions'=>array('class'=>'table table-bordered table-condensed table-hover table-striped'),
  
    'columns' => array(
        'id',
       // 'booking_id',
        array(
            'name' => 'booking_id',
            //'value' => $model->GetTripName($model->booking_id),
            //'value' => '$data->category->title',
         ),
        'room_type_id',
        'condition_id',
        //'price',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
 
