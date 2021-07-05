<?php $this->load->view('notification'); ?>

 <?php /*?><div class="row">
            <div class="col-sm-8 add_news">																															 				
            <a href="<?php echo base_url();?>manage_home/add_about_content" class="btn-yellow btn" />Add Content</a>
            </div>
          </div><?php */?>
                   
          
          <div class="widget-box ui-sortable-handle" id="widget-box-1">
            <div class="widget-header">
                <h5 class="widget-title">Product List</h5>
        
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
                    <th>Product Name</th>
					<th>Product Image</th>
					<th>Product Category</th>
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
            "sAjaxSource": "<?php echo base_url(); ?>products/get_products/",
            "fnDrawCallback": function () {

                //actDltLink();
            }
        } );
    }
</script>