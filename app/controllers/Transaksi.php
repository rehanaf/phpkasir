<?php

class Transaksi extends Controller {
    public function index() {
        $data['title'] = 'Transaksi';
        if(isset($_POST['search'])) {
            $data['produk'] = $this->model('Produk_model')->like('kode', $_POST['q']);
        } else {
            $data['produk'] = $this->model('Produk_model')->readAll();
        }
        $data['transaksi_temp'] = $this->model('transaksi_temp_model')->readAll();
        $this->view('templates/header', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }

    public function addcart() {
        if(isset($_POST['submit']) && isset($_POST['nama'])) {
            $this->model('Transaksi_temp_model')->create();
        }
        redirect(url('transaksi'));     
    }
    public function editcart($id) {
        if(isset($_POST['submit']) && isset($_POST['jumlah'])) {
            $this->model('Transaksi_temp_model')->update($id);
        }
        redirect(url('transaksi'));  
    }
    public function create() {
        date_default_timezone_set('Asia/Jakarta');
        $_POST['id_transaksi'] = date('hisdmY');
        $id_transaksi = $_POST['id_transaksi'];
        if(isset($_POST['submit'])) {
            $this->model('Transaksi_model')->create();
            $data['transaksi_temp'] = $this->model('Transaksi_temp_model')->readAll();
            foreach($data['transaksi_temp'] as $item) {
                $_POST['nama_produk'] = $item->nama_produk;
                $_POST['harga_jual'] = $item->harga_jual;
                $_POST['jumlah'] = $item->jumlah;
                $this->model('detail_transaksi_model')->create();
            }
            $this->model('Transaksi_temp_model')->delete_key('nama',$_POST['nama']);
        }
        redirect(url("transaksi/detail/$id_transaksi")); 
    }
    public function detail($id_transaksi) {
        $data["transaksi"] = $this->model('Transaksi_model')->where('id_transaksi', $id_transaksi);
        $data["detail_transaksi"] = $this->model('detail_transaksi_model')->where('id_transaksi', $id_transaksi);

        $data['title'] = 'Detail Transaksi';
        $this->view('templates/header', $data);
        $this->view('transaksi/detail', $data);
        $this->view('templates/footer');      
    }
}