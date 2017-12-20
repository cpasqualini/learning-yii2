<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Postcategory]].
 *
 * @see Postcategory
 */
class PostcategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Postcategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Postcategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
