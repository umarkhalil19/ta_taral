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
}
