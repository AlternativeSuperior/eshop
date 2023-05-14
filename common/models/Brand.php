<?php
namespace common\models;

use yii\db\ActiveRecord;

class Brand extends ActiveRecord 
    {
        public static function tableName() 
            {
                return 'brand';
            }   

        public function getProducts() 
            {
            return $this->hasMany(Product::class, ['brand_id' => 'id']);
            }

        public function getBrand($id) 
            {
                $id = (int)$id;
                return self::findOne($id);
            }

        public function getPopularBrands()
            {
                $brands = self::find()
                    ->select([
                        'id' => 'brand.id',
                        'name' => 'brand.name',
                        'count' => 'COUNT(*)'
                    ])
                    ->innerJoin('product', 'product.brand_id = brand.id')
                    ->groupBy(['brand.id', 'brand.name'])
                    ->orderBy(['count' => SORT_DESC])
                    ->limit(3)
                    ->asArray()
                    ->indexBy('name')
                    ->all();
                ksort($brands);
                return $brands;
            }

        public function getAllBrands() 
            {
                $query = self::find();
                $brands = $query
                    ->select([
                        'id' => 'brand.id',
                        'name' => 'brand.name',
                        'count' => 'COUNT(*)'
                    ])
                    ->innerJoin('product', 'product.brand_id = brand.id')
                    ->groupBy(['brand.id', 'brand.name'])
                    ->orderBy(['name' => SORT_ASC])
                    ->asArray()
                    ->all();
                return $brands;
            }
    }