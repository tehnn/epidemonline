
<?php
/*
  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
  'id' => 'epe0-form',

  ));
 */
?>
<br>
<form method="POST">

    <?php //echo $form->errorSummary($model); ?>
    <?php echo CHtml::errorSummary($model); ?>
    <div class="form-inline">
        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'hn', array('style' => 'display:block')); ?>
            <?php echo CHtml::activeTextField($model, 'hn'); ?>
        </span>
        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'name', array('style' => 'display:block')); ?>
            <?php echo CHtml::activeTextField($model, 'name'); ?>
        </span>
        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'nmepat', array('style' => 'display:block')); ?>
            <?php echo CHtml::activeTextField($model, 'nmepat'); ?>
        </span>
        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'sex', array('style' => 'display:block')); ?>
            <?php
            $list = array(1 => '1-ชาย', 2 => '2-หญิง');
            echo CHtml::activeDropDownList($model, 'sex', $list, array(
                'empty' => '--  เพศ  --',
                
                ),
                    array('style' => 'width:90px')
                    );
            ?>
        </span>
        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'agey', array('style' => 'display:block')); ?>
            <?php echo CHtml::activeTextField($model, 'agey', array('style' => 'width:90px')); ?>
        </span>
        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'agem', array('style' => 'display:block')); ?>
            <?php echo CHtml::activeTextField($model, 'agem', array('style' => 'width:90px')); ?>
        </span>
        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'marietal', array('style' => 'display:block')); ?>
            <?php
            $list = array(1 => '1-โสด', 2 => '2-คู่', 3 => '3-หย่าร้าง', 4 => '4-หม้าย');
            echo CHtml::activeDropDownList($model, 'marietal', $list, array('empty' => '--  สถานภาพ  --'));
            ?>
        </span>  

        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'race', array('style' => 'display:block')); ?>
            <?php
            $list = array(1 => '1-ไทย', 2 => '2-คนต่างชาติ');
            echo CHtml::activeDropDownList($model, 'race', $list, array('empty' => '--  สัญชาติ  --'));
            ?>
        </span>  

        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'occupat', array('style' => 'display:block')); ?>
            <?php
            $list = CHtml::listData(COccup::model()->findAll(), 'code', 'occname');
            echo CHtml::activeDropDownList($model, 'occupat', $list, array('empty' => '--  อาชีพ  --'));
            ?>
        </span> 

        <?php echo CHtml::activeHiddenField($model, 'addrcode') ?>

        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'hospital', array('style' => 'display:block')); ?>
            <?php
            $list = CHtml::listData(CHospital::model()->findAll(), 'code', 'hos');
            echo CHtml::activeDropDownList($model, 'hospital', $list, array('empty' => '--  รักษาที่  --'));
            ?>
        </span> 

        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'type', array('style' => 'display:block')); ?>
            <?php
            $list = array(1 => '1-ผู้ป่วยนอก', 2 => '2-ผู้ป่วยใน');
            echo CHtml::activeDropDownList($model, 'type', $list, array('empty' => '--  ประเภทผู้ป่วย  --'));
            ?>
        </span>

        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'result', array('style' => 'display:block')); ?>
            <?php
            $list = array(1 => '1-หาย', 2 => '2-ตาย', 3 => '3-ยังรักษาอยู่', 4 => '4-ไม่ทราบ', 5 => '5-ยังมีชีวิตอยู่');
            echo CHtml::activeDropDownList($model, 'result', $list, array('empty' => '-- สภาพผู้ป่วย --'));
            ?>
        </span>

        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'hserv', array('style' => 'display:block')); ?>
            <?php echo CHtml::activeTextField($model, 'hserv', array('style' => '')); ?>
        </span>
        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'class', array('style' => 'display:block')); ?>
            <?php echo CHtml::activeTextField($model, 'class', array('style' => '')); ?>
        </span>

        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'school', array('style' => 'display:block')); ?>
            <?php echo CHtml::activeTextField($model, 'school'); ?>
        </span>

        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'metropol', array('style' => 'display:block')); ?>
            <?php //echo CHtml::activeTextField($model, 'metropol'); ?>
             <?php
            $list = array(1 => '1-เขตเทศบาล', 2 => '2-เขต อบต.');
            echo CHtml::activeDropDownList($model, 'metropol', $list, array('empty' => '--  ท้องที่  --'));
            ?>
        </span>
        <br>
        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'datesick', array('style' => 'display:block')); ?>
            <?php //echo CHtml::activeTextField($model, 'datesick'); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'datesick',
                'value' => $model->datesick,
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '2012:2020',
                    'minDate' => '2012-01-01', // minimum date
                    'maxDate' => '2020-12-31', // maximum date
                    'defaultDate' => $model->datesick,
                    'showButtonPanel' => true,
                    'autoSize' => true,
                ),
                'htmlOptions' => array(
                    'style' => 'height:20px;',
                ),
            ));
            ?>
        </span>

        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'datedefine', array('style' => 'display:block')); ?>
            <?php //echo CHtml::activeTextField($model, 'datesick'); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'datedefine',
                'value' => $model->datedefine,
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '2012:2020',
                    'minDate' => '2012-01-01', // minimum date
                    'maxDate' => '2020-12-31', // maximum date
                    'defaultDate' => $model->datedefine,
                    'showButtonPanel' => true,
                    'autoSize' => true,
                ),
                'htmlOptions' => array(
                    'style' => 'height:20px;',
                ),
            ));
            ?>
        </span>

        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'datedeath', array('style' => 'display:block')); ?>
            <?php //echo CHtml::activeTextField($model, 'datesick'); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'datedeath',
                'value' => $model->datedeath,
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '2012:2020',
                    'minDate' => '2012-01-01', // minimum date
                    'maxDate' => '2020-12-31', // maximum date
                    'defaultDate' => $model->datedeath,
                    'showButtonPanel' => true,
                    'autoSize' => true,
                ),
                'htmlOptions' => array(
                    'style' => 'height:20px;',
                ),
            ));
            ?>
        </span>
        
         <span style="display:inline-block">
             
             <?php echo CHtml::activeLabel($model, 'daterecord', array('style' => 'display:block')); ?>
             <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'daterecord',
                'value' => $model->daterecord,
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '2012:2020',
                    'minDate' => '2012-01-01', // minimum date
                    'maxDate' => '2020-12-31', // maximum date
                    'defaultDate' => $model->daterecord,
                    'showButtonPanel' => true,
                    'autoSize' => true,
                ),
                'htmlOptions' => array(
                    'style' => 'height:20px;',
                ),
            ));
            ?>
             
         </span>
        
           <span style="display:inline-block">
             
             <?php echo CHtml::activeLabel($model, 'datereach', array('style' => 'display:block')); ?>
            <?php echo CHtml::activeTextField($model, 'datereach',array('disabled'=>'true')); ?>
             
         </span>
        
        
        <br>
        <span style="display:inline-block">
            <?php echo CHtml::activeLabel($model, 'address', array('style' => 'display:block')); ?>
            <?php echo CHtml::activeTextField($model, 'address'); ?>
        </span>
        <span style="display:inline-block">
            <?php
            echo CHtml::activeLabel($model, 'prov', array('style' => 'display:block'));
            $list = CHtml::listData(CProv::model()->findAll(), 'code', 'name');
            echo CHtml::activeDropDownList($model, 'prov', $list, array(
                'empty' => '--  จังหวัด  --',
                'onchange' => "return ajxLoadAmp(this.value)"
            ));
            ?>
        </span>
        <span style="display:inline-block">
            <?php
            echo CHtml::activeLabel($model, 'amp', array('style' => 'display:block'));
            $list = CHtml::listData(CAmp::model()->findAll(array('condition' => "prov = '$model->prov'")), 'code', 'name');
            echo CHtml::activeDropDownList($model, 'amp', $list, array(
                'empty' => '--  อำเภอ  --',
                'onchange' => "return ajxLoadTmb(this.value)"
            ));
            ?>
        </span>

        <span style="display:inline-block">
            <?php
            echo CHtml::activeLabel($model, 'tmb', array('style' => 'display:block'));
            $list = CHtml::listData(CTmb::model()->findAll(array('condition' => "amp = '$model->amp'")), 'code', 'name');
            echo CHtml::activeDropDownList($model, 'tmb', $list, array(
                'empty' => '--  ตำบล  --',
                'onchange' => "return ajxLoadVill(this.value)"
            ));
            ?>
        </span>

        <span style="display:inline-block">
            <?php
            echo CHtml::activeLabel($model, 'vill', array('style' => 'display:block'));
            $list = CHtml::listData(CVill::model()->findAll(array('condition' => "code like '$model->tmb%'")), 'code', 'villname');
            echo CHtml::activeDropDownList($model, 'vill', $list, array(
                'empty' => '--  หมู่บ้าน  --',
                'onchange' => "return assignVill(this.value)"
            ));
            ?>
        </span>



    </div>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? 'เพิ่มข้อมูล' : 'บันทึกแก้ไข',
        ));
        ?>

        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'link',
            'type' => 'warning',
            'label' => 'ยกเลิก',
            'url' => CHttpRequest::getUrlReferrer(),
        ));
        ?>
    </div>

</form>

