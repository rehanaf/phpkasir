<form action="<?=url('produk/create');?>" method="post">
    <input type="text" name="kode" placeholder="kode">
    <input type="text" name="nama_produk" placeholder="nama_produk">
    <input type="number" name="harga_jual" placeholder="harga_jual">
    <input type="number" name="harga_beli" placeholder="harga_beli">
    <input type="number" name="stok" placeholder="stok">
    <button type="submit" name="submit">Tambah Data</button>
</form>