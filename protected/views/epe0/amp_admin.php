<div class="mypanel" style=" border:1px solid #0094ff;">
    <div class="mypanel-heading" style="background:#0094ff;color:white;" >จำนวนผู้ป่วย</div>
    <div class="mypanel-body">
        
    
        <?php
        
        //$data = $dataProvider->getData();
        $this->widget('bootstrap.widgets.TbGridView', array(
            'type'=>'striped',
            'dataProvider' => $dataProvider,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            'columns' => array(
                array(
                    'name' => 'code',
                    'header' => 'รหัส',
                ),
                array(
                    'name' => 'name',
                    'header' => 'อำเภอ',
                    'value' => 'CHtml::link($data["name"], Yii::app()->createUrl("Epe0/Hospadmin",array("a"=>$data["code"])))',
                    'type' => 'raw',
                ),
                array(
                    'name' => 'total1',
                    'header' => 'รอยืนยัน',
                     'value' => 'CHtml::link($data["total1"], Yii::app()->createUrl("Epe0/Admin",array("a"=>$data["code"],"confirm"=>"n")))',
                    'type' => 'raw',
                ),
                array(
                    'name' => 'total2',
                    'header' => 'ยืนยันแล้ว',
                      'value' => 'CHtml::link($data["total2"], Yii::app()->createUrl("Epe0/Admin",array("a"=>$data["code"],"confirm"=>"y")))',
                    'type' => 'raw',
                ),
                array(
                    'name' => 'total3',
                    'header' => 'ถูกลบแล้ว',
                ),
                array(
                    'name' => 'total4',
                    'header' => 'รวมทั้งหมด',
                    //'value' => 'CHtml::link($data->total4, Yii::app()->createUrl("customer/view/",array("amp"=>$data->code)))',
                    'type' => 'raw',
                ),
            )
        ));
        ?>
    </div>
</div>
