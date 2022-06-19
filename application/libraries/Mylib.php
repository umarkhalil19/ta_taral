<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mylib
{

	/*fungsi membuat menampilkan halaman tertentu*/
	function aview($view, $data = array())
	{
		$ci = &get_instance();
		if (!array_key_exists('title', $data)) {
			$data['title'] = 'Sistem E-Raport';
		}
		$ci->load->view('admin/template/header', $data);
		if ($data) {
			$ci->load->view('admin/' . $view, $data);
		} else {
			$ci->load->view($view);
		}
		$ci->load->view('admin/template/footer', $data);
	}

	function gview($view, $data = array())
	{
		$ci = &get_instance();
		if (!array_key_exists('title', $data)) {
			$data['title'] = 'Sistem E-Raport';
		}
		$ci->load->view('guru/template/header', $data);
		if ($data) {
			$ci->load->view('guru/' . $view, $data);
		} else {
			$ci->load->view($view);
		}
		$ci->load->view('guru/template/footer', $data);
	}

	function sview($view, $data = array())
	{
		$ci = &get_instance();
		if (!array_key_exists('title', $data)) {
			$data['title'] = 'Sistem E-Raport';
		}
		$ci->load->view('siswa/template/header', $data);
		if ($data) {
			$ci->load->view('siswa/' . $view, $data);
		} else {
			$ci->load->view($view);
		}
		$ci->load->view('siswa/template/footer', $data);
	}
}
