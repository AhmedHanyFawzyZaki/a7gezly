<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
    'type' => 'horizontal',
        ));
?>

<div class="control-group adv-search">
    <input id="Pages_search_value" class="span5" type="text" name="Pages[search_value]" maxlength="100">

    <select id="Pages_search_key" class="span5" name="Pages[search_key]">
        <option value="all">All</option>
        <option value="id"><?php echo CHtml::activeLabel($model, 'id'); ?></option>
        <option value="title"><?php echo CHtml::activeLabel($model, 'title'); ?></option>
        <!--<option value="title_ar"><?php // echo CHtml::activeLabel($model, 'title_ar'); ?></option>-->
        <option value="url"><?php echo CHtml::activeLabel($model, 'url'); ?></option>
        <option value="intro"><?php echo CHtml::activeLabel($model, 'intro'); ?></option>
        <!--<option value="intro_ar"><?php // echo CHtml::activeLabel($model, 'intro_ar'); ?></option>-->
        <option value="details"><?php echo CHtml::activeLabel($model, 'details'); ?></option>
        <!--<option value="details_ar"><?php // echo CHtml::activeLabel($model, 'details_ar'); ?></option>-->
        <option value="image"><?php echo CHtml::activeLabel($model, 'image'); ?></option>
        <option value="video"><?php echo CHtml::activeLabel($model, 'video'); ?></option>
        <option value="publish"><?php echo CHtml::activeLabel($model, 'publish'); ?></option>
        <option value="meta_author"><?php echo CHtml::activeLabel($model, 'meta_author'); ?></option>
        <option value="meta_keywords"><?php echo CHtml::activeLabel($model, 'meta_keywords'); ?></option>
        <option value="meta_desc"><?php echo CHtml::activeLabel($model, 'meta_desc'); ?></option>
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
