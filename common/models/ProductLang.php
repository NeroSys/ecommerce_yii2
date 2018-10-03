<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product_lang}}".
 *
 * @property int $id
 * @property int $item_id
 * @property int $lang_id
 * @property string $lang
 * @property string $title
 * @property string $description
 * @property string $text
 * @property double $price
 * @property double $old_price
 * @property string $currency
 *
 * @property Product $item
 */
class ProductLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product_lang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'lang_id'], 'integer'],
            [['price', 'old_price'], 'number'],
            [['lang'], 'string', 'max' => 50],
            [['title', 'description', 'text', 'currency'], 'string', 'max' => 255],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'lang_id' => 'Lang ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'description' => 'Description',
            'text' => 'Text',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'currency' => 'Currency',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Product::className(), ['id' => 'item_id']);
    }
}
