<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $event_id
 * @property string $event_title
 * @property string $event_description
 * @property string $event_created_date
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_title', 'event_description', 'event_created_date'], 'required'],
            [['event_created_date', 'event_create_time', 'event_end_time'], 'safe'],
            [['event_title', 'event_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'event_title' => 'Event Title',
            'event_description' => 'Event Description',
            'event_created_date' => 'Event Created Date',
        ];
    }
}
