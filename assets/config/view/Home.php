<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller 
{
    public function index() // Nama fungsi ditambahkan di sini
    {
        $data = array(
            'judul' => 'WebGIS',
            'content' => 'peta_leaflet'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }
    
    public function peta_halaman()
    {
        $data = array(
            // data yang ingin Anda kirim ke view 'halaman_peta'
        );
        $this->load->view('web/halaman_peta', $data, FALSE);
    }
    public function mineralblb_halaman()
    {
        $data = array(
            'judul' => 'Halaman Mineral',
            'content' => 'web/mineralblb_halaman'
        );
        $this->load->view('template', $data);
    }

    public function mineralblb_suwawa_halaman()
    {
        $data = array(
            'judul' => 'Suwawa halaman',
            'content' => 'mineralblb/mineralblb_suwawa_halaman'
        );
        $this->load->view('template', $data);
    }

    public function mineralblb_tilongkabila_halaman()
    {
        $data = array(
            'judul' => 'Tilongkabila halaman',
            'content' => 'mineralblb/mineralblb_tilongkabila_halaman'
        );
        $this->load->view('template', $data);
    }

    public function BPHTB_halaman()
    {
        $data = array(
            'judul' => 'Halaman BPHTB',
            'content' => 'web/BPHTB_halaman'
        );
        $this->load->view('template', $data);
    }

    public function BPHTB_suwawa_halaman()
    {
        $data = array(
            'judul' => 'Suwawa halaman',
            'content' => 'BPHTB/BPHTB_suwawa_halaman'
        );
        $this->load->view('template', $data);
    }

    public function BPHTB_tilongkabila_halaman()
    {
        $data = array(
            'judul' => 'Tilongkabila halaman',
            'content' => 'BPHTB/BPHTB_tilongkabila_halaman'
        );
        $this->load->view('template', $data);
    }

    public function reklame_halaman()
    {
        $data = array(
            'judul' => 'Halaman Reklame',
            'content' => 'web/reklame_halaman'
        );
        $this->load->view('template', $data);
    }

    public function reklame_suwawa_halaman()
    {
        $data = array(
            'judul' => 'Suwawa halaman',
            'content' => 'reklame/reklame_suwawa_halaman'
        );
        $this->load->view('template', $data);
    }

    public function reklame_tilongkabila_halaman()
    {
        $data = array(
            'judul' => 'Tilongkabila halaman',
            'content' => 'reklame/reklame_tilongkabila_halaman'
        );
        $this->load->view('template', $data);
    }

    public function restoran_halaman()
    {
        $data = array(
            'judul' => 'Halaman Restoran',
            'content' => 'web/restoran_halaman'
        );
        $this->load->view('template', $data);
    }

    public function restoran_suwawa_halaman()
    {
        $data = array(
            'judul' => 'Suwawa halaman',
            'content' => 'restoran/restoran_suwawa_halaman'
        );
        $this->load->view('template', $data);
    }

    public function restoran_tilongkabila_halaman()
    {
        $data = array(
            'judul' => 'Tilongkabila halaman',
            'content' => 'restoran/restoran_tilongkabila_halaman'
        );
        $this->load->view('template', $data);
  
    }

}
?>
 