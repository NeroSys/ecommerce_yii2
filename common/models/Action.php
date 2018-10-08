<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%action}}".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $start
 * @property string $finish
 * @property string $slug
 * @property int $visible
 * @property int $sort
 *
 * @property ActionLang[] $actionLangs
 */
class Action extends \yii\db\ActiveRecord
{

    public $title;
    public $titleNew;
    public $text;
    public $textNew;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%action}}';
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start', 'finish'], 'safe'],
            [['visible', 'sort'], 'integer'],
            [[
                'title',
                'titleNew',
                'text',
                'textNew',
                'mainImage'
            ], 'safe'],
            [['name', 'image', 'slug'], 'string', 'max' => 255],
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
            'image' => 'Изображение',
            'start' => 'Старт',
            'finish' => 'Финиш',
            'slug' => 'Slug',
            'visible' => 'Отображение',
            'sort' => 'Сортировка вывода',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActionLangs()
    {
        return $this->hasMany(ActionLang::className(), ['item_id' => 'id']);
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
        $data_lang = $this->getActionLangs()->where(['lang'=>$language])->one();
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
                $lang = ActionLang::find()->where(['lang_id' => $lang])->andWhere(['id'=>$key_id])->one();

                if(!empty($lang)){
                    $lang->title = array_pop($item);
                    $lang->text = $this->text[$lang->lang_id][$key_id];
                    $lang->save();
                }
            }
        };

        if(!empty($this->titleNew)) {

            foreach ($this->titleNew as $lang_id => $data) {


                $lang = Lang::find()->where(['id' => $lang_id])->one()->local;


                $itemName = (is_array($data) ? array_pop($data) : '');
                $itemText = (is_array($this->textNew) ? array_pop($this->textNew[$lang_id]) : '');

                $item = new ActionLang();

                $item->item_id = $this->id;
                $item->lang_id = $lang_id;
                $item->lang = $lang;
                $item->title = (!empty($itemName) ? $itemName : '');
                $item->text = (!empty($itemText) ? $itemText: '');
                $item->save();
            }
        }
    }

    public static function getValue($id, $langId)
    {
        return ActionLang::find()->where(['item_id' => $id])->andWhere(['lang_id' => $langId])->one();
    }

    // image block--
    public function getMainImage()
    {
        return Url::toRoute('/../upload/action/'.$this->image, true);
    }

    public function setMainImage($file){
        $this->image = $file;
    }

    public function beforeSave($insert)
    {
        if(!empty($this->image)){
            $tmp = explode('/', $this->image);
            $this->image = array_pop($tmp);
        }

        return parent::beforeSave($insert);
    }

    public function getMainImg()
    {
        return ($this->image) ?  '/frontend/web/upload/action/'. $this->image : '/frontend/web/no-image.jpg';
    }

// end of image block --
}
