(function (namespace, $) {
	"use strict";

	var valerror = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = valerror.prototype;

	// =========================================================================
	// MEMBER
	// =========================================================================

	p.messageTimer = null;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._initToastr();
		
		$('#toast-info').trigger('click');
	};

	// =========================================================================
	// INIT TOASTR
	// =========================================================================

	// events
	p._initToastr = function () {
		this._initActionToastr();
	};
	
	// =========================================================================
	// ACTION TOASTS
	// =========================================================================

	p._initActionToastr = function () {
		var o = this;
		$(document).ready( function (e) {
			toastr.clear();

			o._toastrStateConfig();
			toastr.options.progressBar = true;
			toastr.options.positionClass = "toast-top-center";
			toastr.info('<i class="fa fa-info"></i>'+'<?php echo "asd"; ?>', '');
		});
	};

	// =========================================================================
	// TOAST CONFIG
	// =========================================================================

	p._toastrStateConfig = function () {
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
	};

	// =========================================================================
	namespace.valerror = new valerror;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
