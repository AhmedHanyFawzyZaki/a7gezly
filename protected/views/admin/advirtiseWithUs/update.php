<?php
$this->breadcrumbs=array(
	'Advirtise With Uses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AdvirtiseWithUs','url'=>array('index')),
//	array('label'=>'Create AdvirtiseWithUs','url'=>array('create')),
	array('label'=>'View AdvirtiseWithUs','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update AdvirtiseWithUs #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>