

<pre>
    <?php
    $d = $data->getData();
    $dis = array();
    $val = array();

    foreach ($d as $ds) {
        array_push($dis, $ds[disease]);
        array_push($val, intval($ds[total]));
    }
    ?>

</pre>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $data,
));
?>


<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'chart' => array(
            'type' => 'column',
            'plotBackgroundColor' => 'white',
            'plotBorderWidth' =>1,
            'plotShadow' => FALSE,
        ),
        'title' => array('text' => ''),
        'yAxis' => array(
            'title' => array('text' => 'ผู้ป่วย')
        ),
        'xAxis' => array(
            'categories' => $dis,
        ),
        'series' => array(
            // 'type' =>'pie',
            array('name' => 'ชื่อโรค', 'data' => $val),
        ),
        'tooltip' => array(
            'headerFormat' => 'โรค {point.key} จำนวน<br> ',
            'pointFormat' => '{point.y} ราย',
        ),
    )
));