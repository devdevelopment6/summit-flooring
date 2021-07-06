<?php

/**

 * Displays top navigation

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>

	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

			<?php echo wp_nav_menu(
				array(
					'theme_location' => 'top',
					'menu_id'        => 'top-mobile-menu',	
					'menu_class'     => '',
					)
				);
			?>
   
</div>
	<span class="side-bar" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
		
			<!-- <div class="nav-bar" id="topmenu" >
				<ul class="navbar-nav">
				<li class="nav-item ">
					<a href="#" class="nav-link dropdown-toggle">CARPET</a>
					<ul class="drop-down">
						<li>
							<a href="#" class="nav-link">BENTZON CARPETS</a>						
						</li>
						<li>
							<a href="#" class="nav-link">JACARANDA CARPETS</a>						
						</li>
						<li>
							<a href="#" class="nav-link">OBJECT CARPET</a>						
						</li>
						<li>
							<a href="#" class="nav-link">PLANKX</a>						
						</li>
						<li>
							<a href="#" class="nav-link">NEW MARK</a>						
						</li>
						<li>
							<a href="#" class="nav-link">VAN BESOUW</a>						
						</li>
					</ul>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link dropdown-toggle">VINYL</a>
					<ul class="drop-down">
						<li>
							<a href="#" class="nav-link">DURA CRETE</a>						</li>
						<li>
							<a href="#" class="nav-link">DURA WOOD</a>						</li>
						<li>
							<a href="#" class="nav-link">WOVEN VINYL</a>						</li>
					</ul>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link dropdown-toggle">RUBBER</a>
					<ul class="drop-down">
						<li>
							<a href="#" class="nav-link">EARTH</a>						
						</li>
						<li>
							<a href="#" class="nav-link">KALEIDOSCOPE</a>						
						</li>
						<li>
							<a href="#" class="nav-link">KIDZ KOLLECTION</a>						
						</li>
						<li>
							<a href="#" class="nav-link">MARATHON</a>						
						</li>
						<li>
							<a href="#" class="nav-link">MUSCLE</a>						
						</li>
						<li>
							<a href="#" class="nav-link">OLYMPIC</a>						
						</li>
						<li>
							<a href="#" class="nav-link">OPULENCE</a>						
						</li>
						<li>
							<a href="#" class="nav-link">PRISM</a>						
						</li>
						<li>
							<a href="#" class="nav-link">RUBBERAZZO</a>						
						</li>
						<li>
							<a href="#" class="nav-link">TRIATHLON</a>						
						</li>
					</ul>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link dropdown-toggle">TURF</a>
					<ul class="drop-down">
						<li>
							<a href="#" class="nav-link">EDEL GRASS</a>						
						</li>
						<li>
							<a href="#" class="nav-link">GRASS PARTNERS</a>						
						</li>
					</ul>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link dropdown-toggle">LEATHER &amp; CORK</a>
					<ul class="drop-down">
						<li>
							<a href="#" class="nav-link">ELEGANCE</a>						
						</li>
						<li>
							<a href="#" class="nav-link">GRANORTE</a>						
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link dropdown-toggle">BE INSPIRED</a>
					<ul class="drop-down">
						<li>
							<a href="#" class="nav-link">OUR CLIENTS</a>						
						</li>
						<li>
							<a href="#" class="nav-link">OUR BRANDS</a>						
						</li>
						<li>
							<a href="#" class="nav-link">INSTALLATION</a>						
						</li>
						<li>
							<a href="#" class="nav-link">PRODUCT VIDEOS</a>						
						</li>
						<li>
							<a href="#" class="nav-link">BLOG</a>						
						</li>
						<li>
							<a href="#" class="nav-link">FOLLOW US</a>						
						</li>
						<li>
							<a href="#" class="nav-link">TEAM</a>						
						</li>
						<li>
							<a href="#" class="nav-link">COLOR CONDUCTOR</a>						
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">SAMPLES</a>				
				</li>
				<li class="nav-item summit-live">
					<a href="#" class="nav-link">SUMMIT <br> LIVE</a>				
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link btn-search-open"><i class="fa fa-search fa-2x"></i></a>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link">SUMMIT LIVE</a>				
				</li>
			</ul>
</div> -->
<!-- <div class="nav-bar" id="topmenu">  -->
<div class="nav-bar" id="topmenu">
			<?php echo wp_nav_menu(
				array(
					'theme_location' => 'top',
					'menu_id'        => 'top-menu',	
					'menu_class'     => 'navbar-nav',
					)
				);
			?>
	<a href="#searchbar" class="nav-link btn-search-open" data-toggle="modal"><i class="fa fa-search fa-2x"></i></a>
	<div id="searchbar" class="modal fadeInRight" style="animation-duration: 2s;">
    <div class="modal-content">
	  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body newsletterrow">
		<div class="searchform">

			<form action="<?php echo home_url( '/' ); ?>" name="form" class="search_form" method="get" accept-charset="utf-8">
				<div class="form-group has-search">
					<span class="fa fa-search form-control-feedback"></span>
					<input type="search" id="keyword" class="form-control" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
				</div>
				</form>
		  </div>  
      </div>
    </div>
  </div>
			</div>
<!-- #site-navigation -->

