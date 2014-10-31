<?php
//print_r($data);
$arr_mon = array('ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.','มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.');
?>
<?php echo CHtml::beginForm('', 'POST', array('id' => 'formdis')); ?>

<?php
$list = CHtml::listData(CDisease::model()->findAll(), 'code', 'disname');
echo CHtml::dropDownList('disease', $disease, $list, array('empty' => '-- เลือกโรค --', 'onchange' => 'return getdis(this.value)'));
?>
<?php
if(!empty($data)):
?>
<?php echo CHtml::endForm(); ?>


<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
    'options' => array(
        'colors' => array('#673DD2'),
        'credits' => array('enabled' => false),
        'chart' => array(
            'type' => 'line'
        ),
        'title' => array('text' => 'โรค ' . $dname),
        'xAxis' => array(
            'categories' => $arr_mon,
        ),
        'yAxis' => array(
            'title' => array('text' => 'ผู้ป่วย(ราย)'),
            'min' => 0
        ),
        'series' => array(
            array(
                'name' => $dname,
                'data' => $data
            )
        ),
        'plotOptions' => array(
            'line' => array(
                'dataLabels' => array('enabled' => TRUE),
                //'enableMouseTracking' => FALSE
            )
        )
    )
));
?>
<div style="padding-bottom: 20px"></div>
<?php if(isset($data)): ?>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <td>เดือน</td>
            <?php foreach ($arr_mon as $mon): ?>
                <td><?php echo $mon; ?></td>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ผู้ป่วย(ราย)</td>
            <?php
            foreach ($data as $td) {
                echo "<td>$td</td>";
            }
            ?>
        </tr>
    </tbody>
</table>
<?php endif;?>

<?php
    endif;
?>
