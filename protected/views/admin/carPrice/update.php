<?php
$this->breadcrumbs=array(
	'Car Prices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Packages','url'=>array('index')),
	array('label'=>'Create Package','url'=>array('create')),
	array('label'=>'View Package','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Package with price "'. $model->price . '"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>