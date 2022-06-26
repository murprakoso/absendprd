$(function () {
	console.log("surat...");

	$("#modal-status").on("hidden.bs.modal", function () {
		$(".modal-content #form-status").attr("action", "#");
	});

	$("body").on("click", ".badge-status", function () {
		let url = $(this).data("url");
		$(".modal-content #form-status").attr("action", url);
	});
});
