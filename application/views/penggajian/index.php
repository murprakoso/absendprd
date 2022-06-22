<div class="row mb-2">
	<h4 class="col-xs-12 col-sm-4 mt-0">Laporan Penggajian</h4>
	<div class="col-xs-12 col-sm-8 ml-auto text-right">
		<form action="" method="get">
			<div class="row">
				<div class="col">
					<div class="input-group">
						<select name="bulan_awal" id="bulan" class="form-control">
							<option value="" disabled selected>-- Pilih Bulan --</option>
							<?php foreach ($all_bulan as $bn => $bt) : ?>
								<option value="<?= $bn ?>" <?= ($bn == $bulan_awal) ? 'selected' : '' ?>><?= $bt ?></option>
							<?php endforeach; ?>
						</select>
						<div class="input-group-prepend border-right">
							<span class="input-group-text" id="">-</span>
						</div>
						<select name="bulan_akhir" id="bulan" class="form-control">
							<option value="" disabled selected>-- Pilih Bulan --</option>
							<?php foreach ($all_bulan as $bn => $bt) : ?>
								<option value="<?= $bn ?>" <?= ($bn == $bulan_akhir) ? 'selected' : '' ?>><?= $bt ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="col-2">
					<select name="tahun" id="tahun" class="form-control">
						<option value="" disabled selected>-- Pilih Tahun</option>
						<?php for ($i = date('Y'); $i >= (date('Y') - 5); $i--) : ?>
							<option value="<?= $i ?>" <?= ($i == $tahun) ? 'selected' : '' ?>><?= $i ?></option>
						<?php endfor; ?>
					</select>
				</div>
				<div class="col ">
					<button type="submit" class="btn btn-primary btn-fill btn-block">Tampilkan</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header border-bottom">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
					</div>
					<div class="col-xs-12 col-sm-6 ml-auto text-right mb-2">
						<div class="dropdown d-inline">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="droprop-action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-print"></i>
								Export Laporan
							</button>
							<div class="dropdown-menu" aria-labelledby="droprop-action">
								<a href="<?= base_url('penggajian/export_pdf/' . $this->uri->segment(3) . "?bulan_awal=$bulan_awal&bulan_akhir=$bulan_akhir&tahun=$tahun") ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
								<a href="<?= base_url('penggajian/export_excel/' . $this->uri->segment(3) . "?bulan=$bulan_awal&bulan_akhir=$bulan_akhir&tahun=$tahun") ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<h4 class="card-title mb-4">Penggajian Perode : <?= bulan($bulan_awal) . '-' . bulan($bulan_akhir) . ' ' . $tahun ?></h4>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Gaji</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$total_gaji = [];
						?>
						<?php foreach ($karyawan as $i => $k) : ?>
							<tr>
								<td><?= $i + 1 ?></td>
								<td class="font-weight-bold"><?= $k->nama ?></td>
								<td><?= $k->nama_divisi ?></td>
								<td><?= rupiah($k->gaji_divisi) ?></td>
								<td><?= (@$selisih == 0) ? rupiah($k->gaji_divisi * 1) : rupiah($k->gaji_divisi * $selisih) ?></td>
							</tr>
							<?php $total_gaji[] = $k->gaji_divisi ?>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="3">Total</th>
							<th><?= rupiah(array_sum($total_gaji)); ?></th>
							<?php if (@$selisih == 0) : ?>
								<th><?= rupiah(array_sum($total_gaji) * 1); ?></th>
							<?php else : ?>
								<th><?= rupiah(array_sum($total_gaji) * $selisih); ?></th>
							<?php endif; ?>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
