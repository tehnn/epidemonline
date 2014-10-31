<?php
/* @var $this CProvController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cprovs',
);

$this->menu=array(
	array('label'=>'Create CProv', 'url'=>array('create')),
	array('label'=>'Manage CProv', 'url'=>array('admin')),
);
?>

<h1>Cprovs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
