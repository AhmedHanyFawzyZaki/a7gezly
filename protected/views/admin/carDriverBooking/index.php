<?php
$this->breadcrumbs = array(
    'Car Without driver' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Cars without drivers', 'url' => array('index')),
        //array('label'=>'Create CarDriverBooking','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('car-driver-booking-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'View Car Bookings(with driver)';?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
<?php /* $this->renderPartial('_search',array(
  'model'=>$model,
  )); */ ?>
</div>--> <!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $model->search(),
    'filter'=>$model,
    //'htmlOptions' => array('class' => 'table table-bordered table-condensed table-hover table-striped'),
    'columns' => array(
        'name',
        'number',
        'email',
        array(
            'name' => 'location_id',
            'type' => 'raw',
            'value' => '$data->location->title . " - " . $data->location->country->title',
            'filter' => CHtml::listData(CarLocation::model()->findall(), 'id', 'title'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{delete}'
        ),
    ),
));
?>
