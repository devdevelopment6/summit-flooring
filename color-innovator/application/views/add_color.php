<?php $this->load->view('notification'); ?>

<div class="row">



    <div class="col-xs-12">

        <form method="post" enctype="multipart/form-data" id="add_color_frm" action="<?php echo base_url().'colors/save_color'?>">

            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

        	<div class="col-md-12 form-group">

                <label class="label-control col-md-3">Color Category </label>

                <div class="col-md-3">

                    <select name="color_category" id="color_category">

                    	<option value="0">---Select---</option>

                        <option value="1">Indoor</option>

                        <option value="2">Outdoor</option>

                    </select>

                </div>

            </div>

            <div class="col-md-12 form-group">

                <label class="label-control col-md-3">Color Name </label>

                <div class="col-md-3">

                <input type="text" name="color_name" id="color_name" class="form-control" placeholder="Color Name" required/>

                </div>

            </div>

            <div class="col-md-12 form-group">

                <label class="label-control col-md-3">Color Hexcode </label>

                <div class="col-md-3">

                <input type="text" name="color_haxcode" id="color_haxcode" class="form-control" placeholder="Color Haxcode" required/>

                </div>

            </div>

            <div class="col-md-12 form-group">

                <label class="label-control col-md-3">Color Image </label>

                <div class="col-md-3">

                <input type="file" name="color_image" id="color_image" />

                </div>

            </div>

             <div class="col-md-12 form-group">

                <label class="label-control col-md-3">Coarse </label>

                <div class="col-md-3">

                <input type="checkbox" name="color_coarse" id="color_coarse" value="1" />

                </div>

            </div>

             <div class="col-md-12 form-group">

                <label class="label-control col-md-3">Fine </label>

                <div class="col-md-3">

                <input type="checkbox" name="color_fine" id="color_fine"  value="1" />

                </div>

            </div>

             <div class="col-md-12 form-group">

                <label class="label-control col-md-3">Active </label>

                <div class="col-md-3">

                <input type="checkbox" name="color_active" id="color_active"  value="1" />

                </div>

            </div>

            <div class="col-md-12 form-group">

                <div class="col-md-3"></div>

                <div class="col-md-3">

                    <input type="submit" value="Add" class="btn btn-success" />

                    <input type="reset" value="Cancel" class="btn btn-danger" />

                </div>

            </div>

        </form>

    </div><!-- /.col -->



</div><!-- /.row -->

<script type="text/javascript">

    $(document).ready(function(){

        $("#add_color_frm").validate({

            rules:{

                color_name:{

                    required:true,

                },

                color_image:{

                    required: true,

                    extension: "jpg|png|jpeg"

                },

                color_haxcode:{

                    required:true,

                }

            },

            messages:{

                color_name:{

                    required:"Color Name Required!!",

                },

                color_image:{

                    required: "Color Image Required!!",

                    extension: "Select JPG|PNG Files"

                },

                color_haxcode:{

                    required:"Color Hex Code Required!!",

                }

            },

        });

    });

</script>