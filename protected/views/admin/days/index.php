<?php
$this->breadcrumbs = array(
    'Days' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Days', 'url' => array('index')),
    array('label' => 'Create Days', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('days-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Days'; ?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
<?php
// $this->renderPartial('_search',array(
//	'model'=>$model,
//)); 
?>
</div>  search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'days-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped  condensed',
    'filter' => $model,
//	'htmlOptions'=>array('class'=>'table table-bordered table-condensed table-hover table-striped'),
    'columns' => array(
        //'id',
        'title',
        //'temp1',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
