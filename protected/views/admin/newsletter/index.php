<?php
$this->breadcrumbs = array(
    'Newsletters' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Newsletter', 'url' => array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('newsletter-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Newsletters</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'newsletter-grid',
    'type' => 'striped  condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'email',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}{view}'
        ),
    ),
));
?>
