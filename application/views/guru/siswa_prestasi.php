<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Prestasi</h3>
                        </div><!-- .nk-block-head-content -->
                        <a href="<?= base_url('guru/kelas_siswa/') ?>" class="btn btn-md btn-warning" title="Kembali"><em class="icon ni ni-arrow-left-fill-c"></em></a>
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
                                            <h4>Tabel Data Prestasi Siswa</h4>
                                        </div>
                                        <a href="<?= base_url('guru/siswa_prestasi_add/' . $siswa->nis) ?>" class="btn btn-md btn-primary float-right" title="Tambah Prestasi Siswa"><em class="icon ni ni-plus-round-fill"></em></a>
                                    </div>
                                    <br>
                                    <table class="datatable-init table">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">#</th>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                                <!-- <th>Tahun Ajaran/Semester</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($prestasi->result() as $p) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $p->nama ?></td>
                                                    <td><?= $p->keterangan ?></td>
                                                    <!-- <td>2022/2023-Semester Ganjil</td> -->
                                                    <td>
                                                        <a href="<?= base_url('guru/siswa_prestasi_del/' . $p->id . '/' . $siswa->nis) ?>" class="btn btn-sm btn-danger" title="Hapus Data Prestasi"><em class="icon ni ni-trash"></em></a>
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