		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- BEGIN 404 MESSAGE -->
			<section>
				<div class="section-body contain-lg">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1><span class="text-xl text-light"><?= $this->session->userdata('civitas_nama') ?></span></h1>
							<h2><span class="text-light"><?= $this->session->userdata('civitas_tipe') ?></span></h2>
							<h3 class="text-light">Detail Berkas Mahasiswa</i></h2>
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
							<h1 class="text-primary"><?= $mahasiswa[0]->mhs_nama ?> <small><?= $mahasiswa[0]->mhs_nrp ?></small></h1>
						</div><!--end .col -->
					</div><!--end .row -->
					<br>

					<div class="col-md-12">
						<div class="card card-bordered style-primary">
							<div class="card-head">
								<header><i class="fa fa-fw fa-tag"></i> <?= $this->session->userdata('civitas_form_bebas') ?></header>
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
											<th>Tipe</th>
											<th>Bukti</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$a=1;
										foreach ($mahasiswa as $mahasiswas) { ?>
										<tr>
											<td><?php echo $a; ?></td>
											<input type="hidden" name="jms<?=$a?>" value="<?= $mahasiswas->jms_id ?>">
											<td><?= $mahasiswas->syarat_nama ?></td>
											<td><?= $mahasiswas->syarat_deskripsi ?></td>
											<td><?= $mahasiswas->syarat_jenis?></td>
											<td><?= $mahasiswas->jms_bukti ?></td>
											<td>
												<div class="checkbox checkbox-styled">
													<label>
													<input type="checkbox" name="status<?= $a; ?>" value="1" <?php if ($mahasiswas->jms_status == 1) {echo "checked";} ?>>
													</label>
												</div>
											</td>
										</tr>
										<?php $a++; } ?>
									</tbody>
								</table>
								<br>
								<div class="card-actionbar">
								<div class="card-actionbar-row style-default-bright">
									<a href="<?= base_url()."form/addCatatan/".$mahasiswa[0]->jmc_id ?>" class="btn ink-reaction btn-default">Tulis Catatan</a>
									<button class="btn ink-reaction btn-primary" type="submit">Submit</button>
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