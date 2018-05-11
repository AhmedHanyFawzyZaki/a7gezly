<?php

$this->breadcrumbs = array(
    'Car Fuel Types' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Car Fuel Types', 'url' => array('index')),
    array('label' => 'Create Car Fuel Type', 'url' => array('create')),
    array('label' => 'Update Car Fuel Type', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Car Fuel Type', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Car Fuel Type "' . $model->title . '"'; ?>

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
