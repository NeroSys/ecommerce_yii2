<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%manager}}".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $skype
 * @property string $discount
 * @property int $percent
 */
class Manager extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%manager}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'skype', 'discount'], 'string', 'max' => 255],
            [['percent'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'skype' => 'Skype',
            'discount' => 'Купон на скидку',
            'percent' => '% скидки',
        ];
    }

    public function getSalesItems(){
        return $this->hasMany(Order::className(), ['manager_discount' => 'discount']);
    }
}
