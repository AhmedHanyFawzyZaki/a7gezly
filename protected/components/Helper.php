<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2013
 */
class Helper {

    public static function PlayVideo($model) {
        $player = Yii::app()->controller->widget('ext.Yiitube', array('v' => $model->video, 'size' => 'small'));


        return '<div class="VideoPlay">' . $player->play() . '</div>';
    }

    public static function yiiparam($name, $default = null) {
        if (isset(Yii::app()->params[$name]))
            return Yii::app()->params[$name];
        else
            return $default;
    }

    public static function DrawPageLink($page_id) {
        $page = Pages::model()->findByPk($page_id);
        if ($page === null) {
            return 'Not-Found';
        }

        return 'home/page/view/' . $page->url;
    }

    public static function GenerateRandomKey($length = 10) {

        $chars = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        shuffle($chars);
        $password = implode(array_slice($chars, 0, $length));

        return $password;
    }

    public static function getGalleryImages($gallery_id) {

        $criteria = new CDbCriteria();

        $criteria->condition = 'gallery_id=:UID';

        $criteria->params = array(':UID' => $gallery_id);
        $criteria->order = 'rank';

        $gallery = GalleryPhoto::model()->findAll($criteria);

        return $gallery;
    }

    public static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    public static function string2url($string, $separator = "-") {
        $str_elements = explode(" ", $string);
        $excludes = array(" ", "!", "@", "#", "$", "%", "^", "&", "*", "/", "?", "-", "_", ",", "+", "~", "", ">", "<");
        $new_elements = array();
        foreach($str_elements as $e)
        {
            $new_elements[] = str_replace($excludes, $separator, $e);
        }
        $new_string = trim(implode($separator, $new_elements),"-");

        return $new_string;
    }

    public static function active_admin($controller_id) {
        if (Yii::app()->controller->id == $controller_id) {
            return 'active';
        }
        return '';
    }

    public static function DelAll($model_name, $item_id) {
         $criteria = new CDbCriteria;
        $criteria->condition = 'room_type_id=' . $item_id;
        $model = new $model_name;
        $model->deleteAll($criteria);
    }

    public static function DelAlltriproomcon($model_name, $item_id) {
         $criteria = new CDbCriteria;
        $criteria->condition = 'trip_id=' . $item_id;
        $model = new $model_name;
        $model->deleteAll($criteria);
    }

    public static function getphoto($gallery_id) {
        $criteria = new CDbCriteria;
        $criteria->condition = "gallery_id=:G_id ";
        $criteria->params = array(':G_id' => $gallery_id);
        $photo = GalleryPhoto::model()->find($criteria);
        return $photo;
    }

    public static function getalltitles($model_name,$field) {
        $command = Yii::app()->db->createCommand();
        $model = $command->select('*')->from(strtolower($model_name))->queryAll();
        return CHtml::listData($model, 'id', $field);
    }
    
     public static function t($keyword = NULL, $data = array()) {
        if ($keyword) {
            $key = Keyword::model()->findByAttributes(array('title' => $keyword));
            

            if (!$key) {
                //in development mode to record the keywords easily
                $model = new Keyword;
                $model->title = $keyword;
                
                foreach (Yii::app()->params['languages'] as $lang => $title) {
                    if ($lang != Yii::app()->params['default_language']) {
                        $attr = 'title_' . $lang;
                        $model->$attr = $keyword . '_' . $lang;
                        
                    }
                }
                $model->save();
                if (Yii::app()->language != Yii::app()->params['default_language'])
                    $attr = 'title_' . Yii::app()->language;
                else
                    $attr = 'title';
                $string = $model->$attr;
                foreach ($data as $key => $value) {
                    $string = str_replace('{' . $key . '}', $value, $string);
                }
                return $string;

                //return $keyword;
            }

            $string = $key->title;
            foreach ($data as $key => $value) {
                $string = str_replace('{' . $key . '}', $value, $string);
            }
            return $string;
        }
    }

}

?>