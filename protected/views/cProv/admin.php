<?php
/* @var $this CProvController */
/* @var $model CProv */

$this->breadcrumbs=array(
	'Cprovs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CProv', 'url'=>array('index')),
	array('label'=>'Create CProv', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});

$('#exportToExcel').click(function(){
        window.location = 'index.php?' + $(this).parents('form').serialize() + '&export=true';
        return false;
    });

$('.search-form form').submit(function(){
	$('#cprov-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
/*

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cprov-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'code',
		'name',
		'zone',
		array(
			'class'=>'CButtonColumn',
		),
	),
));  */
  ?>
 



<?php $this->widget('application.components.tlbExcelView', array(
    'id'                   => 'cprov-grid',
    'dataProvider'         => $model->search(),
    'filter'               => $model,
    'grid_mode'            => $production, // Same usage as EExcelView v0.33
    'template'           => "{summary}\n{items}\n{exportbuttons}\n{pager}",
    'title'                => 'my_excel',
    'creator'              => 'Your Name',
    'subject'              => mb_convert_encoding('Something important with a date in French: ' . utf8_encode(strftime('%e %B %Y')), 'ISO-8859-1', 'UTF-8'),
    'description'          => mb_convert_encoding('Etat de production généré à la demande par l\'administrateur (some text in French).', 'ISO-8859-1', 'UTF-8'),
    'lastModifiedBy'       => 'Some Name',
    'sheetTitle'           => 'Report on ' . date('m-d-Y H-i'),
    'keywords'             => '',
    'category'             => '',
    'landscapeDisplay'     => True, // Default: false
    'A4'                   => TRUE, // Default: false - ie : Letter (PHPExcel default)
    'RTL'                  => false, // Default: false - since v1.1
    'pageFooterText'       => '&RThis is page no. &P of &N pages', // Default: '&RPage &P of &N'
    'automaticSum'         => false, // Default: false
    'decimalSeparator'     => ',', // Default: '.'
    'thousandsSeparator'   => '.', // Default: ','
    //'displayZeros'       => false,
    //'zeroPlaceholder'    => '-',
    'sumLabel'             => 'Column totals:', // Default: 'Totals'
    'borderColor'          => '000000', // Default: '000000'
    'bgColor'              => 'FFFFFF', // Default: 'FFFFFF'
    'textColor'            => '000000', // Default: '000000'
    'rowHeight'            => 15, // Default: 15
    'headerBorderColor'    => '000000', // Default: '000000'
    'headerBgColor'        => 'CCCCCC', // Default: 'CCCCCC'
    'headerTextColor'      => '000000', // Default: '000000'
    'headerHeight'         => 20, // Default: 20
    'footerBorderColor'    => '0000FF', // Default: '000000'
    'footerBgColor'        => '00FFCC', // Default: 'FFFFCC'
    'footerTextColor'      => 'FF00FF', // Default: '0000FF'
    'footerHeight'         => 20, // Default: 20
    'columns'              => array('code','name','zone',) // an array of your CGridColumns
)); ?>
