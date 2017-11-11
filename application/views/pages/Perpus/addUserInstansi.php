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
				<?= form_open('perpus/addUserCivitas', array('class' => "form floating-label" )) ?>
				<div class="card">
					<div class="card-head style-primary">
						<header>User - Civitas</header>
					</div>

					<div class="card-body floating-label">
						<div class="form-group">
							<input type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>">
							<label for="Username2">Nama Lengkap</label>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
							<label for="Password2">Email</label>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="username" value="<?= set_value('username') ?>">
							<label for="Username2">Username</label>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" value="<?= set_value('password') ?>">
							<label for="Password2">Password</label>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password_confirm" value="<?= set_value('password_confirm') ?>">
							<label for="Password2">Password Confirm</label>
						</div>
						<input type="hidden" name="civitas" value="0">
						<br>

					</div><!--end .card-body -->
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<button type="submit" class="btn btn-primary ink-reaction">Submit</button>
						</div>
					</div>
					<br>
				</div><!--end .card -->
				<?php form_close() ?>
				<!-- END VERTICAL FORM FLOATING LABELS -->
			</div>

			<div class="col-md-2"></div>

		</div><!--end #content-->
		<!-- END CONTENT -->