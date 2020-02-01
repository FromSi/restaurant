<?php

namespace app\modules\menu_items\models;

use app\modules\menu_types\models\MenuTypes;
use app\modules\request_items\models\RequestItems;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "menu_items".
 *
 * @property int $id
 * @property int $menu_type_id Тип меню
 * @property string $name Название
 * @property string $description Описание
 * @property string $image Изображение
 * @property int $price Стоимость
 * @property int $is_active Активность
 *
 * @property MenuTypes $menuType
 * @property RequestItems[] $requestItems
 */
class MenuItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_type_id', 'price', 'is_active'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1000],
            ['image', 'image', 'on' => ['create', 'update', 'default'], 'extensions' => ['jpg', 'png', 'jpeg']],
            [['menu_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MenuTypes::className(), 'targetAttribute' => ['menu_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'menu_type_id' => Yii::t('app', 'Тип меню'),
            'name' => Yii::t('app', 'Название'),
            'description' => Yii::t('app', 'Описание'),
            'image' => Yii::t('app', 'Изображение'),
            'price' => Yii::t('app', 'Стоимость'),
            'is_active' => Yii::t('app', 'Активность'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuType()
    {
        return $this->hasOne(MenuTypes::className(), ['id' => 'menu_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestItems()
    {
        return $this->hasMany(RequestItems::className(), ['menu_item_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return MenuItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MenuItemsQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            'imageUpload' => [
                'class' => 'Bridge\Core\Behaviors\BridgeUploadImageBehavior',
                'attribute' => 'image',
                'path' => '@webroot/media/menu_items/{id}',
                'url' => '@web/media/menu_items/{id}',
                'scenarios' => ['create', 'update', 'default', 'delete'],
                'thumbs' => [
                    'medium' => ['width' => 1000]
                ],
            ]
        ];
    }
}
