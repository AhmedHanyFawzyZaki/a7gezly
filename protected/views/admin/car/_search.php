<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
    'type' => 'horizontal',
        ));
?>

<div class="control-group adv-search">
    <input id="Car_search_value" class="span5" type="text" name="Car[search_value]" maxlength="100">

    <select id="Car_search_key" class="span5" name="Car[search_key]">
        <option value="all">All</option>
        <option value="id">id</option>
        <option value="title">title</option>
        <option value="age">age</option>
        <option value="power">power</option>
        <option value="price_per_day">price_per_day</option>
        <option value="model_id">model_id</option>
        <option value="category_id">category_id</option>
        <option value="mileage">mileage</option>
        <option value="price_includes">price_includes</option>
        <option value="price_excludes">price_excludes</option>
        <option value="driving_type">driving_type</option>
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
