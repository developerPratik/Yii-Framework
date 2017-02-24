<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "uploaded".
 *
 * @property integer $file_id
 * @property string $file_name
 * @property string $file_location
 */
class Uploaded extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uploaded';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_name', 'file_location'], 'required'],
            [['file_name', 'file_location'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'file_name' => 'File Name',
            'file_location' => 'File Location',
        ];
    }
}
