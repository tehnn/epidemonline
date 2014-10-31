<font size="5">รายการส่ง-ยืนยัน วันนี้ <?php echo date('Y-m-d'); ?></font>
<?php

@$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped',
    'summaryText'=>'Displaying {start}-{end} of {count} results.',
    'dataProvider' => $model,
    'filter' => $filtersForm,
    'columns' => array(
        
        array(
            'name' => 'hospcode',
            'header' => 'รหัสสถานบริการ'
        ),
        array(
            'name' => 'hospname',
            'header' => 'สถานบริการ'
        ),
        array(
            'name' => 'disease',
            'header' => 'รหัสโรค'
        ),
        array(
            'name' => 'ename',
            'header' => 'ชื่อ'
        ),
        array(
            'name' => 'd_update',
            'header' => 'เวลาส่ง',            
            
        ),
        array(
            'name' => 'confirmdate',
            'header' => 'เวลายืนยัน'
        ),
         array(
            'name' => 'confirmby',
            'header' => 'ผู้ยืนยัน'
        ),
    )
));
?>
