<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;

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
class Product extends ActiveRecord
{

    public $title;
    public $titleNew;
    public $description;
    public $descriptionNew;
    public $text;
    public $textNew;

    public $price;
    public $priceNew;
    public $oldPrice;
    public $oldPriceNew;

    public $currency;
    public $currencyNew;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    public function behaviors()
    {
        return [
            'slugStr' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'name', // Свойтво в модели на базе которого будет создавться slug
                'out_attribute' => 'slug', // Свойтво в модели выступающее как slug
                'translit' => true
            ],
//            'timestamp' => [
//                'class' => 'yii\behaviors\TimestampBehavior',
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
//                ],
//            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'visible', 'sort', 'viewed', 'hit', 'new', 'sale'], 'integer'],
            [['created_at'], 'safe'],
            [[
                'title',
                'titleNew',
                'description',
                'descriptionNew',
                'text',
                'textNew',
                'price',
                'priceNew',
                'oldPrice',
                'oldPriceNew',
                'currency',
                'currencyNew',
                'mainImage', 'previewImage'
                ], 'safe'],
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
            'category_id' => 'Категория',
            'name' => 'Название',
            'slug' => 'Slug',
            'image' => 'Изображение',
            'preview' => 'Превью',
            'visible' => 'Отображение',
            'sort' => 'Сортировка вывода',
            'viewed' => 'Просмотры',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
            'created_at' => 'Добавлен',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductLangs()
    {
        return $this->hasMany(ProductLang::className(), ['item_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /*
* Возвращает массив объектов модели
*/
    public function getItems(){
        return $this->find()->all();
    }
    /*
     * Возвращает данные для указанного языка
     */
    public function getDataItems(){
        $language = Yii::$app->language;
        $data_lang = $this->getProductLangs()->where(['lang'=>$language])->one();
        return $data_lang;
    }

    public function getSessionItems($lang){
        $language = $lang;
        $data_lang = $this->getProductLangs()->where(['lang'=>$language])->one();
        return $data_lang;
    }

    /*
     * Возвращает объект поста по его url
     */
    public function getLang($url){
        return $this->find()->where(['url' => $url])->one();
    }

    /*
* Сохранение значений переводов в сопутствующую таблицу
*/

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if(!empty($this->title)){
            foreach ($this->title as $lang => $item){

                $key_id = key($item);
                $lang = ProductLang::find()->where(['lang_id' => $lang])->andWhere(['id'=>$key_id])->one();

                if(!empty($lang)){
                    $lang->title = array_pop($item);
                    $lang->description = $this->description[$lang->lang_id][$key_id];
                    $lang->text = $this->text[$lang->lang_id][$key_id];

                    if($this->price[$lang->lang_id][$key_id] != $lang->price){
                        $lang->old_price = $lang->price;
                    }
                    $lang->price = $this->price[$lang->lang_id][$key_id];

//                    $lang->old_price = $this->oldPrice[$lang->lang_id][$key_id];
                    $lang->currency = $this->currency[$lang->lang_id][$key_id];
                    $lang->save();
                }
            }
        };

        if(!empty($this->titleNew)) {

            foreach ($this->titleNew as $lang_id => $data) {


                $lang = Lang::find()->where(['id' => $lang_id])->one()->local;


                $itemName = (is_array($data) ? array_pop($data) : '');
                $itemDesc = (is_array($this->descriptionNew) ? array_pop($this->descriptionNew[$lang_id]) : '');
                $itemText = (is_array($this->textNew) ? array_pop($this->textNew[$lang_id]) : '');
                $itemPrice = (is_array($this->priceNew) ? array_pop($this->priceNew[$lang_id]) : '');
                $itemCurrency = (is_array($this->currencyNew) ? array_pop($this->currencyNew[$lang_id]) : '');

                $item = new ProductLang();

                $item->item_id = $this->id;
                $item->lang_id = $lang_id;
                $item->lang = $lang;
                $item->title = (!empty($itemName) ? $itemName : '');
                $item->description = (!empty($itemDesc) ? $itemDesc: '');
                $item->text = (!empty($itemText) ? $itemText: '');
                $item->price = (!empty($itemPrice) ? $itemPrice: '');
                $item->currency = (!empty($itemCurrency) ? $itemCurrency: '');
                $item->save();
            }
        }
    }

    public static function getValue($id, $langId){

        return ProductLang::find()->where(['item_id' => $id])->andWhere(['lang_id' => $langId])->one();
    }

    public function viewedCounter(){
        $this->viewed += 1;
        return $this->save(false);
    }

    // image block--
    public function getMainImage(){
        return Url::toRoute('/../upload/product/'.$this->image, true);
    }

    public function getPreviewImage(){
        return Url::toRoute('/../upload/product/'.$this->preview, true);
    }

    public function setMainImage($file){
        $this->image = $file;
    }

    public function setPreviewImage($file){
        $this->preview = $file;
    }

    public function beforeSave($insert)
    {
        if(!empty($this->image)){
            $tmp = explode('/', $this->image);
            $this->image = array_pop($tmp);
        }

        if(!empty($this->preview)){
            $tmp = explode('/', $this->preview);
            $this->preview = array_pop($tmp);
        }

        return parent::beforeSave($insert);
    }

    public function getMainImg(){

        return ($this->image) ?  '/frontend/web/upload/product/'. $this->image : '/frontend/web/no-image.jpg';
    }

    public function getPreviewImg(){

        return ($this->preview) ?  '/frontend/web/upload/product/'. $this->preview : '/frontend/web/no-image.jpg';
    }

// end of image block --
}
