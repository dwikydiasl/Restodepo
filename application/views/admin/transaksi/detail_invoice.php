<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


    </head>
    <body>
        <div class="row bg-info" style="padding:2px; margin-bottom:20px;">
            <div class="col col-md-6">
                <strong>PENJUAL</strong><br>
                Kopi Mania<br>
                Jl mawar no 1<br>
                Solo
            </div>
            <div class="col col-md-6">
                <strong>PEMBELI</strong><br>
                Eko Purnomo<br>
                RT 06 RW 02 Karangmojo. Tasikmadu<br>
                Karanganyar
            </div>
        </div>

        <div>
            <table class="table">
                <thead>
                  <tr style="background-color: #ddd;">
                    <th>Item</th>
                    <th style="text-align: right;">Jumlah</th>
                    <th style="text-align: right;">Harga</th>
                    <th style="text-align: right;">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($list_detail as $item)
                    {
                  ?>
                  <tr>
                    <td><?php echo $item['nama_item'];?></td>
                    <td style="text-align: right;"><?php echo $item['qty'];?></td>
                    <td style="text-align: right;"><?php echo number_format($item['harga_satuan'],0,',','.');?></td>
                    <td style="text-align: right;"><?php echo number_format($item['subtotal'],0,',','.');?></td>
                  </tr>
                    <?php } ?>

                  <tr>
                    <td>&nbsp;</td>
                    <td style="text-align: right;">&nbsp;</td>
                    <td style="text-align: right;">Ongkos Kirim</td>
                    <td style="text-align: right;"><?php echo number_format($detail['total_ongkir'],0,',','.');?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td style="text-align: right;">&nbsp;</td>
                    <td style="text-align: right;">Pajak</td>
                    <td style="text-align: right;"><?php echo number_format($detail['total_pajak'],0,',','.');?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td style="text-align: right;">&nbsp;</td>
                    <td style="text-align: right;">Admin Fee</td>
                    <td style="text-align: right;"><?php echo number_format($detail['admin_fee'],0,',','.');?></td>
                  </tr>

                  <tr style="background-color: #ddd;">
                    <td>&nbsp;</td>
                    <td style="text-align: right;">&nbsp;</td>
                    <td style="text-align: right;"><strong>Total</strong></td>
                    <td style="text-align: right;"><?php echo number_format($detail['total_tagihan'],0,',','.');?></td>
                  </tr>
                  

                </tbody>
              </table>
        </div>

        <div class="row" style="padding:2px; margin-bottom:10px;">
            <div class="col col-md-12 bg-info">
            <?php
            if($detail['status'] > 0)
            {
            ?>
            Tanggal Bayar Pembeli: <?php echo $this->dasarlib->ubahTanggalPendek2($detail['tgl_bayar_pembeli']);?> <br>
            Dibayar ke Rekening: <?php echo $nama_bank_kami['nama'];?><br>
            Atas Nama: <?php echo $debank_kami['atas_nama'];?><br>

            <?php } ?>
            </div>
        </div>

        <div class="row" style="padding:2px; margin-bottom:10px;">
            <div class="col col-md-6">
            <?php
            if($detail['status'] > 0)
            {
            ?>
            
            Bank Pembeli: <?php echo $bank_pembeli['nama'];?> <br>
            Nomor Rekening Pembeli: <?php echo $detail['bank_norek_pembeli'];?><br>
            Atas Nama Rekening: <?php echo $detail['bank_atas_nama_pembeli'];?><br>

            <?php } ?>
            </div>

            <div class="col col-md-6" style="text-align: right;">
            <?php
            if($detail['status'] > 1)
            {
            ?>
            Tanggal Cek Pembayaran: <?php echo $this->dasarlib->ubahTanggalPanjang3($detail['tgl_cek_pembayaran']);?> <br>
            <?php } ?>

            <?php
            if($detail['status'] == 3)
            {
            ?>
            Tanggal Transfer ke Penjual: <?php echo $this->dasarlib->ubahTanggalPendek2($detail['tgl_transfer_penjual']);?> <br>
            <?php } ?>
            </div>

        </div>
    </body>
</html>