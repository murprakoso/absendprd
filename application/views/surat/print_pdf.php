<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Surat - <?= $perihal . ' - ' . $nama ?></title>

	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>

<body>
	<div class="row mt-2">
		<div class="mt-2">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-3 offset-9">
							<p>
								Kepada Yth. <br>
								Manajer <br>
								Di tempat
							</p>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-12">
							<table>
								<tr>
									<td class="border-0 py-0">Perihal</td>
									<td class="border-0 py-0">:</td>
									<td class="border-0 py-0"> &nbsp; <?= $perihal ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<p>Dengan hormat, <br>
								Saya yang bertanda tangan dibawah ini :
							</p>
							<!-- <p>Saya yang bertanda tangan dibawah ini :</p> -->
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<table class="table">
								<tr>
									<td class="border-0 py-0" width="1">Nama</td>
									<td class="border-0 py-0" width="1">:</td>
									<td class="border-0 py-0"><?= $nama ?></td>
								</tr>
								<tr>
									<td class="border-0 py-0" width="1">Divisi</td>
									<td class="border-0 py-0" width="1">:</td>
									<td class="border-0 py-0"><?= $nama_divisi ?></td>
								</tr>
								<tr>
									<td class="border-0 py-0" width="1">Telepon/HP</td>
									<td class="border-0 py-0" width="1">:</td>
									<td class="border-0 py-0"><?= $telp ?></td>
								</tr>
								<tr>
									<td class="border-0 py-0" width="1">NIK</td>
									<td class="border-0 py-0" width="1">:</td>
									<td class="border-0 py-0"><?= $nik ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<p><?= $keterangan ?></p>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, odit debitis? Tempore fugit id, quibusdam beatae totam laborum illum reprehenderit minus harum vel perspiciatis voluptatum voluptatem numquam excepturi, accusamus veniam, mollitia dolores dolorum dicta minima iusto. Enim dicta saepe aut doloremque dolorum, magnam laudantium mollitia dolor dignissimos commodi consequuntur beatae.</p> -->
						</div>
					</div>
					<div class="row">
						<div class="col-3 offset-9">
							<div class="mt-4">
								<p style="margin-bottom: 5rem !important;"><?= date('d M Y', strtotime($tanggal)) ?></p>
								<p><?= $nama ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
