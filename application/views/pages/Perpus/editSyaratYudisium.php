		<!-- BEGIN CONTENT-->
		<div id="content">

			<!-- Begin Card -->
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<br>
				<!-- begin identitas -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="text-primary">Syarat Yudisium</h1>
					</div><!--end .col -->
				</div><!--end .row -->
				<?= form_open('perpus/editSyaratYudisium/'.$id, array('class' => "form floating-label" )) ?>
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
							<textarea id="deskripsi" class="form-control" rows="3" placeholder="" name="deskripsi"><?= $syarat->syarat_deskripsi ?></textarea>
							<label>Deskripsi</label>
						</div>
						<div class="form-group">
							<select id="select1" name="jenjang" class="form-control">
								<option value="">&nbsp;</option>
								<option value="S1" <?php if ($syarat->syarat_jenjang == "S1") { echo "selected";} ?>>S1</option>
								<option value="S2" <?php if ($syarat->syarat_jenjang == "S2") { echo "selected";} ?>>S2</option>
								<option value="S3" <?php if ($syarat->syarat_jenjang == "S3") { echo "selected";} ?>>S3</option>
							</select>
							<label for="select1">Jenjang</label>
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