<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Siswa</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM siswa WHERE id ='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="35%">Nama Siswa</td> <td><?= $data['nama_siswa'] ?></td>
                        </tr>
                        <tr>
                            <td width="35%">Tempat Lahir</td> <td><?= $data['tempat_lahir'] ?></td>
                        </tr>
                        <tr>
                            <td width="35%">Tanggal Lahir</td> <td><?= date('d F Y', strtotime($data['tgl_lahir'])) ?></td>
                        </tr>
                        <tr>
                            <td width="35%">Alamat</td> <td><?= $data['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td width="35%">Nama Orang Tua</td> <td><?= $data['nama_ortu'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=siswa&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Siswa </a>
                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

