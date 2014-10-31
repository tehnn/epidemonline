<?php
/* @var $this CProvController */
/* @var $model CProv */

$this->breadcrumbs=array(
	'Cprovs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CProv', 'url'=>array('index')),
	array('label'=>'Create CProv', 'url'=>array('create')),
	array('label'=>'Update CProv', 'url'=>array('update', 'id'=>$model->code)),
	array('label'=>'Delete CProv', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CProv', 'url'=>array('admin')),
);
?>

<h1>View CProv #<?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code',
		'name',
		'zone',
	),
)); ?>
