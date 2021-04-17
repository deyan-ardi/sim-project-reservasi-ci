<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-center">Kode Transaksi <?= $data_pesanan[0]->kode_pesanan; ?></h3>
    <h5 class="text-center">SUCCESS</h5>
    <p class="text-justify mt-3">Pay Date : <?= date('d F Y H:i', strtotime($data_pesanan[0]->pay_date)); ?>
        WITA</p>
    <table class="col-lg-12 mt-5">
        <tr>
            <td>
                <div class="row col-lg-12">
                    <div class="col-lg-6">
                        <ul style="list-style: none;">
                            <li>
                                <h6 class="text-center">Company</h6>
                            </li>
                            <li>
                                <h6>Nama User</h6>
                            </li>
                            <li>
                                <p>Jln. Srikandi, No 11 <br>081915656865<br>riyan.clsg11@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
            <td>
                <div class="row col-lg-12">
                    <div class="col-lg-6">
                        <ul style="list-style: none;">
                            <li>
                                <h6 class="text-center">Member</h6>
                            </li>
                            <li>
                                <h6><?= $data_pesanan[0]->username; ?></h6>
                            </li>
                            <li>
                                <p><?= $data_pesanan[0]->alamat; ?><br><?= $data_pesanan[0]->no_tlp; ?><br><?= $data_pesanan[0]->email; ?>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Room</th>
                <th scope="col">Service</th>
                <th scope="col">Room Fee</th>
                <th scope="col">Service Fee</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($rincian_pesanan as $d) : ?>
            <?php if ($d->id_pesanan == $data_pesanan[0]->id_pesanan) : ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $d->nama_kamar; ?></td>
                <?php if ($d->layanan_kamar == 0) : ?>
                <td>No Service</td>
                <?php else : ?>
                <td>With Room Service</td>
                <?php endif; ?>
                <td>Rp. <?= $d->harga_kamar; ?></td>
                <?php if ($d->layanan_kamar == 0) : ?>
                <td>Rp. 0</td>
                <?php else : ?>
                <td>Rp. <?= BIAYA_LAYANAN; ?></td>
                <?php endif; ?>
                <td>Rp. <?= $d->sub_total; ?></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table class="table mt-5 col-lg-4">
        <tbody>
            <tr>
                <td>PPN</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Sudah Terbayar</td>
                <td>Rp. <?= $data_pesanan[0]->total_bayar; ?></td>
            </tr>
        </tbody>
    </table>

    <p class="text-right">Singaraja, <?= date('d F Y', strtotime($data_pesanan[0]->pay_date)); ?></p>
    <br>
    <p class="text-right">-</p>
    <br>
    <p class="text-right">Sistem Reservasi</p>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>