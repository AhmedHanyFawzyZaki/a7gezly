<?php

class TripController extends AdminController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
                /* 'accessControl', // perform access control for CRUD operations */
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Trip;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);


        $gallery_ob = new Gallery();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $gallery_ob->name = true;
        $gallery_ob->description = true;
        $gallery_ob->versions = array(
            'small' => array(
                'resize' => array(200, null),
            ),
            'medium' => array(
                'resize' => array(800, null),
            )
        );
        $gallery_ob->save();

        if (isset($_POST['Trip'])) {
            $model->attributes = $_POST['Trip'];
            $model->gallery_id = $gallery_ob->id;
            $model->url = Helper::slugify($model->title);
            if ($model->save()) {


                if (!empty($_POST['Trip']['roomType'])) {


                    foreach ($_POST['Trip']['roomType'] as $roomType) {

                        if (!empty($_POST['Trip']['roomCondition_' . $roomType])) {
                            //insert condition id  &trip id in junction table(trip_room_codition_relation)
                            foreach ($_POST['Trip']['roomCondition_' . $roomType] as $roomCondition) {
                                $tripRel = new TripRoomCoditionRelation();
                                $tripRel->trip_id = $model->id;
                                $tripRel->room_type_id = $roomType;
                                $tripRel->condition_id = $roomCondition;
                                $tripRel->save();
                            }
                        }
                    }
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);


        $criteria = new CDbCriteria;
        $criteria->condition = 'trip_id=' . $id;
        $room_type = TripRoomCoditionRelation::model()->findAll($criteria);



        foreach ($room_type as $tr) {
            $arr2[$tr->room_type_id][] = $tr->condition_id;
            $arr[] = $tr->room_type_id;
        }
        $model->tripRoomCoditionRelations = $arr;
        if (isset($_POST['Trip'])) {
            $model->attributes = $_POST['Trip'];
            $model->url = Helper::slugify($model->title);
            if ($model->save()) {

                if (!empty($_POST['Trip']['roomType'])) {
                    Helper::DelAlltriproomcon('TripRoomCoditionRelation', $model->id);
                    foreach ($_POST['Trip']['roomType'] as $roomType) {

                        if (!empty($_POST['Trip']['roomCondition_' . $roomType])) {
                            //insert condition id  &trip id in junction table(trip_room_codition_relation)
                            foreach ($_POST['Trip']['roomCondition_' . $roomType] as $roomCondition) {
                                $tripRel = new TripRoomCoditionRelation();
                                $tripRel->trip_id = $model->id;
                                $tripRel->room_type_id = $roomType;
                                $tripRel->condition_id = $roomCondition;
                                $tripRel->save();
                            }
                        }
                    }
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $gallery = Gallery::model()->findByPk($model->gallery_id);


        if (isset($_POST['Trip'])) {
            $model->attributes = $_POST['Trip'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $gallery = Gallery::model()->findByPk($model->gallery_id);
        $this->render('update', array(
            'model' => $model, 'gallery' => $gallery, 'arr2' => $arr2
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Trip('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Trip']))
            $model->attributes = $_GET['Trip'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Trip::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'trip-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGetRooms() {///
        $hotel_id = $_POST['hotel_id'];
        $isupdate = $_POST['update'];
        $arr = json_decode($_POST['selected']);
        $rom[] = null;
        $romCon[][] = null;
        if (!empty($arr)) {
            foreach ($arr as $index => $r) {

                $rom[] = $index;
                $romCon[$index][] = $r;
            }
        }

        $criteria = new CDbCriteria;
        $criteria->condition = 'hotel_id=:hotel_id';
        $criteria->params = array(':hotel_id' => $hotel_id);
        $criteria->order = 'id DESC';
        $rooms = RoomType::model()->findAll($criteria);

        $i = 0;
        foreach ($rooms as $room) {

            $criteria1 = new CDbCriteria;
            $criteria1->condition = 'room_type_id=' . $room->id;
            $conditions = RoomCoditionRelation::model()->findAll($criteria1);

            $str1 = '';
                if (in_array($room->id, $rom)) {
                    $str1 = 'checked';
                }
            $List.='<label class="checkbox">
 		   <input id="room_' . $room->id . '"type="checkbox" ' . $str1 . ' name="Trip[roomType][]" value="' . $room->id . '"  onclick="check_all(' . $room->id . ')"  >
 		  
                        <a href="#' . $room->id . '" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                        ' . $room->title . '
                        </a>
 		   </label>';
            $collapse = '';
            if ($isupdate) {
                $collapse = '-in';
            }

            $List.='<div class="accordion-body collapse' . $collapse . '" id="' . $room->id . '" style="height: auto;">';
            foreach ($conditions as $condition) {

                $criteria_condition = new CDbCriteria;
                $criteria_condition->condition = 'id=' . $condition->condition_id;
                $room_condition_string = RoomCondition::model()->find($criteria_condition);

                if (count($conditions) <= 0) {
                    echo 'No conditions ';
                }

                if (in_array($room->id, $rom)) {
                    foreach ($romCon[$room->id][0] as $roomcon) {

                        $arr2[] = $roomcon;
                    }
                }
                $str2 = '';
                if (!empty($arr2)) {
                    if (in_array($condition->id, $arr2)) {
                        $str2 = 'checked';
                    }
                }
                $List.= '  <div class="accordion-inner" >
                              <label class="checkbox">
                                <input type="checkbox" ' . $str2 . ' class="roomm_' . $room->id . '" value="' . $condition->id . '" name="Trip[roomCondition_' . $room->id . '][]">
                               ' . $room_condition_string->condition . ' 
                               </label>
                            </div>';
            }
            $List.= '</div>';

            $i++;
        }
        echo $List;
        if (count($rooms) <= 0) {
            echo 'No rooms available ';
        }
    }

}