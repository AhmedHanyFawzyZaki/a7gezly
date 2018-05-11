<?php

$this->breadcrumbs = array(
    'Locations' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Location', 'url' => array('index')),
    array('label' => 'Create Location', 'url' => array('create')),
    array('label' => 'Update Location', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Location', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Location # ' . $model->title; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
//		'title',
//		'title_ar',
        array(
            'label' => 'Arabic Title',
            'name' => 'title'
        ),
        array(
            'label' => 'English Title',
            'name' => 'title_en'
        ),
        array(
            'name' => 'country',
            'value' => $model->country->title,
            'type' => 'raw',
        ),
        //'temp1',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->baseUrl . '/media/locations/' . $model->image, $model->title, array('width' => 150)),
        ),
    ),
));
?>
