<?php

$this->breadcrumbs = array(
    'Price Ranges' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List PriceRange', 'url' => array('index')),
    array('label' => 'Create PriceRange', 'url' => array('create')),
    array('label' => 'Update PriceRange', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete PriceRange', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View PriceRange # ' . $model->title; ?>

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
