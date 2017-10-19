<script src="<?php echo base_url(); ?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/libs/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/libs/spin.js/spin.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/libs/toastr/toastr.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/source/App.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/source/AppNavigation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/source/AppOffcanvas.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/source/AppCard.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/source/AppForm.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/source/AppNavSearch.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/source/AppVendor.js"></script>
<script src="<?php echo base_url(); ?>assets/js/core/demo/Demo.js"></script>
<?php if (validation_errors() || isset($error)) { ?>
<script>
	$(document).ready( function (e) {
		toastr.clear();

		toastr.options.closeButton = false;
		toastr.options.progressBar = false;
		toastr.options.debug = false;
		toastr.options.positionClass = 'toast-bottom-left';
		toastr.options.showDuration = 333;
		toastr.options.hideDuration = 333;
		toastr.options.timeOut = 4000;
		toastr.options.extendedTimeOut = 4000;
		toastr.options.showEasing = 'swing';
		toastr.options.hideEasing = 'swing';
		toastr.options.showMethod = 'slideDown';
		toastr.options.hideMethod = 'slideUp';
		toastr.options.progressBar = true;
		toastr.options.positionClass = "toast-top-center";
		toastr.info('<p><font color=red><i class="fa fa-info"></i> ERROR</font></p><?= trim(preg_replace('~[\r\n]+~', '', validation_errors())) ?>', '');

	});
</script>
<?php } ?>
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>