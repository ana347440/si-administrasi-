<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Pembayaran</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body>
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        ?>   

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Administrasi <br>
                        TK Nurussunnah </h2>
                        <h4>Jalan Jendral Ahmad Yani No. 33, Sei Renggas, Kisaran, Sendang Sari <br> Kisaran Barat, Kabupaten Asahan, Sumatera Utara, 21211</h4>
                        <hr>
                        <h3>DATA PEMBAYARAN</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                            <thead>
                                <tr>
                                    <th><center>No. Pembayaran</center> </th>
                                    <th><center>Nama Siswa</center></th>
                                    <th><center>Tanggal</center></th>
                                    <th><center>Nominal</center></th>
                                    <th><center>Keterangan</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--ambil data dari database, dan tampilkan kedalam tabel-->
                                <?php
                                //buat sql untuk tampilan data, gunakan kata kunci select
                                $sql = "SELECT * FROM pembayaran JOIN siswa WHERE pembayaran.id_siswa=siswa.id";
                                $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                                //Baca hasil query dari databse, gunakan perulangan untuk 
                                //Menampilkan data lebh dari satu. disini akan digunakan
                                //while dan fungdi mysqli_fecth_array
                                //Membuat variabel untuk menampilkan nomor urut
                                $nomor = 0;
                                //Melakukan perulangan u/menampilkan data
                                while ($data = mysqli_fetch_array($query)) {
                                    $nomor++; //Penambahan satu untuk nilai var nomor
                                    ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= $data['nama_siswa'] ?></td>
                                        <td><?= $data['tanggal'] ?></td>
                                        <td>Rp. <?= number_format($data['nominal']) ?></td>
                                        <td><?= $data['keterangan'] ?></td>
                                    </tr>
                                    <!--Tutup Perulangan data-->
                                <?php } ?>
                            </tbody>
                        </table>
                        <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="text-center">
                                                Kisaran,  <?= date("d-m-Y") ?>
                                                <br><br><br><br>
                                                <u><strong>KEPALA SEKOLAH<strong></u><br>
                                                NIP.102871291416712
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>     
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>