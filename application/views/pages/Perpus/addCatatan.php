		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- Begin Card -->
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<br>
				<!-- begin identitas -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="text-primary">Catatan Mahasiswa</h1>
					</div><!--end .col -->
				</div><!--end .row -->
				<?= form_open('perpus/addCatatan/'.$id, array('class' => "form floating-label" )) ?>
				<div class="card">
					<div class="card-head style-primary">
						<header>Tambah Catatan</header>
					</div>
					<div class="card-body floating-label">
						<div>
							<h2><?= $mahasiswa[0]->mhs_nama ?></h2>
							<p><?= $mahasiswa[0]->mhs_nrp ?></p>
						</div>
						<div class="form-group">
							<textarea name="catatan" id="deskripsi" class="form-control" rows="3" placeholder=""><?= $mahasiswa[0]->jmc_catatan ?></textarea>
							<label>Catatan</label>
						</div>
					</div><!--end .card-body -->
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<button type="submit" class="btn btn-primary ink-reaction">Submit</button>
						</div>
					</div>
				</div><!--end .card -->
				<br>
				<?php form_close() ?>
			</div>

			<div class="col-md-2"></div>

		</div><!--end #content-->
		<!-- END CONTENT -->