<?php
/*
*	Template for information list.
*/
?>

<?php $node = $variables['current_node']?>
<?php if(isset($node->field_fuil['und'])):?>
	<div class="b-catalog-popup-line-item">
		<?php $fuil = field_view_field('node', $node, 'field_fuil', array('label' => 'hidden'));?>
		<div class="b-catalog-popup-item-label">Топливо</div>
		<div class="b-catalog-popup-item-info">
			<?php $string?>
			<?php foreach ($node->field_fuil['und'] as $key => $value){
				$string .= custom_module_render_name_term($value['tid']) . ' ,';
			}?>
			<?php $string = substr($string, 0, -1)?>
			<?php print $string;?>
		</div>
	</div>
<?php endif;?>
<?php if(isset($node->field_kpd['und'])):?>
	<div class="b-catalog-popup-line-item">
		<div class="b-catalog-popup-item-label">КПД</div>
		<div class="b-catalog-popup-item-info"><?php print $node->field_kpd['und'][0]['first']?> кВт / <?php print $node->field_kpd['und'][0]['second']?>%</div>
	</div>
<?php endif;?>
<?php if(isset($node->field_power['und'])):?>
	<div class="b-catalog-popup-line-item">
		<div class="b-catalog-popup-item-label">Тепловая мощность</div>
		<div class="b-catalog-popup-item-info">ОВ: <?php print $node->field_power['und'][0]['first']?> кВт / ГВС: <?php print $node->field_power['und'][0]['second']?> кВт </div>
	</div>
<?php endif;?>
<?php if(isset($node->field_area['und'])):?>
	<div class="b-catalog-popup-line-item">
		<div class="b-catalog-popup-item-label">Тепловая мощность</div>
		<div class="b-catalog-popup-item-info">до <?php print $node->field_area['und'][0]['value']?> м²</div>
	</div>
<?php endif;?>
<?php if((isset($node->field_expenditure['und']) && $node->field_fuil['und'][0]['tid'] == 17) || (isset($node->field_expenditure['und']) && $node->field_fuil['und'][1]['tid'] == 17)):?>
	<div class="b-catalog-popup-line-item">
		<div class="b-catalog-popup-item-label">Расход природного газа</div>
		<div class="b-catalog-popup-item-info"><?php print $node->field_expenditure['und'][0]['value']?> м²/час</div>
	</div>
<?php endif;?>
<?php if((isset($node->field_liquefied['und']) && $node->field_fuil['und'][0]['tid'] == 18) || (isset($node->field_liquefied['und']) && $node->field_fuil['und'][1]['tid'] == 18)):?>
	<div class="b-catalog-popup-line-item">
		<div class="b-catalog-popup-item-label">Расход сжиженного газа</div>
		<div class="b-catalog-popup-item-info"><?php print $node->field_expenditure['und'][0]['value']?> кг/час</div>
	</div>
<?php endif;?>
<?php if(isset($node->field_capacity['und'])):?>
	<div class="b-catalog-popup-line-item">
		<div class="b-catalog-popup-item-label">Производительность ГВС</div>
		<div class="b-catalog-popup-item-info">ΔT 25°C: <?php print $node->field_capacity['und'][0]['first']?> л/мин. / ΔT 40°C: <?php print $node->field_capacity['und'][0]['second']?> л/мин.</div>
	</div>
<?php endif;?>
<?php if(isset($node->field_dimensions_height['und']) || isset($node->field_field_dimensions_width['und']) || isset($node->field_depth['und'])):?>
	<div class="b-catalog-popup-line-item">
		<div class="b-catalog-popup-item-label">Габаритные размеры (высота х ширина х глубина)</div>
		<div class="b-catalog-popup-item-info"><?php print $node->field_dimensions_height['und'][0]['value']?> × <?php print $node->field_field_dimensions_width['und'][0]['value']?> × <?php print $node->field_depth['und'][0]['value']?> мм</div>
	</div>
<?php endif;?>
<?php if(isset($node->field_weight['und'])):?>
	<div class="b-catalog-popup-line-item">
		<div class="b-catalog-popup-item-label">Вес (без воды)</div>
		<div class="b-catalog-popup-item-info"><?php print $node->field_weight['und'][0]['value'];?> кг.</div>
	</div>
<?php endif;?>
<?php if(isset($node->field_guarantee['und'])):?>
	<div class="b-catalog-popup-line-item">
		<div class="b-catalog-popup-item-label">Гарантия</div>
		<?php if($node->field_guarantee['und'][0]['value'] < 5):?>
			<div class="b-catalog-popup-item-info"><?php print $node->field_guarantee['und'][0]['value'];?> года</div>
		<?php else:?>
			<div class="b-catalog-popup-item-info"><?php print $node->field_guarantee['und'][0]['value'];?> лет</div>
		<?php endif;?>
	</div>
<?php endif;?>