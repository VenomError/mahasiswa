<div class="row">
  <div class="col-12 col-md-8 col-lg-8">
    <div class="section-body">
      <h2 class="section-title">Data Jurusan</h2>
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
                      <th>Nama Jurusan</th>
                      <th>Jumlah Mahasiswa</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php


                    foreach ($data['jurusan'] as $j) {
                    ?>
                      <tr>
                        <td><?= $j['nama_jurusan'] ?></td>
                        <td>
                          <?php
                          $count = new Model();
                          $count->table('mahasiswa');
                          $jml =  $count->select('mahasiswa*.')->where(['jurusan' => ($j['id_jurusan'])])->count();
                          echo $jml;
                          ?>
                        </td>
                        <td class="btn-group " role="group" aria-label="Group">
                          <a href="<?= BASE_PATH ?>jurusan/detail/<?= $j['id_jurusan'] ?>" class="btn btn-icon btn-primary btn-sm text-light" data-toggle="tooltip" title="Detail"> <i><i class="far fa-file"></i></i></a>
                          <a href="<?= BASE_PATH ?>jurusan/edit/<?= $j['id_jurusan'] ?>" class="btn btn-icon btn-warning btn-sm text-light" data-toggle="tooltip" title="Edit"> <i><i class="fas fa-edit"></i></i></a>
                          <a href="<?= BASE_PATH ?>jurusan/remove/<?= $j['id_jurusan'] ?>" class="btn btn-icon btn-danger btn-sm text-light" data-toggle="tooltip" title="Remove"> <i><i class="fas fa-times"></i></i></a>
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
          <h2 class="section-title">Create New Jurusan</h2>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form action="<?= BASE_PATH ?>jurusan/store" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Nama Jurusan</label>
                      <input type="text" class="form-control" required="" name="nama" placeholder="Nama Jurusan">
                      <div class="invalid-feedback">Input Nama Jurusan</div>
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
          <h2 class="section-title">Edit Jurusan</h2>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form action="<?= BASE_PATH ?>jurusan/update" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Nama Jurusan</label>
                      <input type="text" class="form-control" required="" name="nama" placeholder="Nama Jurusan" value="<?= $nama ?>">
                      <input type="hidden" class="form-control" required="" name="id" placeholder="Nama Jurusan" value="<?= $id ?>">
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