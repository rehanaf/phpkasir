<?php

class Transaksi_model extends Table {
    protected $table = "transaksi";
    protected $contents = ["id_transaksi","nama","total_harga","bayar","kembali"];
}