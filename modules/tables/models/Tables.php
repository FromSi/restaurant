<?php

namespace app\modules\tables\models;

use app\modules\restaurants\models\Restaurants;
use Yii;

/**
 * This is the model class for table "tables".
 *
 * @property int $id
 * @property int $restaurant_id Ресторан
 * @property string $name Название
 * @property string $image Изображение
 * @property string $chair Всего мест
 *
 * @property Restaurants $restaurant
 */
class Tables extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['restaurant_id'], 'integer'],
            [['name', 'image', 'chair'], 'string', 'max' => 255],
            [['restaurant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurants::className(), 'targetAttribute' => ['restaurant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'restaurant_id' => Yii::t('app', 'Ресторан'),
            'name' => Yii::t('app', 'Название'),
            'image' => Yii::t('app', 'Изображение'),
            'chair' => Yii::t('app', 'Всего мест'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurants::className(), ['id' => 'restaurant_id']);
    }

    /**
     * {@inheritdoc}
     * @return TablesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TablesQuery(get_called_class());
    }
}
