<?php

$this->breadcrumbs = array(
    'Home Sliders' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List HomeSlider', 'url' => array('index')),
    array('label' => 'Create HomeSlider', 'url' => array('create')),
    array('label' => 'Update HomeSlider', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete HomeSlider', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View HomeSlider #' . $model->title; ?>

<?php

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
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->baseUrl . '/media/homeSlider/' . $model->image, $model->title, array('width' => 150)),
        ),
    ),
));
?>
