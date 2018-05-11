<?php

$this->breadcrumbs = array(
    'Room Options' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List RoomOption', 'url' => array('index')),
    array('label' => 'Create RoomOption', 'url' => array('create')),
    array('label' => 'Update RoomOption', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete RoomOption', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View RoomOption # ' . $model->title; ?>

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
            'label' => 'Arabic Details',
            'name' => 'desc',
            'type' => 'raw',
        ),
        array(
            'label' => 'English Details',
            'name' => 'desc_en',
            'type' => 'raw',
        ),
    ),
));
?>
