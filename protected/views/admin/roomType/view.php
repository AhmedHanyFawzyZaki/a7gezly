<?php

$this->breadcrumbs = array(
    'Room Types' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List RoomType', 'url' => array('index')),
    array('label' => 'Create RoomType', 'url' => array('create')),
    array('label' => 'Update RoomType', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete RoomType', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View RoomType #' . $model->title; ?>

<?php

//echo  $model->optionString($model->id);die;
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
        array(
            'label' => 'Arabic Title',
            'name' => 'title'
        ),
        array(
            'label' => 'English Title',
            'name' => 'title_en'
        ),
        array('name' => 'hotel',
            'value' => $model->hotels->title,
            'type' => 'raw',
        ),
        array('name' => 'room_option_id',
            'value' => $model->optionString($model->id),
        ),
        array('name' => 'bed_type',
            'value' => $model->bedString($model->id),
        ),
        array('name' => 'room_condition',
            'value' => $model->conditionString($model->id),
        ),
        'size',
        //'gallery_id',
        'max_person',
        'min_person',
        array(
            'label' => 'Arabic Tax included',
            'name' => 'tax_included'
        ),
        array(
            'label' => 'English Tax included',
            'name' => 'tax_included_en'
        ),
        array(
            'label' => 'Arabic Tax excluded',
            'name' => 'tax_excluded'
        ),
        array(
            'label' => 'English Tax excluded',
            'name' => 'tax_excluded_en'
        ),
    /* 'temp1',
      'temp2',
      'temp3', */
    ),
));
?>
