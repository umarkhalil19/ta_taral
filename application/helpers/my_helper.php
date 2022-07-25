<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_login($error_for, $error_message, $link_redirect)
{
  $ci = &get_instance();
  if ($error_for && $error_message && $link_redirect) {
    if ($ci->session->has_userdata('admin_id')) {
      return true;
    } else {
      $ci->session->set_flashdata($error_for, $error_message);
      redirect($link_redirect);
    }
  } else {
    if ($ci->session->has_userdata('admin_id')) {
      return true;
    } else {
      redirect('home');
    }
  }
}

function is_admin($error_for, $error_message, $link_redirect)
{
  $ci = &get_instance();
  if ($error_for && $error_message && $link_redirect) {
    if ($ci->session->has_userdata('admin_id') and $ci->session->userdata('role') == 1) {
      return true;
    } else {
      $ci->session->set_flashdata($error_for, $error_message);
      redirect($link_redirect);
    }
  } else {
    if ($ci->session->has_userdata('admin_id') and $ci->session->userdata('role') == 1) {
      return true;
    } else {
      redirect('home');
    }
  }
}

//fungsi acak string
function _randString($length)
{
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789^";
  $str = '';
  $size = strlen($chars);
  for ($i = 0; $i < $length; $i++) {
    $str .= $chars[rand(3, $size - 5)];
  }
  return $str;
}

function _notif($message)
{
  if ($message) {
    $notif = $_GET['notif'];
    $notif_cut = substr($notif, 0, 5);
    if ($notif_cut == 'suces') { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $message; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
      </div><br>
    <?php } elseif ($notif_cut == 'error') { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $message; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
      </div><br>
<?php }
  }
}

function _createSlug($string)
{
  $a = trim($string);
  $slug = preg_replace('/[^A-Za-z0-9.-]+/', '-', $a);
  //$kalimat = strtolower(url_title($slug));
  $kalimat = strtolower($slug);
  //return strtolower(url_title($string));
  return ($kalimat);
}

function vic_slug_akun($string)
{
  return preg_replace('/[^a-zA-Z0-9.\-]/', '_', $string);
}

/*tanggal dan waktu indonesia
contoh : 
echo tglWaktuIndo(date('d-m-Y H:i:s',time()));
*/
function _tglWaktuIndo($tanggal)
{
  $bulan = array(
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
  );
  $tgl_bln_thn = explode('-', $tanggal);
  $jam_min_dtk = explode(':', $tanggal);

  return substr($tgl_bln_thn[2], 0, 4) . ' ' . $bulan[(int)$tgl_bln_thn[1]] . ' ' . $tgl_bln_thn[0]  . ' / ' . substr($jam_min_dtk[0], 11, 13) . ':' .  $jam_min_dtk[1] . ':' .  $jam_min_dtk[2];
}

function _tglIndo($tanggal)
{
  if (!empty($tanggal)) {
    $bulan = array(
      1 => 'Januari',
      2 => 'Februari',
      3 => 'Maret',
      4 => 'April',
      5 => 'Mei',
      6 => 'Juni',
      7 => 'Juli',
      8 => 'Agustus',
      9 => 'September',
      10 => 'Oktober',
      11 => 'November',
      12 => 'Desember'
    );
    $tgl_bln_thn = explode('-', $tanggal);

    return  substr($tgl_bln_thn[2], 0, 4) . ' ' . $bulan[(int)$tgl_bln_thn[1]] . ' ' . $tgl_bln_thn[0];
  }
}

function _tgl($tanggal)
{
  if (!empty($tanggal)) {
    $tgl_bln_thn = explode('-', $tanggal);

    return  substr($tgl_bln_thn[2], 0, 4) . '-' . $tgl_bln_thn[1] . '-' . $tgl_bln_thn[0];
  }
}

//echo hariIndo(date('D'));
function _hariIndo($date)
{
  $tanggal = $date;
  $day = date('D', strtotime($tanggal));
  $dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
  );
  //echo "Tanggal {$tanggal} adalah hari : " . $dayList[$day];
  $result = $dayList[$day];
  return ($result);
}

function _rupiah($nilai)
{
  return 'Rp. ' . number_format($nilai, 0, ",", ".");
}

function _cekAccess($role_id, $menu_id)
{
  $ci = &get_instance();
  $where = array('accessRole_roleId' => $role_id, 'accessRole_menu' => $menu_id);
  $accessrole = $ci->general_m->get_where('accessrole', $where);
  if ($accessrole->num_rows() > 0) {
    return 'checked';
  } else {
    return '';
  }
}

function _cekAccessSubMenu($role_id, $menu_id, $submenu_id)
{
  $ci = &get_instance();
  $where = array('accessRole_roleId' => $role_id, 'accessRole_menu' => $menu_id, 'accessRole_subMenu' => $submenu_id);
  $accessrole = $ci->general_m->get_where('accessrole', $where);
  if ($accessrole->num_rows() > 0) {
    return 'checked';
  } else {
    return '';
  }
}

function _getCompany($field)
{
  $ci = &get_instance();
  $result = $ci->db->get('company')->row_array();
  return $result[$field];
}

function autoCodeBarang($field_code, $tabel, $where)
{
  $ci = &get_instance();
  $ci->db->order_by($field_code, 'DESC');
  if (!empty($where)) {
    $res = $ci->db->get_where($tabel, $where);
  } else {
    $res = $ci->db->get($tabel);
  }
  $data = $res->row_array();
  if ($data) {
    $value = $data[$field_code];
    $result = substr($value, 6, 10);
    $result = (int)$result;
    $result = $result + 1;
    $coderesult = STR_PAD($result, 6, "0", STR_PAD_LEFT);
  } else {
    $coderesult = "000001";
  }
  return $coderesult;
}

?>