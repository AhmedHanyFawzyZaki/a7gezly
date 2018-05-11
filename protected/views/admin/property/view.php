<?php

$this->breadcrumbs = array(
    'Properties' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Property', 'url' => array('index')),
    array('label' => 'Create Property', 'url' => array('create')),
    array('label' => 'Update Property', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Property', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Property "' . $model->title . '"'; ?>

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
        array(
            'name' => 'icon',
            'type' => 'raw',
            'value' => ($model->isNewRecord != '1' && !empty($model->icon))?CHtml::image(Yii::app()->request->baseUrl.'/media/car_properties/'.$model->icon,'',array('width'=>250)):"",
        ),
    ),
));
?>
