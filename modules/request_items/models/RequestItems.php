<?php

namespace app\modules\request_items\models;

use app\modules\menu_items\models\MenuItems;
use app\modules\requests\models\Request;
use Yii;

/**
 * This is the model class for table "request_items".
 *
 * @property int $id
 * @property int $request_id Заявка
 * @property int $menu_item_id Меню
 *
 * @property MenuItems $menuItem
 * @property Requests $request
 */
class RequestItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_id', 'menu_item_id'], 'integer'],
            [['menu_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => MenuItems::className(), 'targetAttribute' => ['menu_item_id' => 'id']],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'request_id' => Yii::t('app', 'Заявка'),
            'menu_item_id' => Yii::t('app', 'Меню'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuItem()
    {
        return $this->hasOne(MenuItems::className(), ['id' => 'menu_item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }

    /**
     * {@inheritdoc}
     * @return RequestItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestItemsQuery(get_called_class());
    }
}
