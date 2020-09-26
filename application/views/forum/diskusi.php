<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <?php if(validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
      </div>
      <?php endif; ?>
      <?= form_error('diskusi', '<div class="alert alert-danger" role="alert">','</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
    </div>
    <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 style="color: black;" class="mt-4"><?= $forum['topik_bahasan'] ?></h1>

        <!-- Author -->
        <p class="lead" style="color: black;">
          by
          <a><?= $forum['name'] ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on <?= date('d F Y, h:i:s A', $forum['tanggal_dibuat']); ?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="<?= base_url('assets/img/forum/') . $forum['foto']; ?>" alt="">

        <hr>

        <!-- Post Content -->
        <p><?= $forum['keterangan_bahasan'] ?></p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="<?= base_url('forum/diskusi/');echo $forum['id_forum']; ?>" method="post">
              <div class="form-group">
                <textarea class="form-control" rows="3" name="isi_tanggapan"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <?php
          $i = 1;
         foreach($komen as $k) :
        ?>
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="<?= base_url('assets/img/profile/') . $k['image']; ?>" alt="foto" width="50" height="50">
          <div class="media-body">
            <h5 style="color: black;" class="mt-0"><?= $k['name'] ?></h5>
            <p><?= $k['isi_tanggapan'] ?></p>
          </div>
        </div>
        <?php $i++; endforeach; ?>


        <!-- Comment with nested comments -->
        <!-- <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div> -->

      </div>

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
          </div> -->
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

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
