<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Biodata Siswa</h3>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
                endif; ?>
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">Form Biodata Siswa</h5>
                                    </div>
                                    <?php
                                    $attribut = ['class' => 'gy-3'];
                                    echo form_open('siswa/biodata_update', $attribut);
                                    ?>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">NIS</label>
                                                <span class="form-note">Isi dengan Nomor Induk Siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="id" name="id" value="<?= $siswa->nis; ?>" readonly>
                                                </div>
                                                <?php echo form_error('nis', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">NISN</label>
                                                <span class="form-note">Isi dengan Nomor Induk Siswa Nasional</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?= set_value('nisn', $siswa->nisn) ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Nama Lengkap</label>
                                                <span class="form-note">Isi dengan Nama Lengkap Siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama', $siswa->nama) ?>">
                                                </div>
                                                <?php echo form_error('nama', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Tempat Lahir</label>
                                                <span class="form-note">Isi dengan Tempat Lahir siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= set_value('tempat_lahir', $siswa->tempat_lahir) ?>">
                                                </div>
                                                <?php echo form_error('tempat_lahir', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Tanggal Lahir</label>
                                                <span class="form-note">Isi dengan Tanggal Lahir siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir', $siswa->tgl_lahir) ?>">
                                                </div>
                                                <?php echo form_error('tgl_lahir', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <span class="form-note">Isi dengan Jenis Kelamin Siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                        <option <?= ($siswa->jenis_kelamin == 'L') ? "selected" : "" ?> value="L">Laki-laki</option>
                                                        <option <?= ($siswa->jenis_kelamin == 'P') ? "selected" : "" ?> value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Agama</label>
                                                <span class="form-note">Isi dengan Agama Siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <select name="agama" id="agama" class="form-control">
                                                        <option <?= ($siswa->agama == 'Islam') ? "selected" : "" ?> value="Islam">Islam</option>
                                                        <option <?= ($siswa->agama == 'Kristen') ? "selected" : "" ?> value="Kristen">Kristen</option>
                                                        <option <?= ($siswa->agama == 'Katolik') ? "selected" : "" ?> value="Katolik">Katolik</option>
                                                        <option <?= ($siswa->agama == 'Hindu') ? "selected" : "" ?> value="Hindu">Hindu</option>
                                                        <option <?= ($siswa->agama == 'Budha') ? "selected" : "" ?> value="Budha">Budha</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Status Dalam Keluarga</label>
                                                <span class="form-note">Isi dengan Status dalam keluarga</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="status_keluarga" name="status_keluarga" value="<?= set_value('status_keluarga', $siswa->status_keluarga) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Urutan Anak Ke-</label>
                                                <span class="form-note">Isi dengan Urutan Anak dalam keluarga</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="urutan_anak" name="urutan_anak" value="<?= set_value('urutan_anak', $siswa->urutan_anak) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Alamat</label>
                                                <span class="form-note">Isi dengan Alamat lengkap guru</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?= set_value('alamat', $siswa->alamat) ?></textarea>
                                                </div>
                                                <?php echo form_error('alamat', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Tanggal Masuk</label>
                                                <span class="form-note">Isi dengan Tanggal siswa diterima disekolah</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?= set_value('tgl_masuk', $siswa->tgl_masuk) ?>" readonly>
                                                </div>
                                                <?php echo form_error('tgl_masuk', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Kelas Masuk</label>
                                                <span class="form-note">Isi dengan Kelas siswa saat masuk ke sekolah</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <select name="kelas_masuk" id="kelas_masuk" class="form-control" disabled>
                                                        <option <?= ($siswa->kelas_masuk == '1') ? "selected" : "" ?> value="1">1</option>
                                                        <option <?= ($siswa->kelas_masuk == '2') ? "selected" : "" ?> value="2">2</option>
                                                        <option <?= ($siswa->kelas_masuk == '3') ? "selected" : "" ?> value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">No HP</label>
                                                <span class="form-note">Isi dengan no hp aktif siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= set_value('no_hp', $siswa->no_telp) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Ayah</label>
                                                <span class="form-note">Isi dengan Nama Ayah siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="ayah" name="ayah" value="<?= set_value('ayah', $siswa->ayah) ?>">
                                                </div>
                                                <?php echo form_error('ayah', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Pekerjaan Ayah</label>
                                                <span class="form-note">Isi dengan Pekerjaan Ayah siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="ayah_kerja" name="ayah_kerja" value="<?= set_value('ayah_kerja', $siswa->pekerjaan_ayah) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">No Hp Ayah</label>
                                                <span class="form-note">Isi dengan No HP Ayah siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="ayah_no_hp" name="ayah_no_hp" value="<?= set_value('ayah_no_hp', $siswa->no_hp_ayah) ?>">
                                                </div>
                                                <?php echo form_error('ayah_no_hp', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Alamat Ayah</label>
                                                <span class="form-note">Isi dengan Alamat Ayah lengkap guru</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <textarea name="alamat_ayah" id="alamat_ayah" cols="30" rows="5" class="form-control"><?= set_value('alamat_ayah', $siswa->alamat_ayah) ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Ibu</label>
                                                <span class="form-note">Isi dengan Nama Ibu siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="ibu" name="ibu" value="<?= set_value('ibu', $siswa->ibu) ?>">
                                                </div>
                                                <?php echo form_error('ibu', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Pekerjaan Ibu</label>
                                                <span class="form-note">Isi dengan Pekerjaan Ibu siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="ibu_kerja" name="ibu_kerja" value="<?= set_value('ibu_kerja', $siswa->pekerjaan_ibu) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">No Hp Ibu</label>
                                                <span class="form-note">Isi dengan No HP Ibu siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="ibu_no_hp" name="ibu_no_hp" value="<?= set_value('ibu_no_hp', $siswa->no_hp_ibu) ?>">
                                                </div>
                                                <?php echo form_error('ibu_no_hp', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Alamat Ibu</label>
                                                <span class="form-note">Isi dengan Alamat Ibu lengkap guru</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="5" class="form-control"><?= set_value('alamat_ibu', $siswa->alamat_ibu) ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Wali</label>
                                                <span class="form-note">Isi dengan Nama Wali siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="wali" name="wali" value="<?= set_value('wali', $siswa->wali) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Pekerjaan Wali</label>
                                                <span class="form-note">Isi dengan Pekerjaan Wali siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="wali_kerja" name="wali_kerja" value="<?= set_value('wali_kerja', $siswa->pekerjaan_wali) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">No Hp Wali</label>
                                                <span class="form-note">Isi dengan No HP Wali siswa</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="wali_no_hp" name="wali_no_hp" value="<?= set_value('wali_no_hp', $siswa->no_hp_wali) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Alamat Wali</label>
                                                <span class="form-note">Isi dengan Alamat Wali lengkap guru</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <textarea name="alamat_wali" id="alamat_wali" cols="30" rows="5" class="form-control"><?= set_value('alamat_wali', $siswa->alamat_wali) ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-8 offset-lg-5">
                                            <div class="form-group mt-2">
                                                <a href="<?= base_url('siswa') ?>" class="btn btn-lg btn-warning">Kembali</a>
                                                <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content @e -->