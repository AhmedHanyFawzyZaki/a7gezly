<?php
$this->breadcrumbs=array(
	'Car Models'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Car Models','url'=>array('index')),
	array('label'=>'Create Car Model','url'=>array('create')),
	array('label'=>'View Car Model','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Car Model "'. $model->title . '"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>