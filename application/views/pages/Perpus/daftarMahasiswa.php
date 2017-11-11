		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- BEGIN 404 MESSAGE -->
			<section>
				<div class="section-body contain-lg">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1><span class="text-xl text-light"><?= $this->session->userdata('civitas_nama') ?></span></h1>
							<h2><span class="text-light"><?= $this->session->userdata('civitas_tipe') ?></span></h2>
							<h3 class="text-light">Cari Daftar Mahasiswa Yudisium <i class="fa fa-search-minus text-primary"></i></h3>
						</div><!--end .col -->
					</div><!--end .row -->
				</div><!--end .section-body -->
			</section>
			<!-- END 404 MESSAGE -->

			<!-- BEGIN SEARCH SECTION -->
			<section>
				<div class="section-body contain-sm">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
						<input id="searchMhs" type="text" class="form-control" placeholder="You're searching for...">
						<span class="input-group-btn"><button class="btn btn-primary" type="submit" id="search">Find</button></span>
					</div>
				</div><!--end .section-body -->
			</section>
			<!-- END SEARCH SECTION -->

			<!-- Begin Card -->
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card">
					<?= form_open() ?>
					<div class="card-body">
						<!-- BEGIN DATATABLE 1 -->
						<div class="row">
						</div><!--end .row -->
						<div class="row">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th>No.</th>
												<th>NRP</th>
												<th>Nama</th>
												<th>Status</th>
												<th>Catatan</th>
												<th>Jenjang</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$a=1;
											foreach ($mahasiswa as $mahasiswas) { ?>
											<tr>
												<td><?php echo $a; ?></td>
												<input type="hidden" name="mhs[]" value="<?= $mahasiswas->mhs_id ?>" disabled>
												<td><?= $mahasiswas->mhs_nrp ?></td>
												<td><?= $mahasiswas->mhs_nama ?></td>
												<?php if ($mahasiswas->minstat == 0) { ?>
												<td><a class="btn btn-xs ink-reaction btn-danger disabled">Not Approved</a></td>
												<?php } else { ?>
												<td><a class="btn btn-xs ink-reaction btn-success">Approved</a></td>
												<?php } ?>
												<td><?= $mahasiswas->jmc_catatan ?></td>
												<td><?= $mahasiswas->mhs_jenjang ?></td>
												<td>
													<a href="<?= base_url()."perpus/detailMahasiswa/".$mahasiswas->mhs_id?>" class="btn btn-xs ink-reaction btn-primary">Details</a>
												</td>
											</tr>
											<?php $a++; } ?>
										</tbody>
									</table>
								</div><!--end .table-responsive -->
							</div><!--end .col -->
						</div><!--end .row -->
						<!-- END DATATABLE 1 -->
					</div><!--end .card-body -->
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<div class="input-group-btn">
								<button type="button" class="btn btn-default" tabindex="-1">Action</button>
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu pull-right" role="menu">
									<li><a href=""><button type="submit" class="btn btn-primary" name="status" value="1">Approve</button></a></li>
									<li><a href=""><button type="submit" class="btn btn-danger" name="status" value="0">Cancel Approval</button></a></li>
								</ul>
							</div>
						</div>
					</div>
					<?php form_close() ?>
					<br>
				</div><!--end .card -->
				<br><br><br>
			</div><!--end .col -->
			<!-- EndCard -->


			<div class="col-md-2"></div>

		</div><!--end #content-->
	<!-- END CONTENT -->