function previewImg() {
	// body...
	const image = document.querySelector("#image");
	const imageLabel = document.querySelector(".custom-file-label");
	const imgPreview = document.querySelector(".img-preview");

	imageLabel.textContent = image.files[0].name;

	const fileImage = new FileReader();
	fileImage.readAsDataURL(image.files[0]);

	fileImage.onload = function (e) {
		imgPreview.src = e.target.result;
	};
}

$(function () {
	// Jika tombol detail yg dipencet lakukan....
	$(".tombolDetail").on("click", function () {
		$(".judulModal").html("Detail Orang");

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost:8080/orang/detail",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				// console.log(data)
				$("#detailNama").html("<b>Nama : </b>" + data.nama);
				$("#detailEmail").html("<b>Email : </b>" + data.email);
				$("#detailAlamat").html("<b>Alamat : </b>" + data.alamat);
			},
		});
	});
});

$(document).ready(function () {
	// Event ketika keyword ditulis
	$("#keyword").on("keyup", function () {
		// console.log("Siap");
		$(".konten").load("/orang/search?nama=" + $("#keyword").val());
	});
});


