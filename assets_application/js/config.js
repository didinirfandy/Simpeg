function search() {
	$("#loading").show(); // Tampilkan loadingnya

	$.ajax({
		type: "POST", // Method pengiriman data bisa dengan GET atau POST
		url: "<?php echo base_url('index.php/Admin/cari')?>", // Isi dengan url/path file php yang dituju
		data: {
			npp: $("#npp").val()
		}, // data yang akan dikirim ke file proses
		dataType: "json",
		beforeSend: function (e) {
			if (e && e.overrideMimeType) {
				e.overrideMimeType("application/json;charset=UTF-8");
			}
		},
        success: function (response) // Ketika proses pengiriman berhasil
        { 
			$("#loading").hide(); // Sembunyikan loadingnya

			if (response.status == "success") { // Jika isi dari array status adalah success
				$("#nama").val(response.nama); // set textbox dengan id nama
				$("#nm_pgl").val(response.nm_pgl); // set textbox dengan id jenis kelamin
				$("#glr_dpn").val(response.glr_dpn); // set textbox dengan id telepon
				$("#glr_blk").val(response.glr_blk); // set textbox dengan id alamat
				$("#kota_lhr").val(response.kota_lhr);
				$("#prov_lhr").val(response.prov_lhr);
				$("#ngr_lhr").val(response.ngr_lhr);
				$("#tgl_lhr").val(response.tgl_lhr);
				$("#j_kelamin").val(response.j_kelamin);
				$("#gol_darah").val(response.gol_darah);
				$("#agama").val(response.agama);
				$("#tgl_masuk").val(response.tgl_masuk);
				$("#st_sipil").val(response.st_sipil);
				$("#jmlh_ank").val(response.jmlh_ank);
				$("#no_astek").val(response.no_astek);
				$("#no_pens").val(response.no_pens);
				$("#npwp").val(response.npwp);
				$("#alamat_tgl").val(response.alamat_tgl);
				$("#kd_lokasi").val(response.kd_lokasi);
				$("#kode_pos").val(response.kode_pos);
				$("#no_telp").val(response.no_telp);
				$("#no_nik").val(response.no_nik);
				$("#no_kk").val(response.no_kk);
				$("#no_bpjs").val(response.no_bpjs);
				$("#user_id").val(response.user_id);
				$("#bln_proses").val(response.bln_proses);
				$("#tinggal").val(response.tinggal);
				$("#ket").val(response.ket);
				$("#tglpen").val(response.tglpen);
				$("#noskpen").val(response.noskpen);
				$("#tglskpen").val(response.tglskpen);
				$("#jns_pen").val(response.jns_pen);
				$("#stst_rec").val(response.stst_rec);
				$("#tgl").val(response.tgl);
			} else { // Jika isi dari array status adalah failed
				alert("Data Tidak Ditemukan");
			}
		},
        error: function (xhr, ajaxOptions, thrownError)  // Ketika ada error
        {
			alert(xhr.responseText);
		}
	});
}