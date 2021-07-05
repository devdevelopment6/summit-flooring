<?php $this->load->view('notification'); ?>

<div class="col-md-12" style="    z-index: 9;
    float: unset;
    text-align: -webkit-right;
    margin: 10p;
    margin: 15px 0px;">
    
	<a href="<?php echo base_url();?>manage_home/add_new_case_study"><button type="button" name="view_case_studies">Add Case Studies</button></a>
</div>   
    
<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Case Studies List</h5>

	</div>

	<style>

		div.inline { float:left; }
		.clearBoth { clear:both; }
		.cls-chk{
			display:inline-block;
			margin-bottom:7px;
			width:30%;
		}
	</style>
	<div class="row">
		<div class="col-md-12">
			<table id="case_studies" class="table">
				<thead>
				<tr>
					<th>Id</th>
					<th>Image</th>
					<th>Title</th>
                    <th>Created Date</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	var table = "";
	$(document).ready(function(){
		getTable();
	});

	function getTable()
	{
		table = $('#case_studies').dataTable({
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
				{ "bSortable": true },
				{ "bSortable": false },
			],
			"iDisplayLength": 20,
			"aLengthMenu": [20, 40, 60, 80, 100],
			"fnServerParams":function ( aoData ) {
			},
			"aaSorting": [[ 0, "desc" ]],
			"sAjaxSource": "<?php echo base_url(); ?>manage_home/get_case_studies/",
			"fnDrawCallback": function () {

				//actDltLink();
			}
		} );
	}
</script>