<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%subscribe}}".
 *
 * @property int $id
 * @property string $email
 * @property string $date
 */
class Subscribe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subscribe}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['email'], 'unique'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'date' => 'Дата',
        ];
    }
}
