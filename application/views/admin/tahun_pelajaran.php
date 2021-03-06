<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Tahun Pelajaran</h3>
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
                                            <h4>Tabel Data Tahun Pelajaran</h4>
                                        </div>
                                        <a href="<?= base_url('admin/tahun_pelajaran_add') ?>" class="btn btn-md btn-primary" title="Tambah Tahun Pelajaran"><em class="icon ni ni-plus"></em></a>
                                    </div>
                                    <br>
                                    <table class="datatable-init table">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">#</th>
                                                <th>Tahun Pelajaran</th>
                                                <th>Semester</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($tahun->result() as $t) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $t->tahun_ajaran ?></td>
                                                    <td><?= $t->semester ?></td>
                                                    <td>
                                                        <?php
                                                        if ($t->status == "Aktif") {
                                                            echo '<span class="badge badge-success">Aktif</span>';
                                                        } elseif ($t->status == "Tidak Aktif") {
                                                            echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('admin/tahun_pelajaran_edit/' . $t->id) ?>" class="btn btn-sm btn-warning" title="Edit Tahun Pelajaran"><em class="icon ni ni-edit"></em></a>
                                                        <a href="<?= base_url('admin/tahun_pelajaran_delete/' . $t->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data Akan dihapus, apakah anda yakin?')" title="Hapus Tahun Pelajaran"><em class="icon ni ni-trash-fill"></em></a>
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