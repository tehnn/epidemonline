<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('epe0-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<div class="mypanel" style=" border:1px solid #0094ff;">
    <div class="mypanel-heading" style="background:#0094ff;color:white;" >รายการผู้ป่วย</div>
    <div class="mypanel-body">

        <?php
        //echo "test";
        //echo $hospamp;
        ?>

        <?php //echo CHtml::link('ค้นหา', '#', array('class' => 'search-button btn')); ?>
        <?php //echo CHtml::link('Export', array('exportcsv'),array('id' => 'export-button', 'class' => 'btn')); ?>
        <div class="search-form" style="display:none">
            <?php
            $this->renderPartial('_search', array(
                'model' => $model,
            ));
            ?>


        </div><!-- search-form -->
        <style>
            .notices {
                background: navajowhite;
               
            }
        </style>

        <?php
        //$this->widget('zii.widgets.grid.CGridView', array(
        $this->widget('bootstrap.widgets.TbGridView', array(
            'type'=>'striped',
            'id' => 'epe0-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'summaryText' => 'แสดงผล {start}-{end} จาก {count} แถว',
            //'template' => "{pager}\n{summary}\n{items}\n{pager}",
            //'itemsCssClass' => 'table',
            'rowCssClassExpression' =>'$data->isconfirm=="y"?"notices":""',
            'columns' => array(
                /*
                  'id',
                  'pid',
              
                  'e1',
                  'pe0',
                  'pe1',
                 * 
                 */
                array(
                    'name' => 'hospname_search',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->relate2chospcode->hospname)',
                    'htmlOptions' => array('style' => 'width:100px'),
                //'filter'=>false,
                //'filter' => CHtml::listData($model, 'hospcode', 'hospname'),
                ),
                'hn',
                array(
                    'name' => 'disease',
                    'filter' => CHtml::listData(CDisease::model()->findAll(), 'code', 'disname'),
                    'htmlOptions' => array('style' => 'width:70px'),
                ),
                array(
                    'name' => 'name',
                    'value' => 'CHtml::link($data->name, Yii::app()->createUrl("Epe0/Update",array("id"=>$data->id)))',
                    'type' => 'raw',
                    'htmlOptions' => array('style' => 'width:160px'),
                ),
                //'hn',
                //'nmepat',
                array(
                    'name' => 'sex',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->relate2csex->sex)',
                    'htmlOptions' => array('style' => 'width:62px'),
                    'filter' => CHtml::listData(CSex::model()->findAll(), 'code', 'desc'),
                ),
                //'agey',
                //'agem',
                //'aged',
                //'marietal',
                //'race',
                //'race1',
                //'occupat',
                //'address',
                //'addrcode',
                //'metropol',
                //'hospital',
                //'type',
                //'result',
                //'hserv',
                //'class',
                //'school',
                array(
                    'name' => 'datesick',
                    'htmlOptions' => array('style' => 'width:90px'),
                ),
                array(
                    'name' => 'datedefine',
                    'htmlOptions' => array('style' => 'width:90px'),
                ),
                array(
                    'name' => 'datedeath',
                    'htmlOptions' => array('style' => 'width:90px'),
                ),
                //'daterecord',
                //'datereach',
                //'intime',
                //'organism',
                //'complica',
                //'idcard',
                //'icd10',
                //'officeid',
                //'latitude',
                //'longitude',
                //'moo',
                //'village_name',
                //'r506name',
                //'seq',
                //'provider',
                array(
                    'name' => 'isconfirm',
                    'filter' => CHtml::listData(CYesno::model()->findAll(), 'code', 'name'),
                    'htmlOptions' => array('style' => 'width:80px'),
                ),
                //'confirmby',
                //'confirmdate',
                //'is507',
                //'export506date',
                //'exportsurveildate',
                //'isdelete',
                //'hospamp',
                array(
                    'name' => 'prov',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->relate2cprov->name)',
                    'htmlOptions' => array('style' => 'width:100px'),
                    'filter' => false,
                //'filter' => CHtml::listData(CProv::model()->findAll(), 'code', 'provname'),
                ),
                array(
                    'name' => 'amp',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->relate2camp->name)',
                    'filter' => false,
                ),
                array(
                    'name' => 'tmb',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->relate2ctmb->name)',
                    'filter' => false,
                ),
                array(
                    'name' => 'vill',
                    'type' => 'raw',
                    'value' => 'CHtml::encode(substr($data->vill,6,2))',
                    'filter' => false,
                ),
            // array( 'class' => 'bootstrap.widgets.TbButtonColumn',),
            ),
        ));
        ?>



    </div>
</div>
