<?php

$this->breadcrumbs = array(
    'Days' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Days', 'url' => array('index')),
    array('label' => 'Create Days', 'url' => array('create')),
    array('label' => 'Update Days', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Days', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Days # ' . $model->title; ?>

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
    //'temp1',
    ),
));
?>
