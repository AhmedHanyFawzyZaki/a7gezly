<?php
$this->breadcrumbs = array(
    'Hotels' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Hotels', 'url' => array('index')),
    array('label' => 'Create Hotels', 'url' => array('create')),
    array('label' => 'Update Hotels', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Hotels', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View Hotels # ' . $model->title; ?>
<div style="margin-top: 15px;margin-bottom: 15px;">
    <label class="control-label">Location On Map</label>
    <div class="controls">
        <?php
        Yii::import('ext.gmap.*');
        $gMap = new EGMap();
        $gMap->setWidth(700);
        $gMap->setHeight(300);
        $gMap->zoom = 6;
        $mapTypeControlOptions = array(
            'position' => EGMapControlPosition::RIGHT_TOP,
            'style' => EGMap::MAPTYPECONTROL_STYLE_HORIZONTAL_BAR
        );

        $gMap->mapTypeId = EGMap::TYPE_ROADMAP;
        $gMap->mapTypeControlOptions = $mapTypeControlOptions;
        $gMap->zoomControl = EGMap::ZOOMCONTROL_STYLE_SMALL;
        $gMap->streetViewControl = false;
        $gMap->minZoom = 2;

        $gMap->htmlOptions = array(
            'class' => 'map'
        );

// Preparing InfoWindow with information about our marker.
        $info_window_a = new EGMapInfoWindow("<div class='gmaps-label' style='color: #000;'>Hi! I'm your marker!</div>");

// Setting up an icon for marker.
// If we have already created marker - show it
        if ($model->longitude && $model->latitude) {

            $marker = new EGMapMarker($model->latitude, $model->longitude, array('title' => $model->title,
                'draggable' => false), 'marker');
            $marker->addHtmlInfoWindow($info_window_a);
            $gMap->addMarker($marker);
            $gMap->setCenter($model->latitude, $model->longitude);
            $gMap->zoom = 8;
        }
        $gMap->renderMap(array(), Yii::app()->language);
        ?>
    </div>
</div>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'label' => 'Arabic Title',
            'name' => 'title'
        ),
        array(
            'label' => 'English Title',
            'name' => 'title_en'
        ),
        array(
            'label' => 'Arabic Details',
            'name' => 'desc',
            'type' => 'raw',
        ),
        array(
            'label' => 'English Details',
            'name' => 'desc_en',
            'type' => 'raw',
        ),
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->baseUrl . '/media/hotels/' . $model->image, $model->title, array('width' => 150)),
        ),
//        array(
//            'name' => 'map',
//            'type' => 'raw',
//            'value' => CHtml::link('Show map', CHtml::normalizeUrl($model->map), array('target' => '_blank')),
////                 'value'=> CHtml::normalizeUrl($model->video),
//        ),
        array(
            'name' => 'video',
            'type' => 'raw',
            'value' => CHtml::link('Show video', CHtml::normalizeUrl($model->video), array('target' => '_blank')),
//                 'value'=> CHtml::normalizeUrl($model->video),
        ),
        //'level_id',
        array(
            'name' => 'hotels_level',
            'value' => $model->level->title,
            'type' => 'raw',
        ),
    ),
));
?>

