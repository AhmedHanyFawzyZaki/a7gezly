<?php
$this->breadcrumbs=array(
  'Locations'=>array('index'),
  'Manage',
);

$this->menu=array(
  array('label'=>'List Location','url'=>array('index')),
  array('label'=>'Create Location','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
});
$('.search-form form').submit(function(){
  $.fn.yiiGridView.update('location-grid', {
    data: $(this).serialize()
  });
  return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Locations';?>

<!-- <p>
You may optionally enter a comparison operator (<b><</b>, <b><=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b><&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
<?php //$this->renderPartial('_search',array(
  //'model'=>$model,
//)); ?>
</div>  search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
  'id'=>'location-grid',
  'dataProvider'=>$model->search(),
    'type'=>'striped  condensed',
  'filter'=>$model,
//  'htmlOptions'=>array('class'=>'table table-bordered table-condensed table-hover table-striped'),
  'columns'=>array(
    //'id',
    'title',
//    'title_ar',
    array(
      'name' => 'country_id',
      'value' => '$data->country->title',
                      'filter' => Helper::getalltitles( 'Country','title'),
     ),
    //'temp1',
            array(
      'name'=>'image',
      'type'=>'html',
      'value'=>'(!empty($data->image))?CHtml::image(Yii::app()->request->baseUrl."/media/locations/".$data->image,"",array("style"=>"width:100px;height:75px;")):"no image"',
    ) ,
    array(
      'class'=>'bootstrap.widgets.TbButtonColumn',
    ),
  ),
)); ?>

