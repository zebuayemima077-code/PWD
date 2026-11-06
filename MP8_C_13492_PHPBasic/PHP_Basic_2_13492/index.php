<?php

if ($_POST) {
    $bayaran = $_POST['bayaran'] ?? '';
    $jenis = $_POST['jenis'] ?? '';
    $harga = 600000;
    $message = array();
    $message2 = "";
    $bayarKembali = 0;

        if(empty($bayaran) || empty($jenis)) {
            $message[] = "Harap lengkapi semua data.";
        }

        if(!preg_match("/^[a-zA-Z ]*$/", $jenis)) {
            $message[] = "Jenis pembayaran hanya boleh mengandung huruf.";
        }

        if(!empty($message)) {
            foreach($message as $msg) {
                echo "<p style='color:red;>!! " . htmlspecialchars($msg) . " !!</p>";
            }
        }else{
            function jenisPembayaran($jenis){
                switch(strtolower($jenis)) {
                    case 'a':
                        $potongan = 0.75;
                        break;
                    case 'b':
                        $potongan = 0.50;
                        break;
                    case 'c':
                        $potongan = 0.25;
                        break;
                    case 'd':
                        $potongan = 0;
                        break;
                    default:
                    $potongan = 0;
                }
                return $potongan;
            }

            function infoJenisPembayaran($jenis){
                switch(strtolower($jenis)) {
                    case 'a':
                        $info = "Cicilan 25%";
                        break;
                    case 'b':
                        $info = "Cicilan 50%";
                        break;
                    case 'c':
                        $info = "Cicilan 75%";
                        break;
                    case 'd':
                        $info = "Lunas";
                        break;
                    default:
                        $info = "Jenis Pembayaran tidka valid.";
                }
            }
            return $info;
        }

        $potongan = jenisPembayaran($jenis);
        $infoJenis = infoJenisPembayaran($jenis);

        function totalBayar($harga, $potongan){
            return $harga - ($harga * $potongan);
        }

        $totalBayar = totalBayar($harga, $potongan);

        function pembayaran($bayaran, $totalBayar){
            if($bayaran < $totalBayar) {
                return null;
            }else{
                $bayarKembali = $bayaran - $totalBayar;
                return $bayarKembali;
            }
        }
        $bayarKembali = pembayaran($bayaran, $totalBayar);

        if($bayarKembali === null){
            $message2 = "Jumlah yang dibayar kurang dari total pembayaran. Silakan bayar sesuai jumlah yang ditentukan.";
            $bayarKembali = 0;
        }
        }
        
        if(!empty($message2)) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($message2) ." !!</p>";
        }else{
            echo "<h2>Informasi Pembayaran</h2>";
            echo "<p><strong>Jumlah yang dibayar: </strong> Rp" . htmlspecialchars($bayaran) . "</p>";
            echo "<p><strong>Jenis Pembayaran: </strong> Rp" . htmlspecialchars($bayaran) . "</p>";

            if($potongan == 0) {
                scho "<p>Pembayaran lunas.</p>";
        }else{
            echo "<p>Maaf jenis pembayaran tidak valid. Tidak ada potongan yang diberikan. </p>";
        }
        }else{
            echo "<p>Anda mendapatkan potongan " . (htmlspecialchars($potongan * 100)) . "% untuk pembayaran SPP Anda.</p>";
        }
        echo '<p style="font-weight: bold; font-size: 18px;">Total Pembayaran : Rp' .
        htmlspecialchars($totalBayar) . '</p';
        echo '<p style '