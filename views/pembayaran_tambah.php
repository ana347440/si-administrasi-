<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Pembayaran Siswa</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal row g-3" method="post">
                        <div class="col-auto">
                            <label for="no_rak" class="col-sm-3 control-label">Nomor Induk Siswa</label>
                            <div class="col-sm-3">
                                <input type="number" name="id" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor Induk Siswa" required>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name='post1' class="btn btn-primary col-sm-1" style="margin-top:0px">Cari</button>
                        </div>
                    </form>
                    <br>
                    <form class="form-horizontal" method="post">
						<div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Nama Siswa</label>
                            <div class="col-sm-9">
                                <?php
                                    if(isset($_POST['post1'])){
                                        if(isset($_POST['id'])){
                                            $sql = "SELECT *FROM siswa WHERE id ='" . $_POST['id'] . "'";
                                            //proses query ke database
                                            $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                                            //Merubaha data hasil query kedalam bentuk array
                                            $data = mysqli_fetch_array($query);
                                            if (isset($data)){
                                                $data_siswa = $data['nama_siswa'];
                                            }else{
                                                $data_siswa = "Data tidak ditemukan!";
                                            }
                                        }
                                    }
                                ?>
                                <input type="text" name="nama_siswa" class="form-control" id="inputEmail3" <?php if(isset($_POST['id'])) echo 'value="'.$data_siswa.'"' ?> placeholder="Nama Siswa" readonly  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tgl_masuk" class="col-sm-3 control-label">Tanggal</label>
                            <div class="col-sm-3">
                                <input type="text" name="tanggal" class="form-control" id="inputEmail3" value="<?= date('d F Y') ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Nominal Pembayaran</label>
                            <div class="col-sm-9">
                                <input type="number" name="nominal" class="form-control" id="inputEmail3" placeholder="Nominal Pembayaran" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" name="ket" class="form-control" id="inputEmail3" placeholder="Keterangan Pembayaran" required>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success" name="post2">
                                    <span class="fa fa-save"></span> Simpan Data</button>
                            </div>
                        </div>
                    </form>
                    
                    <?php
                        if(isset($_POST['post2'])){
                            $nama_siswa = $_POST['nama_siswa'];
                            $tanggal = date('Y-m-d');
                            $nominal = $_POST['nominal'];
                            $ket = $_POST['ket'];

                            $sql1 = "SELECT *FROM siswa WHERE nama_siswa ='$nama_siswa'";
                            //proses query ke database
                            $query1 = mysqli_query($koneksi, $sql1) or die("SQL Detail error");
                            //Merubaha data hasil query kedalam bentuk array
                            $data = mysqli_fetch_array($query1);
                            $siswa_id = $data['id'];
                            
                            //buat sql
                            $sql="INSERT INTO pembayaran VALUES ('','$siswa_id','$tanggal','$nominal','$ket')";
                            $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
                            if ($query){
                                echo "<script>alert('Data Berhasil Disimpan');</script>";
                            }else{
                                echo "<script>alert('Simpan Data Gagal');<script>";
                            }
                        }
                    ?>
                </div>
                
                <div class="panel-footer">
                    <a href="?page=riwayat&actions=tampil" class="btn btn-danger btn-sm">
                        Riwayat Pembayaran
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


