<?php
$this->breadcrumbs = array(
    'Advirtise With Uses' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List AdvirtiseWithUs', 'url' => array('index')),
//	array('label'=>'Create AdvirtiseWithUs','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('advirtise-with-us-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Advirtise With Uses'; ?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
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
    'id' => 'advirtise-with-us-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped  condensed',
    'filter' => $model,
//	'htmlOptions'=>array('class'=>'table table-bordered table-condensed table-hover table-striped'),
    'columns' => array(
        //'id',
        'name',
      //  'title',
        //	'title_ar',
        'url',
        //'email',
        /*
          'phone',
          'image',
         */
       /* array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),*/
        
             array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}{delete}',
		),
    ),
));
?>
