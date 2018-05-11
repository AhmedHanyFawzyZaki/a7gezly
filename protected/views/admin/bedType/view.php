<?php

$this->breadcrumbs = array(
    'Bed Types' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List BedType', 'url' => array('index')),
    array('label' => 'Create BedType', 'url' => array('create')),
    array('label' => 'Update BedType', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete BedType', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View BedType # ' . $model->title; ?>

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
    ),
));
?>
