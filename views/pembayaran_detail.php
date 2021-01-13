<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Pembayaran</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT * FROM pembayaran JOIN siswa WHERE pembayaran.id_siswa=siswa.id AND no_pembayaran ='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <div class="col-sm-6">
                        <table class="table table-bordered table-striped table-hover"> 
                            <tr>
                                <td width="200px">Nama Siswa</td> <td><?= $data['nama_siswa'] ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Induk</td> <td><?= $data['id'] ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Tgl Lahir</td> <td><?= $data['tempat_lahir'] ?>, <?= date('d F Y', strtotime($data['tgl_lahir'])) ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td> <td><?= $data['alamat'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Orangtua</td> <td><?= $data['nama_ortu'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-bordered table-striped table-hover"> 
                            <tr>
                                <td width="200px">Nomor Pembayaran</td> <td><?= $data['no_pembayaran'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td> <td><?= date('d F Y', strtotime($data['tanggal'])) ?></td>
                            </tr>
                            <tr>
                                <td>Nominal</td> <td>Rp. <?= number_format($data['nominal']) ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td> <td><?= $data['keterangan'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12">
                        <a href="" class="btn btn-warning btn-sm"><span class="fa fa-print"></span> Cetak Laporan</a>
                    </div>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=riwayat&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Riwayat Peminjaman </a>
                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

