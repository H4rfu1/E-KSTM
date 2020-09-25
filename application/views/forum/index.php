<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">

      <?php if(validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
      </div>
      <?php endif; ?>
      <?= form_error('akun', '<div class="alert alert-danger" role="alert">','</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="#" class="btn btn-success mb-3"  data-toggle="modal" data-target="#newSubmenu">Add New Diskusi</a>
    </div>

    <div class="col-md-8">

        <h1 class="my-4">Forum
          <small>diskusi E-KSTM</small>
        </h1>
        <?php
          $count = count($forum);
          $perPage = 5;
          $numberOfPages = ceil($count / $perPage);
          $offset = $page * $perPage;
          $sliceForum = array_slice($forum, $offset, $perPage);
          $i = 1;
         foreach($sliceForum as $f) :
        ?>
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="<?= base_url('assets/img/forum/') . $f['foto']; ?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?= $f['topik_bahasan'] ?></h2>
            <p class="card-text"><?= substr($f['keterangan_bahasan'], 0, 25) ?>...</p>
            <a href="<?= base_url('forum/diskusi/');echo $f['id_forum']; ?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?= date('d F Y, h:i:s A', $f['tanggal_dibuat']); ?> by
            <p ><?= $f['name'] ?></p>
          </div>
        </div>
        <?php $i++; endforeach; ?>

        <!-- Pagination -->
        <?php
            if ($i > 3) {
              $disable = $page != 0 ? 'disabled' : '';
              $page++;
              echo '
              <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                  <a class="page-link" href="' . base_url('forum/index/') .  $page . '">&larr; Older</a>
                </li>
                <li class="page-item '.$disable.'">
                  <a class="page-link" href="#">Newer &rarr;</a>
                </li>
              </ul>
              ';
            }
         ?>


      </div>
      <!-- end col 8 -->

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <!-- <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div> -->

        <!-- Side Widget -->
        <!-- <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div> -->
      </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<div class="modal fade" id="newSubmenu" tabindex="-1" role="dialog" aria-labelledby="newSubmenuLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubmenuLabel">Add New Diskusi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?= base_url('forum') ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="topik_bahasan" name="topik_bahasan" placeholder="Judul">
        </div>
        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Isi pembahasan</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" name="keterangan_bahasan"></textarea>
        </div>
        <div class="form-group custom-file">
          <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
          <label class="custom-file-label" for="foto">Choose image</label>
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
