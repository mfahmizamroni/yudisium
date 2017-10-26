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
				<?= form_open('super/addCivitas', array('class' => "form floating-label" )) ?>
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
								<input type="text" class="form-control" name="tipe" value="<?= $civitas->civitas_tipe ?>">
								<label>Tipe Instansi</label>
							</div>
							<br>

						</div><!--end .card-body -->
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<button type="submit" class="btn btn-primary ink-reaction">Submit</button>
							</div>
						</div>
						<br>
					</div><!--end .card -->
				</form>
			</div><!--end .col -->
		</div><!--end .row -->
		<!-- END VERTICAL FORM FLOATING LABELS -->
	</div>

	<div class="col-md-2"></div>

</div><!--end #content-->
		<!-- END CONTENT -->