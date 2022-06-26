<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title float-left">Pengajuan Surat</h4>
				<!-- <p class="card-category"></p> -->

				<?php if (!is_level('Manager')) : ?>
					<div class="d-inline ml-auto float-right">
						<a href="<?= base_url('surat/create') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Pengajuan </a>
					</div>
				<?php endif; ?>
			</div>
			<?php if (is_level('Manager')) : ?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama</th>
									<th>Perihal</th>
									<th>Tanggal</th>
									<th>Status Pengajuan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($surat as $k => $s) : ?>
									<tr>
										<td><?= $k + 1 ?></td>
										<td><?= $s->nama ?></td>
										<td><?= $s->perihal ?></td>
										<td><?= date('d-M-Y', strtotime($s->tanggal)) ?></td>
										<td>
											<?php $status = ($s->status == 'diterima') ? "success" : (($s->status == 'ditolak')  ? "dark" : "warning") ?>
											<span style="cursor: pointer;" class="badge-status badge badge-<?= $status ?>" data-toggle="modal" data-target="#modal-status" data-url="<?= base_url('surat/update_status/' . $s->id_surat); ?>"><?= $s->status ?></span>
										</td>
										<td>
											<a href="<?= base_url('surat/view_pdf/' . $s->id_surat); ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-info"></i> Detail (PDF)</a>
											<!-- <a href="#" class="btn btn-primary btn-sm ml-2"><i class="fa fa-edit"></i> Edit</a> -->
											<a href="<?= base_url('surat/destroy/' . $s->id_surat) ?>" class="btn btn-danger btn-sm ml-2 btn-delete2" onclick="return false"><i class="fa fa-trash"></i> Hapus</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php else : ?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Perihal</th>
									<th>Tanggal</th>
									<th>Status Pengajuan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($surat as $k => $s) : ?>
									<tr>
										<td><?= $k + 1 ?></td>
										<td><?= $s->perihal ?></td>
										<td><?= date('d-M-Y', strtotime($s->tanggal)) ?></td>
										<td>
											<?php $status = ($s->status == 'diterima') ? "success" : (($s->status == 'ditolak')  ? "dark" : "warning") ?>
											<span class="badge badge-<?= $status ?>"><?= $s->status ?></span>
										</td>
										<td>
											<a href="<?= base_url('surat/view_pdf/' . $s->id_surat); ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-info"></i> Detail (PDF)</a>
											<!-- <a href="#" class="btn btn-primary btn-sm ml-2"><i class="fa fa-edit"></i> Edit</a> -->
											<a href="<?= base_url('surat/destroy/' . $s->id_surat) ?>" class="btn btn-danger btn-sm ml-2 btn-delete2" onclick="return false"><i class="fa fa-trash"></i> Hapus</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>



<div class="modal fade" id="modal-status" tabindex="-1" role="dialog" aria-labelledby="modal-status-label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-status-label">Status Pengajuan Surat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="#" method="post" id="form-status">
				<div class="modal-body">
					<div class="form-group">
						<label for="status">Status :</label>
						<select name="status" id="status" class="form-control" required>
							<option value="diterima">Diterima</option>
							<option value="ditolak">Ditolak</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Diterima</button>
				</div>
			</form>
		</div>
	</div>
</div>
