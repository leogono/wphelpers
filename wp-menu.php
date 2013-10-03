<?php
//REGISTERING MENUS and adding in template

register_nav_menus( array(
		'secondary' => __( 'Secondary Menu', 'leogono' ),
	) );
	
wp_nav_menu( array( 'theme_location' => 'secondary' ) );