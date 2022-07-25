<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Siswa Kelas <?= $kelas->nama ?></h3>
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
                                            <h4>Tabel Data Siswa Dalam Kelas <?= $kelas->nama ?></h4>
                                        </div>
                                        <button class="btn btn-md btn-primary" title="Tambah Siswa Ke Kelas <?= $kelas->nama ?>" data-toggle="modal" data-target="#modalForm"><em class="icon ni ni-plus"></em></button>
                                    </div>
                                    <br>
                                    <table class="datatable-init table">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">#</th>
                                                <th style="width: 25%;">NIS/NISN</th>
                                                <th>Nama</th>
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
                                                    <td><?= $s->nis . '/' . $s->nisn ?></td>
                                                    <td><?= $s->nama ?></td>
                                                    <td>
                                                        <a href="<?= base_url("admin/kelas_siswa_delete/$s->nis/$s->kelas_id") ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus, apakah anda yakin?')" title="Hapus Data Kelas"><em class="icon ni ni-trash-fill"></em></a>
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
<div class="modal fade" tabindex="-1" id="modalForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Siswa</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <?php
                $attribut = ['class' => 'form-validate is-alter'];
                echo form_open('admin/kelas_siswa_act', $attribut);
                ?>
                <div class="form-group">
                    <label class="form-label" for="full-name">Siswa</label>
                    <div class="form-control-wrap">
                        <select name="nis" id="nis" class="form-select form-control form-control-lg" data-search="on">
                            <?php
                            foreach ($all->result() as $a) :
                            ?>
                                <option value="<?= $a->nis ?>"><?= $a->nis . '-' . $a->nama ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <input type="hidden" name="kelas" value="<?= $kelas->id ?>">
                        <input type="hidden" name="tahun" value="<?= $kelas->tahun_ajaran_id ?>">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary">Tambah</button>
                </div>
                <?=
                form_close();
                ?>
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">Modal Footer Text</span>
            </div>
        </div>
    </div>
</div>
<!-- content @e -->