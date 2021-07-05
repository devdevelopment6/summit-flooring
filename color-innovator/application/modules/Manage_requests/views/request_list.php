	 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Request List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="request_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SR No.</th>
					<th>Name</th>
					<th>Email</th>
					<th>Contact Number</th>
					<th>Request Date/Time</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<script type="text/javascript">
var request_table='';
$(document).ready(function(){
	getRequestTable();
});
function getRequestTable()
	{
	
		if(request_table != "")
		{ 	
			request_table.fnDestroy();
			$.fn.DataTable.ext.errMode = 'none';
			request_table.fnDraw();
		}
		request_table = $('#request_table').dataTable({
			
			"bServerSide": true,
			"bProcessing": true,
			"bDeferRender": true,
			"aoColumnDefs": [
				{ "className": "textcenter", "targets": [ 0 ] },
				{ "sClass": "Editclass", "aTargets": [ 1 ] }
			],
			"aoColumns": [
				null,
				null,
				{ "bSortable": false },
				{ "bSortable": false },
				{ "bSortable": true },
				{ "bSortable": false },
			],
				
			"iDisplayLength": 20,
			"aLengthMenu": [20, 40, 60, 80, 100],
			"fnServerParams": function ( aoData ) {
				//aoData.push( { "name": "country", "value": $("#country").val() } );
			//	aoData.push( { "name": "city", "value": $("#city").val()} );
				
			},
			"aaSorting": [[4,'desc']],
			"sAjaxSource": base_url+"manage_requests/get_requests",
			"fnDrawCallback": function () {
				$(".delete_request").on('click',function(){
					var id=$(this).data('id');
					$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this record??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'manage_requests/delete_request',
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
				$("#overlay").hide();
			}
		} );
	}
</script>