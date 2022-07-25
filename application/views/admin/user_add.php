<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Pengguna</h3>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">Form Tambah Pengguna</h5>
                                    </div>
                                    <?php
                                    $attribut = ['class' => 'gy-3'];
                                    echo form_open('admin/user_act', $attribut);
                                    ?>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Username</label>
                                                <span class="form-note">Isi dengan Username User</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                                                </div>
                                                <?php echo form_error('username', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Password</label>
                                                <span class="form-note">Password default adalah username yang anda masukkan di atas</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="password" class="form-control" id="password" name="password" value="password" disabled>
                                                </div>
                                                <?php echo form_error('password', '<small><span class="text-danger">', '</span></small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">Level</label>
                                                <span class="form-note">Form ini hanya untuk menambahkan pengguna sebagai Admin</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="level" name="level" value="admin" readonly>
                                                </div>
                                                <?php echo form_error('level', '<small><span class="text-danger">', '</span></small>'); ?>
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