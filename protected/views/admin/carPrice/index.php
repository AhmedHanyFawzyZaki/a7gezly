<?php
$this->breadcrumbs = array(
    'Car Packages' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Packages', 'url' => array('index')),
    array('label' => 'Create Package', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('car-price-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Car Packages'; ?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
    <?php
    /*$this->renderPartial('_search', array(
        'model' => $model,
    ));*/
    ?>
</div>--> <!-- search-form -->

<?php
$numbers = range(1, 30); 
 array_unshift($numbers, "");
 unset($numbers[0]);
 array_unshift($numbers, "");
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'car-price-grid',
    'dataProvider' => $model->search(),
    'filter'=>$model,
    //'htmlOptions' => array('class' => 'table table-bordered table-condensed table-hover table-striped'),
    'columns' => array(
        array(
            'name' => 'car_id',
            'type' => 'raw',
            'value' => '$data->car->title',
            'filter' => CHtml::listData(Car::model()->findall(), 'id', 'title'),
        ),
        'price',
        array(
            'name' => 'start_days',
            'type' => 'raw',
            'value' => '$data->start_days',
            'filter' => CHtml::dropDownList("CarPrice[start_days]", $model, $numbers),
        ),
        array(
            'name' => 'end_days',
            'type' => 'raw',
            'value' => '$data->end_days',
            'filter' => CHtml::dropDownList("CarPrice[end_days]", $model, $numbers),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
