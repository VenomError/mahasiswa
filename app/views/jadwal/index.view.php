<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="section-body">
      <h2 class="section-title">Data Jadwal</h2>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_PATH ?>jadwal/create">
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
                      <th>Hari</th>
                      <th>Ruang Jadwal</th>
                      <th>Dosen</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php


                    foreach ($data['jadwal'] as $j) {

                      if ($j['id_status'] === 1) {
                        $style = 'success';
                      } else if ($j['id_status'] === 2) {
                        $style = 'danger';
                      } else if ($j['id_status'] === 3) {
                        $style = 'warning';
                      } else {
                        $style = 'info';
                      } ?>
                      <tr>
                        <td><?= $j['nama_hari'] ?></td>
                        <td><?= $j['nama_ruangan'] ?></td>
                        <td>
                          <?= $j['nama_dosen']
                          ?>
                        </td>
                        <td><?= $j['mulai'] ?></td>
                        <td><?= $j['selesai'] ?></td>
                        <td>
                          <span class="badge badge-<?= $style ?>"><?= $j['nama_status'] ?></span>
                        </td>
                        <td class="btn-group " role="group" aria-label="Group">
                          <a href="<?= BASE_PATH ?>jadwal/detail/<?= $j['id_jadwal'] ?>" class="btn btn-icon btn-primary btn-sm text-light" data-toggle="tooltip" title="Detail"><i class="far fa-file"></i></a>
                          <a href="<?= BASE_PATH ?>jadwal/edit/<?= $j['id_jadwal'] ?>" class="btn btn-icon btn-warning btn-sm text-light" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                          <a href="<?= BASE_PATH ?>jadwal/remove/<?= $j['id_jadwal'] ?>" class="btn btn-icon btn-danger btn-sm text-light" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></a>
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

</div>