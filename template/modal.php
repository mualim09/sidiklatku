<div class="modal fade" id="lap_diklat" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Laporan Data Diklat</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/diklat/cetak') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Berdasarkan Materi</label>
                                <select name="id_materi" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM materi ORDER BY id_materi DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_materi'] ?>"><?= $row['nm_materi'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" name="cetak" class="btn btn-info btn-block"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="lap_diklat_tahun" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Laporan Data Diklat Pertahun</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/diklat/cetak') ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select name="tahun" class="form-control" required>
                                    <?php
                                    $query = $con->query("SELECT tgl_mulai FROM diklat GROUP BY year(tgl_mulai)");
                                    echo "<option value=''> -- Pilih Tahun -- </option>";
                                    while ($row = $query->fetch_array()) {
                                        $data = explode('-', $row['tgl_mulai']);
                                        $tahun = $data[0];
                                        echo "<option value='$tahun'>$tahun</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" name="cetak2" class="btn btn-info btn-block"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_peserta" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Laporan Data Peserta Diklat</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/peserta/cetak') ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Berdasarkan Diklat</label>
                                <select name="id_diklat" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM diklat ORDER BY tgl_mulai DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_diklat'] ?>"><?= $row['tema'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Berdasarkan Asal Instansi</label>
                                <select name="id_instansi" class="form-control select2" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM instansi ORDER BY id_instansi DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_instansi'] ?>"><?= $row['nm_instansi'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_kehadiran" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Laporan Data Kehadiran Peserta Diklat</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/kehadiran/cetak') ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Berdasarkan Diklat</label>
                                <select name="id_diklat" class="form-control select2" style="width: 100%;" required>
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM diklat ORDER BY tgl_mulai DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_diklat'] ?>"><?= $row['tema'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_sertifikat" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Laporan Data Penerima Sertifikat</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/sertifikat/cetak') ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Berdasarkan Diklat</label>
                                <select name="id_diklat" class="form-control select2" style="width: 100%;" required>
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM diklat ORDER BY tgl_mulai DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_diklat'] ?>"><?= $row['tema'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_award" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Laporan Data Penerima Penghargaan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/award/cetak') ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Berdasarkan Diklat</label>
                                <select name="id_diklat" class="form-control select2" style="width: 100%;" required>
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM diklat ORDER BY tgl_mulai DESC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_diklat'] ?>"><?= $row['tema'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group float-right">
                            <button type="submit" name="cetak" class="btn btn-info"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="lap_grafik_diklat" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Grafik Peserta Diklat</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('admin/diklat/grafik') ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select name="tahun" class="form-control" required>
                                    <?php
                                    $query = $con->query("SELECT tgl_mulai FROM diklat GROUP BY year(tgl_mulai)");
                                    echo "<option value=''> -- Pilih Tahun -- </option>";
                                    while ($row = $query->fetch_array()) {
                                        $data = explode('-', $row['tgl_mulai']);
                                        $tahun = $data[0];
                                        echo "<option value='$tahun'>$tahun</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" name="cetak" class="btn btn-info btn-block"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>