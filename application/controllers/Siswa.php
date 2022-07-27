<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $status = $this->session->userdata('status');
        $level = $this->session->userdata('level');
        if ($status != 'aktif') {
            $this->session->set_flashdata('error', 'Akun anda tidak aktif!!');
            redirect('login?notif=error');
        } elseif ($level != 'siswa') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses!!');
            redirect('login?notif=error');
        }
    }

    public function index()
    {
        $this->mylib->sview('index');
    }

    public function biodata()
    {
        $nis = $this->session->userdata('id');
        $data['siswa'] = $this->db->get_where('siswa', ['nis' => $nis])->row();
        $this->mylib->sview('biodata', $data);
    }

    public function biodata_update()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required');
        $this->form_validation->set_rules('ayah', 'Ayah', 'trim|required');
        $this->form_validation->set_rules('ayah_no_hp', 'No HP Ayah', 'trim|required');
        $this->form_validation->set_rules('ibu', 'Ibu', 'trim|required');
        $this->form_validation->set_rules('ibu_no_hp', 'No HP Ibu', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->biodata();
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'agama' => $this->input->post('agama'),
                'status_keluarga' => $this->input->post('status_keluarga'),
                'urutan_anak' => $this->input->post('urutan_anak'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_hp'),
                'ayah' => $this->input->post('ayah'),
                'ibu' => $this->input->post('ibu'),
                'wali' => $this->input->post('wali'),
                'alamat_ayah' => $this->input->post('alamat_ayah'),
                'alamat_ibu' => $this->input->post('alamat_ibu'),
                'alamat_wali' => $this->input->post('alamat_wali'),
                'no_hp_ayah' => $this->input->post('ayah_no_hp'),
                'no_hp_ibu' => $this->input->post('ibu_no_hp'),
                'no_hp_wali' => $this->input->post('wali_no_hp'),
                'pekerjaan_ayah' => $this->input->post('ayah_kerja'),
                'pekerjaan_ibu' => $this->input->post('ibu_kerja'),
                'pekerjaan_wali' => $this->input->post('wali_kerja'),
            ];
            $this->db->update('siswa', $data, ['nis' => $id]);
            $this->session->set_flashdata('suces', 'Data berhasil diubah');
            redirect("siswa/biodata?notif=suces");
        }
        // redirect('siswa/biodata');
    }

    public function rapor()
    {
        $nis = $this->session->userdata('id');
        $data['rapor'] = $this->db->select('siswa_kelas.nis, siswa_kelas.kelas_id, kelas.nama as kelas, kelas.finalisasi as final, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester')->from('siswa_kelas')->join('kelas', 'kelas.id=siswa_kelas.kelas_id', 'left')->join('tahun_ajaran', 'tahun_ajaran.id=siswa_kelas.tahun_ajaran_id', 'left')->where(['siswa_kelas.nis' => $nis])->get();
        $this->mylib->sview('rapor', $data);
    }

    public function rapor_detail($id = '')
    {
        $nis = $this->session->userdata('id');
        if ($id == "") {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('siswa/rapor?notif=error');
        } else {
            $data['kelas'] = $this->db->get_where('siswa_kelas', ['kelas_id' => $id, 'nis' => $nis])->row();
            if ($data['kelas']) {
                $data['nilai_pengetahuan'] = $this->db->get_where('siswa_nilai', ['nis' => $nis, 'kelas_id' => $id, 'type' => 'np']);
                $data['nilai_keterampilan'] = $this->db->get_where('siswa_nilai', ['nis' => $nis, 'kelas_id' => $id, 'type' => 'nk']);
                $data['total_np'] = $this->db->select('SUM(nilai) as total')->from('siswa_nilai')->where(['nis' => $nis, 'kelas_id' => $id, 'type' => 'np'])->get()->row();
                $data['total_nk'] = $this->db->select('SUM(nilai) as total')->from('siswa_nilai')->where(['nis' => $nis, 'kelas_id' => $id, 'type' => 'nk'])->get()->row();
                $data['mapel'] = $this->db->get_where('mapel', ['kelas_id' => $id]);
                $data['jumlah_mapel'] = $data['mapel']->num_rows();
                $data['ekskul'] = $this->db->get_where('siswa_ekskul', ['nis' => $nis]);
                $data['prestasi'] = $this->db->get_where('siswa_prestasi', ['nis' => $nis]);
                $this->mylib->sview('rapor_detail', $data);
            }
        }
    }
}
