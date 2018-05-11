<?php

$this->breadcrumbs = array(
    'Banners' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Banner', 'url' => array('index')),
    array('label' => 'Create Banner', 'url' => array('create')),
    array('label' => 'Update Banner', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Banner', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Banner # ' . $model->title; ?>

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
            'value' => CHtml::image(Yii::app()->request->baseUrl . '/media/banner/' . $model->image, $model->title, array('width' => 150)),
        ),
        array(
            'label' => 'Arabic Description',
            'name' => 'desc',
            'type' => 'raw',
        ),
        array(
            'label' => 'English Description',
            'name' => 'desc_en',
            'type' => 'raw',
        ),
    ),
));
?>
