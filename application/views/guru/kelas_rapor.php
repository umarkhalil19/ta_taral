<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Mata Pelajaran</h3>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h4>Tabel Data Mata Pelajaran</h4>
                                        </div>
                                        <a href="<?= base_url('guru/kelas_detail/' . $this->session->userdata('kelas')) ?>" class="btn btn-md btn-warning" title="Kembali"><em class="icon ni ni-arrow-left-fill-c"></em></a>
                                    </div>
                                    <br>
                                    <table class="datatable-init table">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">#</th>
                                                <th>Nama Mapel</th>
                                                <th>KKM</th>
                                                <th>Kelas</th>
                                                <th>Tahun Pelajaran</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($mapel->result() as $m) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $m->nama ?></td>
                                                    <td><?= $m->kkm ?></td>
                                                    <td><?= $m->kelas ?></td>
                                                    <td><?= $m->tahun_ajaran . '/' . $m->semester ?></td>
                                                    <td>
                                                        <?php
                                                        if ($this->session->userdata('final') == 0) {
                                                        ?>
                                                            <a href="<?= base_url('guru/mapel_nilai/' . $m->id) ?>" class="btn btn-sm btn-info" title="Edit Nilai"><em class="icon ni ni-edit"></em></a>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a href="<?= base_url('guru/mapel_nilai/' . $m->id) ?>" class="btn btn-sm btn-primary" title="Detail Nilai"><em class="icon ni ni-search"></em></a>
                                                        <?php
                                                        }
                                                        ?>
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