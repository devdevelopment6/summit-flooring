<?php $this->load->view('notification'); ?>

<?php /*?><div class="row">
            <div class="col-sm-8 add_news">
            <a href="<?php echo base_url();?>manage_home/add_product_form" class="btn-yellow btn" />Add Product Content</a>
            </div>
          </div><?php */?>

<div class="widget-box ui-sortable-handle" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Location Content List</h5>

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
			<table id="news" class="table">
				<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Header Content</th>
					<th>Section Title</th>
					<th>Section Content</th>
					<th>Status</th>
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
		table = $('#news').dataTable({
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
				{ "bSortable": true },
				{ "bSortable": true },
				//{ "bSortable": true },
				//{ "bSortable": true },
				{ "bSortable": false },
			],
			"iDisplayLength": 20,
			"aLengthMenu": [20, 40, 60, 80, 100],
			"fnServerParams":function ( aoData ) {
			},
			"aaSorting": [[ 0, "desc" ]],
			"sAjaxSource": "<?php echo base_url(); ?>manage_home/get_locationcontent/",
			"fnDrawCallback": function () {

				//actDltLink();
			}
		} );
	}
</script>