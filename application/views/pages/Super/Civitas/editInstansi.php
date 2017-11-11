		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- Begin Card -->
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<hr>
				<!-- begin identitas -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="text-primary">Tambah Instansi</h1>
					</div><!--end .col -->
				</div><!--end .row -->
				<!-- BEGIN VERTICAL FORM FLOATING LABELS -->
				<?= form_open('super/editCivitas', array('class' => "form floating-label" )) ?>
				<div class="card">
					<div class="card-head style-primary">
						<header>Instansi</header>
					</div>

					<div class="card-body floating-label">
						<div class="form-group">
							<input type="text" class="form-control" name="nama" value="<?= $civitas->civitas_nama ?>">
							<label>Nama Instansi</label>
						</div>
						<div class="form-group">
							<select id="select1" name="tipe" class="form-control">
								<option value="">&nbsp;</option>
								<option value="Ruang Baca" <?php if($civitas->civitas_tipe == "Ruang Baca"){echo "selected";} ?>>Ruang Baca</option>
								<option value="Laboratorium" <?php if($civitas->civitas_tipe == "Laboratorium"){echo "selected";} ?>>Laboratorium</option>
								<option value="Dosen Pembimbing" <?php if($civitas->civitas_tipe == "Dosen Pembimbing"){echo "selected";} ?>>Dosen Pembimbing</option>
							</select>
							<label>Tipe Instansi</label>
						</div>
						<?php if ($this->session->userdata('departemen') == 0) { ?>
						<div class="form-group">
							<select id="select1" name="departemen" class="form-control">
								<option value="">&nbsp;</option>
								<?php foreach ($departemen as $departemens) { ?>
								<option value="<?= $departemens->departemen_id ?>" <?php if($civitas->civitas_departemen_id == $departemens->departemen_id){echo "selected";} ?>><?= $departemens->departemen_nama ?></option>
								<?php } ?>
							</select>
							<label>Departemen</label>
						</div>
						<?php } ?>
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
			</div><!--end .col -->
			<!-- END VERTICAL FORM FLOATING LABELS -->

			<div class="col-md-2"></div>

		</div><!--end #content-->
		<!-- END CONTENT -->