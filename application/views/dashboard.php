<?php if (is_level('Manager')) : ?>
	<div class="jumbotron bg-primary text-white">
		<h4 class="my-0">Selamat datang di</h4>
		<h1 class="display-4 my-0">Aplikasi Absensi Online</h1>
		<hr class="my-4">
		<p class="lead">Aplikasi absensi online berbasis website</p>
	</div>
<?php elseif (is_level('UmumKeuangan')) : ?>
	<div class="jumbotron bg-primary text-white">
		<h4 class="my-0">Selamat datang di</h4>
		<h1 class="display-4 my-0">Bagian Umum dan Keuangan</h1>
		<hr class="my-4">
		<p class="lead">Selamat Datang di Bagian Umum dan Keuangan Sekretariat DPRD Kabupaten Kapuas Hulu</p>
	</div>
<?php else : ?>
	<div class="jumbotron bg-primary text-white">
		<h4 class="my-0">Selamat datang di</h4>
		<h1 class="display-4 my-0">Aplikasi Absensi Online</h1>
		<hr class="my-4">
		<p class="lead">Aplikasi absensi online berbasis website</p>
	</div>
<?php endif; ?>
