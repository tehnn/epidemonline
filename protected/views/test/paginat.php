<?php
$this->widget('CLinkPager', array(
    'pages' => $pages,
    'header' => "<div class='pagination-right'>",
));
?>
<div style="margin: 10px"></div>
<table class='table table-bordered table-striped'>
    <thead>
    <th><?php echo $sort->link('code','รหัสโรค')?></th>
    <th><?php echo $sort->link('disease','ชื่อโรค')?></th>
</thead>
<tbody>
    <?php foreach ($model as $m): ?>
        <tr>
            <td><?php echo $m->code; ?></td>
            <td><?php echo $m->disease; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>

