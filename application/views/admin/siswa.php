<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Siswa</h3>
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
                                            <h4>Tabel Data Siswa</h4>
                                        </div>
                                        <a href="<?= base_url('admin/siswa_add/') ?>" class="btn btn-md btn-primary" title="Tambah Data Siswa"><em class="icon ni ni-plus"></em></a>
                                    </div>
                                    <br>
                                    <table class="datatable-init table">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">#</th>
                                                <th>Nama</th>
                                                <th>NIS/NISN</th>
                                                <th>Tempat/Tanggal Lahir</th>
                                                <th>L/P</th>
                                                <th>No Hp</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($siswa->result() as $s) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $s->nama ?></td>
                                                    <td><?= $s->nis . '/' . $s->nisn ?></td>
                                                    <td><?= $s->tempat_lahir . '/' . $s->tgl_lahir ?></td>
                                                    <td><?= $s->jenis_kelamin ?></td>
                                                    <td><?= $s->no_telp ?></td>
                                                    <td>
                                                        <a href="<?= base_url('admin/siswa_edit/' . $s->nis) ?>" class="btn btn-sm btn-warning" title="Edit Data Siswa"><em class="icon ni ni-edit"></em></a>
                                                        <a href="<?= base_url('admin/siswa_delete/' . $s->nis) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, apakah anda yakin?')" title="Hapus Data Siswa"><em class="icon ni ni-trash-fill"></em></a>
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