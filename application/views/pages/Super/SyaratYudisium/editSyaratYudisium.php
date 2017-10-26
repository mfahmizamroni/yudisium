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
				<?= form_open('super/editSyaratYudisium/'.$id, array('class' => "form floating-label" )) ?>
					<div class="card">
						<div class="card-head style-primary">
							<header>Tambah Syarat Yudisium</header>
						</div>
						<div class="card-body floating-label">
							<br/>
							<div class="form-group">
								<input type="text" class="form-control" id="nama_syarat" name="syarat" value="<?= $syarat->syarat_nama ?>">
								<label>Syarat</label>
							</div>
							<div class="form-group">
								<textarea name="textarea1" id="deskripsi" class="form-control" rows="3" placeholder="" name="deskripsi" value="<?= $syarat->syarat_deskripsi ?>"></textarea>
								<label>Deskripsi</label>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<select id="select1" name="civitas" class="form-control">
											<option value="">&nbsp;</option>
											<?php foreach ($civitas as $civitass) { ?>
											<option value="<?= $civitass->civitas_id ?>" <?php if ($syarat->syarat_civitas_id == $civitass->civitas_id) {echo "selected";} ?>><?= $civitass->civitas_nama ?></option>
											<?php } ?>
										</select>
										<label for="select1">Nama Civitas</label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="Lastname2" name="jenjang" value="<?= $syarat->syarat_jenjang ?>">
										<label for="Lastname2">Jenjang</label>
									</div>
								</div>
							</div>
							<div>
								<label class="radio-inline radio-styled">
									<input type="radio" name="jenis" value="upload link" <?php if ($syarat->syarat_jenis == "upload link") { echo "checked";} ?> ><span>Upload Link</span>
								</label>
								<label class="radio-inline radio-styled">
									<input type="radio" name="jenis" value="hard copy" <?php if ($syarat->syarat_jenis == "hard copy") { echo "checked";} ?>><span>Hard Copy</span>
								</label>
								<label class="radio-inline radio-styled">
									<input type="radio" name="jenis" value="checked by admin" <?php if ($syarat->syarat_jenis == "checked by admin") { echo "checked";} ?>><span>Checked by Admin</span>
								</label>
							</div>
						</div>
						
									<div class="card-actionbar">
					<div class="card-actionbar-row">
						<button type="submit" class="btn btn-primary ink-reaction">Submit</button>
					</div>
				</div>
						<br>
					</div>
				</div><!--end .card-body -->
			</div><!--end .card -->
			<br>
		</form>
	</div>

	<div class="col-md-2"></div>

</div><!--end #content-->
		<!-- END CONTENT -->