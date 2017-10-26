		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- Begin Card -->
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<hr>
				<!-- begin identitas -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="text-primary">Syarat Yudisium</h1>
					</div><!--end .col -->
				</div><!--end .row -->
				<?= form_open('syarat/addSyaratYudisium/', array('class' => "form floating-label" )) ?>
					<div class="card">
						<div class="card-head style-primary">
							<header>Tambah Syarat Yudisium</header>
						</div>
						<div class="card-body floating-label">
							<br/>
							<div class="form-group">
								<input type="text" class="form-control" id="nama_syarat" name="syarat">
								<label>Syarat</label>
							</div>
							<div class="form-group">
								<textarea name="textarea1" id="deskripsi" class="form-control" rows="3" placeholder="" name="deskripsi"></textarea>
								<label>Deskripsi</label>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="Lastname2" name="jenjang">
										<label for="Lastname2">Jenjang</label>
									</div>
								</div>
							</div>
							<div>
								<label class="radio-inline radio-styled">
									<input type="radio" name="jenis" value="upload link"><span>Upload Link</span>
								</label>
								<label class="radio-inline radio-styled">
									<input type="radio" name="jenis" value="hard copy"><span>HardCopy</span>
								</label>
								<label class="radio-inline radio-styled">
									<input type="radio" name="jenis" value="checked by admin"><span>Checked by Admin</span>
								</label>
							</div>
						</div><!--end .card-body -->
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<button type="submit" class="btn btn-primary ink-reaction">Submit</button>
							</div>
						</div>
					</div><!--end .card -->
					<br>
				</form>
		</div>

				<div class="col-md-2"></div>

			</div><!--end #content-->
		<!-- END CONTENT -->