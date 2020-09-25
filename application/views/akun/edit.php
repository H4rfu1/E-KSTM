<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">
  <div class="col-lg-8">
      <form class="" action="<?= base_url('akun/edit') ?>" method="post">
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label" >Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
          <?= form_error('name','<small class="text-danger pl-3">', '</small>'); ?>

        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
          <select class="browser-default custom-select" name="role_id" id='role_id'>
            <option value="">Select Role</option>
            <?php foreach($role as $m) : ?>
              <option value="<?= $m['id'] ?>" <?= $user['role_id'] == $m['id'] ? "selected" : '';  ?>><?= $m['role']  ?></option>
            <?php endforeach; ?>
          </select>
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
