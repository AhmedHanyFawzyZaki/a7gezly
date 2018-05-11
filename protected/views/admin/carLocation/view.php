<?php

$this->breadcrumbs = array(
    'Car Locations' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Locations', 'url' => array('index')),
    array('label' => 'Create Location', 'url' => array('create')),
    array('label' => 'Update Location', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Location', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Location "' . $model->title . '"'; ?>

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
