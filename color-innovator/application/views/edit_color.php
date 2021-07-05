<?php $this->load->view('notification'); ?>
<div class="row">

    <div class="col-xs-12">
        <form method="post" enctype="multipart/form-data" id="edit_color_frm" action="<?php echo base_url().'colors/update_color/'.$color_data['id']; ?>">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

        	<div class="col-md-12 form-group">
                <label class="label-control col-md-3">Color Category </label>
                <div class="col-md-3">
                    <select name="color_category" id="color_category">
                    	<option value="0">---Select---</option>
                        <option value="1" <?php if($color_data['color_category'] == 1){echo "selected";} ?>>Indoor</option>
                        <option value="2" <?php if($color_data['color_category'] == 2){echo "selected";} ?>>Outdoor</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label class="label-control col-md-3">Color Name </label>
                <div class="col-md-3">
                <input type="text" name="color_name" id="color_name" class="form-control" placeholder="Color Name"  value="<?php if($color_data!=''){ echo $color_data['color_title']; } ?>" required/>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label class="label-control col-md-3">Color Hexcode </label>
                <div class="col-md-3">
                <input type="text" name="color_haxcode" id="color_haxcode" class="form-control" placeholder="Color Haxcode" value="<?php if($color_data!=''){ echo $color_data['hex_code']; } ?>" required/>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label class="label-control col-md-3">Color Image </label>
                <div class="col-md-3">
                <input type="file" name="color_image" id="color_image" />
                </div>
				<?php if($color_data!='' && $color_data['color_img']!='' && file_exists(FCPATH.'uploads/colors/'.$color_data['color_img'])){ ?>
					<div class="col-md-3">
						<img src="<?php echo base_url().'uploads/colors/'.$color_data['color_img']; ?>" style="width:300px; height:300px;"	/>
					</div>
				<?php } ?>
            </div>
			<?php if($color_data['id']!=1){ ?>
             <div class="col-md-12 form-group">
                <label class="label-control col-md-3">Coarse </label>
                <div class="col-md-3">
                <input type="checkbox" name="color_coarse" id="color_coarse" value="1" <?php if($color_data!=''){ echo ($color_data['coarse']==1)?"checked":""; }?> />
                </div>
            </div>
			<?php }?>
             <div class="col-md-12 form-group">
                <label class="label-control col-md-3">Fine </label>
                <div class="col-md-3">
                <input type="checkbox" name="color_fine" id="color_fine"  value="1" <?php echo ($color_data['id']==1)?"disabled":""; ?>  <?php if($color_data!=''){ echo ($color_data['fine']==1)?"checked":""; }?> />
                </div>
            </div>
             <div class="col-md-12 form-group">
                <label class="label-control col-md-3">Active </label>
                <div class="col-md-3">
                <input type="checkbox" name="color_active" id="color_active"  value="1" <?php if($color_data!=''){ echo ($color_data['status']==1)?"checked":""; }?> />
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <input type="submit" value="Update" class="btn btn-success" />
                    <input type="reset" value="Cancel" class="btn btn-danger" />
                </div>
            </div>
        </form>
    </div><!-- /.col -->

</div><!-- /.row -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#edit_color_frm").validate({
            rules:{
                color_name:{
                    required:true,
                },
                color_haxcode:{
                    required:true,
                }
            },
            messages:{
                color_name:{
                    required:"Color Name Required!!",
                },
                color_haxcode:{
                    required:"Color Hex Code Required!!",
                }
            },
        });
    });
</script>