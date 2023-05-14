<?php
namespace frontend\widgets\breadcrumbs;

use yii\Base\Widget;
use common\models\Category;
use Yii;

Class TreeWidget extends Widget 
    {
        protected $data;
        protected $tree;

        public function run()
            {
                $html = Yii::$app->cache->get('catalog');
                if ($html === false)
                    {
                        $this->data = Category::find()->indexBy('id')->asArray()->all();
                        $this->makeTree();
                        if (!empty($this->tree))
                            {
                                $html = $this->render('tree', ['tree' => $this->tree]);
                            }
                        else 
                            {
                                $html = '';
                            }
                        Yii::$app->cache->set('catalog', $html, 60);
                    }
                return $html;
            }

        protected function makeTree()
            {
                if (empty($this->data))
                    {
                        return;
                    }
                foreach ($this->data as $id => &$node)
                    {
                        if (!$node['parent_id'])
                            {
                                $this->tree[$id] = &$node;
                            }
                        else
                            {
                                $this->data[$node['parent_id']]['childs'][$id] = &$node;
                            }
                    }
            }
    }   