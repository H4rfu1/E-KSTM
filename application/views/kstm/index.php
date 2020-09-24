<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?=  $title; ?></h1>

<div class="row">
  <div class="col-lg-10 table-responsive">
    <?php if(validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
    <?php endif; ?>
    <?= form_error('laporan', '<div class="alert alert-danger" role="alert">','</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <a href="#" class="btn btn-success mb-3"  data-toggle="modal" data-target="#newSubmenu">Add New Laporan</a>

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
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 1;
         foreach($laporan_kstm as $r) :
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
          <td>
            <a href="<?= base_url('kstm/edit/'); echo $r['id_laporan_kstm']; ?>" class="badge badge-primary">Edit</a>
            <a href="<?= base_url('kstm/delete_laporan_kstm/'); echo $r['id_laporan_kstm']; ?>" class="badge badge-danger" onclick="return confirm('yakin'); ">Delete</a>
          </td>
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

 <!-- modal -->


<!-- Modal -->

<div class="modal fade" id="newSubmenu" tabindex="-1" role="dialog" aria-labelledby="newSubmenuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubmenuLabel">Add New Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?= base_url('kstm') ?>" method="post">
      <div class="modal-body">
        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Deskripsi Laporan</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" name="deskripsi_laporan"></textarea>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="jenis_ternak" name="jenis_ternak" placeholder="Jenis Ternak">
        </div>
        <div class="form-group">
          <input type="number" class="form-control" id="jumlah_ternak_sebelumnya" name="jumlah_ternak_sebelumnya" placeholder="Jumlah ternak sebelumnya">
        </div>
        <div class="form-group">
          <input type="number" class="form-control" id="jumlah_ternak_sekarang" name="jumlah_ternak_sekarang" placeholder="Jumlah ternak sekarang">
        </div>
        <div class="form-group">
          <input type="number" class="form-control" id="jumlah_ternak_meninggal" name="jumlah_ternak_meninggal" placeholder="Jumlah ternak meninggal">
        </div>
        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Keterangan ternak meninggal</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" name="keterangan_ternak_meninggal"></textarea>
        </div>
        <div class="form-group">
          <input type="number" class="form-control" id="jumlah_ternak_sehat" name="jumlah_ternak_sehat" placeholder="Jumlah ternak sehat">
        </div>
        <div class="form-group">
          <input type="number" class="form-control" id="jumlah_ternak_sakit" name="jumlah_ternak_sakit" placeholder="Jumlah ternak sakit">
        </div>
        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Keterangan kesehatan ternak</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" name="keterangan_kesehatan_ternak"></textarea>
        </div>
        <div class="form-group">
          <input type="number" class="form-control" id="jumlah_ternak_dikonsumsi" name="jumlah_ternak_dikonsumsi" placeholder="Jumlah ternak dikonsumsi">
        </div>
        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Keterangan konsumsi ternak</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" name="keterangan_konsumsi"></textarea>
        </div>
        <div class="form-group">
          <input type="number" class="form-control" id="jumlah_ternak_dijual" name="jumlah_ternak_dijual" placeholder="Jumlah ternak dijual">
        </div>
        <div class="form-group">
          <input type="number" class="form-control" id="harga_ternak_perekor" name="harga_ternak_perekor" placeholder="Harga ternak perekor">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
