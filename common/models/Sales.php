<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%sales}}".
 *
 * @property int $id
 * @property int $order_id
 * @property string $manager_discount
 * @property double $sum
 * @property string $currency
 * @property int $payed
 * @property int $send
 * @property string $date
 *
 * @property Order $order
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sales}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'payed', 'send'], 'integer'],
            [['sum'], 'number'],
            [['date'], 'safe'],
            [['manager_discount', 'currency'], 'string', 'max' => 20],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'manager_discount' => 'Manager Discount',
            'sum' => 'Sum',
            'currency' => 'Currency',
            'payed' => 'Payed',
            'send' => 'Send',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
