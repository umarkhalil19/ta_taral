<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->mylib->aview('index');
    }

    //tahun_pelajaran
    public function tahun_pelajaran()
    {
        $this->mylib->aview('tahun_pelajaran');
    }

    public function tahun_pelajaran_add()
    {
        $this->mylib->aview('tahun_pelajaran_add');
    }

    public function tahun_pelajaran_act()
    {
        redirect('admin/tahun_pelajaran');
    }

    public function tahun_pelajaran_edit($id = '')
    {
        $this->mylib->aview('tahun_pelajaran_edit');
    }

    public function tahun_pelajaran_update()
    {
        redirect('admin/tahun_pelajaran');
    }

    //guru
    public function guru()
    {
        $this->mylib->aview('guru');
    }

    public function guru_add()
    {
        $this->mylib->aview('guru_add');
    }

    public function guru_act()
    {
        redirect('admin/guru');
    }

    public function guru_edit($id = '')
    {
        $this->mylib->aview('guru_edit');
    }

    public function guru_update()
    {
        redirect('admin/guru');
    }

    //siswa
    public function siswa()
    {
        $this->mylib->aview('siswa');
    }

    public function siswa_add()
    {
        $this->mylib->aview('siswa_add');
    }

    public function siswa_act()
    {
        redirect('admin/siswa');
    }

    public function siswa_edit($id = '')
    {
        $this->mylib->aview('siswa_edit');
    }

    public function siswa_update()
    {
        redirect('admin/siswa');
    }

    //kelas
    public function kelas()
    {
        $this->mylib->aview('kelas');
    }

    public function kelas_add()
    {
        $this->mylib->aview('kelas_add');
    }

    public function kelas_act()
    {
        redirect('admin/kelas');
    }

    public function kelas_edit($id = '')
    {
        $this->mylib->aview('kelas_edit');
    }

    public function kelas_update()
    {
        redirect('admin/kelas');
    }

    //mata_pelajaran
    public function mapel()
    {
        $this->mylib->aview('mapel');
    }

    public function mapel_add()
    {
        $this->mylib->aview('mapel_add');
    }

    public function mapel_act()
    {
        redirect('admin/mapel');
    }

    public function mapel_edit($id = '')
    {
        $this->mylib->aview('mapel_edit');
    }

    public function mapel_update()
    {
        redirect('admin/mapel');
    }
}
