<?php

namespace app\models;

use Yii;
use Yii\helpers\ArrayHelper;

class PostWithCategories extends Post
{
    /**
     * @var array IDs of the categories
     */
	# Declare visibility: http://www.yiiframework.com/forum/index.php/topic/69791-crud-many-to-many-in-yii2/page__view__findpost__p__314817
    public $category_ids = [];
 
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            // each category_id must exist in category table (*1)
            ['category_ids', 'each', 'rule' => [
                    'exist', 'targetClass' => Category::className(), 'targetAttribute' => 'id'
                ]
            ],
        ]);
    }
 
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'category_ids' => 'Categories',
        ]);
    }
 
    /**
     * load the post's categories (*2)
     */
    public function loadCategories()
    {
        $this->category_ids = [];
        if (!empty($this->id)) {
            $rows = PostCategory::find()
                ->select(['category_id'])
                ->where(['post_id' => $this->id])
                ->asArray()
                ->all();
            foreach($rows as $row) {
               $this->category_ids[] = $row['category_id'];
            }
        }
    }
 
    /**
     * save the post's categories (*3)
     */
    public function saveCategories()
    {
        /* clear the categories of the post before saving */
        PostCategory::deleteAll(['post_id' => $this->id]);
        if (is_array($this->category_ids)) {
            foreach($this->category_ids as $category_id) {
                $pc = new PostCategory();
                $pc->post_id = $this->post_id;
                $pc->category_id = $category_id;
                $pc->save();
            }
        }
        /* Be careful, $this->category_ids can be empty */
    }
}
