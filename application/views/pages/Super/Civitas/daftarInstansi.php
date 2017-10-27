		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- BEGIN 404 MESSAGE -->
			<section>
				<div class="section-body contain-lg">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1><span class=" text-light">Daftar Civitas</span></h1>
							<h2><span class="text-light">Departemen <?= $departemen->departemen_nama ?></span></h2>
						</div><!--end .col -->
					</div><!--end .row -->
				</div><!--end .section-body -->
			</section>
			<!-- END 404 MESSAGE -->

			<!-- Begin Card -->
			<div class="col-md-2"></div>
			<div class="col-md-8">

				<div class="col-md-12">
					<div class="card card-bordered style-primary">
						<div class="card-head">
							<header><i class="fa fa-fw fa-tag"></i>Daftar Civitas Departemen <?= $departemen->departemen_nama ?></header>
						</div>
						<!--end .card-head -->

						<div class="card-body style-default-bright table-responsive">
							<table class="table no-margin">
								<thead>
									<tr>
										<th>No.</th>
										<th>Departemen</th>
										<th>Civitas</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php $a = 1;
									foreach ($civitas as $civitass) { ?>
									<tr>
										<td><?= $a ?></td>
										<td><?= $civitass->departemen_nama ?></td>
										<td><?= $civitass->civitas_nama ?></td>
										<td>
											<a href="<?= base_url()."super/detailCivitas/".$civitass->civitas_id ?>"><button class="btn btn-primary btn-xs ink-reaction">Details</button></a>
											<a href="<?= base_url().'super/editCivitas/'.$civitass->civitas_id ?>"><button class="btn ink-reaction btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></button></a>
											<a href="<?= base_url().'super/deleteCivitas/'.$civitass->civitas_id ?>"><button class="btn ink-reaction btn-danger btn-xs"><i class="fa fa-fw fa-trash"></i></button></a>		
										</td>
									</tr>
									<?php $a++; } ?>
								</tbody>
							</table>
							<br><br>
						</div>
						<!--end .card-body -->
					</div><!--end .col -->
					<br><br>
				</div><!--end .col -->
				<!-- EndCard -->
				<div class="col-md-2"></div>

			</div><!--end #content-->
		<!-- END CONTENT -->