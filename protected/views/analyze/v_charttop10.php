<?php

$d = $data->getData();
$dis = array();
$val = array();
foreach ($d as $ds) {
    array_push($dis, $ds['disease']);
    array_push($val, intval($ds['total']));
}
?>

<?php

$this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'colors' => array('#673DD2'),
        'credits' => array('enabled' => false),
        'chart' => array(
            'type' => 'column',
            'plotBackgroundColor' => 'white',
            'plotBorderWidth' => 1,
            'plotShadow' => FALSE,
        ),
        'title' => array('text' => 'จำนวนผู้ป่วย 10 อันดับโรค'),
        'subtitle' => array('text' => 'ข้อมูลตั้งแต่ 1 ก.ย.57 - ปัจจุบัน'),
        'yAxis' => array(
            'title' => array('text' => 'ผู้ป่วย(ราย)'),
            'min' => 0
        ),
        'xAxis' => array(
            'categories' => $dis,
        ),
        'series' => array(
            array(
                'name' => 'ชื่อโรค',
                'data' => $val,
            )
        ),
        'tooltip' => array(
            'headerFormat' => 'โรค {point.key} จำนวน<br> ',
            'pointFormat' => '{point.y} ราย',
        ),
    )
));
?>

<?php

//$this->widget('zii.widgets.grid.CGridView', array(
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered',
    //'summaryText' => 'แสดงผล {start}-{end} จาก {count} แถว',
    'summaryText' => '',
    'dataProvider' => $data,
    'columns' => array(
        array(
            'name' => 'disease',
            'header' => 'โรค'
        ),
        array(
            'name' => 'total',
            'header' => 'จำนวนผู้ป่วย (ราย)'
        )
    )
));
?>
