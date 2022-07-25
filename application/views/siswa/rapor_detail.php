<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Detail Rapor</h3>
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
                                            <a href="<?= base_url('siswa/rapor/') ?>" class="btn btn-md btn-warning float-right" title="Kembali"><em class="icon ni ni-arrow-left-fill-c"></em></a>
                                            <h5>CAPAIAN HASIL BELAJAR</h5>
                                            <h6>A. SIKAP</h6>
                                            <table class="table table-striped table-bordered">
                                                <tr>
                                                    <td>
                                                        <font style="font-family: times new roman; font-size:12pt;">Deskripsi Sikap :</font><br>
                                                        <font style="font-family: times new roman; font-size:12pt;"><?= $kelas->deskripsi_sikap ?></font>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <h6>B. PENGETAHUAN DAN KETRAMPILAN</h6>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 4%;" rowspan="2">No</th>
                                                        <th scope="col" rowspan="2" style="text-align: center;">Mata Pelajaran</th>
                                                        <th scope="col" colspan="4" style="text-align: center;">Pengetahuan</th>
                                                        <th scope="col" colspan="4" style="text-align: center;">Keterampilan</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" style="text-align: center;">KB</th>
                                                        <th scope="col" style="text-align: center;">Angka</th>
                                                        <th scope="col" style="text-align: center;">Predikat</th>
                                                        <th scope="col" style="text-align: center;">Deskripsi</th>
                                                        <th scope="col" style="text-align: center;">KB</th>
                                                        <th scope="col" style="text-align: center;">Angka</th>
                                                        <th scope="col" style="text-align: center;">Predikat</th>
                                                        <th scope="col" style="text-align: center;">Deskripsi</th>
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
                                                            <?php
                                                            foreach ($nilai_pengetahuan->result() as $np) :
                                                            ?>
                                                                <td><?= ($np->kelas_id == $m->id) ? "$np->nilai" : "0" ?></td>
                                                                <td>D</td>
                                                                <td><?= ($np->kelas_id == $m->id) ? "$np->keterangan" : "" ?></td>
                                                            <?php
                                                            endforeach
                                                            ?>
                                                            <td><?= $m->kkm ?></td>
                                                            <?php
                                                            foreach ($nilai_keterampilan->result() as $nk) :
                                                            ?>
                                                                <td><?= ($nk->kelas_id == $m->id) ? "$nk->nilai" : "0" ?></td>
                                                                <td>D</td>
                                                                <td><?= ($nk->kelas_id == $m->id) ? "$nk->keterangan" : "" ?></td>
                                                            <?php
                                                            endforeach
                                                            ?>
                                                        </tr>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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