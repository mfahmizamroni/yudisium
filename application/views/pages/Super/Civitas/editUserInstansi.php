		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- Begin Card -->
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<!-- begin identitas -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="text-primary">Tambah User Civitas</h1>
					</div><!--end .col -->
				</div><!--end .row -->
				<!-- BEGIN VERTICAL FORM FLOATING LABELS -->
				<?= form_open('super/editUserCivitas/'.$user->adm_id, array('class' => "form floating-label" )) ?>
					<div class="card">
						<div class="card-head style-primary">
							<header>User - Civitas</header>
						</div>

						<div class="card-body floating-label">
							<div class="form-group">
								<input type="text" class="form-control" name="nama" value="<?= $user->adm_nama ?>">
								<label for="Username2">Nama Lengkap</label>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" value="<?= $user->adm_email ?>">
								<label for="Password2">Email</label>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="username" value="<?= $user->adm_username ?>">
								<label for="Username2">Username</label>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" value="11111">
								<label for="Password2">Password</label>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password_confirm" value="11111">
								<label for="Password2">Password Confirm</label>
							</div>
							<div class="form-group">
								<select id="select1" name="civitas" class="form-control">
									<option value="">&nbsp;</option>
									<?php foreach ($civitas as $civitass) { ?>
									<option value="<?= $civitass->civitas_id ?>" <?php if ($user->adm_civitas_id == $civitass->civitas_id) {echo "selected";} ?>><?= $civitass->civitas_nama ?></option>
									<?php } ?>
								</select>
								<label for="select1">Nama Civitas</label>
							</div>
							<br>

						</div><!--end .card-body -->
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<button type="submit" class="btn btn-primary ink-reaction">Submit</button>
							</div>
						</div>
						<br>
					</div><!--end .card -->
				</form>
			</div><!--end .col -->
		</div><!--end .row -->
		<!-- END VERTICAL FORM FLOATING LABELS -->
	</div>

	<div class="col-md-2"></div>

</div><!--end #content-->
		<!-- END CONTENT -->