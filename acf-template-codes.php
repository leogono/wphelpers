<?php 
/**
 * Repeater Field
 *
 * @link http://www.advancedcustomfields.com/resources/field-types/repeater/
 */

if(get_field('repeater_field_name')): ?>
 
	<ul>
 
	<?php while(has_sub_field('repeater_field_name')): ?>
 
		<li>sub_field_1 = <?php the_sub_field('sub_field_1'); ?>, sub_field_2 = <?php the_sub_field('sub_field_2'); ?>, etc</li>
 
	<?php endwhile; ?>
 
	</ul>
 
<?php endif; ?>