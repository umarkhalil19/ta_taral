<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Data Nilai Mapel</h3>
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
                                            <h4>Nilai <?= $mapel->nama ?></h4>
                                        </div>
                                        <a href="<?= base_url('guru/kelas_rapor/') ?>" class="btn btn-md btn-warning" title="Kembali"><em class="icon ni ni-arrow-left-fill-c"></em></a>
                                    </div>
                                    <br>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 4%;" rowspan="2">#</th>
                                                <th scope="col" rowspan="2" style="text-align: center;">Nama Siswa</th>
                                                <th scope="col" colspan="2" style="text-align: center;">Nilai Pengetahuan</th>
                                                <th scope="col" colspan="2" style="text-align: center;">Nilai Keterampilan</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" style="text-align: center; width: 8%;">Angka</th>
                                                <th scope="col" style="text-align: center;">Deskripsi</th>
                                                <th scope="col" style="text-align: center; width: 8%;">Angka</th>
                                                <th scope="col" style="text-align: center;">Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <?= form_open('guru/mapel_nilai_act') ?>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($siswa->result() as $s) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $s->nama ?></td>
                                                    <?php
                                                    $pengetahuan = 0;
                                                    $np_ket = '';
                                                    $np_id = 0;
                                                    $keterampilan = 0;
                                                    $nk_ket = '';
                                                    $nk_id = 0;
                                                    foreach ($nilai_pengetahuan->result() as $np) {
                                                        if ($np->nis == $s->nis) {
                                                            $pengetahuan = $np->nilai;
                                                            $np_ket = $np->keterangan;
                                                            $np_id = $np->id;
                                                        }
                                                    }
                                                    ?>
                                                    <td>
                                                        <input type="hidden" class="form-control" value="<?= $mapel->id ?>" name="mapel">
                                                        <input type="hidden" class="form-control" value="<?= $np_id ?>" name="<?= "np_id_$s->nis" ?>">
                                                        <input type="text" class="form-control" value="<?= $pengetahuan ?>" name="<?= "np_$s->nis" ?>" <?= $type ?>>
                                                    </td>
                                                    <td>
                                                        <textarea name="<?= "np_ket_$s->nis" ?>" id="" cols="30" rows="3" class="form-control" <?= $type ?>><?= $np_ket ?></textarea>
                                                    </td>
                                                    <?php
                                                    foreach ($nilai_keterampilan->result() as $nk) {
                                                        if ($nk->nis == $s->nis) {
                                                            $keterampilan = $nk->nilai;
                                                            $nk_ket = $nk->keterangan;
                                                            $nk_id = $nk->id;
                                                        }
                                                    }
                                                    ?>
                                                    <td>
                                                        <input type="hidden" class="form-control" value="<?= $nk_id ?>" name="<?= "nk_id_$s->nis" ?>">
                                                        <input type="text" class="form-control" value="<?= $keterampilan ?>" name="<?= "nk_$s->nis" ?>" <?= $type ?>>
                                                    </td>
                                                    <td>
                                                        <textarea name="<?= "nk_ket_$s->nis" ?>" id="" cols="30" rows="3" class="form-control" <?= $type ?>><?= $nk_ket ?></textarea>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                    <br>
                                    <?php
                                    if ($this->session->userdata('final') == 0) {
                                    ?>
                                        <button class="btn btn-lg btn-success float-right" type="submit">Simpan</button>
                                    <?php
                                    }
                                    ?>
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