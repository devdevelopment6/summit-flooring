    	

        </div>

    	<!-- /.page-content -->

	</div>

</div>

<!-- /.main-content -->



<!-- MAIN CONTENT ENDS HERE STARTED IN ADMIN/SIDEBAR.PHP -->







<div class="footer">

  <div class="footer-inner">

    <div class="footer-content"> <span class="bigger-120"> <span class="blue bolder">Admin Panel - Color Innovator</span> 2017 </span> </div>

  </div>

</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i> </a>

</div>

<!-- /.main-container --> 



<!--[if !IE]> -->

	<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->

<!-- <![endif]-->



<!--[if IE]>

	<script src="<?php echo base_url(); ?>assets/js/jquery.1.11.1.min.js"></script>

<![endif]-->



<!--[if !IE]> -->

	<script type="text/javascript">

		window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.min.js'>"+"<"+"/script>");

	</script>

    

<!--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXiefrWzj809ZvgtmmF2sHosd9k5dOfJw&callback=myMap"></script>



<script>

function myMap() {

var mapProp= {

    center:new google.maps.LatLng(21.1865431,72.8087588),

    zoom:5,

};

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

}

</script>-->



<!-- <![endif]-->



<!--[if IE]>

	<script type="text/javascript">

		window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery1x.min.js'>"+"<"+"/script>");

	</script>

<![endif]-->



<script type="text/javascript">

	if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");

</script>



<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/bootstrap.min.js"></script>



<!-- ace scripts -->

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/ace-elements.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/ace.min.js"></script>



<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/jquery.dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/dataTables.tableTools.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/dataTables.colVis.min.js"></script>



<script type="text/javascript" >

    var color_table = "";
	var saved_color_table='';
    $(document).ready(function(){
        getColorTable();
		getSavedColorTable();
    });
	 function getSavedColorTable()
    {
		  saved_color_table = $('#view_saved_album_tbl').dataTable({
            "bServerSide": true,
            "bProcessing": true,
            "bDeferRender": true,
            "aoColumnDefs": [
                { "className": "textcenter", "targets": [ 0 ] },
                { "sClass": "Editclass", "aTargets": [ 1 ] }
            ],
            "aoColumns": [
                { "bSortable": true },
                { "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": false },
				{ "bSortable": false },
				{ "bSortable": false },
            ],
            "iDisplayLength": 20,
            "aLengthMenu": [20, 40, 60, 80, 100],
            "fnServerParams":function ( aoData ) {
            },
            "aaSorting": [[ 0, "asc" ]],
            "sAjaxSource": "<?php echo base_url(); ?>colors/get_saved_album",
			 "footerCallback": function( tfoot, data, start, end, display ) {},
            "fnDrawCallback": function () {
				$(".delete_saved_color").on('click',function(){
					var id=$(this).data('id');
					$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this record??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": '<?php echo base_url(); ?>colors/delete_saved_color',
									"method": 'POST',
									"data":{'id':id,},
									success:function(res){
										//console.log(res);
										location.reload();
									}
								});
							},
							cancel: function () {
							},
						}
					});
				});
                //actDltLink();
            }
        } );
    }
    function getColorTable()
    {
		  color_table = $('#view_colors_tbl').dataTable({
            "bServerSide": true,
            "bProcessing": true,
            "bDeferRender": true,
            "aoColumnDefs": [
                { "className": "textcenter", "targets": [ 0 ] },
                { "sClass": "Editclass", "aTargets": [ 1 ] }
            ],
            "aoColumns": [
                { "bSortable": true },
                { "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": false },
				{ "bSortable": false },
                { "bSortable": false },
				{ "bSortable": false },
				{ "bSortable": false },

            ],
            "iDisplayLength": 20,
            "aLengthMenu": [20, 40, 60, 80, 100],
            "fnServerParams":function ( aoData ) {
            },
            "aaSorting": [[ 0, "asc" ]],
            "sAjaxSource": "<?php echo base_url(); ?>colors/get_colors",
			 "footerCallback": function( tfoot, data, start, end, display ) {},
            "fnDrawCallback": function () {
				$(".delete_color").on('click',function(){
					var id=$(this).data('id');
					$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this record??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": '<?php echo base_url(); ?>colors/delete_color',
									"method": 'POST',
									"data":{'id':id,},
									success:function(res){
										//console.log(res);
										location.reload();
									}
								});
							},
							cancel: function () {
							},
						}
					});
				});
                //actDltLink();
            }
        } );
    }
</script>



<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/bootstrap-timepicker.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/moment.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/daterangepicker.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/bootstrap-datetimepicker.min.js"></script>



<script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>



<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/jquery-confirm.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/techybirds.js"></script>



<!-- inline scripts related to this page -->

	</body>

</html>