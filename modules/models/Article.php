<?php

namespace app\modules\models;


use yii;
use yii\db\ActiveRecord;

/**
 * Class ArticleController
 * @package app\modules\controllers
 * 后台文章模型管理
 */
class Article extends ActiveRecord
{


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['title', 'content', 'status'], 'required'],
            // email has to be a valid email address
            ['title', 'required', 'message' => '名称不为空'],
            ['content', 'required', 'message' => '标题不为空'],
        ];
    }


    public function add($data)
    {
        if ($this->load($data) && $this->validate()) {
            $this->create_time = time();
            return $this->save(false);
        }
        return false;
    }

    public function search($page = 5)
    {
        $query = self::find();
        $title = Yii::$app->request->get('title');
        if (isset($title) && $title) {
            $query->andFilterWhere(['like', 'title', $title]);
        }
        $page = new yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => $page]);
        $data = $query->offset($page->offset)->limit($page->limit)->orderBy('id desc')->select(['id', 'title', 'content', 'content', 'status', 'create_time', 'update_time'])->all();
        return [
            'data' => $data,
            'page' => $page
        ];
    }
}
