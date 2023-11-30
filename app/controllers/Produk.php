<?php 

class Produk extends Controller {
    public function index() {
        $data['title'] = 'produk';
        $data['produk'] = $this->model('Produk_model')->readAll();
        $this->view('templates/header',$data);
        $this->view('produk/index',$data);
        $this->view('templates/footer');
    }

    public function create() {
        if(isset($_POST['submit']) && isset($_POST['nama_produk'])) {
            if($this->model('Produk_model')->create()) {
                redirect(url('produk'));
            }
        }
        $this->view('templates/header');
        $this->view('produk/create');
        $this->view('templates/footer');
    }
}