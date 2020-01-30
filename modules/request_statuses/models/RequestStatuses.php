<?php

namespace app\modules\request_statuses\models;

use Yii;

/**
 * This is the model class for table "request_statuses".
 *
 * @property int $id
 * @property string $name Название
 */
class RequestStatuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_statuses';
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
     * {@inheritdoc}
     * @return RequestStatusesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestStatusesQuery(get_called_class());
    }
}
