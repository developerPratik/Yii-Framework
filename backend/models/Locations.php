<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property integer $locations_id
 * @property string $zip_code
 * @property string $city
 * @property string $province
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zip_code', 'city', 'province'], 'required'],
            [['zip_code', 'city', 'province'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'locations_id' => 'Locations ID',
            'zip_code' => 'Zip Code',
            'city' => 'City',
            'province' => 'Province',
        ];
    }
}
