<?php

namespace app\modules\request_items\models;

/**
 * This is the ActiveQuery class for [[RequestItems]].
 *
 * @see RequestItems
 */
class RequestItemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RequestItems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RequestItems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
