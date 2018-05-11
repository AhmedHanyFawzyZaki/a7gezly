<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
    'type' => 'horizontal',
        ));
?>

<div class="control-group adv-search">
    <input id="AdvirtiseWithUs_search_value" class="span5" type="text" name="AdvirtiseWithUs[search_value]" maxlength="100">

    <select id="AdvirtiseWithUs_search_key" class="span5" name="AdvirtiseWithUs[search_key]">
        <option value="all">All</option>
        <option value="id">id</option>
        <option value="title">title</option>
        <option value="title_ar">title_ar</option>
        <option value="url">url</option>
        <option value="name">name</option>
        <option value="email">email</option>
        <option value="phone">phone</option>
        <option value="image">image</option>
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
