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
                                            <h4>Nilai Pendidikan Pancasila dan Kewarganegaraan</h4>
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
                                                <th scope="col" style="text-align: center; width: 7%;">Angka</th>
                                                <th scope="col" style="text-align: center;">Deskripsi</th>
                                                <th scope="col" style="text-align: center; width: 7%;">Angka</th>
                                                <th scope="col" style="text-align: center;">Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <?= form_open('#') ?>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Umar Khalil</td>
                                                <td>
                                                    <input type="text" class="form-control">
                                                </td>
                                                <td>
                                                    <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control">
                                                </td>
                                                <td>
                                                    <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <button class="btn btn-lg btn-success float-right" type="submit">Simpan</button>
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