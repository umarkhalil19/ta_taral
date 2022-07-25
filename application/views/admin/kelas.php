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
                <?php if (isset($_GET['notif'])) : _notif($this->session->flashdata($_GET['notif']));
                endif; ?>
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h4>Tabel Data Kelas</h4>
                                        </div>
                                        <a href="<?= base_url('admin/kelas_add') ?>" class="btn btn-md btn-primary" title="Tambah Data Kelas"><em class="icon ni ni-plus"></em></a>
                                    </div>
                                    <br>
                                    <table class="datatable-init table">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">#</th>
                                                <th>Nama Kelas</th>
                                                <!-- <th>Jumlah Siswa</th> -->
                                                <th>Wali Kelas</th>
                                                <th>Tahun Pelajaran</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($kelas->result() as $k) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $k->nama ?></td>
                                                    <!-- <td>30</td> -->
                                                    <td><?= $k->wali_kelas ?></td>
                                                    <td><?= $k->tahun_ajaran . '-' . $k->semester ?></td>
                                                    <td>
                                                        <a href="<?= base_url('admin/kelas_edit/' . $k->id) ?>" class="btn btn-sm btn-warning" title="Edit Data Kelas"><em class="icon ni ni-edit"></em></a>
                                                        <a href="<?= base_url('admin/kelas_delete/' . $k->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, apakah anda yakin?')" title="Hapus Data Kelas"><em class="icon ni ni-trash-fill"></em></a>
                                                        <a href="<?= base_url('admin/kelas_siswa/' . $k->id) ?>" class="btn btn-sm btn-info" title="Data Siswa"><em class="icon ni ni-users-fill"></em></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
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