<?php

namespace app\modules\restaurants\models;

use app\modules\tables\models\Tables;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "restaurants".
 *
 * @property int $id
 * @property string $name Название
 * @property string $description Описание
 * @property string $image Изображение
 * @property string $address Адрес
 * @property int $is_active Активность
 *
 * @property Tables[] $tables
 */
class Restaurants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'restaurants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            ['image', 'image', 'on' => ['create', 'update', 'default'], 'extensions' => ['jpg', 'png', 'jpeg']],
            [['description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название'),
            'description' => Yii::t('app', 'Описание'),
            'image' => Yii::t('app', 'Изображение'),
            'address' => Yii::t('app', 'Адрес'),
            'is_active' => Yii::t('app', 'Активность'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTables()
    {
        return $this->hasMany(Tables::className(), ['restaurant_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return RestaurantsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RestaurantsQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            'imageUpload' => [
                'class' => 'Bridge\Core\Behaviors\BridgeUploadImageBehavior',
                'attribute' => 'image',
                'path' => '@webroot/media/restaurants/{id}',
                'url' => '@web/media/restaurants/{id}',
                'scenarios' => ['create', 'update', 'default', 'delete'],
                'thumbs' => [
                    'medium' => ['width' => 1000]
                ],
            ]
        ];
    }
}
