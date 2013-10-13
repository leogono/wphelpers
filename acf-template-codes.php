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


<?php

/**
 * How to get values from a user
 *
 * @link http://www.advancedcustomfields.com/resources/how-to/how-to-get-values-from-a-user/
 */
 
$author_id = get_the_author_meta( 'ID' );
$author_title = get_field('author_badge', 'user_'. $author_id ); // image field, return type = "Image Object"
 
?>
<img src="<?php echo $author_badge['url']; ?>" alt="<?php echo $author_badge['alt']; ?>" />