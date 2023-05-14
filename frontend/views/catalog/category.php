<?php
use frontend\widgets\breadcrumbs\TreeWidget;
use frontend\widgets\breadcrumbs\BrandWidget;
use yii\helpers\Html;
use yii\helpers\Url;
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
            <div class="col-sm-9">
                <?php if (!empty($products)): ?>
                    <h2><?= Html::encode($category['name']); ?></h2>
                    <div class="row">
                        <?php foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-wrapper text-center">
                                    <?=
                                    Html::img('@web/images/home/'.$product['image'], ['alt' => $product['name'], 'class' => 'img-responsive']);
                                    ?>
                                    <h2><?= $product['price']; ?> руб.</h2>
                                    <p>
                                        <a href="<?= Url::to(['catalog/product', 'id' => $product['id']]); ?>">
                                            <?= Html::encode($product['name']); ?>
                                        </a>
                                    </p>
                                    <a href="#" class="btn btn-warning">
                                        <i class="fa fa-shopping-cart"></i>
                                        Добавить в корзину
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>Нет товаров в этой категории.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>