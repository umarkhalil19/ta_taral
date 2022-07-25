<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $status = $this->session->userdata('status');
        $level = $this->session->userdata('level');
        if ($status != 'aktif') {
            $this->session->set_flashdata('error', 'Akun anda tidak aktif!!');
            redirect('login?notif=error');
        } elseif ($level != 'guru') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses!!');
            redirect('login?notif=error');
        }
    }

    public function index()
    {
        $this->mylib->gview('index');
    }

    public function kelas()
    {
        // $data['kelas'] = $this->db->get_where('kelas', ['nip_grur' => $this->session->userdata['username']]);
        $data['kelas'] = $this->db->select('kelas.*, tahun_ajaran.*')->from('kelas')->join('tahun_ajaran', 'tahun_ajaran.id=kelas.tahun_ajaran_id', 'left')->get();
        $this->mylib->gview('kelas', $data);
    }

    public function kelas_detail($id = '')
    {
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas?notif=error');
        } else {
            $data['kelas'] = $this->db->get_where('kelas', ['id' => $id])->row();
            if ($data['kelas']) {
                // $data['tahun'] = $data['kelas']->tahun_ajaran_id;
                $tahun = [
                    'tahun' => $data['kelas']->tahun_ajaran_id,
                    'kelas' => $data['kelas']->id,
                    'final' => $data['kelas']->finalisasi
                ];
                $this->session->set_userdata($tahun);
                // echo "<pre>";
                // print_r($this->session->userdata());
                // echo "</pre>";
                // die;
                $this->mylib->gview('kelas_detail', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas?notif=error');
            }
        }
        // $this->mylib->gview('kelas_detail');
    }

    public function kelas_finalisasi()
    {
        $kelas = $this->session->userdata('kelas');
        $mapel = $this->db->select('id')->from('mapel')->where(['kelas_id' => $kelas])->get();
        $siswa = $this->db->select('nis')->from('siswa_kelas')->where(['kelas_id' => $kelas])->get();
        foreach ($siswa->result() as $s) {
            $jumlah_np = $this->db->select('SUM(nilai) as np')->from('siswa_nilai')->where(['nis' => $s->nis, 'kelas_id' => $kelas, 'type' => 'np'])->get()->row();
            $jumlah_nk = $this->db->select('SUM(nilai) as nk')->from('siswa_nilai')->where(['nis' => $s->nis, 'kelas_id' => $kelas, 'type' => 'nk'])->get()->row();
            $rata_rata_np = $jumlah_np->np / $mapel->num_rows();
            $rata_rata_nk = $jumlah_nk->nk / $mapel->num_rows();
            $data = [
                'jumlah_np' => $jumlah_np->np,
                'jumlah_nk' => $jumlah_nk->nk,
                'rata_rata_np' => $rata_rata_np,
                'rata_rata_nk' => $rata_rata_nk
            ];
            $this->db->update('siswa_kelas', $data, ['kelas_id' => $kelas, 'nis', $s->nis]);
        }
        $this->db->update('kelas', ['finalisasi' => '1'], ['id' => $kelas]);
        $this->session->set_flashdata('suces', 'Finalisasi kelas berhasil dilakukan');
        redirect("guru/kelas_detail/$kelas?notif=suces");
    }

    public function kelas_siswa($id = '')
    {
        $id = $this->session->userdata('kelas');
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas?notif=error');
        } else {
            $data['siswa'] = $this->db->select('siswa_kelas.kelas_id, siswa.*')->from('siswa_kelas')->join('siswa', 'siswa.nis=siswa_kelas.nis', 'left')->where(['siswa_kelas.kelas_id' => $id])->get();
            if ($data['siswa']) {
                $data['kelas'] = $this->db->get_where('kelas', ['id' => $id])->row();
                // $data['guru'] = $this->db->get('guru');
                $this->mylib->gview('kelas_siswa', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas?notif=error');
            }
        }
        // $this->mylib->gview('kelas_siswa');
    }

    public function kelas_rapor($id = '')
    {
        $id = $this->session->userdata('kelas');
        $tahun = $this->session->userdata('tahun');
        if ($id == '' || $tahun == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas?notif=error');
        } else {
            // $data['mapel'] = $this->db->get_where('mapel', ['kelas_id' => $id, 'tahun_ajaran_id' => $tahun]);
            $data['mapel'] = $this->db->select('mapel.*, kelas.nama as kelas, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester')->from('mapel')->join('kelas', 'kelas.id=mapel.kelas_id', 'left')->join('tahun_ajaran', 'tahun_ajaran.id=mapel.tahun_ajaran_id', 'left')->where(['mapel.kelas_id' => $id, 'mapel.tahun_ajaran_id' => $tahun])->get();
            if ($data['mapel']->num_rows()) {
                $this->mylib->gview('kelas_rapor', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas?notif=error');
            }
        }
        // $this->mylib->gview('kelas_rapor');
    }

    public function mapel_nilai($id = '')
    {
        $kelas = $this->session->userdata('kelas');
        $tahun = $this->session->userdata('tahun');
        if ($id == '' || $kelas == '' || $tahun == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas?notif=error');
        } else {
            $data['mapel'] = $this->db->get_where('mapel', ['id' => $id]);
            $data['siswa'] = $this->db->select('siswa_kelas.nis,siswa.nama')->from('siswa_kelas')->join('siswa', 'siswa.nis=siswa_kelas.nis', 'left')->where(['siswa_kelas.tahun_ajaran_id' => $tahun, 'siswa_kelas.kelas_id' => $kelas])->get();
            $data['nilai_pengetahuan'] = $this->db->get_where('siswa_nilai', ['kelas_id' => $kelas, 'tahun_ajaran_id' => $tahun, 'mapel_id' => $id, 'type' => 'np']);
            $data['nilai_keterampilan'] = $this->db->get_where('siswa_nilai', ['kelas_id' => $kelas, 'tahun_ajaran_id' => $tahun, 'mapel_id' => $id, 'type' => 'nk']);
            $data['type'] = '';
            if ($this->session->userdata('final') != 0) {
                $data['type'] = 'readonly';
            }
            if ($data['mapel']->num_rows()) {
                $data['mapel'] = $data['mapel']->row();
                $this->mylib->gview('mapel_nilai', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas?notif=error');
            }
        }
        // $this->mylib->gview('mapel_nilai');
    }

    public function mapel_nilai_act()
    {
        $mapel = $this->input->post('mapel');
        $kelas = $this->session->userdata('kelas');
        $tahun = $this->session->userdata('tahun');
        $siswa = $this->db->select('nis')->from('siswa_kelas')->where(['kelas_id' => $kelas])->get();
        foreach ($siswa->result() as $s) {
            $np = $this->input->post("np_$s->nis");
            $np_ket = $this->input->post("np_ket_$s->nis");
            if ($np != 0 || $np_ket != '') {
                $np_id = $this->input->post("np_id_$s->nis");
                $data_np = [
                    'nis' => $s->nis,
                    'tahun_ajaran_id' => $tahun,
                    'kelas_id' => $kelas,
                    'mapel_id' => $mapel,
                    'type' => 'np',
                    'nilai' => $this->input->post("np_$s->nis"),
                    'keterangan' => $this->input->post("np_ket_$s->nis")
                ];
                if ($np_id != 0) {
                    $this->db->update('siswa_nilai', $data_np, ['id' => $np_id]);
                } else {
                    $this->db->insert('siswa_nilai', $data_np);
                }
            }
            $nk = $this->input->post("nk_$s->nis");
            $nk_ket = $this->input->post("nk_ket_$s->nis");
            if ($nk != 0 || $nk_ket != '') {
                $nk_id = $this->input->post("nk_id_$s->nis");
                $data_nk = [
                    'nis' => $s->nis,
                    'tahun_ajaran_id' => $tahun,
                    'kelas_id' => $kelas,
                    'mapel_id' => $mapel,
                    'type' => 'nk',
                    'nilai' => $this->input->post("nk_$s->nis"),
                    'keterangan' => $this->input->post("nk_ket_$s->nis")
                ];
                if ($nk_id != 0) {
                    $this->db->update('siswa_nilai', $data_nk, ['id' => $nk_id]);
                } else {
                    $this->db->insert('siswa_nilai', $data_nk);
                }
            }
        }
        redirect('guru/mapel_nilai/' . $mapel);
    }

    public function siswa_detail($id = '')
    {
        $kelas = $this->session->userdata('kelas');
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect("guru/kelas_siswa/$kelas?notif=error");
        } else {
            $data['siswa'] = $this->db->select('siswa_kelas.kelas_id, siswa.*')->from('siswa_kelas')->join('siswa', 'siswa.nis=siswa_kelas.nis', 'left')->where(['siswa_kelas.nis' => $id])->get()->row();
            if ($data['siswa']->kelas_id == $kelas) {
                $this->mylib->gview('siswa_detail', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect("guru/kelas_siswa/$kelas?notif=error");
            }
        }
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
            $this->siswa_detail($id);
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
            redirect("guru/kelas_siswa?notif=suces");
        }
    }

    public function siswa_prestasi($id = '')
    {
        $kelas = $this->session->userdata('kelas');
        $tahun = $this->session->userdata('tahun');
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas_siswa?notif=error');
        } else {
            $data['siswa'] = $this->db->get_where('siswa_kelas', ['nis' => $id, 'tahun_ajaran_id' => $tahun, 'kelas_id' => $kelas])->row();
            if ($data['siswa']) {
                $data['prestasi'] = $this->db->get_where('siswa_prestasi', ['nis' => $id, 'tahun_ajaran_id' => $tahun, 'kelas_id' => $kelas]);
                $this->mylib->gview('siswa_prestasi', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas_siswa?notif=error');
            }
        }
    }

    public function siswa_prestasi_add($id = '')
    {
        $kelas = $this->session->userdata('kelas');
        $tahun = $this->session->userdata('tahun');
        $final = $this->session->userdata('final');
        if ($final == 1) {
            $this->session->set_flashdata('error', 'Kelas sudah difinalisasi, tidak dapat menambah/merubah data!!');
            redirect("guru/siswa_prestasi/$id?notif=error");
        }
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas_siswa?notif=error');
        } else {
            $data['siswa'] = $this->db->select('siswa_kelas.*, siswa.nama')->from('siswa_kelas')->join('siswa', 'siswa.nis=siswa_kelas.nis', 'left')->where(['siswa_kelas.nis' => $id, 'tahun_ajaran_id' => $tahun, 'kelas_id' => $kelas])->get()->row();
            $data['tahun'] = $this->db->select('id,tahun_ajaran,semester')->from('tahun_ajaran')->where(['id' => $tahun])->get()->row();
            if ($data['siswa']) {
                $this->mylib->gview('siswa_prestasi_add', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas_siswa?notif=error');
            }
        }
        // $this->mylib->gview('siswa_prestasi_add');
    }

    public function siswa_prestasi_act()
    {
        $nis = $this->input->post('nis');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->siswa_prestasi_add($nis);
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'tahun_ajaran_id' => $this->input->post('tahun_id'),
                'kelas_id' => $this->input->post('kelas_id'),
                'nama' => $this->input->post('nama'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('siswa_prestasi', $data);
            $this->session->set_flashdata('suces', 'Data berhasil ditambah');
            redirect("guru/siswa_prestasi/$nis?notif=suces");
        }
        // redirect('guru/siswa_prestasi');
    }

    public function siswa_prestasi_del($id = '', $nis = '')
    {
        $final = $this->session->userdata('final');
        if ($final == 1) {
            $this->session->set_flashdata('error', 'Kelas sudah difinalisasi, tidak dapat menambah/merubah data!!');
            redirect("guru/siswa_prestasi/$nis?notif=error");
        }
        if ($id == "" || $nis == "") {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas_siswa?notif=error');
        } else {
            if ($this->db->delete('siswa_prestasi', ['id' => $id])) {
                $this->session->set_flashdata('suces', 'Data berhasil dihapus');
                redirect(base_url("guru/siswa_prestasi/$nis?notif=suces"));
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas_siswa?notif=error');
            }
        }
    }

    public function siswa_ekskul($id = '')
    {
        $kelas = $this->session->userdata('kelas');
        $tahun = $this->session->userdata('tahun');
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas_siswa?notif=error');
        } else {
            $data['siswa'] = $this->db->select('siswa_kelas.*, siswa.nama')->from('siswa_kelas')->join('siswa', 'siswa.nis=siswa_kelas.nis', 'left')->where(['siswa_kelas.nis' => $id, 'tahun_ajaran_id' => $tahun, 'kelas_id' => $kelas])->get()->row();
            if ($data['siswa']) {
                $data['ekskul'] = $this->db->get_where('siswa_ekskul', ['nis' => $id, 'tahun_ajaran_id' => $tahun, 'kelas_id' => $kelas]);
                $this->mylib->gview('siswa_ekskul', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas_siswa?notif=error');
            }
        }
    }

    public function siswa_ekskul_add($id = '')
    {
        $kelas = $this->session->userdata('kelas');
        $tahun = $this->session->userdata('tahun');
        $final = $this->session->userdata('final');
        if ($final == 1) {
            $this->session->set_flashdata('error', 'Kelas sudah difinalisasi, tidak dapat menambah/merubah data!!');
            redirect("guru/siswa_ekskul/$id?notif=error");
        }
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas_siswa?notif=error');
        } else {
            $data['siswa'] = $this->db->select('siswa_kelas.*, siswa.nama')->from('siswa_kelas')->join('siswa', 'siswa.nis=siswa_kelas.nis', 'left')->where(['siswa_kelas.nis' => $id, 'tahun_ajaran_id' => $tahun, 'kelas_id' => $kelas])->get()->row();
            $data['tahun'] = $this->db->select('id,tahun_ajaran,semester')->from('tahun_ajaran')->where(['id' => $tahun])->get()->row();
            if ($data['siswa']) {
                $this->mylib->gview('siswa_ekskul_add', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas_siswa?notif=error');
            }
        }
        // $this->mylib->gview('siswa_ekskul_add');
    }

    public function siswa_ekskul_act()
    {
        $nis = $this->input->post('nis');
        $this->form_validation->set_rules('nama', 'Nama Ekstrakurikuler', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->siswa_ekskul_add($nis);
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'tahun_ajaran_id' => $this->input->post('tahun_id'),
                'kelas_id' => $this->input->post('kelas_id'),
                'nama' => $this->input->post('nama'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('siswa_ekskul', $data);
            $this->session->set_flashdata('suces', 'Data berhasil ditambah');
            redirect("guru/siswa_ekskul/$nis?notif=suces");
        }
        // redirect('guru/siswa_ekskul');
    }

    public function siswa_ekskul_del($id = '', $nis = '')
    {
        $final = $this->session->userdata('final');
        if ($final == 1) {
            $this->session->set_flashdata('error', 'Kelas sudah difinalisasi, tidak dapat menambah/merubah data!!');
            redirect("guru/siswa_ekskul/$nis?notif=error");
        }
        if ($id == "" || $nis == "") {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas_siswa?notif=error');
        } else {
            if ($this->db->delete('siswa_ekskul', ['id' => $id])) {
                $this->session->set_flashdata('suces', 'Data berhasil dihapus');
                redirect(base_url("guru/siswa_ekskul/$nis?notif=suces"));
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas_siswa?notif=error');
            }
        }
    }

    public function siswa_ket($id = '')
    {
        $kelas = $this->session->userdata('kelas');
        $tahun = $this->session->userdata('tahun');
        if ($id == '') {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('guru/kelas_siswa?notif=error');
        } else {
            $data['siswa'] = $this->db->select('siswa_kelas.*, siswa.nama')->from('siswa_kelas')->join('siswa', 'siswa.nis=siswa_kelas.nis', 'left')->where(['siswa_kelas.nis' => $id, 'tahun_ajaran_id' => $tahun, 'kelas_id' => $kelas])->get()->row();
            $data['tahun'] = $this->db->select('id,tahun_ajaran,semester')->from('tahun_ajaran')->where(['id' => $tahun])->get()->row();
            // $data['siswa'] = $this->db->get_where('siswa_kelas', ['nis' => $id, 'tahun_ajaran_id' => $tahun, 'kelas_id' => $kelas])->row();
            if ($data['siswa']) {
                // $data['ekskul'] = $this->db->get_where('siswa_ekskul', ['nis' => $id, 'tahun_ajaran_id' => $tahun, 'kelas_id' => $kelas]);
                $this->mylib->gview('siswa_ket', $data);
            } else {
                $this->session->set_flashdata('error', 'Data tidak ditemukan');
                redirect('guru/kelas_siswa?notif=error');
            }
        }
        // $this->mylib->gview('siswa_ket');
    }

    public function siswa_ket_act()
    {
        $nis = $this->input->post('nis');
        $kelas = $this->session->userdata('kelas');
        $tahun = $this->session->userdata('tahun');
        $final = $this->session->userdata('final');
        if ($final == 1) {
            $this->session->set_flashdata('error', 'Kelas sudah difinalisasi, tidak dapat menambah/merubah data!!');
            redirect("guru/siswa_ket/$nis?notif=error");
        }
        $this->form_validation->set_rules('nis', 'NIS', 'trim|required');
        $this->form_validation->set_rules('tahun_id', 'Tahun Ajaran', 'trim|required');
        if ($this->form_validation->run() != true) {
            $this->siswa_ket($nis);
        } else {
            $data = [
                'catatan_wali_kelas' => $this->input->post('catatan_wali_kelas'),
                'deskripsi_sikap' => $this->input->post('deskripsi_sikap'),
                'sakit' => $this->input->post('sakit'),
                'izin' => $this->input->post('izin'),
                'absen' => $this->input->post('absen')
            ];
            $this->db->update('siswa_kelas', $data, ['nis' => $nis, 'tahun_ajaran_id' => $tahun, 'kelas_id' => $kelas]);
            $this->session->set_flashdata('suces', 'Data Berhasil diupdate');
            redirect("guru/siswa_ket/$nis?notif=suces");
        }
    }
}
