<?php
$this->breadcrumbs=array(
	'Drivers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Drivers','url'=>array('index')),
	array('label'=>'Create Driver','url'=>array('create')),
	array('label'=>'View Driver','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Driver "'. $model->full_name . '"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>