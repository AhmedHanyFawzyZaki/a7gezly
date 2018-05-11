<?php

$this->breadcrumbs = array(
    'Keywords' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Keyword', 'url' => array('index')),
    array('label' => 'Create Keyword', 'url' => array('create')),
    array('label' => 'Update Keyword', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Keyword', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Keyword # ' . $model->title; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
//        'id',
         
        array(
            'label'=>'Arabic Title',
            'name' => 'title'
        ),
        array(
            'label'=>' English Title',
            'name' => 'title_en_us'
        ),
    ),
));
?>
