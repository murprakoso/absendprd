$(function () {
	$("body").on("click", ".btn-delete2", function () {
		let destination = $(this).attr("href");
		swal({
			title: "Yakin Hapus?",
			text: "Data yang dihapus akan hilang permanen!",
			icon: "warning",
			buttons: {
				confirm: {
					text: "Ya Hapus!",
					className: "btn btn-danger",
				},
				cancel: {
					visible: true,
					className: "btn btn-primary",
				},
			},
		}).then((isDelete) => {
			if (isDelete) {
				window.location.href = destination;
			} else {
				swal.close();
			}
		});
		return false;
	});
});
