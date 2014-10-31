<?php
Yii::app()->clientScript->registerScript('search', "
$('#export_history').click(function(){
	$('.div-history').slideToggle('slow');
	return false;
});");
?>
<div class="mypanel" style=" border:1px solid #0094ff;">
    <div class="mypanel-heading" style="background:#0094ff;color:white;" >ส่งออก 506</div>
    <div class="mypanel-body">
        <div class="form">

            <form method="POST">

                <label for="begin">E0 เริ่ม</label>
                <input type="text" name="begin" id="begin">
                <label for="end">E0 สิ้นสุด</label>
                <input type="text" name="end" id="end"><br>
                <input type="submit" name="export506" value="ส่งออก" class="btn btn-large btn-warning">
                <input type="button" id="export_history" name="export_history" value="ประวัติการส่ง" class="btn btn-large btn-primary">
                <input type="button" id="btn-reload" onclick="window.location.reload()" value="Refresh" class="btn btn-large btn-success">
            </form>

        </div>

        <div class="div-history" style="display:none;border: 1px #777 solid">
            <table class="table table-striped">
                <thead>
                    <tr><th>วัน/เวลา</th><th>E0 เริ่ม</th><th>E0 สิ้นสุด</th><th>จำนวน</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($export as $e): ?>
                        <tr>
                            <td><?php echo $e->exportdate; ?></td>
                            <td><?php echo $e->e0begin; ?></td>
                            <td><?php echo $e->e0end; ?></td>
                            <td><?php echo $e->e0count; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>

        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'type' => 'striped',
            'id' => 'epe0confirm',
            'dataProvider' => $dataProvider,
            'summaryText' => 'แสดงผล {start}-{end} จาก {count} แถว',
            'columns' => array(
                'e0','disease','name','addrcode','datesick','datedefine','datereach','datedeath','hserv','officeid'
                )
        ));
        ?>


    </div>
</div>
