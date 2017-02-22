<?php
/**
 * Created by PhpStorm.
 * User: mandy
 * Date: 2/22/17
 * Time: 2:15 PM
 */


namespace backend\components;

use Yii;
use yii\base\Component;


class MyComponent extends Component{

    public function hello(){
        echo 'This is the hello component';
    }
}