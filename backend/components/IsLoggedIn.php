<?php
/**
 * Created by PhpStorm.
 * User: mandy
 * Date: 2/24/17
 * Time: 3:01 PM
 */

namespace backend\components;


use yii\base\Behavior;
use yii\web\Application;

class IsLoggedIn extends Behavior{


   public function events(){return [
          Application::EVENT_BEFORE_REQUEST=>'changeLanguage'];
   }

    public function isLoggedIn(){
       if(\Yii::$app->getUser()->isGuest){
           echo '<script>
        alert("Login to continue");
                </script>';
       }
        else{

        }


    }
    public function changeLanguage(){
        if(\Yii::$app->getRequest()->getCookies()->has('lang')){
            \Yii::$app->language = \Yii::$app->getRequest()->getCookies()->getValue('lang');
        }
    }
}
