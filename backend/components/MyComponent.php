<?php
/**
 * Created by PhpStorm.
 * User: mandy
 * Date: 2/22/17
 * Time: 2:15 PM
 */


namespace backend\components;

use Google\Cloud\Translate\TranslateClient;
use Yii;
use yii\base\Component;


class MyComponent extends Component{

    public function hello(){
        echo 'This is the hello component';
    }

    public function translate(){
        $text = "Hello";
        $targetLanguage = 'en';
        $projectId = 'MY_PROJECT_ID';

        $translate = new TranslateClient([
            'projectId' => $projectId
        ]);
        $result = $translate->translate($text, [
            'target' => $targetLanguage
        ]);

        echo $result;


    }

    public function time(){
        $timestamp = time();
        $returnType = 'php';
        $timezone = 'Los_Angeles';
        $requestUri = sprintf('http://www.convert-unix-time.com/api?timestamp=%s&timezone=%s&returnType=%s',
            $timestamp, $timezone, $returnType);
        $response = file_get_contents($requestUri);
        $result = unserialize($response);
        echo $result['localDate'];


    }
}