<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Pengajuan Surat</h4>
				<p class="card-category">Buat surat pengajuan cuti</p>
			</div>

			<div class="card-body">
				<form action="<?= base_url('surat/store'); ?>" method="post">
					<div class="form-group">
						<label for="nama-divisi">Perihal :</label>
						<!-- <input type="text" name="perihal" class="form-control" placeholder="Perihal" required="required"> -->
						<select name="perihal" class="form-control" required>
							<?php foreach ($perihal as $key => $value) : ?>
								<option value="<?= $value ?>"><?= $value ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="nama-divisi">Nama :</label>
						<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= @$this->session->userdata('nama') ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama-divisi">Keterangan :</label>
						<textarea name="keterangan" class="form-control" placeholder="Keterangan" required="required" rows="10"></textarea>
					</div>

					<div class="form-group">
						<a href="<?= base_url('surat'); ?>" class="btn btn-secondary float-left">Kembali</a>
						<button type="submit" class="btn btn-primary float-right">Simpan</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
