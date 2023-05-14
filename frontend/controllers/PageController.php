<?php
namespace frontend\controllers;

use common\models\Product;

class PageController extends AppController 
{
    public function actionIndex()
        {
            $hitProducts = Product::find()->where(['hit' => 1])->limit(3)->asArray()->all();
            $newProducts = Product::find()->where(['new' => 1])->limit(3)->asArray()->all();
            $saleProducts = Product::find()->where(['sale' => 1])->limit(3)->asArray()->all();

            return $this->render('index', compact('hitProducts', 'newProducts', 'saleProducts'));
        }
}