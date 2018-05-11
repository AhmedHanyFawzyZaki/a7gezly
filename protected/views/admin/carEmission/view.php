<?php

$this->breadcrumbs = array(
    'Car Emissions' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Car Emissions', 'url' => array('index')),
    array('label' => 'Create Car Emission', 'url' => array('create')),
    array('label' => 'Update Car Emission', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Car Emission', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Car Emission "' . $model->title . '"'; ?>

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
