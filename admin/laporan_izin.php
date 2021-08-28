<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Izin Keluar Asrama Putri</title>
</head>

<body>
    <center>
        <font size="5"><b>Izin Keluar Asrama Putri <br> PT Elegant Textile Industry Purwakarta</b></font><br>
        <font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi Textile dan Kain</font><br>
        <font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Purwakarta Jawa Barat</i></font>
        <br><br>
        <table border="1">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Shift</th>
                    <th>Tujuan</th>
                    <th>Catatan</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status Izin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../koneksi.php";
                $no = 1;
                $query = $koneksi->query("select * from tbl_izin a join tbl_karyawan b on a.id_karyawan=b.id_karyawan order by a.id_ijin desc");
                while ($data = $query->fetch_assoc()) {

                ?>
                    <tr>
                        <td> <?= $no ?> </td>
                        <td> <?= $data['nama'] ?> </td>
                        <td> <?= $data['shift'] ?> </td>
                        <td> <?= $data['tujuan'] ?> </td>
                        <td> <?= $data['catatan'] ?> </td>
                        <td> <?= $data['waktu_masuk'] ?> </td>
                        <td> <?= $data['waktu_keluar'] ?> </td>
                        <td> <?= $data['status_izin'] ?> </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </center>
    <script>
        window.print();
    </script>
</body>

</html>