<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property string $id
 * @property string $title
 * @property string $content
 * @property integer $pub
 *
 * @property Postcategory[] $postcategories
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['pub'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'pub' => 'Pub',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostcategories()
    {
        return $this->hasMany(Postcategory::className(), ['post_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostQuery(get_called_class());
    }
}
