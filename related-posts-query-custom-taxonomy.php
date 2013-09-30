<?php
$backup = $post;  // backup the current object
$found_none = '<h2>No related posts found!</h2>';
$taxonomy = 'cms_system';
$param_type = 'cms_system';
$tax_args=array('orderby' => 'none');
$tags = wp_get_post_terms( $post->ID , $taxonomy, $tax_args);
if ($tags) {
  foreach ($tags as $tag) {
    $args=array(
      "$param_type" => $tag->slug,
      'post__not_in' => array($post->ID),
      'showposts'=>3,
      'ignore_sticky_posts'=>1,
      'orderby' => 'rand'
    );
    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
       	<article class="related-post col-sm-4 w-thumbnails">
          <a href="<?php the_permalink(); ?>" class="post-thumbnail">
            <?php 
            if ( has_post_thumbnail() ) {
              the_post_thumbnail('posts-thumb', array('class' => 'img-responsive'));
            }
            else {
              echo '<img src="http://placehold.it/300x320&text=No+featured+image" class="img-responsive">';
            }
            ?>
          </a>
          <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="comment-count-wrap">
            <a href="<?php the_permalink(); ?>#comments-tag" class="comment-count"><i class="icon-comment"></i> </i> <?php comments_number( '0', '1', '%' ); ?></a>
          </div>
        </article>
        <?php $found_none = '';
      endwhile;
    }
    break;
  }
}
if ($found_none) {
echo $found_none;
}
$post = $backup;  // copy it back
wp_reset_query(); // to use the original query again
?>