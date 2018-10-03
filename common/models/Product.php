<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property string $preview
 * @property int $visible
 * @property int $sort
 * @property int $viewed
 * @property int $hit
 * @property int $new
 * @property int $sale
 * @property string $created_at
 *
 * @property ProductLang[] $productLangs
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'visible', 'sort', 'viewed', 'hit', 'new', 'sale'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'slug', 'image', 'preview'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'image' => 'Image',
            'preview' => 'Preview',
            'visible' => 'Visible',
            'sort' => 'Sort',
            'viewed' => 'Viewed',
            'hit' => 'Hit',
            'new' => 'New',
            'sale' => 'Sale',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductLangs()
    {
        return $this->hasMany(ProductLang::className(), ['item_id' => 'id']);
    }
}
