		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- BEGIN 404 MESSAGE -->
			<section>
				<div class="section-body contain-lg">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1><span class="text-xl text-light"><?= $this->session->userdata('civitas_nama') ?></span></h1>
							<h2><span class="text-light"><?= $this->session->userdata('civitas_tipe') ?></span></h2>
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
							<h1 class="text-primary">Daftar Syarat Yudisium</h1>
						</div><!--end .col -->
					</div><!--end .row -->
					<br>

					<div class="col-md-12">
						<div class="card card-bordered style-primary">
							<div class="card-head">
								<header><i class="fa fa-fw fa-tag"></i> Form Bebas Laboratory</header>
							</div>
							<!--end .card-head -->
							
							<div class="card-body style-default-bright table-responsive">
								<table class="table no-margin">
									<thead>
										<tr>
											<th>No.</th>
											<th>Syarat Yudisium</th>
											<th>Deskripsi</th>
											<th>Jenis Pengumpulan</th>
											<th>action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$a=1;
										foreach ($syarat as $syarats) { ?>
										<tr>
											<td><?php echo $a; ?></td>
											<td><?= $syarats->syarat_nama ?></td>
											<td><?= $syarats->syarat_deskripsi ?></td>
											<td><?= $syarats->syarat_jenis ?></td>
											<td>
												<a href="<?= base_url().'syarat/editSyaratYudisium/'.$syarats->syarat_id ?>"><button class="btn ink-reaction btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></button></a>
												<a href="<?= base_url().'syarat/deleteSyaratYudisium/'.$syarats->syarat_id ?>"><button class="btn ink-reaction btn-danger btn-xs"><i class="fa fa-fw fa-trash"></i></button></a>
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