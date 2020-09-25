<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">
  <div class="col-lg-8">
      <form class="" action="<?= base_url('pengontrol/edit/'); echo $laporan['id_laporan_pengontrol']  ?>" method="post">
        <div class="form-group row">
          <label for="deskripsi_laporan" class="col-sm-2 col-form-label">Deskripsi Laporan</label>
          <div class="col-sm-10">
            <textarea class="form-control" aria-label="With textarea" name="deskripsi_laporan"><?= $laporan['deskripsi_laporan'] ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="jenis_ternak" class="col-sm-2 col-form-label">Jenis ternak</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="jenis_ternak" name="jenis_ternak" value="<?= $laporan['jenis_ternak'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="jumlah_ternak_sebelumnya" class="col-sm-2 col-form-label">Jumlah ternak sebelumnya</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="jumlah_ternak_sebelumnya" name="jumlah_ternak_sebelumnya" value="<?= $laporan['jumlah_ternak_sebelumnya'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="jumlah_ternak_sekarang" class="col-sm-2 col-form-label">Jumlah ternak sekarang</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="jumlah_ternak_sekarang" name="jumlah_ternak_sekarang" value="<?= $laporan['jumlah_ternak_sekarang'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="jumlah_ternak_meninggal" class="col-sm-2 col-form-label">"Jumlah ternak meninggal</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="jumlah_ternak_meninggal" name="jumlah_ternak_meninggal" value="<?= $laporan['jumlah_ternak_meninggal'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="keterangan_ternak_meninggal" class="col-sm-2 col-form-label">"Keterangan ternak meninggal</label>
          <div class="col-sm-10">
            <textarea class="form-control" aria-label="With textarea" name="keterangan_ternak_meninggal"><?= $laporan['keterangan_ternak_meninggal'] ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="jumlah_ternak_sehat" class="col-sm-2 col-form-label">Jumlah ternak sehat</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="jumlah_ternak_sehat" name="jumlah_ternak_sehat" value="<?= $laporan['jumlah_ternak_sehat'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="jumlah_ternak_sakit" class="col-sm-2 col-form-label">Jumlah ternak sakit</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="jumlah_ternak_sakit" name="jumlah_ternak_sakit" value="<?= $laporan['jumlah_ternak_sakit'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="keterangan_kesehatan_ternak" class="col-sm-2 col-form-label">Keterangan kesehatan ternak</label>
          <div class="col-sm-10">
            <textarea class="form-control" aria-label="With textarea" name="keterangan_kesehatan_ternak" ><?= $laporan['keterangan_kesehatan_ternak'] ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="jumlah_ternak_dikonsumsi" class="col-sm-2 col-form-label">Jumlah ternak dikonsumsi</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="jumlah_ternak_dikonsumsi" name="jumlah_ternak_dikonsumsi" value="<?= $laporan['jumlah_ternak_dikonsumsi'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="keterangan_konsumsi" class="col-sm-2 col-form-label">Keterangan konsumsi ternak</label>
          <div class="col-sm-10">
            <textarea class="form-control" aria-label="With textarea" name="keterangan_konsumsi" ><?= $laporan['keterangan_konsumsi'] ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="jumlah_ternak_dijual" class="col-sm-2 col-form-label">Jumlah ternak dijualJumlah ternak dijual</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="jumlah_ternak_dijual" name="jumlah_ternak_dijual" value="<?= $laporan['jumlah_ternak_dijual'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="harga_ternak_perekor" class="col-sm-2 col-form-label">Harga ternak perekor</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="harga_ternak_perekor" name="harga_ternak_perekor" value="<?= $laporan['harga_ternak_perekor'] ?>">
          </div>
        </div>
        <div class="form-group custom-file">
          <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
          <label class="custom-file-label" for="image">Choose image</label>
        </div>
        <div class="form-group custom-file">
          <input type="file" class="custom-file-input" id="image" name="video" accept="video/*">
          <label class="custom-file-label" for="image">Choose video</label>
        </div>
        <br>
        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" name="button" class="float-sm-right btn btn-primary">Edit</button>
          </div>
        </div>
      </form>
  </div>

</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
