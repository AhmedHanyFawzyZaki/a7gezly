<?php
$this->breadcrumbs = array(
    'Car Categories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Car Categories', 'url' => array('index')),
    array('label' => 'Create Car Category', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('car-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Car Categories'; ?>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->

<!--<div class="search-form">
    <?php
    /*$this->renderPartial('_search', array(
        'model' => $model,
    ));*/
    ?>
</div>--> <!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'car-category-grid',
    'dataProvider' => $model->search(),
    'filter'=>$model,
    //'htmlOptions' => array('class' => 'table table-bordered table-condensed table-hover table-striped'),
    'columns' => array(
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => '$data->title',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>