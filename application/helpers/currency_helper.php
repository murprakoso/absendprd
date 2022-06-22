<?php
defined('BASEPATH') or die('No direct script access allowed!');

function rupiah($angka)
{
	$hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
	return $hasil_rupiah;
}
