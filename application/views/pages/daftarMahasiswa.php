		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- BEGIN 404 MESSAGE -->
			<section>
				<div class="section-body contain-lg">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1><span class="text-xl text-light">Enterprise System</span></h1>
							<h2><span class="text-light">Laboratory</span></h2>
							<h3 class="text-light">Cari Daftar Mahasiswa Yudisium <i class="fa fa-search-minus text-primary"></i></h2>
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
							<input type="text" class="form-control" placeholder="You're searching for...">
							<span class="input-group-btn"><button class="btn btn-primary" type="submit">Find</button></span>
						</div>
					</div><!--end .section-body -->
				</section>
				<!-- END SEARCH SECTION -->

				<!-- Begin Card -->
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card">
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
													<th>Keterangan</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
												<?php 
												$a=1;
												for ($i=0; $i < 20; $i++) { 
													?>
													<tr>
														<td><?php echo $a; ?></td>
														<td>5213100092</td>
														<td>Fahmi</td>
														<td><button class="btn btn-xs ink-reaction btn-danger disabled">Not Approved</button></td>
														<td>-</td>
														<td>
															<a href="<?php echo base_url();?>form/detailMahasiswa"><button class="btn btn-xs ink-reaction btn-primary">Details</button></a>
														</td>
													</tr>
													<?php
													$a++;
												} ?>
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
										<li><a href="#">Approve</a></li>
										<li><a href="#">Cancel Approval</a></li>
									</ul>
								</div>
							</div>
						</div>
						<br>
					</div><!--end .card -->
					<br><br><br>
				</div><!--end .col -->
				<!-- EndCard -->


				<div class="col-md-2"></div>

			</div><!--end #content-->
		<!-- END CONTENT -->