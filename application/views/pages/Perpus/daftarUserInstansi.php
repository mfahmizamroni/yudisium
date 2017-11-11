		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- BEGIN 404 MESSAGE -->
			<section>
				<div class="section-body contain-lg">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1><span class=" text-light">Daftar User Civitas</span></h1>
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
										<th>Nama</th>
										<th>Username</th>
										<th>Email</th>
										<th>Civitas</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php $a = 1;
									foreach ($user as $users) { ?>
									<tr>
										<td><?= $a ?></td>
										<td><?= $users->adm_nama ?></td>
										<td><?= $users->adm_username ?></td>
										<td><?= $users->adm_email ?></td>
										<td><?= $users->civitas_nama ?></td>
										<td>
											<a href="<?= base_url().'perpus/editUserCivitas/'.$users->adm_id ?>"><button class="btn ink-reaction btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></button></a>
											<a href="<?= base_url().'perpus/deleteUserCivitas/'.$users->adm_id ?>"><button class="btn ink-reaction btn-danger btn-xs"><i class="fa fa-fw fa-trash"></i></button></a>	
										</td>
									</tr>
									<?php $a++; } ?>
								</tbody>
							</table>
							<br><br>
						</div>
						<!--end .card-body -->
					</div>
				</div><!--end .col -->
				<br><br>
			</div><!--end .col -->
			<!-- EndCard -->
			<div class="col-md-2"></div>

		</div><!--end #content-->
		<!-- END CONTENT -->