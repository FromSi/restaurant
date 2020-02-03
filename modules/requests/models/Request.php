<?php

namespace app\modules\requests\models;

use app\modules\request_items\models\RequestItems;
use app\modules\request_statuses\models\RequestStatuses;
use app\modules\tables\models\Tables;
use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property int $id
 * @property int $request_status_id Статус
 * @property int $table_id Стол
 *
 * @property RequestItems[] $requestItems
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_status_id', 'table_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'request_status_id' => Yii::t('app', 'Статус'),
            'table_id' => Yii::t('app', 'Стол'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestItems()
    {
        return $this->hasMany(RequestItems::className(), ['request_id' => 'id']);
    }

    public function getSum(){
        return RequestItems::find()
            ->joinWith('menuItem')
            ->where(['request_id' => $this->id])
            ->sum('menu_items.price');
    }

    public function getRequestStatus(){
        return $this->hasOne(RequestStatuses::className(), ['id' => 'request_status_id']);
    }

    public function getTable(){
        return $this->hasOne(Tables::className(), ['id' => 'table_id']);
    }

    /**
     * {@inheritdoc}
     * @return RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }
}
