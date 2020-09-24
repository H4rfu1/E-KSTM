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
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Is Active</th>
          <th scope="col">Date Create</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 1;
         foreach($akun as $r) :
        ?>
        <tr>
          <th scope="row"><?= $i ?></th>
            <td><?= $r['name'] ?></td>
            <td><?= $r['email'] ?></td>
            <td><?= $r['role'] ?></td>
            <td><?= $r['is_active'] ?></td>
            <td><?= date('d F Y', $user['date_create']); ?></td>
          <td>
            <a href="<?= base_url('akun/edit/'); echo $r['id']; ?>" class="badge badge-primary">Edit</a>
            <a href="<?= base_url('akun/delete_akun/'); echo $r['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin'); ">Delete</a>
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
        <h5 class="modal-title" id="newSubmenuLabel">Add New Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?= base_url('akun') ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <select class="form-cotrol" name="role_id" id='role_id'>
            <option value="">Select Role</option>
            <?php foreach($role as $m) : ?>
              <option value="<?= $m['id'] ?>"><?= $m['role']  ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active" checked>
            <label class="form-check-label" for="is_active">Is active?</label>
          </div>
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
