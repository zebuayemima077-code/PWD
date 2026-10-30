function fn_ValForm() {
    var nama = document.getElementById("nama").value.trim();
    var email = document.getElementById("email").value.trim();
    var umurStr = document.getElementById("umur").value.trim();
    var kategori = document.getElementById("kategori").value;

    var sMsg = "";
    if (nama === "") {
        sMsg += "\n* Nama tidak boleh kosong";
    }

    if (email === "") {
        sMsg += "\n* Input Email tidak boleh kosong";
    } else {
        var emailPattern = /^[a-z0-9][a-z0-9_\.-]*[a-z0-9]@[a-z0-9][a-z0-9_\.-]*[a-z0-9]\.[a-z0-9]{2,4}$/;
        if (!emailPattern.test(email)) {
            sMsg += "\n* Email tidak valid";
        }
    }

    var umur = parseInt(umurStr);
    var info = "";

    if (umurStr === "") {
        sMsg += "\n* Input Umur tidak boleh kosong";
    } else if (isNaN(umur) || umur < 7 || umur > 70) {
        sMsg += "\n* Input Umur harus berupa angka antara 7 sampai 70 tahun";
    } else {
        if (umur <= 17) {
            info = "Anggota Pelajar";
        } else {
            info = "Anggota Umum";
        }
    }

    if (kategori === "") {
        sMsg += "\n* Koleksi favorit harus dipilih";
    }

    if (sMsg !== "") {
        alert("Peringatan Kesalahan:" + sMsg);
        return false;
    }

    var pilihan = "";
    switch (kategori) {
        case "F":
            pilihan = "Fiksi";
            break;
        case "N":
            pilihan = "Non-Fiksi";
            break;
        case "J":
            pilihan = "Jurnal Ilmiah";
            break;
        default:
            pilihan = "Tidak Ditemukan";
            break;
    }

    alert("Terima kasih " + nama + "! Anda terdaftar di koleksi " + pilihan + " (" + info + ").");
    return true;
}