<?php if($success != "" || $error != "") { ?>
<div class="row">
	<div class="col-md-12">
		<?php if($success != "") { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">×</span>
                </button>
                <?php echo $success; ?>
            </div>
        <?php } ?>
        
        <?php if($error != "") { ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">×</span>
                </button>
                <?php echo $error; ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php } ?>