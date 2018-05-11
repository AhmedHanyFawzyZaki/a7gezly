<div class="search-inputs form-inline">
        <?php
    $model = new Trip;
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'trip-form',
        'enableAjaxValidation' => false,
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'form-inline no_margin rtl'),
        'action' => array('home/search'),
    ));
    ?>
    <div class="row-fluid">
                <?php echo $form->textField($model, 'title', array('class' => 'x span3', 'placeholder' => Helper::t('ابحث فى رحلاتنا واختار رحلتك'))); ?>
                 <?php
        echo $form->dropDownList($model, 'location_id', CHtml::listData(Location::model()->findAll(), 'id', 'title'), array('prompt' => Helper::t('اختر المدينة'),
            'class' => 'form-control span2',
                )
        );
        ?>
           <?php
        $model2 = new Hotels;
        echo $form->dropDownList($model2, 'level_id', HotelsLevel::getlevels(), array('class' => 'form-control span2',
            'prompt' => Helper::t('مستوى الفندق')));
        ?>
              <?php
        echo $form->dropDownList($model, 'days_id', CHtml::listData(Days::model()->findAll(), 'id', 'title'), array('prompt' => Helper::t(' الايام'),
            'class' => 'form-control span2',
                )
        );
        ?>
         <?php
        echo $form->dropDownList($model, 'price_range_id', CHtml::listData(PriceRange::model()->findAll(), 'id', 'title'), array('prompt' => Helper::t('اختر السعر'),
            'class' => 'form-control span2',
                )
        );
        ?>
             <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => Helper::t('ابحث'),
            'htmlOptions' => array('class' => 'btn btn-default our-btn-sty'),
        ));
        ?>

    </div>
      <?php $this->endWidget(); ?>
</div><!--End search-->