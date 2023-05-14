<?php
namespace common\models;

use yii\db\ActiveRecord;

Class Category extends ActiveRecord
    {
        public static function tableName()
            {
                return 'category';
            }

        public function getProducts()
            {
                return $this->hasMany(Product::class, ['category_id' => 'id']);
            }

        public function getParent() 
            {
                return $this->hasOne(self::class, ['id' => 'parent_id']);
            }
        
        public function getChildren() 
            {
                return $this->hasMany(self::class, ['parent_id' => 'id']);
            }

        public function getCategory($id)
            {
                return self::find()->where(['id' => $id])->asArray()->one();
            }

        public function getCategoryProducts($id)
            {
                $ids = $this->getAllChildsIds($id);
                $ids[] = $id;
                return Product::find()->where(['in', 'category_id', $ids])->all();
            }

        public function getAllChildsIds($id)
            {
                $children = [];
                $ids = $this->getChildIds($id);
                foreach ($ids as $item)
                    {
                        $children[] = $item;
                        $c = $this->getAllChildsIds($item);
                        foreach ($c as $v)
                            {
                                $children[] = $v;
                            }
                    }
                return $children;
            }

        public function getChildIds($id)
            {
                $children = self::find()->where(['parent_id' => $id])->asArray()->all();
                $ids = [];
                foreach ($children as $child)
                    {
                        $ids[] = $child['id'];
                    }
                return $ids;
            }   


    }