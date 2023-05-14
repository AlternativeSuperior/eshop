<?php

use frontend\widgets\breadcrumbs\TreeWidget;
use frontend\widgets\breadcrumbs\BrandWidget;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Вектор';
?>

	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Категории</h2>
						<?= TreeWidget::widget(); ?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Производители комплектующих</h2>
							<div class="brands-name">
                            <?= BrandWidget::widget(); ?>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>
	</section>