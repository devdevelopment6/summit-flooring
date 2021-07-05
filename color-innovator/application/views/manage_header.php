<?php $this->load->view('notification'); ?>

 <div class="row">
            <div class="col-sm-8 add_news">																															 				
            <a href="<?php echo base_url();?>manage_home/add_header" class="btn-yellow btn" />Add Header Content</a>
            </div>
          </div>
                   
          
          <div class="widget-box ui-sortable-handle" id="widget-box-1">
            <div class="widget-header">
                <h5 class="widget-title">Header Content List</h5>
        
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
                    <th>Header Title</th>
					<th width="50%">Header Short Content</th>
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
                //{ "bSortable": true },
				//{ "bSortable": true },
				//{ "bSortable": true },
				//{ "bSortable": true },
				{ "bSortable": false },
            ],
            "iDisplayLength": 20,
            "aLengthMenu": [20, 40, 60, 80, 100],
            "fnServerParams":function ( aoData ) {
            },
            "aaSorting": [[ 0, "desc" ]],
            "sAjaxSource": "<?php echo base_url(); ?>manage_home/get_header_content/",
            "fnDrawCallback": function () {

                //actDltLink();
            }
        } );
    }
</script>