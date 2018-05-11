<?php
$this->breadcrumbs=array(
  'Hotels'=>array('index'),
  $model->title=>array('view','id'=>$model->id),
  'Update',
);

$this->menu=array(
  array('label'=>'List Hotels','url'=>array('index')),
  array('label'=>'Create Hotels','url'=>array('create')),
  array('label'=>'View Hotels','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Hotels #'. $model->title; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>