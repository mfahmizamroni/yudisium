		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- BEGIN 404 MESSAGE -->
			<section>
				<div class="section-body contain-lg">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1><span class=" text-light">Form Kelengkapan Berkas Yudisium</span></h1>
							<h2><span class="text-light">Departemen <?= $departemen->departemen_nama ?></span></h2>
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
						<h1 class="text-primary"><?= $mahasiswa->mhs_nama ?></h1>
					</div><!--end .col -->
				</div><!--end .row -->
				<br>

				<div class="col-md-12">
					<div class="card card-bordered style-primary">
						<div class="card-head">
							<header><i class="fa fa-fw fa-tag"></i>Daftar Kelengkapan Berkas Yudisium</header>
						</div>
						<!--end .card-head -->

						<div class="card-body style-default-bright table-responsive">
							<table class="table no-margin">
								<thead>
									<tr>
										<th>No.</th>
										<th>Syarat Yudisium</th>
										<th>Status</th>
										<th>Keterangan</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php $a = 1;
									foreach ($formBebas as $formBebass) { ?>
									<tr>
										<td><?= $a ?></td>
										<td>Form Bebas <?= $formBebass->civitas_nama ?></td>
										<?php if ($formBebass->minstat == 0) { ?>
										<td><a class="btn btn-xs ink-reaction btn-danger disabled">Not Approved</a></td>
										<?php } else { ?>
										<td><a class="btn btn-xs ink-reaction btn-success">Approved</a></td>
										<?php } ?>
										<td><?= $formBebass->jmc_catatan ?></td>
										<td>
											<a href="<?= base_url()."super/detailSyaratYudisium/".$formBebass->civitas_id."/".$mhs_id ?>"><button class="btn btn-primary btn-xs ink-reaction">Details</button></a>		
										</td>
									</tr>
									<?php $a++; } ?>
								</tbody>
							</table>
							<br><br>
						</div>
						<!--end .card-body -->
					</div><!--end .col -->
				</div>
				<br><br>
			</div><!--end .col -->
			<!-- EndCard -->
			<div class="col-md-2"></div>

		</div><!--end #content-->
		<!-- END CONTENT -->