<?php

class RoomTypeController extends AdminController {

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
        $model = new RoomType;

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



        if (isset($_POST['RoomType'])) {
//            print_r($_POST['RoomType']);die;
            $model->attributes = $_POST['RoomType'];
            $model->gallery_id = $gallery_ob->id;
            if ($model->save()) {
                //insert room type id  & bed type id in junction table(room_bed_relation)
                if (!empty($_POST['RoomType']['roomBedRelations'])) {

                    foreach ($_POST['RoomType']['roomBedRelations'] as $bed_pref) {
                        //echo $pref .' ---- '. $model->id ; die;

                        $bed_type = new RoomBedRelation();
                        $bed_type->room_type_id = $model->id;
                        $bed_type->bed_type_id = $bed_pref;
                        $bed_type->save();
                    }
                }


                //insert room type id  & room condition id in junction table(room_condition_relation)
                if (!empty($_POST['RoomType']['roomCoditionRelations'])) {

                    foreach ($_POST['RoomType']['roomCoditionRelations'] as $condition) {
                        //echo $pref .' ---- '. $model->id ; die;

                        $room_condition = new RoomCoditionRelation();
                        $room_condition->room_type_id = $model->id;
                        $room_condition->condition_id = $condition;
                        $room_condition->save();
                    }
                }

                //insert room type id  & room option id in junction table(room_option_relation)
                if (!empty($_POST['RoomType']['roomOptionRelations'])) {

                    foreach ($_POST['RoomType']['roomOptionRelations'] as $option) {
                        //echo $pref .' ---- '. $model->id ; die;

                        $room_option = new RoomOptionRelation();
                        $room_option->room_type_id = $model->id;
                        $room_option->room_option_id = $option;
                        $room_option->save();
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

          $criteria_b = new CDbCriteria; //criteria of room bed relation
          $criteria_b->condition = 'room_type_id=' . $id;
          $room_beds = RoomBedRelation::model()->findAll($criteria_b);
          //print_r($room_beds); die;

          $criteria_c = new CDbCriteria; //criteria of room condition relation
          $criteria_c->condition = 'room_type_id=' . $id;
          $room_conditions = RoomCoditionRelation::model()->findAll($criteria_c);
           //print_r($room_conditions); die;


          $criteria_o = new CDbCriteria; //criteria of room option relation
          $criteria_o->condition = 'room_type_id=' . $id;
          $room_options = RoomOptionRelation::model()->findAll($criteria_o);

//       print_r($room_options[0]);
       
     
//echo $room_options[0]['id'] ;die;


          $arr = Null;
          if ($room_beds != Null) {

          foreach ($room_beds as $room_bed) {
          $i = 0;
          //			
          $arr[] = $room_bed->bed_type_id;
          $i++;
          }
          $model->roomBedRelations = $arr;
          }
          if ($room_conditions != Null) {
          foreach ($room_conditions as $room_condition) {
          $i = 0;
          //
          
          $arr[] = $room_condition->condition_id;
          $i++;
          }
          //$model->condition_id = $arr;
          $model->roomCoditionRelations = $arr;
          }

          

          if ($room_options != Null ) {
            //  print_r($room_options);die;
          foreach ($room_options as $room_option) {
          $i = 0;
          //			
          $arr[] = $room_option->room_option_id;
          $i++;
          }
          $model->roomOption = $arr;
          }



          if (isset($_POST['RoomType'])) {
          $model->attributes = $_POST['RoomType'];
          if ($model->save()) {

          //insert room type id  & bed type id in junction table(room_bed_relation)
          if (!empty($_POST['RoomType']['roomBedRelations'])) {
            Helper::DelAll('RoomBedRelation',$model->id);

          foreach ($_POST['RoomType']['roomBedRelations'] as $bed_pref) {
          //echo $pref .' ---- '. $model->id ; die;

          $bed_type = new RoomBedRelation();
          $bed_type->room_type_id = $model->id;
          $bed_type->bed_type_id = $bed_pref;
          $bed_type->save();
          }
          }


          //insert room type id  & room condition id in junction table(room_condition_relation)
          if (!empty($_POST['RoomType']['roomCoditionRelations'])) {
          Helper::DelAll('RoomCoditionRelation',$model->id);
          foreach ($_POST['RoomType']['roomCoditionRelations'] as $condition) {
          //echo $pref .' ---- '. $model->id ; die;

          $room_condition = new RoomCoditionRelation();
          $room_condition->room_type_id = $model->id;
          $room_condition->condition_id = $condition;
          $room_condition->save();
          }
          }

          //insert room type id  & room option id in junction table(room_option_relation)
          if (!empty($_POST['RoomType']['roomOptionRelations'])) {
          Helper::DelAll('RoomOptionRelation',$model->id);
          foreach ($_POST['RoomType']['roomOptionRelations'] as $option) {
          $room_option = new RoomOptionRelation();
          $room_option->room_type_id = $model->id;
          $room_option->room_option_id = $option;
          $room_option->save();
          }
          }





          $this->redirect(array('view', 'id' => $model->id));
          }
          }

          $gallery = Gallery::model()->findByPk($model->gallery_id);
          //         print_r($gallery);die;
          $this->render('update', array(
          'model' => $model, 'gallery' => $gallery
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
        $model = new RoomType('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['RoomType']))
            $model->attributes = $_GET['RoomType'];

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
        $model = RoomType::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'room-type-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    


}
