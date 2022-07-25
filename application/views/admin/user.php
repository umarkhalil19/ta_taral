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
                <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
                endif; ?>
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h4>Tabel Data Pengguna</h4>
                                        </div>
                                        <a href="<?= base_url('admin/user_add/') ?>" class="btn btn-md btn-primary" title="Tambah Data Siswa"><em class="icon ni ni-plus"></em></a>
                                    </div>
                                    <br>
                                    <table class="datatable-init table">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">#</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                                <th>Status</th>
                                                <th>Login Terakhir</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($user->result() as $u) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $u->username ?></td>
                                                    <td><?= $u->level ?></td>
                                                    <td><?= $u->status ?></td>
                                                    <td><?= $u->last_login ?></td>
                                                    <td>
                                                        <?php
                                                        if ($u->status == 'aktif') {
                                                        ?>
                                                            <a href="<?= base_url('admin/user_status/' . $u->username . '/nonaktif') ?>" class="btn btn-sm btn-warning" onclick="return confirm('Data akan dinonaktifkan, apakah anda yakin?')" title="Nonaktifkan Data User"><em class="icon ni ni-cross-round-fill"></em></a>
                                                        <?php } else { ?>
                                                            <a href="<?= base_url('admin/user_status/' . $u->username . '/aktif') ?>" class="btn btn-sm btn-success" onclick="return confirm('Data akan diaktifkan, apakah anda yakin?')" title="Aktifkan Data User"><em class="icon ni ni-check-round-fill"></em></a>
                                                        <?php } ?>
                                                        <a href="<?= base_url('admin/user_delete/' . $u->username) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, apakah anda yakin?')" title="Hapus Data User"><em class="icon ni ni-trash-fill"></em></a>
                                                        <a href="<?= base_url('admin/user_reset/' . $u->username) ?>" class="btn btn-sm btn-primary" onclick="return confirm('Password akan direset, apakah anda yakin?')" title="Reset Password User"><em class="icon ni ni-undo"></em></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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