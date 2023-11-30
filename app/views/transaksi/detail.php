<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td><?=$data['transaksi'][0]->id_transaksi?></td>
        <td colspan="2"></td>
        <td><?=$data['transaksi'][0]->nama?></td>
    </tr>
    <tr>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td>Nama produk</td>
        <td>harga</td>
        <td>Qty</td>
        <td>Total</td>
    </tr>
    <?php foreach($data['detail_transaksi'] as $item):?>
    <tr>
        <td><?=$item->nama_produk?></td>
        <td><?=$item->harga_jual?></td>
        <td><?=$item->jumlah?></td>
        <td><?=$item->harga_jual*$item->jumlah?></td>
    </tr>
    <?php endforeach;?>
    <tr>
        <td colspan="3">Total harga</td>
        <td colspan="1"><?=$data['transaksi'][0]->total_harga?></td>
    </tr>
    <tr>
        <td colspan="3">Bayar</td>
        <td colspan="1"><?=$data['transaksi'][0]->bayar?></td>
    </tr>
    <tr>
        <td colspan="3">Kembali</td>
        <td colspan="1"><?=$data['transaksi'][0]->kembali?></td>
    </tr>
</table>