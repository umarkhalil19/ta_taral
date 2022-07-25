<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Guru</h3>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">Form Tambah Guru</h5>
                                    </div>
                                    <?php
                                    $attribut = ['class' => 'gy-3'];
                                    echo form_open('admin/guru_act', $attribut);
                                    ?>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">NIP</label>
                                                <span class="form-note">Isi dengan NIP Guru</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP Guru" value="<?= set_value('nip') ?>">
                                                </div>
                                                <?php echo form_error('nip', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Nama</label>
                                                <span class="form-note">Isi dengan Nama Lengkap tanpa gelar</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                                                </div>
                                                <?php echo form_error('nama', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Gelar Depan</label>
                                                <span class="form-note">Isi dengan Gelar Depan Guru (biarkan kosong jika tidak ada)</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" placeholder="Gelar Depan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Gelar Belakang</label>
                                                <span class="form-note">Isi dengan Gelar Belakang (biarkan kosong jika tidak ada)</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" placeholder="Gelar Belakang">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Pendidikan Terakhir</label>
                                                <span class="form-note">Isi dengan Pendidikan Terakhir Guru</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="pend_akhir" name="pend_akhir" placeholder="Pendidikan Terakhir" value="<?= set_value('pend_akhir') ?>">
                                                </div>
                                                <?php echo form_error('pend_akhir', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <span class="form-note">Isi dengan Email Aktif Guru</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email Aktif" value="<?= set_value('email') ?>">
                                                </div>
                                                <?php echo form_error('email', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">No Hp</label>
                                                <span class="form-note">Isi dengan No Hp Aktif Guru</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp" value="<?= set_value('no_hp') ?>">
                                                </div>
                                                <?php echo form_error('no_hp', '<small><span class="text-danger">', '</span></small>'); ?>
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
                                                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?= set_value('alamat') ?></textarea>
                                                </div>
                                                <?php echo form_error('alamat', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-8 offset-lg-5">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary">Tambah</button>
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