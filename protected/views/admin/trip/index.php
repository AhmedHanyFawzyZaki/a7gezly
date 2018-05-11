<?php
$this->breadcrumbs = array(
    'Trips' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Trip', 'url' => array('index')),
    array('label' => 'Create Trip', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
});
$('.search-form form').submit(function(){
  $.fn.yiiGridView.update('trip-grid', {
    data: $(this).serialize()
  });
  return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Trips'; ?>

<!-- <p>
You may optionally enter a comparison operator (<b><</b>, <b><=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b><&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
<?php
//$this->renderPartial('_search', array(
//    'model' => $model,
//));
?>
</div>  search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'trip-grid',
    'dataProvider' => $model->search(),
    'type'=>'striped  condensed',
    'filter' => $model,
//  'htmlOptions'=>array('class'=>'table table-bordered table-condensed table-hover table-striped'),
    'type' => 'striped bordered condensed',
    'columns' => array(
        //'id',
        'title',
        //'details',
        //'details_ar',
        //'import_info',
        /*
          'import_info_ar',
          'safari_details',
          'safari_details_ar', */
//        'category_id',
        array(
            'name' => 'category_id',
            'value' => '$data->category->title',
            'filter' => Helper::getalltitles( 'Categories','title'),
        ),
        /* 'gallery_id',
          'hotel_id', */
//        'location_id',
         array(
            'name' => 'location_id',
            'value' => '$data->location->title',
             'filter' => Helper::getalltitles( 'Location','title'),
        ),
        /* 'start_date',
          'end_date',
          'offerd',
          'price',
          'price_range_id',
          'days_id',
          'temp1',
          'temp2',
          'temp3',
          'temp4',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>

