<?php

$this->breadcrumbs = array(
    'Advirtise With Uses' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List AdvirtiseWithUs', 'url' => array('index')),
//    array('label' => 'Create AdvirtiseWithUs', 'url' => array('create')),
    array('label' => 'Update AdvirtiseWithUs', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete AdvirtiseWithUs', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View AdvirtiseWithUs # ' . $model->title; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
        'name',
        'email',
        'phone',
        'title',
        //'title_ar',
         array(
		'name'=>'url',
		'type'=>'raw',
		'value'=> CHtml::link('Show link', CHtml::normalizeUrl($model->url), array('target'=>'_blank')),

                      ),
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->baseUrl . '/media/advirtiseWithUs/' . $model->image, $model->title, array('width' => 150)),
        ),
        
        
   
    ),
));
?>
