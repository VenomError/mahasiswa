<div class="section-body">
  <h2 class="section-title">Data Dosen</h2>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="<?= BASE_PATH ?>dosen/create">
            <button type="button" class="btn btn-primary btn-icon icon-left">
              <i class="fas fa-edit"></i> Create
            </button>
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">

              <thead>
                <tr>
                  <th>Mahasiswa</th>
                  <th>Nama Mahasiswa</th>
                  <th>Nim</th>
                  <th>Jurusan</th>
                  <th>Semester</th>
                  <th>Kelas</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                foreach ($data['mahasiswa'] as $d) {
                ?>
                  <tr>
                    <td> <img alt="image" src="<?= BASE_ASSETS ?>assets/avatars/<?= $d['avatars'] ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $d['nama_mahasiswa'] ?>"></td>
                    <td><?= $d['nama_mahasiswa'] ?></td>
                    <td><?= $d['nim'] ?></td>
                    <td><?= $d['nama_jurusan'] ?></td>
                    <td><?= $d['nama_semester'] ?></td>
                    <td><?= $d['nama_kelas'] ?></td>
                    <td class="btn-group " role="group" aria-label="Group">
                      <a href="<?= BASE_PATH ?>mahasiswa/detail/<?= $d['id_mahasiswa'] ?>" class="btn btn-icon btn-primary btn-sm text-light" data-toggle="tooltip" title="Detail"> <i><i class="far fa-file"></i></i></a>
                      <a href="<?= BASE_PATH ?>mahasiswa/edit/<?= $d['id_mahasiswa'] ?>" class="btn btn-icon btn-warning btn-sm text-light" data-toggle="tooltip" title="Edit"> <i><i class="fas fa-edit"></i></i></a>
                      <a href="<?= BASE_PATH ?>mahasiswa/remove/<?= $d['id_mahasiswa'] ?>" class="btn btn-icon btn-danger btn-sm text-light" data-toggle="tooltip" title="Remove"> <i><i class="fas fa-times"></i></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>