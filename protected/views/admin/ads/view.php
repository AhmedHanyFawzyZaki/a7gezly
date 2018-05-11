<?php

$this->breadcrumbs = array(
    'Ads' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Ads', 'url' => array('index')),
    array('label' => 'Create Ads', 'url' => array('create')),
    array('label' => 'Update Ads', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Ads', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Ads # ' . $model->title; ?>

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
            'name' => 'url',
            'type' => 'raw',
            'value' => CHtml::link('open link', CHtml::normalizeUrl($model->url), array('target' => '_blank')),
        ),
        array(
            'name' => 'position',
            'type' => 'raw',
            'value' => $model->getPosition($model->position),
        ),
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->baseUrl . '/media/ads/' . $model->image, $model->title, array('width' => 150)),
        ),
    ),
));
?>
