<?php
/*
*	Template for show list products.
*/
?>

<div class="loader"><img src="/sites/all/themes/nika/img/loader-ajax.svg"></div>
<div class="b-catalog wrap-float">
	
	<?php if(!empty($variables['node_list'])):?>
			<div class="b-catalog-count">
				<?php print t('Suitable boilers')?> (<?php print $node_count; ?>)
			</div>
		<?php foreach ($variables['node_list'] as $key => $value): ?>
			<?php $main_img = field_view_field('node', $value, 'field_img_product', array('label' => 'hidden'));?>
			<?php 
				if(isset($value->field_type['und']))
				{
					$type_title = field_view_field('node', $value, 'field_type', array('label' => 'hidden'));
					$type_title = strip_tags(render($type_title));
				}
				if(isset($value->field_position['und']))
				{
					$position_title = custom_module_render_name_term($value->field_position['und'][0]['tid']);
					$type_title = mb_strtolower($type_title);
					$title = $position_title.' '.$type_title.' '.$value->title;
				}
				else 
				{
					$title = $value->title;
				}
			?>
			<?php $add_cart = field_view_field('node', $value, 'field_product', array('label' => 'hidden'));?>
			<?php $product = commerce_product_load($value->field_product['und'][0]['product_id']);?>
			<?php $price = commerce_currency_format($product->commerce_price['und'][0]['amount'],'RUB');?>
			<?php 
				if(isset($value->field_shield['und'][0]['value']))
				{
					switch ($value->field_shield['und'][0]['value']) 
					{
						case 1:
							$shield = '<span class="shield-red">Хит</span>';
							break;
						case 2:
							$shield = '<span class="shield-gray">Новинка</span>';
							break;
						case 3:
							$shield = '<span class="shield-red">Акция</span>';
							break;
					}
				}
			?>
			
			<div class="b-catalog-block node-<?php print $value->nid?>">
				<?php if(isset($shield) || isset($value->field_sales['und'])):?>
					<div class="b-catalog-shield">
						<?php if(isset($value->field_sales['und'])):?>
							<span class="shield-red"><?php print $value->field_sales['und'][0]['value'];?>%</span>
						<?php else:?>
							<?php print $shield;?>
						<?php endif;?>
					</div>
				<?php endif;?>
				<div class="b-catalog-img">
					<?php print render($main_img);?>
				</div>
				<div class="b-catalog-block-title">
					<a href="/<?php print drupal_get_path_alias("node/".$value->nid);?>"><?php print $title;?></a>
				</div>
				<div class="b-catalog-character wrap-float">
					<?php if(isset($value->field_old_price['und'])):?>
					<div class="b-catalog-price">
						<span class="b-catalog-price-new"><?php print $price;?></span>
						<span class="b-catalog-price-old"><?php print number_format($value->field_old_price['und'][0]['value'], 0, '', ' ')?> &#8381;</span>
					</div>
					<?php else:?>
					<div class="b-catalog-price">
						<?php print $price;?>
					</div>
					<?php endif;?>
					<?php if(isset($value->field_area['und'])):?>
						<div class="b-catalog-area">
							<?php $area = 'S = '.$value->field_area['und'][0]['value'].' м<sup>2</sup>';?>
							<?php print $area;?>
						</div>
					<?php endif;?>
				</div>
				<div class="b-catalog-block-action-bottom">
					<div class="b-catalog-load-info-full">
						<a data-target="<?php print $value->nid?>" class="button-info" href=""><i class="fa fa-info-circle"></i><?php print t('Read more')?></a>
					</div>
					<div class="b-catalog-button-add-cart">
						<button data-nid="<?php print $value->nid;?>" class="add-cart-product" data-product="<?php print $value->field_product['und'][0]['product_id']?>" ><span><i class="fa fa-cart-plus" aria-hidden="true"></i><?php print t('Add to Cart')?></span></button>
						<div class="loader-small"><img src="/sites/all/themes/nika/img/loader-small.svg"></div>
					</div>
				</div>
			</div>
			
		<?php endforeach;?>
	<?php endif;?>

</div>
<div class="b-catalog-pager-wrap">
	<?php print custom_module_render_pager($variables['pager']['count'],$variables['pager']['current'] );?>
</div>
