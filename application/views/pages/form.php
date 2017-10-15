			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<ol class="breadcrumb">
							<li class="active">Form basic</li>
						</ol>
					</div>
					<div class="section-body contain-lg">

						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="text-primary">Basic form elements</h1>
							</div><!--end .col -->
							<div class="col-lg-8">
								<article class="margin-bottom-xxl">
									<p class="lead">
										Basic form elements are text fields that allow the user to input text or select a value.
										They can be single line or multi-line, and can have an icon.
									</p>
								</article>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->

						<!-- BEGIN BASIC ELEMENTS -->
						<div class="row">
							<div class="col-lg-12">
								<h4>Basic elements</h4>
							</div><!--end .col -->
							<div class="col-lg-3 col-md-4">
								<article class="margin-bottom-xxl">
									<ul class="list-divided">
										<li>
											When the field is focused, there will be a thicker line drawn beneath it.
											The label in this example is always visible.
										</li>
										<li>
											The vertical layout can be used in combination with a floating label.
											With floating labels, when the user engages with the input fields, the labels move to float above the field.
										</li>
									</ul>
								</article>
							</div><!--end .col -->
							<div class="col-lg-offset-1 col-md-4 col-sm-6">
								<div class="card">
									<div class="card-body">
										<form class="form">
											<div class="form-group">
												<input type="text" class="form-control" id="regular1">
												<label for="regular1">Regular input</label>
											</div>
											<div class="form-group">
												<input type="password" class="form-control" id="password1">
												<label for="password1">Password</label>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="placeholder1" placeholder="Placeholder">
												<label for="placeholder1">Placeholder</label>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="help1">
												<label for="help1">Input with help text</label>
												<p class="help-block">Help text</p>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="tooltip1" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Example input tooltip text here">
												<label for="help1">Input with tooltip</label>
											</div>
											<div class="form-group">
												<select id="select1" name="select1" class="form-control">
													<option value="">&nbsp;</option>
													<option value="30">30</option>
													<option value="40">40</option>
													<option value="50">50</option>
													<option value="60">60</option>
													<option value="70">70</option>
												</select>
												<label for="select1">Select</label>
											</div>
											<div class="form-group">
												<textarea name="textarea1" id="textarea1" class="form-control" rows="3" placeholder=""></textarea>
												<label for="textarea1">Textarea</label>
											</div>
											<div class="form-group">
												<label>Static control</label>
												<p class="form-control-static">email@example.com</p>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Basic elements</em>
							</div><!--end .col -->
							<div class="col-md-4 col-sm-6">
								<div class="card">
									<div class="card-body">
										<form class="form" role="form">
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="regular2">
												<label for="regular2">Regular input</label>
											</div>
											<div class="form-group floating-label">
												<input type="password" class="form-control" id="password2">
												<label for="password2">Password</label>
											</div>
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="placeholder2">
												<label for="placeholder2">Placeholder</label>
											</div>
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="help2">
												<label for="help2">Input with help text</label>
												<p class="help-block">Help text</p>
											</div>
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="tooltip2" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Example input tooltip text here">
												<label for="help2">Input with tooltip</label>
											</div>
											<div class="form-group floating-label">
												<select id="select2" name="select2" class="form-control">
													<option value="">&nbsp;</option>
													<option value="30">30</option>
													<option value="40">40</option>
													<option value="50">50</option>
													<option value="60">60</option>
													<option value="70">70</option>
												</select>
												<label for="select2">Select</label>
											</div>
											<div class="form-group floating-label">
												<textarea name="textarea2" id="textarea2" class="form-control" rows="3" placeholder=""></textarea>
												<label for="textarea2">Textarea</label>
											</div>
											<div class="form-group floating-label">
												<label>Static control</label>
												<p class="form-control-static">email@example.com</p>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Basic elements with floating labels</em>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END BASIC ELEMENTS -->

						<!-- BEGIN SIZES -->
						<div class="row">
							<div class="col-lg-12">
								<h4>Sizes</h4>
							</div>
							<div class="col-lg-3 col-md-4">
								<article class="margin-bottom-xxl">
									<p>
										Set heights using classes like <code>.input-lg</code>, and set widths using grid column classes like <code>.col-lg-*</code>.
									</p>
								</article>
							</div><!--end .col -->
							<div class="col-lg-offset-1 col-md-4 col-sm-6">
								<div class="card">
									<div class="card-body">
										<form class="form" role="form">
											<div class="form-group">
												<input type="text" class="form-control input-lg" id="large3" placeholder=".input-lg">
												<label for="large3">Large input</label>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="default3" placeholder="Default input">
												<label for="default3">Default input</label>
											</div>
											<div class="form-group">
												<input type="text" class="form-control input-sm" id="small3" placeholder=".input-sm">
												<label for="small3">Small input</label>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Control sizing</em>
							</div><!--end .col -->
							<div class="col-md-4 col-sm-6">
								<div class="card">
									<div class="card-body">
										<form class="form" role="form">
											<div class="form-group floating-label">
												<input type="text" class="form-control input-lg" id="large4">
												<label for="large4">Large input</label>
											</div>
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="default4">
												<label for="default4">Default input</label>
											</div>
											<div class="form-group floating-label">
												<input type="text" class="form-control input-sm" id="small4">
												<label for="small4">Small input</label>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Control sizing with floating labels</em>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END SIZES -->

						<!-- BEGIN INPUT STATES -->
						<div class="row">
							<div class="col-lg-12">
								<h4>Input states</h4>
							</div><!--end .col -->
							<div class="col-lg-3 col-md-4">
								<article class="margin-bottom-xxl">
									<ul class="list-divided">
										<li>
											Add the <code>disabled</code> boolean attribute on an input to prevent user input and trigger a slightly different look.
										</li>
										<li>
											Add the <code>readonly</code> boolean attribute on an input to prevent user input and style the input as disabled.
										</li>
									</ul>
								</article>
							</div><!--end .col -->
							<div class="col-lg-offset-1 col-md-4 col-sm-6">
								<div class="card">
									<div class="card-body">
										<form class="form" role="form">
											<div class="form-group">
												<input type="text" class="form-control" id="disabled5" placeholder="Disabled input" disabled>
												<label for="disabled5">Disabled state</label>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="readonly5" value="Readonly input" readonly>
												<label for="readonly5">Readonly state</label>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Input states</em>
							</div><!--end .col -->
							<div class="col-md-4 col-sm-6">
								<div class="card">
									<div class="card-body">
										<form class="form" role="form">
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="disabled6" disabled>
												<label for="disabled6">Disabled state</label>
											</div>
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="readonly6" value="Readonly input" readonly>
												<label for="readonly6">Readonly state</label>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Input states with floating labels</em>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INPUT STATES -->

						<!-- BEGIN VALIDATION STATES -->
						<div class="row">
							<div class="col-lg-12">
								<h4>Validation states</h4>
							</div>
							<div class="col-lg-3 col-md-4">
								<article class="margin-bottom-xxl">
									<p>
										Material Admin includes validation styles for error, warning, and success states on form controls.
									</p>
								</article>
							</div>
							<div class="col-lg-offset-1 col-md-4 col-sm-6">
								<div class="card">
									<div class="card-body">
										<form class="form" role="form">
											<div class="form-group has-warning">
												<input type="text" class="form-control" id="warning7">
												<label for="warning7">Warning state</label>
											</div>
											<div class="form-group has-warning has-feedback">
												<input type="text" class="form-control" id="warningfeedback7">
												<label for="warningfeedback7">Warning state with icon</label>
												<span class="glyphicon glyphicon-ok form-control-feedback"></span>
											</div>
											<div class="form-group has-success">
												<input type="text" class="form-control" id="success7">
												<label for="success7">Success state</label>
											</div>
											<div class="form-group has-success has-feedback">
												<input type="text" class="form-control" id="successfeedback7">
												<label for="successfeedback7">Success state with icon</label>
												<span class="glyphicon glyphicon-ok form-control-feedback"></span>
											</div>
											<div class="form-group has-error">
												<input type="text" class="form-control" id="error7">
												<label for="error7">Error state</label>
											</div>
											<div class="form-group has-error has-feedback">
												<input type="text" class="form-control" id="errorfeedback7">
												<label for="errorfeedback7">Error state with icon</label>
												<span class="glyphicon glyphicon-ok form-control-feedback"></span>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Validation states</em>
							</div><!--end .col -->
							<div class="col-md-4 col-sm-6">
								<div class="card">
									<div class="card-body">
										<form class="form" role="form">
											<div class="form-group has-warning floating-label">
												<input type="text" class="form-control" id="warning8">
												<label for="warning8">Warning state</label>
											</div>
											<div class="form-group has-warning has-feedback floating-label">
												<input type="text" class="form-control" id="warningfeedback8">
												<label for="warningfeedback8">Warning state with icon</label>
												<span class="glyphicon glyphicon-ok form-control-feedback"></span>
											</div>
											<div class="form-group has-success floating-label">
												<input type="text" class="form-control" id="success8">
												<label for="success8">Success state</label>
											</div>
											<div class="form-group has-success has-feedback floating-label">
												<input type="text" class="form-control" id="successfeedback8">
												<label for="successfeedback8">Success state with icon</label>
												<span class="glyphicon glyphicon-ok form-control-feedback"></span>
											</div>
											<div class="form-group has-error floating-label">
												<input type="text" class="form-control" id="error8">
												<label for="error8">Error state</label>
											</div>
											<div class="form-group has-error has-feedback floating-label">
												<input type="text" class="form-control" id="errorfeedback8">
												<label for="errorfeedback8">Error state with icon</label>
												<span class="glyphicon glyphicon-ok form-control-feedback"></span>
											</div>
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Validation states with floating labels</em>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END VALIDATION STATES -->

						<!-- BEGIN GROUPS -->
						<div class="row">
							<div class="col-lg-12">
								<h4>Groups</h4>
							</div><!--end .col -->
							<div class="col-lg-3 col-md-4">
								<article class="margin-bottom-xxl">
									<p>
										Extend form controls by adding text or buttons before, after, or on both sides of any text-based <code>&lt;input&gt;</code>.
									</p>
								</article>
							</div><!--end .col -->
							<div class="col-lg-offset-1 col-md-4 col-sm-6">
								<div class="card">
									<div class="card-body">
										<form class="form" role="form">
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-content">
														<input type="text" class="form-control" id="amount9">
														<label for="amount9">Amount</label>
													</div>
													<span class="input-group-addon">.00</span>
												</div>
											</div><!--end .form-group -->
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-usd fa-lg"></i></span>
													<div class="input-group-content">
														<input type="text" class="form-control" id="dollars9">
														<label for="dollars9">Dollars</label>
													</div>
													<span class="input-group-addon">.00</span>
												</div>
											</div><!--end .form-group -->
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><span class="glyphicon glyphicon-user fa-lg"></span></span>
													<div class="input-group-content">
														<input type="text" class="form-control" id="username9">
														<label for="username9">Username</label>
													</div>
												</div>
											</div><!--end .form-group -->
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon">
														<div class="checkbox checkbox-inline checkbox-styled">
															<label>
																<input type="checkbox">
															</label>
														</div>
													</div>
													<div class="input-group-content">
														<input type="text" class="form-control" id="groupcheckbox9">
														<label for="groupcheckbox9">Checkbox</label>
													</div>
												</div>
											</div><!--end .form-group -->
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-content">
														<input type="text" class="form-control" id="groupbutton9">
														<label for="groupbutton9">Button</label>
													</div>
													<div class="input-group-btn">
														<button class="btn btn-default" type="button">Go!</button>
													</div>
												</div>
											</div><!--end .form-group -->
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-content">
														<input type="text" class="form-control" id="doublegroupbutton9">
														<label for="doublegroupbutton9">Button</label>
													</div>
													<div class="input-group-btn">
														<button type="button" class="btn btn-default" tabindex="-1">Action</button>
														<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
															<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right" role="menu">
															<li><a href="#">Action</a></li>
															<li><a href="#">Another action</a></li>
															<li><a href="#">Something else here</a></li>
															<li class="divider"></li>
															<li><a href="#">Separated link</a></li>
														</ul>
													</div>
												</div><!--end .input-group -->
											</div><!--end .form-group -->
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Input groups</em>
							</div><!--end .col -->
							<div class="col-md-4 col-sm-6">
								<div class="card">
									<div class="card-body">
										<form class="form" role="form">
											<div class="form-group floating-label">
												<div class="input-group">
													<div class="input-group-content">
														<input type="text" class="form-control" id="amount10">
														<label for="amount10">Amount</label>
													</div>
													<span class="input-group-addon">.00</span>
												</div>
											</div><!--end .form-group -->
											<div class="form-group floating-label">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-usd fa-lg"></i></span>
													<div class="input-group-content">
														<input type="text" class="form-control" id="dollars10">
														<label for="dollars10">Dollars</label>
													</div>
													<span class="input-group-addon">.00</span>
												</div>
											</div><!--end .form-group -->
											<div class="form-group floating-label">
												<div class="input-group">
													<span class="input-group-addon"><span class="glyphicon glyphicon-user fa-lg"></span></span>
													<div class="input-group-content">
														<input type="text" class="form-control" id="username10">
														<label for="username10">Username</label>
													</div>
												</div>
											</div><!--end .form-group -->
											<div class="form-group floating-label">
												<div class="input-group">
													<div class="input-group-addon">
														<div class="checkbox checkbox-inline checkbox-styled">
															<label>
																<input type="checkbox">
															</label>
														</div>
													</div>
													<div class="input-group-content">
														<input type="text" class="form-control" id="groupcheckbox10">
														<label for="groupcheckbox10">Checkbox</label>
													</div>
												</div>
											</div><!--end .form-group -->
											<div class="form-group floating-label">
												<div class="input-group">
													<div class="input-group-content">
														<input type="text" class="form-control" id="groupbutton10">
														<label for="groupbutton10">Button</label>
													</div>
													<div class="input-group-btn">
														<button class="btn btn-default" type="button">Go!</button>
													</div>
												</div>
											</div><!--end .form-group -->
											<div class="form-group floating-label">
												<div class="input-group">
													<div class="input-group-content">
														<input type="text" class="form-control" id="doublegroupbutton10">
														<label for="doublegroupbutton10">Button</label>
													</div>
													<div class="input-group-btn">
														<button type="button" class="btn btn-default" tabindex="-1">Action</button>
														<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
															<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right" role="menu">
															<li><a href="#">Action</a></li>
															<li><a href="#">Another action</a></li>
															<li><a href="#">Something else here</a></li>
															<li class="divider"></li>
															<li><a href="#">Separated link</a></li>
														</ul>
													</div>
												</div><!--end .input-group -->
											</div><!--end .form-group -->
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<em class="text-caption">Input groups with floating labels</em>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END GROUPS -->

						<hr class="ruler-xxl"/>

						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h2 class="text-primary">Switches</h2>
							</div><!--end .col -->
							<div class="col-lg-8">
								<p class="lead">
									Switches allow the user to select options.
									There are two kinds: checkboxes and radio buttons.
								</p>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->

						<!-- BEGIN CHECKBOX -->
						<div class="row">
							<div class="col-lg-12">
								<h4>Checkboxes</h4>
							</div><!--end .col -->
							<div class="col-lg-3 col-md-4">
								<article class="margin-bottom-xxl">
									<p>
										Checkboxes allow the user to select multiple options from a set.
									</p>
									<p>
										If you have multiple on/off options appearing in a list, checkboxes are a good way to preserve space.
									</p>
									<p>
										Checkboxes use animation to communicate focused and pressed states.
									</p>
								</article>
							</div><!--end .col -->
							<div class="col-lg-offset-1 col-md-8">
								<div class="card">
									<div class="card-body">
										<form class="form-horizontal" role="form">
											<div class="form-group">
												<label class="col-sm-3 control-label">Checkboxes</label>
												<div class="col-sm-9">
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" value="">
															<span>Default checkbox</span>
														</label>
													</div>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" value="">
															<span>Another default checkbox</span>
														</label>
													</div>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" value="" disabled>
															<span>Disabled checkbox</span>
														</label>
													</div>
													<div class="checkbox checkbox-styled">
														<label>
															<input type="checkbox" value="" disabled checked>
															<span>Disabled and checked checkbox</span>
														</label>
													</div>
												</div><!--end .col -->
											</div><!--end .form-group -->
											<div class="form-group">
												<label class="col-sm-3 control-label">Inline checkboxes</label>
												<div class="col-sm-9">
													<label class="checkbox-inline checkbox-styled">
														<input type="checkbox" value="option1"><span>1</span>
													</label>
													<label class="checkbox-inline checkbox-styled">
														<input type="checkbox" value="option2"><span>2</span>
													</label>
													<label class="checkbox-inline checkbox-styled">
														<input type="checkbox" value="option3"><span>3</span>
													</label>
												</div><!--end .col -->
											</div><!--end .form-group -->
											<div class="form-group">
												<label class="col-sm-3 control-label">Checkbox styles</label>
												<div class="col-sm-9">
													<label class="checkbox-inline checkbox-styled checkbox-primary">
														<input type="checkbox" value="option1" checked><span>Primary</span>
													</label>
													<label class="checkbox-inline checkbox-styled checkbox-success">
														<input type="checkbox" value="option3" checked><span>Success</span>
													</label>
													<label class="checkbox-inline checkbox-styled checkbox-warning">
														<input type="checkbox" value="option3" checked><span>Warning</span>
													</label>
													<label class="checkbox-inline checkbox-styled checkbox-danger">
														<input type="checkbox" value="option2" checked><span>Danger</span>
													</label>
													<label class="checkbox-inline checkbox-styled checkbox-info">
														<input type="checkbox" value="option3" checked><span>Info</span>
													</label>
												</div><!--end .col -->
											</div><!--end .form-group -->
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END CHECKBOX -->

						<!-- BEGIN RADIOBUTTONS -->
						<div class="row">
							<div class="col-lg-12">
								<h4>Radio buttons</h4>
							</div>
							<div class="col-lg-3 col-md-4">
								<article class="margin-bottom-xxl">
									<p>
										Radio buttons allow the user to select one option from a set. Use radio buttons for exclusive selection if you think that the user needs to see all available options side-by-side.
									</p>
									<p>
										Radio buttons use animation to communicate focused and pressed states.
									</p>
								</article>
							</div><!--end .col -->
							<div class="col-lg-offset-1 col-md-8">
								<div class="card">
									<div class="card-body">
										<form class="form-horizontal" role="form">
											<div class="form-group">
												<label class="col-sm-3 control-label">Radio buttons</label>
												<div class="col-sm-9">
													<div class="radio radio-styled">
														<label>
															<input type="radio" name="optionsRadios" value="option1" checked>
															<span>Default radio button</span>
														</label>
													</div>
													<div class="radio radio-styled">
														<label>
															<input type="radio" name="optionsRadios" value="option1">
															<span>Another default radio button</span>
														</label>
													</div>
													<div class="radio radio-styled">
														<label>
															<input type="radio" name="optionsRadios" value="option2" disabled>
															<span>Disabled radio button</span>
														</label>
													</div>
													<div class="radio radio-styled">
														<label>
															<input type="radio" name="optionsRadios2" value="option3" disabled checked>
															<span>Disabled and checkedradio button</span>
														</label>
													</div>
												</div><!--end .col -->
											</div><!--end .form-group -->
											<div class="form-group">
												<label class="col-sm-3 control-label">Inline radio buttons</label>
												<div class="col-sm-9">
													<label class="radio-inline radio-styled">
														<input type="radio" name="inlineRadioOptions" value="option1"><span>1</span>
													</label>
													<label class="radio-inline radio-styled">
														<input type="radio" name="inlineRadioOptions" value="option2"><span>2</span>
													</label>
													<label class="radio-inline radio-styled">
														<input type="radio" name="inlineRadioOptions" value="option3"><span>3</span>
													</label>
												</div><!--end .col -->
											</div><!--end .form-group -->
											<div class="form-group">
												<label class="col-sm-3 control-label">Radio buttons styles</label>
												<div class="col-sm-9">
													<label class="radio-inline radio-styled radio-primary">
														<input type="radio" checked><span>Primary</span>
													</label>
													<label class="radio-inline radio-styled radio-success">
														<input type="radio" checked><span>Success</span>
													</label>
													<label class="radio-inline radio-styled radio-warning">
														<input type="radio" checked><span>Warning</span>
													</label>
													<label class="radio-inline radio-styled radio-danger">
														<input type="radio" checked><span>Danger</span>
													</label>
													<label class="radio-inline radio-styled radio-info">
														<input type="radio" checked><span>Info</span>
													</label>
												</div><!--end .col -->
											</div><!--end .form-group -->
										</form>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END RADIOBUTTONS -->

						<hr class="ruler-xxl"/>

						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h2 class="text-primary">Horizontal form elements</h2>
							</div><!--end .col -->
							<div class="col-lg-8">
								<p class="lead">
									Each element above, can also be used in a horizontal layout.
								</p>
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END INTRO -->

						<!-- BEGIN HORIZONTAL FORM - BASIC ELEMENTS-->
						<div class="card">
							<div class="card-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label">Regular input</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="regular13">
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-2 control-label">Password</label>
										<div class="col-sm-10">
											<input type="password" class="form-control" id="password13">
										</div>
									</div>
									<div class="form-group">
										<label for="placeholder13" class="col-sm-2 control-label">Placeholder</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="placeholder13" placeholder="Placeholder">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Static control</label>
										<div class="col-sm-10">
											<p class="form-control-static">email@example.com</p>
										</div>
									</div>
									<div class="form-group">
										<label for="help13" class="col-sm-2 control-label">Input with help text</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="help13">
											<p class="help-block">Example block-level help text here</p>
										</div>
									</div>
									<div class="form-group">
										<label for="help13" class="col-sm-2 control-label">Input with tooltip</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="tooltip13" placeholder="Hover me" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Example input tooltip text here">
										</div>
									</div>
									<div class="form-group">
										<label for="select13" class="col-sm-2 control-label">Select</label>
										<div class="col-sm-10">
											<select id="select13" name="select13" class="form-control">
												<option value="">&nbsp;</option>
												<option value="30">30</option>
												<option value="40">40</option>
												<option value="50">50</option>
												<option value="60">60</option>
												<option value="70">70</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="textarea13" class="col-sm-2 control-label">Textarea</label>
										<div class="col-sm-10">
											<textarea name="textarea13" id="textarea13" class="form-control" rows="3" placeholder=""></textarea>
										</div>
									</div>
								</form>
							</div><!--end .card-body -->
						</div><!--end .card -->
						<em class="text-caption">Basic elements</em>
						<!-- END HORIZONTAL FORM - BASIC ELEMENTS-->

						<!-- BEGIN HORIZONTAL FORM - SIZES -->
						<div class="card">
							<div class="card-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label for="large14" class="col-sm-2 control-label">Large input</label>
										<div class="col-sm-10">
											<input type="text" class="form-control input-lg" id="large14" placeholder=".input-lg">
										</div>
									</div>
									<div class="form-group">
										<label for="default14" class="col-sm-2 control-label">Default input</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="default14" placeholder="Default input">
										</div>
									</div>
									<div class="form-group">
										<label for="small14" class="col-sm-2 control-label">Small input</label>
										<div class="col-sm-10">
											<input type="text" class="form-control input-sm" id="small14" placeholder=".input-sm">
										</div>
									</div>
								</form>
							</div><!--end .card-body -->
						</div><!--end .card -->
						<em class="text-caption">Control sizing</em>
						<!-- END HORIZONTAL FORM - SIZES -->

						<!-- BEGIN HORIZONTAL FORM - STATES -->
						<div class="card">
							<div class="card-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label for="disabled15" class="col-sm-2 control-label">Disabled state</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="disabled15" placeholder="Disabled input" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="readonly15" class="col-sm-2 control-label">Readonly state</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="readonly15" value="Readonly input" readonly>
										</div>
									</div>
								</form>
							</div><!--end .card-body -->
						</div><!--end .card -->
						<em class="text-caption">Input states</em>
						<!-- END HORIZONTAL FORM - STATES -->

						<!-- BEGIN HORIZONTAL FORM - VALIDATION STATES -->
						<div class="card">
							<div class="card-body">
								<form class="form-horizontal" role="form">
									<div class="form-group has-warning">
										<label for="warning16" class="col-sm-2 control-label">Warning state</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="warning16">
										</div>
									</div>
									<div class="form-group has-warning has-feedback">
										<label for="warningfeedback16" class="col-sm-2 control-label">Warning state with icon</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="warningfeedback16">
											<span class="glyphicon glyphicon-ok form-control-feedback"></span>
										</div>
									</div>
									<div class="form-group has-success">
										<label for="success16" class="col-sm-2 control-label">Success state</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="success16">
										</div>
									</div>
									<div class="form-group has-success has-feedback">
										<label for="successfeedback16" class="col-sm-2 control-label">Success state with icon</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="successfeedback16">
											<span class="glyphicon glyphicon-ok form-control-feedback"></span>
										</div>
									</div>
									<div class="form-group has-error">
										<label for="error16" class="col-sm-2 control-label">Error state</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="error16">
										</div>
									</div>
									<div class="form-group has-error has-feedback">
										<label for="errorfeedback16" class="col-sm-2 control-label">Error state with icon</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="errorfeedback16">
											<span class="glyphicon glyphicon-ok form-control-feedback"></span>
										</div>
									</div>
								</form>
							</div><!--end .card-body -->
						</div><!--end .card -->
						<em class="text-caption">Validation states</em>
						<!-- END HORIZONTAL FORM - VALIDATION STATES -->

						<!-- START HORIZONTAL FORM - GROUPS -->
						<div class="card">
							<div class="card-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label for="amount17" class="col-sm-2 control-label">Amount</label>
										<div class="col-sm-10">
											<div class="input-group">
												<div class="input-group-content">
													<input type="text" class="form-control" id="amount17">
												</div>
												<span class="input-group-addon">.00</span>
											</div>
										</div>
									</div><!--end .form-group -->
									<div class="form-group">
										<label for="dollars17" class="col-sm-2 control-label">Dollars</label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-usd fa-lg"></i></span>
												<div class="input-group-content">
													<input type="text" class="form-control" id="dollars17">
												</div>
												<span class="input-group-addon">.00</span>
											</div>
										</div>
									</div><!--end .form-group -->
									<div class="form-group">
										<label for="username17" class="col-sm-2 control-label">Username</label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon"><span class="glyphicon glyphicon-user fa-lg"></span></span>
												<div class="input-group-content">
													<input type="text" class="form-control" id="username17">
												</div>
											</div>
										</div>
									</div><!--end .form-group -->
									<div class="form-group">
										<label for="groupcheckbox17" class="col-sm-2 control-label">Checkbox</label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon">
													<input type="checkbox">
												</span>
												<div class="input-group-content">
													<input type="text" class="form-control" id="groupcheckbox17">
												</div>
											</div>
										</div>
									</div><!--end .form-group -->
									<div class="form-group">
										<label for="groupbutton17" class="col-sm-2 control-label">Button</label>
										<div class="col-sm-10">
											<div class="input-group">
												<div class="input-group-content">
													<input type="text" class="form-control" id="groupbutton17">
												</div>
												<div class="input-group-btn">
													<button class="btn btn-default" type="button">Go!</button>
												</div>
											</div>
										</div>
									</div><!--end .form-group -->
									<div class="form-group">
										<label for="doublegroupbutton17" class="col-sm-2 control-label">Button</label>
										<div class="col-sm-10">
											<div class="input-group">
												<div class="input-group-content">
													<input type="text" class="form-control" id="doublegroupbutton17">
												</div>
												<div class="input-group-btn">
													<button type="button" class="btn btn-default" tabindex="-1">Action</button>
													<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right" role="menu">
														<li><a href="#">Action</a></li>
														<li><a href="#">Another action</a></li>
														<li><a href="#">Something else here</a></li>
														<li class="divider"></li>
														<li><a href="#">Separated link</a></li>
													</ul>
												</div>
											</div><!--end .input-group -->
										</div><!--end .col -->
									</div><!--end .form-group -->
								</form>
							</div><!--end .card-body -->
						</div><!--end .card -->
						<em class="text-caption">Input groups</em>
						<!-- END HORIZONTAL FORM - GROUPS -->

					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->