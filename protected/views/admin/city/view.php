<?php

$this->breadcrumbs = array(
    'Cities' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List City', 'url' => array('index')),
    array('label' => 'Create City', 'url' => array('create')),
    array('label' => 'Update City', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete City', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View City "' . $model->title . '"'; ?>

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
            'name' => 'country_id',
            'type' => 'raw',
            'value' => $model->country->title
        ),
    ),
));
?>
