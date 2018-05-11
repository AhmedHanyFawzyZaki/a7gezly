<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
    'type' => 'horizontal',
        ));
?>

<div class="control-group adv-search">
    <input id="Property_search_value" class="span5" type="text" name="Property[search_value]" maxlength="100">

    <select id="Property_search_key" class="span5" name="Property[search_key]">
        <option value="all">All</option>
        <option value="id">id</option>
        <option value="title">title</option>
    </select>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
