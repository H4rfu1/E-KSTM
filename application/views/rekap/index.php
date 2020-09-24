<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?=  $title; ?></h1>

<div class="row">
  <div class="col-lg-12 table-responsive">
    <?php if(validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
    <?php endif; ?>
    <?= form_error('akun', '<div class="alert alert-danger" role="alert">','</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <a href="#" class="btn btn-success mb-3"  data-toggle="modal" data-target="#newSubmenu">Add New Akun</a>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tanggal Laporan</th>
          <th scope="col">Deskripsi Laporan</th>
          <th scope="col">Jenis Ternal</th>
          <th scope="col">Jumlah Ternak Sebelumnya</th>
          <th scope="col">Jumlah Ternak Sekarang</th>
          <th scope="col">Jumlah Ternak Meninggal</th>
          <th scope="col">Keterangan Ternak Meninggal</th>
          <th scope="col">Jumlah Ternak Sehat</th>
          <th scope="col">Jumlah Ternak Sakit</th>
          <th scope="col">Keterangan Kesehatan Ternak</th>
          <th scope="col">Jumlah Ternak Dikonsumsi</th>
          <th scope="col">Keterangan Konsumsi</th>
          <th scope="col">Jumlah Ternak Diual</th>
          <th scope="col">Harga Ternak Perekor</th>
          <?php if ($tipe == "pengontrol") {
            echo "
            <td> Foto </td>
            <td> Video </td>
            ";
          } ?>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 1;
         foreach($akun as $r) :
        ?>
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= date('d F Y', $r['tanggal_laporan']); ?></td>
          <td><?= $r['deskripsi_laporan'] ?></td>
          <td><?= $r['jenis_ternak'] ?></td>
          <td><?= $r['jumlah_ternak_sebelumnya'] ?></td>
          <td><?= $r['jumlah_ternak_sekarang'] ?></td>
          <td><?= $r['jumlah_ternak_meninggal'] ?></td>
          <td><?= $r['keterangan_ternak_meninggal'] ?></td>
          <td><?= $r['jumlah_ternak_sehat'] ?></td>
          <td><?= $r['jumlah_ternak_sakit'] ?></td>
          <td><?= $r['keterangan_kesehatan_ternak'] ?></td>
          <td><?= $r['jumlah_ternak_dikonsumsi'] ?></td>
          <td><?= $r['keterangan_konsumsi'] ?></td>
          <td><?= $r['jumlah_ternak_dijual'] ?></td>
          <td><?= $r['harga_ternak_perekor'] ?></td>
          <?php if ($tipe == "pengontrol") {
            $a = $r['foto'];
            $b = $r['video'];
            echo "
            <td> $a </td>
            <td> $b </td>
            ";
          } ?>
        </tr>
      <?php $i++; endforeach; ?>
      </tbody>
      </table>
  </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
