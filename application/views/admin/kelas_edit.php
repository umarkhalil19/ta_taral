<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Kelas</h3>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">Form Tambah Kelas</h5>
                                    </div>
                                    <?php
                                    $attribut = ['class' => 'gy-3'];
                                    echo form_open('admin/kelas_update', $attribut);
                                    ?>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Nama</label>
                                                <span class="form-note">Isi dengan Nama Kelas</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama', $kelas->nama); ?>">
                                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $kelas->id; ?>">
                                                </div>
                                                <?php echo form_error('nama', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Tahun Ajaran</label>
                                                <span class="form-note">Pilih Tahun Ajaran</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <select name="tahun_ajar" id="tahun_ajar" class="form-control">
                                                        <?php
                                                        foreach ($tahun->result() as $t) :
                                                        ?>
                                                            <option <?= ($kelas->tahun_ajaran_id == $t->id) ? "selected" : "" ?> value="<?= $t->id ?>"><?= $t->tahun_ajaran ?> - <?= $t->semester ?></option>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Wali Kelas</label>
                                                <span class="form-note">Pilih Wali Kelas</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <select name="wali_kelas" id="wali_kelas" class="form-control">
                                                        <?php
                                                        foreach ($guru->result() as $g) :
                                                        ?>
                                                            <option <?= ($kelas->nip_guru == $g->nip) ? "selected" : "" ?> value="<?= $g->nip ?>"><?= $g->nama ?></option>
                                                        <?php
                                                        endforeach
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-8 offset-lg-5">
                                            <div class="form-group mt-2">
                                                <a href="<?= base_url('admin/kelas') ?>" class="btn btn-lg btn-warning">Kembali</a>
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