<?php

$this->breadcrumbs = array(
    'Cars' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Cars', 'url' => array('index')),
    array('label' => 'Create Car', 'url' => array('create')),
    array('label' => 'Update Car', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Car', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Car "' . $model->title . '"'; ?>

<?php
if($model->driving_type == 1)
    $type = "Car without driver";
elseif($model->driving_type == 2)
    $type = "Car with driver";
else
    $type = "Both";

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
            'label' => 'Arabic Age',
            'name' => 'age'
        ),
        array(
            'label' => 'English Age',
            'name' => 'age_en'
        ),
        array(
            'label' => 'Arabic Power',
            'name' => 'power'
        ),
        array(
            'label' => 'English Power',
            'name' => 'power_en'
        ),
        'price_per_day',
        array(
            'name' => 'model_id',
            'type' => 'raw',
            'value' => $model->model->title
        ),
        array(
            'name' => 'category_id',
            'type' => 'raw',
            'value' => $model->category->title
        ),
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => !empty($model->image)? "<img src='" . Yii::app()->request->baseUrl . '/media/cars/'.$model->image . "' width='150px' />":"",
        ),
        array(
            'label' => 'Arabic Mileage',
            'name' => 'mileage'
        ),
        array(
            'label' => 'English Mileage',
            'name' => 'mileage_en'
        ),
        array(
            'name' => 'driving_type',
            'type' => 'raw',
            'value' => $type
        ),
    ),
));
?>