<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Penggajian <?= $karyawan->nama ?> bulan <?= bulan($bulan) . ', ' . $tahun ?></title>

	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>

<body>
	<div class="row mt-2">
		<div class="mt-2">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header d-flex">
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
									<?php $total_gaji = []; ?>
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
		</div>
	</div>
</body>

</html>
