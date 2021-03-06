<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">XI IPA 6</h3>
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
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-bordered">
                                                <div class="card-header border-bottom">Siswa</div>
                                                <div class="card-inner">
                                                    <h5 class="card-title">Data Lengkap Siswa</h5>
                                                    <p class="card-text">Detail Data siswa pada kelas</p>
                                                    <a href="<?= base_url("guru/kelas_siswa/") ?>" class="btn btn-primary">Detail Siswa</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-bordered">
                                                <div class="card-header border-bottom">Rapor Kelas</div>
                                                <div class="card-inner">
                                                    <h5 class="card-title">Data Rapor Siswa</h5>
                                                    <p class="card-text">Detail Data Rapor siswa pada kelas</p>
                                                    <a href="<?= base_url('guru/kelas_rapor/') ?>" class="btn btn-primary">Detail Rapor</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-bordered">
                                                <div class="card-header border-bottom">Status Finalisasi</div>
                                                <?php
                                                if ($kelas->finalisasi == 1) {
                                                ?>
                                                    <div class="card-inner">
                                                        <h5 class="card-title">Sudah Melakukan Finalisasi</h5>
                                                        <p class="card-text"><span class="badge badge-success" style="font-size: 12pt;">Anda sudah melakukan finalisasi untuk kelas ini</span></p>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="card-inner">
                                                        <h5 class="card-title">Belum Melakukan Finalisasi</h5>
                                                        <p class="card-text"><span class="badge badge-danger" style="font-size: 12pt;">Anda belum melakukan finalisasi untuk kelas ini</span></p>
                                                        <a href="<?= base_url('guru/kelas_finalisasi/') ?>" onclick="return confirm('Setelah finalisasi dilakukan, data raport dan siswa tidak dapat diubah lagi! Lakukan Finalisasi?')" class="btn btn-success">Finalisasi Kelas</a>
                                                    </div>
                                                <?php } ?>
                                            </div>
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