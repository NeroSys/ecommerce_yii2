<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $visible
 * @property int $sort
 *
 * @property CategoryLang[] $categoryLangs
 */
class Category extends \yii\db\ActiveRecord
{

    public $title;
    public $titleNew;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    public function behaviors()
    {
        return [
            'slugStr' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'name', // Свойтво в модели на базе которого будет создавться slug
                'out_attribute' => 'slug', // Свойтво в модели выступающее как slug
                'translit' => true
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visible', 'sort'], 'integer'],
            [[
                'title',
                'titleNew',], 'safe'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'slug' => 'Slug',
            'visible' => 'Отображение',
            'sort' => 'Очередь показа',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryLangs()
    {
        return $this->hasMany(CategoryLang::className(), ['item_id' => 'id']);
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
        $data_lang = $this->getCategoryLangs()->where(['lang'=>$language])->one();
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
                $lang = CategoryLang::find()->where(['lang_id' => $lang])->andWhere(['id'=>$key_id])->one();

                if(!empty($lang)){
                    $lang->title = array_pop($item);
                    $lang->save();
                }
            }
        };

        if(!empty($this->titleNew)) {
            foreach ($this->titleNew as $lang_id => $data) {
                $lang = Lang::find()->where(['id' => $lang_id])->one()->local;
                $itemName = (is_array($data) ? array_pop($data) : '');

                $item = new CategoryLang();
                $item->item_id = $this->id;
                $item->lang_id = $lang_id;
                $item->lang = $lang;
                $item->title = (!empty($itemName) ? $itemName : '');
                $item->save();
            }
        }
    }

    public static function getValue($id, $langId){

        return CategoryLang::find()->where(['item_id' => $id])->andWhere(['lang_id' => $langId])->one();
    }
}
