<?php

namespace app\modules\request_statuses\models;

/**
 * This is the ActiveQuery class for [[RequestStatuses]].
 *
 * @see RequestStatuses
 */
class RequestStatusesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RequestStatuses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RequestStatuses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
