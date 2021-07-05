	  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users Listing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="users_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>SR No.</th>
					<th>User Name</th>
					<th>Email Id</th>
					<th>Mobile Number</th>
					<th>Status</th>
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
var users_table='';
$(document).ready(function(){
	getUsersTable();
});
function getUsersTable()
	{
	
		if(users_table != "")
		{ 	
			users_table.fnDestroy();
			$.fn.DataTable.ext.errMode = 'none';
			users_table.fnDraw();
		}
		users_table = $('#users_table').dataTable({
			
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
				null,
				{ "bSortable": false },
			],
				
			"iDisplayLength": 20,
			"aLengthMenu": [20, 40, 60, 80, 100],
			"fnServerParams": function ( aoData ) {
				//aoData.push( { "name": "country", "value": $("#country").val() } );
			//	aoData.push( { "name": "city", "value": $("#city").val()} );
				
			},
			"aaSorting": [],
			"sAjaxSource": base_url+"users/get_users",
			"fnDrawCallback": function () {
				$(".delete_user").on('click',function(){
					var id=$(this).data('id');
					$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this record??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'users/delete_user/'+id,
									"method": 'POST',
									"data":{},
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