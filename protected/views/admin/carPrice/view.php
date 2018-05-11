<?php

$this->breadcrumbs = array(
    'Car Packages' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Packages', 'url' => array('index')),
    array('label' => 'Create Package', 'url' => array('create')),
    array('label' => 'Update Package', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Package', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Package with price"' . $model->price . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'Car',
            'type' => 'raw',
            'value' => $model->car->title
        ),
        'price',
        'start_days',
        'end_days',
    ),
));
?>
