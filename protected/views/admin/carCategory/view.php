<?php

$this->breadcrumbs = array(
    'Car Categories' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Car Categories', 'url' => array('index')),
    array('label' => 'Create Car Category', 'url' => array('create')),
    array('label' => 'Update Car Category', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Car Category', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Car Category "' . $model->title . '"'; ?>

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
