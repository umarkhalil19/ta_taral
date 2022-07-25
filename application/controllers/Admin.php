<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $status = $this->session->userdata('status');
        $level = $this->session->userdata('level');
        if ($status != 'aktif') {
            $this->session->set_flashdata('error', 'Akun anda tidak aktif!!');
            redirect('login?notif=error');
        } elseif ($level != 'admin') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses!!');
            redirect('login?notif=error');
        }
    }

    public function index()
    {
        $this->mylib->aview('index');
    }

    //tahun_pelajaran
    public function tahun_pelajaran()
    {
        $data['tahun'] = $this->db->get('tahun_ajaran');
        $this->mylib->aview('tahun_pelajaran', $data);
    }

    public function tahun_pelajaran_add()
    {
        $this->mylib->aview('tahun_pelajaran_add');
    }

    public function tahun_pelajaran_act()
    {
        $this->form_validation->set_rules('nama', 'Nama Tahun Pelajaran', 'required|trim');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim');
        $this->form_validation->set_rules('status', 'Status Tahun Pelajaran', 'required|trim');
        if ($this->form_validation->run() != true) {
            $this->tahun_pelajaran_add();
        } else {
            $data = [
                'tahun_ajaran' => $this->input->post('nama'),
                'semester' => $this->input->post('semester'),
                'status' => $this->input->post('status')
            ];
            $this->db->insert('tahun_ajaran', $data);
            $this->session->set_flashdata('suces', 'Data berhasil ditambah');
            redirect('admin/tahun_pelajaran?notif=suces');
        }
    }

    public function tahun_pelajaran_edit($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/tahun_pelajaran?notif=error');
        } else {
            $data['tahun'] = $this->db->get_where('tahun_ajaran', ['id' => $id])->row();
            if ($data['tahun']) {
                $this->mylib->aview('tahun_pelajaran_edit', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/tahun_pelajaran?notif=error');
            }
        }
        // $this->mylib->aview('tahun_pelajaran_edit');
    }

    public function tahun_pelajaran_update()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama', 'Nama Tahun Pelajaran', 'required|trim');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim');
        $this->form_validation->set_rules('status', 'Status Tahun Pelajaran', 'required|trim');
        if ($this->form_validation->run() != true) {
            $this->tahun_pelajaran_edit($id);
        } else {
            $data = [
                'tahun_ajaran' => $this->input->post('nama'),
                'semester' => $this->input->post('semester'),
                'status' => $this->input->post('status')
            ];
            $this->db->update('tahun_ajaran', $data, ['id' => $id]);
            $this->session->set_flashdata('suces', 'Data berhasil diubah');
            redirect('admin/tahun_pelajaran?notif=suces');
        }
    }

    public function tahun_pelajaran_delete($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/tahun_pelajaran?notif=error');
        } else {
            if ($this->db->delete('tahun_ajaran', ['id' => $id])) {
                $this->session->set_flashdata('suces', 'Data berhasil dihapus');
                redirect('admin/tahun_pelajaran?notif=suces');
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/tahun_pelajaran?notif=error');
            }
        }
    }

    //guru
    public function guru()
    {
        $data['guru'] = $this->db->get('guru');
        $this->mylib->aview('guru', $data);
    }

    public function guru_add()
    {
        $this->mylib->aview('guru_add');
    }

    public function guru_act()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('pend_akhir', 'Pendidikan Terakhir', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->guru_add();
        } else {
            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'gelar_depan' => $this->input->post('gelar_depan'),
                'gelar_belakang' => $this->input->post('gelar_belakang'),
                'pendidikan_terakhir' => $this->input->post('pend_akhir'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat')
            ];

            $user = [
                'username' => $this->input->post('nip'),
                'password' => password_hash($this->input->post('nip'), PASSWORD_DEFAULT),
                'level' => 'guru',
                'status' => 'aktif'
            ];

            $this->db->insert('users', $user);
            $this->db->insert('guru', $data);
            $this->session->set_flashdata('suces', 'Data berhasil disimpan');
            redirect('admin/guru?notif=suces');
        }
        // redirect('admin/guru');
    }

    public function guru_edit($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/guru?notif=error');
        } else {
            $data['guru'] = $this->db->get_where('guru', ['nip' => $id])->row();
            if ($data['guru']) {
                $this->mylib->aview('guru_edit', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/guru?notif=error');
            }
        }
    }

    public function guru_update()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('pend_akhir', 'Pendidikan Terakhir', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->guru_edit($id);
        } else {
            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'gelar_depan' => $this->input->post('gelar_depan'),
                'gelar_belakang' => $this->input->post('gelar_belakang'),
                'pendidikan_terakhir' => $this->input->post('pend_akhir'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->db->update('guru', $data, ['nip' => $id]);
            $this->session->set_flashdata('suces', 'Data berhasil diubah');
            redirect('admin/guru?notif=suces');
        }
        // redirect('admin/guru');
    }

    public function guru_delete($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/guru?notif=error');
        } else {
            if ($this->db->delete('guru', ['nip' => $id])) {
                $this->session->set_flashdata('suces', 'Data berhasil dihapus');
                redirect('admin/guru?notif=suces');
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/guru?notif=error');
            }
        }
    }

    //siswa
    public function siswa()
    {
        $data['siswa'] = $this->db->get('siswa');
        $this->mylib->aview('siswa', $data);
    }

    public function siswa_add()
    {
        $this->mylib->aview('siswa_add');
    }

    public function siswa_act()
    {
        $this->form_validation->set_rules('nis', 'Nomor Induk Siswa', 'trim|required');
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
            $this->siswa_add();
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'nisn' => $this->input->post('nisn'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'agama' => $this->input->post('agama'),
                'status_keluarga' => $this->input->post('status_keluarga'),
                'urutan_anak' => $this->input->post('urutan_anak'),
                'alamat' => $this->input->post('alamat'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'kelas_masuk' => $this->input->post('kelas_masuk'),
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

            $user = [
                'username' => $this->input->post('nis'),
                'password' => password_hash($this->input->post('nis'), PASSWORD_DEFAULT),
                'level' => 'siswa',
                'status' => 'aktif'
            ];

            $this->db->insert('users', $user);
            $this->db->insert('siswa', $data);
            $this->session->set_flashdata('suces', 'Data berhasil ditambah');
            redirect('admin/siswa?notif=suces');
        }
        // redirect('admin/siswa');
    }

    public function siswa_edit($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/siswa?notif=error');
        } else {
            $data['siswa'] = $this->db->get_where('siswa', ['nis' => $id])->row();
            if ($data['siswa']) {
                $this->mylib->aview('siswa_edit', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/siswa?notif=error');
            }
        }
        // $this->mylib->aview('siswa_edit');
    }

    public function siswa_update()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nis', 'Nomor Induk Siswa', 'trim|required');
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
            $this->siswa_edit($id);
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'nisn' => $this->input->post('nisn'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'agama' => $this->input->post('agama'),
                'status_keluarga' => $this->input->post('status_keluarga'),
                'urutan_anak' => $this->input->post('urutan_anak'),
                'alamat' => $this->input->post('alamat'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'kelas_masuk' => $this->input->post('kelas_masuk'),
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
            redirect('admin/siswa?notif=suces');
        }
    }

    public function siswa_delete($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/siswa?notif=error');
        } else {
            if ($this->db->delete('siswa', ['nis' => $id])) {
                $this->session->set_flashdata('suces', 'Data berhasil dihapus');
                redirect('admin/siswa?notif=suces');
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/siswa?notif=error');
            }
        }
    }

    //kelas
    public function kelas()
    {
        $data['kelas'] = $this->db->select('kelas.*, guru.nama as wali_kelas, tahun_ajaran.tahun_ajaran as tahun_ajaran, tahun_ajaran.semester')->from('kelas')->join('guru', 'guru.nip=kelas.nip_guru', 'left')->join('tahun_ajaran', 'tahun_ajaran.id=kelas.tahun_ajaran_id', 'left')->get();
        $this->mylib->aview('kelas', $data);
    }

    public function kelas_add()
    {
        $data['tahun'] = $this->db->get_where('tahun_ajaran', ['status' => 'Aktif']);
        $data['guru'] = $this->db->get('guru');
        $this->mylib->aview('kelas_add', $data);
    }

    public function kelas_act()
    {
        $this->form_validation->set_rules('nama', 'Nama Kelas', 'trim|required');
        $this->form_validation->set_rules('tahun_ajar', 'Tahun Ajaran', 'trim|required');
        $this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->kelas_add();
        } else {
            $data = [
                'nip_guru' => $this->input->post('wali_kelas'),
                'tahun_ajaran_id' => $this->input->post('tahun_ajar'),
                'nama' => $this->input->post('nama')
            ];
            $this->db->insert('kelas', $data);
            $this->session->set_flashdata('suces', 'Data berhasil ditambah');
            redirect('admin/kelas?notif=suces');
        }
        // redirect('admin/kelas');
    }

    public function kelas_edit($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/kelas?notif=error');
        } else {
            $data['kelas'] = $this->db->get_where('kelas', ['id' => $id])->row();
            if ($data['kelas']) {
                $data['tahun'] = $this->db->get_where('tahun_ajaran', ['status' => 'Aktif']);
                $data['guru'] = $this->db->get('guru');
                $this->mylib->aview('kelas_edit', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/kelas?notif=error');
            }
        }
    }

    public function kelas_update()
    {
        $id =  $this->input->post('id');
        $this->form_validation->set_rules('nama', 'Nama Kelas', 'trim|required');
        $this->form_validation->set_rules('tahun_ajar', 'Tahun Ajaran', 'trim|required');
        $this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->kelas_edit($id);
        } else {
            $data = [
                'nip_guru' => $this->input->post('wali_kelas'),
                'tahun_ajaran_id' => $this->input->post('tahun_ajar'),
                'nama' => $this->input->post('nama')
            ];
            $this->db->update('kelas', $data, ['id' => $id]);
            $this->session->set_flashdata('suces', 'Data berhasil diubah');
            redirect('admin/kelas?notif=suces');
        }
    }

    public function kelas_delete($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/kelas?notif=error');
        } else {
            if ($this->db->delete('kelas', ['id' => $id])) {
                $this->session->set_flashdata('suces', 'Data berhasil dihapus');
                redirect('admin/kelas?notif=suces');
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/kelas?notif=error');
            }
        }
    }

    public function kelas_siswa($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/kelas?notif=error');
        } else {
            $data['kelas'] = $this->db->get_where('kelas', ['id' => $id])->row();
            if ($data['kelas']) {
                // $data['siswa'] = $this->db->get_where('siswa_kelas', ['kelas_id' => $id]);
                $data['siswa'] = $this->db->select('siswa.nisn, siswa.nama, siswa_kelas.kelas_id, siswa_kelas.nis')->from('siswa_kelas')->join('siswa', 'siswa.nis=siswa_kelas.nis', 'left')->where(['kelas_id' => $id])->get();
                $data['all'] = $this->db->get('siswa');
                $this->mylib->aview('kelas_siswa', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/kelas?notif=error');
            }
        }
    }

    public function kelas_siswa_act()
    {
        $kelas = $this->input->post('kelas');
        $this->form_validation->set_rules('nis', 'NIS', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->kelas_siswa($kelas);
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'tahun_ajaran_id' => $this->input->post('tahun'),
                'kelas_id' => $this->input->post('kelas'),
            ];
            $this->db->insert('siswa_kelas', $data);
            $this->session->set_flashdata('suces', 'Data berhasil ditambah');
            redirect("admin/kelas_siswa/$kelas?notif=suces");
        }
    }

    public function kelas_siswa_delete($id = '', $kelas = '')
    {
        if ($id == '' || $kelas == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect("admin/kelas_siswa/$kelas?notif=error");
        } else {
            if ($this->db->delete('siswa_kelas', ['nis' => $id, 'kelas_id' => $kelas])) {
                $this->session->set_flashdata('suces', 'Data berhasil dihapus');
                redirect("admin/kelas_siswa/$kelas?notif=suces");
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect("admin/kelas_siswa/$kelas?notif=error");
            }
        }
    }

    //mata_pelajaran
    public function mapel()
    {
        $data['mapel'] = $this->db->select('mapel.*, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester, kelas.nama as kelas')->from('mapel')->join('tahun_ajaran', 'tahun_ajaran.id=mapel.tahun_ajaran_id', 'left')->join('kelas', 'kelas.id=mapel.kelas_id', 'left')->get();
        $this->mylib->aview('mapel', $data);
    }

    public function mapel_add()
    {
        $data['tahun'] = $this->db->get_where('tahun_ajaran', ['status' => 'Aktif']);
        $tahun = $data['tahun']->row();
        $data['kelas'] = $this->db->get_where('kelas', ['tahun_ajaran_id' => $tahun->id]);
        // echo "<pre>";
        // print_r($data['kelas']->result());
        // echo "</pre>";
        // die;
        $this->mylib->aview('mapel_add', $data);
    }

    public function mapel_act()
    {
        $this->form_validation->set_rules('nama', 'Nama Mapel', 'trim|required');
        $this->form_validation->set_rules('kkm', 'Kriteria Ketuntasan Minimum', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun Ajaran', 'trim|required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->mapel_add();
        } else {
            $data = [
                'kelas_id' => $this->input->post('kelas'),
                'tahun_ajaran_id' => $this->input->post('tahun'),
                'nama' => $this->input->post('nama'),
                'kkm' => $this->input->post('kkm')
            ];
            $this->db->insert('mapel', $data);
            $this->session->set_flashdata('suces', 'Data berhasil ditambah');
            redirect('admin/mapel?notif=suces');
        }
        // redirect('admin/mapel');
    }

    public function mapel_edit($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/mapel?notif=error');
        } else {
            $data['mapel'] = $this->db->get_where('mapel', ['id' => $id])->row();
            if ($data['mapel']) {
                $data['tahun'] = $this->db->get_where('tahun_ajaran', ['status' => 'Aktif']);
                $tahun = $data['tahun']->row();
                $data['kelas'] = $this->db->get_where('kelas', ['tahun_ajaran_id' => $tahun->id]);
                $this->mylib->aview('mapel_edit', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/mapel?notif=error');
            }
        }
    }

    public function mapel_update()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama', 'Nama Mapel', 'trim|required');
        $this->form_validation->set_rules('kkm', 'Kriteria Ketuntasan Minimum', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun Ajaran', 'trim|required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->mapel_add();
        } else {
            $data = [
                'kelas_id' => $this->input->post('kelas'),
                'tahun_ajaran_id' => $this->input->post('tahun'),
                'nama' => $this->input->post('nama'),
                'kkm' => $this->input->post('kkm')
            ];
            $this->db->update('mapel', $data, ['id' => $id]);
            $this->session->set_flashdata('suces', 'Data berhasil diubah');
            redirect('admin/mapel?notif=suces');
        }
    }

    public function mapel_delete($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/mapel?notif=error');
        } else {
            if ($this->db->delete('mapel', ['id' => $id])) {
                $this->session->set_flashdata('suces', 'Data berhasil dihapus');
                redirect('admin/mapel?notif=suces');
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/mapel?notif=error');
            }
        }
    }

    //users
    public function user()
    {
        $data['user'] = $this->db->get('users');
        $this->mylib->aview('user', $data);
    }

    public function user_add()
    {
        $this->mylib->aview('user_add');
    }

    public function user_act()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_message('is_unique', 'The %s is already exists');
        if ($this->form_validation->run() != true) {
            $this->user_add();
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('username'), PASSWORD_DEFAULT),
                'level' => $this->input->post('level'),
                'status' => 'aktif'
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('suces', 'Data berhasil ditambahkan');
            redirect('admin/user?notif=suces');
        }
    }

    public function user_status($id = '', $status = '')
    {
        if ($id == "" || $status == "") {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/user?notif=error');
        } else {
            $cek = $this->db->get_where('users', ['username' => $id])->num_rows();
            if ($cek) {
                if ($status == 'aktif') {
                    $data = [
                        'status' => 'aktif'
                    ];
                } elseif ($status == 'nonaktif') {
                    $data = [
                        'status' => 'nonaktif'
                    ];
                } else {
                    $this->session->set_flashdata('error', 'Status tidak sesuai format');
                    redirect('admin/user?notif=error');
                }
                $this->db->update('users', $data, ['username' => $id]);
                $this->session->set_flashdata('suces', 'Data berhasil ditambahkan');
                redirect('admin/user?notif=suces');
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/user?notif=error');
            }
        }
    }

    public function user_delete($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/user?notif=error');
        } else {
            if ($this->db->delete('users', ['username' => $id])) {
                $this->session->set_flashdata('suces', 'Data berhasil dihapus');
                redirect('admin/user?notif=suces');
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/user?notif=error');
            }
        }
    }

    public function user_reset($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('admin/user?notif=error');
        } else {
            $password = password_hash($id, PASSWORD_DEFAULT);
            if ($this->db->update('users', ['password' => $password], ['username' => $id])) {
                $this->session->set_flashdata('suces', 'Password berhasil diubah');
                redirect('admin/user?notif=suces');
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('admin/user?notif=error');
            }
        }
    }
}
