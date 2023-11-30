<h1>Produk</h1>
<div>
    <a href="<?=url()?>">Home</a>
</div>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td>#</td>
        <td>Kode</td>
        <td>Nama Produk</td>
        <td>Harga Jual</td>
        <td>Harga Beli</td>
        <td>Stok</td>
    </tr>
<?php foreach($data['produk'] as $item): ?>
    <tr>
        <td><?= $item->id ?></td>
        <td><?= $item->kode ?></td>
        <td><?= $item->nama_produk ?></td>
        <td><?= $item->harga_jual ?></td>
        <td><?= $item->harga_beli ?></td>
        <td><?= $item->stok ?></td>
    </tr>
<?php endforeach; ?>
</table>
