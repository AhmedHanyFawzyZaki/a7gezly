<?php

$this->breadcrumbs = array(
    'Room Conditions' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List RoomCondition', 'url' => array('index')),
    array('label' => 'Create RoomCondition', 'url' => array('create')),
    array('label' => 'Update RoomCondition', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete RoomCondition', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View RoomCondition # ' . $model->condition; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'label' => 'Arabic condition',
            'name' => 'condition'
        ),
        array(
            'label' => 'English condition',
            'name' => 'condition_en'
        ),
        'persons_no',
        'price',
    ),
));
?>
