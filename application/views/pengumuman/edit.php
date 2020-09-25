<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Pengumuman</h1>

<div class="row">
  <div class="col-lg-8">
    <?= form_open_multipart('pengumuman/edit/'.$pemberitahuan['id_pemberitahuan']); ?>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Kirim ke</label>
      <div class="col-sm-10">
        <select class="browser-default custom-select" name="role_id" id='role_id'>
          <option value="">Select Role</option>
          <?php foreach($role as $m) : ?>
            <option value="<?= $m['id'] ?>" <?= $pemberitahuan['id_role']==$m['id'] ? 'selected' : '' ; ?>><?= $m['role']  ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label" >Pemberitahuan</label>
      <div class="col-sm-10">
        <textarea class="form-control" aria-label="With textarea" name="isi"><?= $pemberitahuan['isi_pemberitahuan']  ?></textarea>
      </div>
    </div>



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
