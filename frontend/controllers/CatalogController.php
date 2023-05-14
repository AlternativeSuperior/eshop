<?php
namespace frontend\controllers;

use common\models\Category;
use common\models\Brand;
use common\models\Product;
use Yii;

class CatalogController extends AppController 
{

    public function actionIndex() 
    {
        $root = Category::find()->where(['parent_id' => 0])->all();
        $brands = (new Brand())->getPopularBrands();
        return $this->render('index', compact('root', 'brands'));
    }

    public function actionCategory($id) 
    {
        $id = (int)$id;
        $temp = new Category();
        $products = $temp->getCategoryProducts($id);
        $category = $temp->getCategory($id);
        return $this->render('category', compact('category', 'products'));
    }

    public function actionBrands()
    {
        $brands = (new Brand())->getAllBrands();
        return $this->render('brands', compact('brands'));
    }

    public function actionBrand($id) 
    {
        $id = (int)$id;
        $brand = (new Brand())->getBrand($id);
        return $this->render('brand', compact('brand'));
    }
}