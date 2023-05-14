<?php

use frontend\widgets\breadcrumbs\TreeWidget;
use frontend\widgets\breadcrumbs\BrandWidget;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Вектор';
?>

	
	<section>
		<div class='container'>
			<div class="row">
				<div class="col-sm-3">
                    <div class="left-sidebar">
						<h2>Категории</h2>
                    <div class='category-products'>
						    <?= TreeWidget::widget(); ?>
					</div>

					<div class="brands-products"><!--brands_products-->
						<h2>Производители комплектующих</h2>
							<div class="brands">
                                <?= BrandWidget::widget(); ?>
							</div>
                        </div>
					</div>
                </div>
                

        <div class='col-sm-9'>
            <?php if(!empty($hitProducts)): ?>
                <h2 class="title text-center">Лидеры продаж</h2>
                <div class='row'>
                    <?php foreach ($hitProducts as $item): ?>
                        <div class='col-sm-4'>
                                <div class='product-wrapper text-center'>
                                    <?= Html::img('@web/images/home/'.$item['image'], ['alt' => $item['name'], 'class' => 'img-responsive']);?>
                                    <h2><?= $item['price']; ?>руб.</h2>
                                    <p>
                                        <a href='<?= Url::to(['catalog/product', 'id' => $item['id']]) ?>'>
                                            <?= Html::encode($item['name']); ?>
                                        </a>
                                    </p>
                                    <a href='#' class='btn btn-warning'>
                                        <i class='fa fa-shopping-cart'></i>
                                            Добавить в корзину
                                    </a>
                                </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if(!empty($newProducts)): ?>
                <h2 class="title text-center">Новинки</h2>
                <div class='row'>
                    <?php foreach ($newProducts as $item): ?>
                        <div class='col-sm-4'>
                                <div class='product-wrapper text-center'>
                                    <?= Html::img('@web/images/home/'.$item['image'], ['alt' => $item['name'], 'class' => 'img-responsive']);?>
                                    <h2><?= $item['price']; ?>руб.</h2>
                                    <p>
                                        <a href='<?= Url::to(['catalog/product', 'id' => $item['id']]) ?>'>
                                            <?= Html::encode($item['name']); ?>
                                        </a>
                                    </p>
                                    <a href='#' class='btn btn-warning'>
                                        <i class='fa fa-shopping-cart'></i>
                                            Добавить в корзину
                                    </a>
                                </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if(!empty($saleProducts)): ?>
                <h2 class="title text-center">Распродажа</h2>
                <div class='row'>
                    <?php foreach ($saleProducts as $item): ?>
                        <div class='col-sm-4'>
                                <div class='product-wrapper text-center'>
                                    <?= Html::img('@web/images/home/'.$item['image'], ['alt' => $item['name'], 'class' => 'img-responsive']);?>
                                    <h2><?= $item['price']; ?>руб.</h2>
                                    <p>
                                        <a href='<?= Url::to(['catalog/product', 'id' => $item['id']]) ?>'>
                                            <?= Html::encode($item['name']); ?>
                                        </a>
                                    </p>
                                    <a href='#' class='btn btn-warning'>
                                        <i class='fa fa-shopping-cart'></i>
                                            Добавить в корзину
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>