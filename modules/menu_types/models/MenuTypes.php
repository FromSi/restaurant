<?php

namespace app\modules\menu_types\models;

use app\modules\menu_items\models\MenuItems;
use Yii;

/**
 * This is the model class for table "menu_types".
 *
 * @property int $id
 * @property string $name Название
 *
 * @property MenuItems[] $menuItems
 */
class MenuTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuItems()
    {
        return $this->hasMany(MenuItems::className(), ['menu_type_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return MenuTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MenuTypesQuery(get_called_class());
    }
}
