<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->mylib->gview('index');
    }

    public function kelas()
    {
        $this->mylib->gview('kelas');
    }

    public function kelas_detail()
    {
        $this->mylib->gview('kelas_detail');
    }

    public function kelas_siswa($id = '')
    {
        $this->mylib->gview('kelas_siswa');
    }

    public function kelas_rapor($id = '')
    {
        $this->mylib->gview('kelas_rapor');
    }

    public function mapel_nilai($id = '')
    {
        $this->mylib->gview('mapel_nilai');
    }

    public function siswa_prestasi($id = '')
    {
        $this->mylib->gview('siswa_prestasi');
    }

    public function siswa_prestasi_add($id = '')
    {
        $this->mylib->gview('siswa_prestasi_add');
    }

    public function siswa_prestasi_act()
    {
        redirect('guru/siswa_prestasi');
    }

    public function siswa_ekskul($id = '')
    {
        $this->mylib->gview('siswa_ekskul');
    }

    public function siswa_ekskul_add($id = '')
    {
        $this->mylib->gview('siswa_ekskul_add');
    }

    public function siswa_ekskul_act()
    {
        redirect('guru/siswa_ekskul');
    }

    public function siswa_ket($id = '')
    {
        $this->mylib->gview('siswa_ket');
    }

    public function siswa_ket_act()
    {
        redirect('guru/kelas_siswa');
    }
}
