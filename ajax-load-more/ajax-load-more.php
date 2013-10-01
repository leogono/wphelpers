<?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Our variables
$postType = (isset($_GET['postType'])) ? $_GET['postType'] : 'post';
$category = (isset($_GET['category'])) ? $_GET['category'] : '';
$author_id = (isset($_GET['author'])) ? $_GET['author'] : '';
$taxonomy = (isset($_GET['taxonomy'])) ? $_GET['taxonomy'] : '';
$tag = (isset($_GET['tag'])) ? $_GET['tag'] : '';
$exclude = (isset($_GET['postNotIn'])) ? $_GET['postNotIn'] : '';
$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 6;
$page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;


$args = array(
	'post_type' => $postType,
	'category_name' => $category,
	
	'author' => $author_id,
	
	'posts_per_page' => $numPosts,
	'paged'          => $page,
	
	'orderby'   => 'date',
    'order'     => 'DESC',
	'post_status' => 'publish',
);

// EXCLUDE POSTS
// Create new array of excluded posts
/* Example array from parent page:
   $features = array();
   foreach( $posts as $post):
	   setup_postdata($post);
	   $features[] = $post->ID;
   endforeach;
   if($features){			
	   $postsNotIn = implode(",", $features);
   }
*/
if(!empty($exclude)){
	$exclude=explode(",",$exclude);
    $args['post__not_in'] = $exclude;
}

// QUERY BY TAXONOMY
if(empty($taxonomy)){
	$args['tag'] = $tag;
}else{
    $args[$taxonomy] = $tag;
}

query_posts($args); 
?>
<?php 
// our loop  
if (have_posts()) :  
	$i =0;
	while (have_posts()):  
	$i++;
	the_post();?> 
	<article <?php post_class('post col-xs-6 col-sm-6 col-md-3 w-thumbnails'); ?>>
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
<?php endwhile; endif; wp_reset_query(); ?> 