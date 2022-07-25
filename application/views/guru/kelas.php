<!-- content @s -->
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Kelas</h3>
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
                                        <?php
                                        foreach ($kelas->result() as $k) :
                                        ?>
                                            <div class="col-lg-4">
                                                <div class="card card-bordered">
                                                    <img src="<?= base_url() ?>assets/images/slides/slide-a.jpg" class="card-img-top" alt="">
                                                    <div class="card-inner">
                                                        <h5 class="card-title"><?= $k->nama ?></h5>
                                                        <p class="card-text"><?= "Tahun Ajaran $k->tahun_ajaran Semester $k->semester" ?></p>
                                                        <a href="<?= base_url('guru/kelas_detail/' . $k->id) ?>" class="btn btn-primary">Detail Kelas</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endforeach;
                                        ?>
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