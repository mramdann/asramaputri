<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Karyawan Asrama Putri</title>
</head>

<body>
    <center>
        <font size="5"><b>Karyawan Asrama Putri <br> PT Elegant Textile Industry Purwakarta</b></font><br>
        <font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi Textile dan Kain</font><br>
        <font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Purwakarta Jawa Barat</i></font>
        <br><br>
        <table border="1">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Karyawan</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Shift</th>
                    <th>No Telpon</th>
                    <th>No Kamar</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../koneksi.php";
                $no = 1;
                $query = $koneksi->query("select * from tbl_trans a join tbl_karyawan b on a.id_karyawan=b.id_karyawan join tbl_asrama c on a.id_asrama=c.id_asrama order by c.no_kamar");
                while ($data = $query->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['nik'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['jenis_kelamin'] ?></td>
                        <td><?= $data['jabatan'] ?></td>
                        <td><?= $data['shift'] ?></td>
                        <td><?= $data['tlp'] ?></td>
                        <td><?= $data['no_kamar'] ?></td>
                        <td><?= $data['alamat'] ?></td>
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