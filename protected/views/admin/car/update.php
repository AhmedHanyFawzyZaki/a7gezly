<?php
$this->breadcrumbs=array(
	'Cars'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cars','url'=>array('index')),
	array('label'=>'Create Car','url'=>array('create')),
	array('label'=>'View Car','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Car "'. $model->title . '"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>