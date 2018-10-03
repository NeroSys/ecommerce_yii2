<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%lang}}".
 *
 * @property int $id
 * @property string $url
 * @property string $local
 * @property string $name
 * @property int $default
 * @property string $img
 * @property int $date_update
 * @property int $date_create
 */
class Lang extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lang}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'local', 'name'], 'required'],
            [['name'], 'unique'],
            [['local'], 'unique'],
            [['url'], 'unique'],
            [['default', 'date_update', 'date_create'], 'integer'],
            [['url', 'local', 'name', 'img'], 'string', 'max' => 255],
            [['hostImage'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'local' => 'Local',
            'name' => 'Название',
            'default' => 'Основной',
            'img' => 'Лого',
            'date_update' => 'Дата обновления',
            'date_create' => 'Дата добавления',
        ];
    }

    //Переменная, для хранения текущего объекта языка
    static $current = null;

//Получение текущего объекта языка
    static function getCurrent()
    {
        if( self::$current === null ){
            self::$current = self::getDefaultLang();
        }
        return self::$current;
    }

//Установка текущего объекта языка и локаль пользователя
    static function setCurrent($url = null)
    {
        $language = self::getLangByUrl($url);
        self::$current = ($language === null) ? self::getDefaultLang() : $language;
        Yii::$app->language = self::$current->url;
    }

//Получения объекта языка по умолчанию
    static function getDefaultLang()
    {
        return Lang::find()->where('`default` = :default', [':default' => 1])->one();
    }

//Получения объекта языка по буквенному идентификатору
    static function getLangByUrl($url = null)
    {
        if ($url === null) {
            return null;
        } else {
            $language = Lang::find()->where('url = :url', [':url' => $url])->one();
            if ( $language === null ) {
                return null;
            }else{
                return $language;
            }
        }
    }

    // image block--
    public function getHostImage(){
        return Url::toRoute('/../upload/lang/'.$this->img, true);
    }

    public function setHostImage($file){
        $this->img = $file;
    }

    public function beforeSave($insert)
    {
        if(!empty($this->img)){
            $tmp = explode('/', $this->img);
            $this->img = array_pop($tmp);
        }
        return parent::beforeSave($insert);
    }

    public function getImage(){


        return ($this->img) ?  '/frontend/web/upload/lang/'. $this->img : '/frontend/web/no-image.jpg';
    }


// end of image block --
}
