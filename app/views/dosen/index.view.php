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
                  <th>Dosen</th>
                  <th>Matkuliah</th>
                  <th>Nama Dosen</th>
                  <th>NID</th>
                  <th>Tempat Tgl lahir</th>
                  <th>Alamat</th>
                  <th>Jumlah Jadwal</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                foreach ($data['dosen'] as $d) {
                  $jml = new Model();
                  $count =  $jml->table('jadwal')->select()->where(['dosen' => ($d['id_dosen'])])->count();
                ?>
                  <tr>
                    <td> <img alt="image" src="<?= BASE_ASSETS ?>assets/avatars/<?= $d['avatars'] ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $d['nama_dosen'] ?>"></td>
                    <td><?= $d['nama_matakuliah'] ?></td>
                    <td><?= $d['nama_dosen'] ?></td>
                    <td><?= $d['nid'] ?></td>
                    <td><?= $d['ttl'] ?></td>
                    <td><?= $d['alamat'] ?></td>
                    <td><?= $count ?></td>

                    <td class="btn-group " role="group" aria-label="Group">
                      <a href="<?= BASE_PATH ?>dosen/detail/<?= $d['id_dosen'] ?>" class="btn btn-icon btn-primary btn-sm text-light" data-toggle="tooltip" title="Detail"> <i><i class="far fa-file"></i></i></a>
                      <a href="<?= BASE_PATH ?>dosen/edit/<?= $d['id_dosen'] ?>" class="btn btn-icon btn-warning btn-sm text-light" data-toggle="tooltip" title="Edit"> <i><i class="fas fa-edit"></i></i></a>
                      <a href="<?= BASE_PATH ?>dosen/remove/<?= $d['id_dosen'] ?>" class="btn btn-icon btn-danger btn-sm text-light" data-toggle="tooltip" title="Remove"> <i><i class="fas fa-times"></i></i></a>
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