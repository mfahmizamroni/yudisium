	<!-- BEGIN CONTENT-->
	<div id="content">

		<!-- Begin Card -->
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<!-- begin identitas -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="text-primary">Edit Profil Mahasiswa</h1>
				</div><!--end .col -->
			</div><!--end .row -->
			<!-- BEGIN VERTICAL FORM FLOATING LABELS -->
			<?= form_open('mhs/editProfile/', array('class' => "form floating-label" )) ?>
			<div class="card">
				<div class="card-head style-primary">
					<header>User - Mahasiswa</header>
				</div>
				<div class="card-body floating-label">
					<div class="form-group">
						<input type="text" class="form-control" name="nrp" value="<?= $mahasiswa[0]->mhs_nrp ?>" disabled>
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
					<br>
					<h2>Biodata Mahasiswa</h2>
					<hr>
					<div>
						<label class="radio-inline radio-styled">
							<input type="radio" name="gender" value="M" <?php if ($mahasiswa[0]->mhs_gender == "M") {
								echo "checked";
							} ?>><span>Male</span>
						</label>
						<label class="radio-inline radio-styled">
							<input type="radio" name="gender" value="F" <?php if ($mahasiswa[0]->mhs_gender == "F") {
								echo "checked";
							} ?>><span>Female</span>
						</label>
					</div>
					<br/>
					<div class="form-group">
						<input type="text" class="form-control" name="nama" value="<?= $mahasiswa[0]->mhs_nama ?>">
						<label for="Lastname2">Nama Lengkap</label>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="nrp" value="<?= $mahasiswa[0]->mhs_nrp ?>" disabled>
						<label for="Password2">NRP</label>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="tanggal" value="<?= $mahasiswa[0]->mhs_tgllahir ?>">
						<label for="Password2">Tanggal Lahir</label>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<select id="select1" name="dosen" class="form-control">
									<option value="">&nbsp;</option>
									<?php foreach ($dosen as $dosens) { ?>
									<option value="<?= $dosens->civitas_id ?>"<?php 
									for ($i=0; $i < count($mahasiswa); $i++) { 
										if ($mahasiswa[$i]->jmc_civitas_id == $dosens->civitas_id) {echo "selected ";} 
									}
									?>><?= $dosens->civitas_nama ?></option>
									<?php } ?>
								</select>
								<label for="Password2">Dosen Pembimbing</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<select id="select1" name="lab" class="form-control">
									<option value="">&nbsp;</option>
									<?php foreach ($lab as $labs) { ?>
									<option value="<?= $labs->civitas_id ?>" <?php 
									for ($i=0; $i < count($mahasiswa); $i++) { 
										if ($mahasiswa[$i]->jmc_civitas_id == $labs->civitas_id) {echo "selected ";} 
									}
									?>><?= $labs->civitas_nama ?></option>
									<?php } ?>
								</select>
								<label for="Password2">Laboratorium</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" name="notelp" value="<?= $mahasiswa[0]->mhs_notelp ?>">
								<label for="Password2">No. Telp</label>
							</div>

						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" name="lamastudi" value="<?= $mahasiswa[0]->mhs_lamastudi ?>">
								<label for="Password2">Lama Studi</label>
							</div>
						</div>

					</div>

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