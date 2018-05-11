<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">
       ">
        <link rel="stylesheet" href="assets/magic/magic.css"> -->
        
        
       <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" />

		
         <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>

        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login.css">

        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Font-awesome/css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="container">
            <div class="text-center">
               <img src="<?=Yii::app()->request->baseUrl?>/img/logo.png" alt="Ukprosolutions" />
            </div>
            <div class="tab-content">
                <div id="login" class="tab-pane active">
                  <!--  <form action="index.html" class="form-signin">-->
                      <div class="form-signin">
            <?php /** @var BootActiveForm $form */
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'login',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
                
                ));
             ?>
                      
                <p class="muted text-center">
                    Enter your username and password
                </p>
             <?php echo $form->textFieldRow($model, 'username' , array('class'=>'input-block-level', 'placeholder'=>'user name')); ?>
             <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'input-block-level' , 'placeholder'=>'password') ); ?>
        
     <button class="btn btn-large btn-primary btn-block" type="submit">Sign In</button>
           <?php $this->endWidget(); ?>
                    
                </div>
                </div>
 
            </div>
<!--            <div class="text-center">
                <ul class="inline">
                    <li><a class="muted" href="#login" data-toggle="tab">Login</a></li>
                    <li><a class="muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
                    <li><a class="muted" href="#signup" data-toggle="tab">Signup</a></li>
                </ul>
            </div>-->


        </div> <!-- /container -->

       
    </body>
</html>
