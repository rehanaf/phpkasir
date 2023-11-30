<h1>Transaksi</h1>
<div>
    <form action="<?=url('transaksi')?>" method="post">
        <input type="search" name="q">
        <button type="search" name="search">Search</button>
    </form>
</div>
<div>
    <a href="<?=url()?>">Home</a>
</div>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td>#</td>
        <td>Kode</td>
        <td>Nama Produk</td>
        <td>Harga</td>
        <td>Stok</td>
        <td>#</td>
    </tr>
<?php foreach($data['produk'] as $item): ?>
    <form action="<?=url('transaksi/addcart')?>" method="post">
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->kode ?></td>
            <td><input type="text" name="nama_produk" value="<?= $item->nama_produk ?>"></td>
            <td><input type="number" name="harga_jual" value="<?= $item->harga_jual ?>"></td>
            <td><?= $item->stok ?></td>
            <input type="hidden" name="nama" value="kasir1">
            <input type="hidden" name="jumlah" value="1">
            <td><button type="submit" name="submit">ADD</button></td>
        </tr>
    </form>
<?php endforeach; ?>
</table>

<h2>Detail Transaksi</h2>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td>#</td>
        <td>Nama Produk</td>
        <td>Harga</td>
        <td>Jumlah</td>
        <td>#</td>
        <td>#</td>
    </tr>
<?php $total_harga = 0;?>
<?php foreach($data['transaksi_temp'] as $item): ?>
    <form action="<?=url('transaksi/editcart/'.$item->id)?>" method="post">
    <tr>
        <td><?= $item->id ?></td>
        <input type="hidden" name="nama" value="<?= $item->nama ?>">
        <td><input type="text" name="nama_produk" value="<?= $item->nama_produk ?>"></td>
        <td><input type="number" name="harga_jual" value="<?= $item->harga_jual ?>"></td>
        <td><input type="number" name="jumlah" value="<?= $item->jumlah ?>"></td>
        <?php $total_harga += $item->harga_jual*$item->jumlah; ?>
        <td><?= $item->harga_jual*$item->jumlah ?></td>
        <td><button type="submit" name="submit">OK</button></td>
    </tr>
    </form>
<?php endforeach; ?>
    <form action="<?=url('transaksi/create')?>" method="post">
    <tr>
        <td></td>
        <td>Total</td>
        <td colspan="4"><?= $total_harga ?></td>
        <input type="hidden" name="total_harga" value="<?= $total_harga ?>">
        <input type="hidden" name="nama" value="kasir1">
    </tr>
    <tr>
        <td></td>
        <td><input type="number" name="bayar" placeholder="bayar"></td>
        <td><input type="number" name="kembali" placeholder="kembali"></td>
        <td colspan="2"></td>
        <td><button type="submit" name="submit">OK</button></td>
    </tr>
    </form>
</table>