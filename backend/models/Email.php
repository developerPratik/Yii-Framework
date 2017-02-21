<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property integer $email_id
 * @property string $receiver_name
 * @property string $receiver_email
 * @property string $subject
 * @property string $content
 * @property string $attachment
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receiver_name', 'receiver_email', 'subject', 'content'], 'required'],
            [['content'], 'string'],
            [['receiver_name', 'receiver_email', 'subject', 'attachment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email_id' => 'Email ID',
            'receiver_name' => 'Receiver Name',
            'receiver_email' => 'Receiver Email',
            'subject' => 'Subject',
            'content' => 'Content',
            'attachment' => 'Attachment',
        ];
    }
}
