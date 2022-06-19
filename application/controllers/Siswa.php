<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->mylib->sview('index');
    }

    public function biodata()
    {
        $this->mylib->sview('biodata');
    }

    public function biodata_update()
    {
        redirect('siswa/biodata');
    }

    public function rapor()
    {
        $this->mylib->sview('rapor');
    }

    public function rapor_detail($id = '')
    {
        $this->mylib->sview('rapor_detail');
    }
}
