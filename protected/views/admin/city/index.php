<?php
$this->breadcrumbs = array(
    'Cities' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Cities', 'url' => array('index')),
    array('label' => 'Create City', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('city-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = 'Manage Cities'; ?>

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
    'id' => 'city-grid',
    'dataProvider' => $model->search(),
    'filter'=>$model,
    //'htmlOptions' => array('class' => 'table table-bordered table-condensed table-hover table-striped'),
    'columns' => array(
        'title',
        array(
            'name' => 'country_id',
            'type' => 'raw',
            'filter' => CHtml::listData(Country::model()->findall(), 'id', 'title'),
            'value' => '$data->country->title',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>