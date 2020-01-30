<?php

namespace app\modules\menu_types\models;

/**
 * This is the ActiveQuery class for [[MenuTypes]].
 *
 * @see MenuTypes
 */
class MenuTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MenuTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MenuTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
