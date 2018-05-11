<?php

$this->breadcrumbs = array(
    'Hotels Levels' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List HotelsLevel', 'url' => array('index')),
    array('label' => 'Create HotelsLevel', 'url' => array('create')),
    array('label' => 'Update HotelsLevel', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete HotelsLevel', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View HotelsLevel # ' . $model->title; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //	'id',
        array(
            'label' => 'Arabic Title',
            'name' => 'title'
        ),
        array(
            'label' => 'English Title',
            'name' => 'title_en'
        ),
        'stars',
    //	'temp1',
    ),
));
?>
