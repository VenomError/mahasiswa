<div class="row">
  <div class="col-12 col-md-8 col-lg-8">
    <div class="section-body">
      <h2 class="section-title">Data ruangan</h2>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">

                  <thead>
                    <tr>
                      <th>Nama ruangan</th>
                      <th>Banyak Jadwal </th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php

                    foreach ($data['ruangan'] as $j) {
                    ?>
                      <tr>
                        <td><?= $j['nama_ruangan'] ?></td>
                        <td>
                          <?php
                          $count = new Model();
                          $count->table('jadwal');
                          $jml =  $count->select('jadwal*.')->where(['ruangan' => ($j['id_ruangan'])])->count();
                          echo $jml;
                          ?>
                        </td>
                        <td class="btn-group " role="group" aria-label="Group">
                          <a href="<?= BASE_PATH ?>ruangan/detail/<?= $j['id_ruangan'] ?>" class="btn btn-icon btn-primary btn-sm text-light" data-toggle="tooltip" title="Detail"> <i><i class="far fa-file"></i></i></a>
                          <a href="<?= BASE_PATH ?>ruangan/edit/<?= $j['id_ruangan'] ?>" class="btn btn-icon btn-warning btn-sm text-light" data-toggle="tooltip" title="Edit"> <i><i class="fas fa-edit"></i></i></a>
                          <a href="<?= BASE_PATH ?>ruangan/remove/<?= $j['id_ruangan'] ?>" class="btn btn-icon btn-danger btn-sm text-light" data-toggle="tooltip" title="Remove"> <i><i class="fas fa-times"></i></i></a>
                        </td>
                      </tr>
                    <?php }
                    ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-4 col-md-4 col-lg-4">
    <div class="row">
      <div class="col-12">
        <div class="section-body">
          <h2 class="section-title">Create New ruangan</h2>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form action="<?= BASE_PATH ?>ruangan/store" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Nama ruangan</label>
                      <input type="text" class="form-control" required="" name="nama" placeholder="Nama ruangan">
                      <div class="invalid-feedback">Input Nama ruangan</div>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="create" class="btn btn-primary btn-icon icon-left" data-toggle="tooltip" title="Create">
                        <i class="fas fa-edit"></i> Create
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      if (isset($_SESSION['display'])) {
        $dispay = '';
        $id = $_SESSION['display'];
        $nama = $_SESSION['nama'];
        unset($_SESSION['nama']);
        unset($_SESSION['display']);
      } else {
        $dispay = 'd-none';
        $id = '';
      }
      ?>
      <div class="col-12 <?= $dispay ?>">
        <div class="section-body">
          <h2 class="section-title">Edit ruangan</h2>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form action="<?= BASE_PATH ?>ruangan/update" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Nama ruangan</label>
                      <input type="text" class="form-control" required="" name="nama" placeholder="Nama ruangan" value="<?= $nama ?>">
                      <input type="hidden" class="form-control" required="" name="id" placeholder="Nama ruangan" value="<?= $id ?>">
                      <div class="invalid-feedback">Input Nama </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="edit" class="btn btn-primary btn-icon icon-left" data-toggle="tooltip" title="Create">
                        <i class="fas fa-edit"></i> Edit
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>