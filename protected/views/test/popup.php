<h1>popup window</h1>
<p>
    Open yahoo.com in a popup window (800x500) positioned 50 pixels from the
    top and left side of the screen.
</p>
<p>
    <?php
    $this->widget('ext.popup.JPopupWindow', array(
        'content' => 'open popup',
        'url' => "http://www.yahoo.com",
        'htmlOptions' => array('title' => "yahoo.com"),
        'options' => array(
            'height' => 500,
            'width' => 800,
            'top' => 50,
            'left' => 50,
        ),
        'name' => 'ss',
    ));
    ?><!-- popup -->
</p>
<p>
    Open contact form of a Yii skeleton app
</p>
<p>
    <?php
    $this->widget('ext.popup.JPopupWindow', array(
        'tagName' => 'button',
        'content' => 'open contact form',
        'url' => array('/site/contact'),
        'options' => array(
            'height' => 500,
            'width' => 800,
            'centerScreen' => 1,
        ),
        'name' => 'mypop'
    ));
    ?><!-- popup -->
</p>

<?php
$this->beginWidget('bootstrap.widgets.TbModal', array(
    'id' => 'myModal',
    'autoOpen' => true
));
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div>

<div class="modal-body">
    <p>One fine body...</p>
</div>

<div class="modal-footer">
    <?php
    $this->widget('ext.bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => 'Save changes',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
    <?php
    $this->widget('ext.bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

<?php
$this->widget('ext.bootstrap.widgets.TbButton', array(
    'label' => 'Click me',
    'type' => 'primary',
    'htmlOptions' => array(
        'data-toggle' => 'modal',
        'data-target' => '#myModal',
    ),
));
?>