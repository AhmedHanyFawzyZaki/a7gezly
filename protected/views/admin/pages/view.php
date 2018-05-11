<?php

$this->breadcrumbs = array(
    'Pages' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Pages', 'url' => array('index')),
//    array('label' => 'Create Pages', 'url' => array('create')),
    array('label' => 'Update Pages', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Pages', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Pages # ' . $model->title; ?>

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
            'label' => 'Arabic Details',
            'name' => 'details',
            'type' => 'raw',
        ),
        array(
            'label' => 'English Details',
            'name' => 'details_en',
            'type' => 'raw',
        ),
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->baseUrl . '/media/' . $model->image, $model->title, array('width' => 150)),
        ),
        array(
            'name' => 'video',
            'type' => 'raw',
            'value' => Helper::PlayVideo($model)
        ),
        array(
            'name' => 'publish',
            'type' => 'raw',
            'value' => $model->getStatus($model->publish),
        ),
        
        /////////////////
               array(
                 'label'=>'Arabic meta author',
                'name' => 'meta_author'
            ),
            
               array(
                 'label'=>'English meta author',
                'name' => 'meta_author_en'
            ),
            
        
        ///
               array(
                 'label'=>'Arabic meta keywords',
                'name' => 'meta_keywords'
            ),
            
               array(
                 'label'=>'English meta keywords',
                'name' => 'meta_keywords_en'
            ),
            
        //
               array(
                 'label'=>'Arabic meta desc',
                'name' => 'meta_desc'
            ),
            
               array(
                 'label'=>'English meta desc',
                'name' => 'meta_desc_en'
            ),
            
        
        
    ),
));
?>
