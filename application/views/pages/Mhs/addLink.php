		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- BEGIN 404 MESSAGE -->
			<section>
				<div class="section-body contain-lg">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1><span class="text-xl text-light"><?= $civitas->civitas_nama ?></span></h1>
							<h2><span class="text-light"><?= $civitas->civitas_tipe ?></span></h2>
							<h3 class="text-light">Detail Berkas Mahasiswa</h3>
						</div><!--end .col -->
					</div><!--end .row -->
				</div><!--end .section-body -->
			</section>
			<!-- END 404 MESSAGE -->

			<!-- Begin Card -->
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<hr>
				<!-- begin identitas -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="text-primary">Muchammad Fahmi Zamroni</h1>
					</div><!--end .col -->
				</div><!--end .row -->
				<br>

				<div class="col-md-12">
					<div class="card card-bordered style-primary">
						<div class="card-head">
							<header><i class="fa fa-fw fa-tag"></i> Form Bebas Laboratory</header>
						</div>
						<!--end .card-head -->
						<?= form_open() ?>
						<div class="card-body style-default-bright table-responsive">
							<table class="table no-margin">
								<thead>
									<tr>
										<th>#</th>
										<th>Syarat Yudisium</th>
										<th>Deskripsi</th>
										<th>Bukti</th>
									</tr>
								</thead>
								<tbody>
									<?php $a = 1;
									foreach ($syarat as $syarats) { ?>
									<tr>
										<td><?= $a ?></td>
										<input type="hidden" name="syarat[]" value="<?= $syarats->syarat_id ?>">
										<td><?= $syarats->syarat_nama ?></td>
										<td><?= $syarats->syarat_deskripsi ?></td>
										<td><input type="text" class="form-control" name="bukti[]" value="<?= $syarats->jms_bukti ?>"></td>
									</tr>
									<?php $a++; } ?>
								</tbody>
							</table>
							<br>
							<div class="card-actionbar">
								<div class="card-actionbar-row style-default-bright">
									<button class="btn ink-reaction btn-default" type="submit">Submit</button>
								</div>

							</div>
						</div>
					</form>
					<!--end .card-body -->
					<!--  --><!--end .card -->	
				</div><!--end .col -->
				<br><br>
			</div><!--end .col -->
			<!-- EndCard -->
			<div class="col-md-2"></div>

		</div><!--end #content-->
		<!-- END CONTENT -->