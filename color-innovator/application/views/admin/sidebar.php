

<div id="sidebar" class="sidebar responsive"> 

	<script type="text/javascript">

    	try{ace.settings.check('sidebar' , 'fixed')}catch(e){}

    </script>

    <ul class="nav nav-list">

        <li class="active">

            <a href="<?php echo base_url(); ?>admin/">

                <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span>

            </a>

            <b class="arrow"></b>

        </li>
	    <?php

	        $filter = array("menu_type" => "module", "status" => "1");

	        $table  = "menu_new";

	        $order  = array("menu_order", "ASC");

	        $menus  = $this->common_model->get_by_condition($table, $filter, $order);

	        if($menus!=false){
	        foreach($menus as $menu)
	        {
                    
	        	$flag = $this->ModelUserpermitions->check_permition($menu['menu_link'], $logedin['user_type_id']);
	        		            
	            $filter = array("parent" => $menu['id']);

	            $submenu = $this->common_model->get_by_condition($table, $filter, $order);
				
	    ?>

		<?php if($flag) {  ?>

		

        <li <?php  if($activemenu==$menu['menu_name']) { ?> class="open" <?php } else { ?> class=""<?php } ?> >
			
        	<a href="#" class="dropdown-toggle">

            	<i class="menu-icon <?php echo $menu['menu_icon']; ?>"></i>

                <span class="menu-text"> <?php echo $menu['menu_name']; ?> </span>

                <?php if($submenu != false) { ?><b class="arrow fa fa-angle-down"></b> <?php } ?>

            </a>

            <b class="arrow"></b>

			

	        <?php 

						if($submenu != false) { ?>

	            <ul class="submenu">

		            <?php

			

			            foreach($submenu as $dropdown)

			            {

				            $flag = $this->ModelUserpermitions->check_permition($dropdown['menu_link'], $logedin['user_type_id']);



				            if($flag)

				            {

		             ?>

				                <li class="">

				                    <a href="<?php echo base_url().$dropdown['menu_link']; ?>">

				                        <i class="menu-icon fa fa-caret-right"></i> <?php  echo $dropdown['menu_name']; ?>

				                    </a>

				                    <b class="arrow"></b>

				                </li>

		            <?php

		                    }

						 }

		            ?>



	            </ul>

	        <?php } ?>

        </li>

	    <?php } } }?>

    </ul>

  <!-- /.nav-list -->

  

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">

    	<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"> </i>

    </div>

	<script type="text/javascript">

        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}

    </script> 

</div>





<!-- MAIN CONTENT START HERE AND END IN ADMIN/FOOTER.PHP -->







<div class="main-content">

  <div class="main-content-inner">

    <div class="breadcrumbs" id="breadcrumbs"> 

      <script type="text/javascript">

			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}

		</script>

      <ul class="breadcrumb">

        <li>

        	<i class="ace-icon fa fa-home home-icon"></i>

            <a href="<?php echo base_url(); ?>admin"><?php echo $panel; ?></a>

        </li>

        <li class="active"><?php echo $title; ?></li>

      </ul>

      <!-- /.breadcrumb --> 

    </div>

    <div class="page-content">

      <div class="page-header">

        <h1> <?php echo $page; ?> </h1>

      </div>

      <!-- /.page-header -->