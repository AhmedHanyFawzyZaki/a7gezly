<?php
$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Keyword','url'=>array('index')),
	array('label'=>'Create Keyword','url'=>array('create')),
	array('label'=>'View Keyword','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Keyword # '. $model->title; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>