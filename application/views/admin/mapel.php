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
                                        <a href="<?= base_url('admin/mapel_add') ?>" class="btn btn-md btn-primary" title="Tambah Data Mapel"><em class="icon ni ni-plus"></em></a>
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
                                            <tr>
                                                <td>1</td>
                                                <td>Pendidikan Pancasila dan Kewarganegaraan</td>
                                                <td>75s</td>
                                                <td>XI IPA 6</td>
                                                <td>2022/2023</td>
                                                <td>
                                                    <a href="<?= base_url('admin/mapel_edit') ?>" class="btn btn-sm btn-warning" title="Edit Data Mapel"><em class="icon ni ni-edit"></em></a>
                                                    <a href="" class="btn btn-sm btn-danger" title="Hapus Data Mapel"><em class="icon ni ni-trash-fill"></em></a>
                                                </td>
                                            </tr>
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