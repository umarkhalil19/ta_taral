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
                                        <a href="<?= base_url('guru/kelas_detail/' . $this->session->userdata('kelas')) ?>" class="btn btn-md btn-warning" title="Kembali"><em class="icon ni ni-arrow-left-fill-c"></em></a>
                                    </div>
                                    <br>
                                    <table class="datatable-init table">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">#</th>
                                                <th>Nama</th>
                                                <th>NIS</th>
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
                                                    <td><?= $s->nis ?></td>
                                                    <td><?= $s->tempat_lahir . '/' . $s->tgl_lahir ?></td>
                                                    <td><?= $s->jenis_kelamin ?></td>
                                                    <td><?= $s->no_telp ?></td>
                                                    <td>
                                                        <a href="<?= base_url('guru/siswa_detail/' . $s->nis) ?>" class="btn btn-sm btn-info" title="Detail Siswa"><em class="icon ni ni-search"></em></a>
                                                        <a href="<?= base_url('guru/siswa_prestasi/' . $s->nis) ?>" class="btn btn-sm btn-success" title="Prestasi Siswa"><em class="icon ni ni-star"></em></a>
                                                        <a href="<?= base_url('guru/siswa_ekskul/' . $s->nis) ?>" class="btn btn-sm btn-primary" title="Ekstrakurikuler Siswa"><em class="icon ni ni-thumbs-up"></em></a>
                                                        <a href="<?= base_url('guru/siswa_ket/' . $s->nis) ?>" class="btn btn-sm btn-secondary" title="Keterangan Lainnya"><em class="icon ni ni-list-index-fill"></em></em></a>
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