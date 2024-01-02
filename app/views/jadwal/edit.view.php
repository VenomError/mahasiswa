<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="section-body">
      <h2 class="section-title">Edit Jadwal</h2>
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">

                  <thead>
                    <tr>
                      <th>Hari</th>
                      <th>Ruang Jadwal</th>
                      <th>Dosen | Matakuliah</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <?php
                  foreach ($data['jadwal'] as $j);
                  ?>
                  <tbody>
                    <tr>
                      <form action="<?= BASE_PATH ?>jadwal/update" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $j['id_jadwal'] ?>" required>
                        <td>
                          <select class="form-control" required="" name="hari" style="width: 150px;">
                            <?php foreach ($data['hari'] as $hari) {
                              if ($hari['id_hari'] == $j['hari']) {
                                $selected = 'selected';
                              } else {
                                $selected = '';
                              }
                            ?>
                              <option <?= $selected ?> value="<?= $hari['id_hari'] ?>"><?= $hari['nama_hari'] ?></option>
                            <?php
                            } ?>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" required="" name="ruangan" style="width: 150px;">
                            <?php
                            foreach ($data['ruangan'] as $d) {
                              if ($d['id_ruangan'] == $j['ruangan']) {
                                $selected = 'selected';
                              } else {
                                $selected = '';
                              }
                            ?>
                              <option <?= $selected ?> value="<?= $d['id_ruangan'] ?>"><?= $d['nama_ruangan'] ?></option>
                            <?php } ?>

                          </select>
                        </td>
                        <td>
                          <select class="form-control" required="" name="dosen" style="width: 250px;">
                            <?php
                            foreach ($data['dosen'] as $s) {
                              if ($s['id_dosen'] == $j['dosen']) {
                                $selected = 'selected';
                              } else {
                                $selected = '';
                              }
                            ?>
                              <option <?= $selected ?> value="<?= $s['id_dosen'] ?>"><?= $s['nama_dosen'] ?> | <?= $s['nama_matakuliah'] ?></option>
                            <?php } ?>

                          </select>
                        </td>
                        <td><input type="time" class="form-control " style="width: 100px;" name="mulai" required="" value="<?= $j['mulai'] ?>"></td>
                        <td><input type="time" class="form-control " style="width: 100px;" name="selesai" required="" value="<?= $j['selesai'] ?>"></td>

                        <td>
                          <select class="form-control" required="" name="status" style="width: 120px;">
                            <?php
                            foreach ($data['status'] as $st) {
                              if ($st['id_status'] == $j['status']) {
                                $selected = 'selected';
                              } else {
                                $selected = '';
                              }
                              if ($st['id_status'] == 1) {
                                $style = 'success';
                              } elseif ($st['id_status'] == 2) {
                                $style = 'danger';
                              } elseif ($st['id_status'] == 3) {
                                $style = 'warning';
                              } else {
                                $style = 'primary';
                              }
                            ?>
                              <option <?= $selected ?> class="text-<?= $style ?>" value="<?= $st['id_status'] ?>"><?= $st['nama_status'] ?></option>
                            <?php } ?>

                          </select>
                        </td>
                        <td role="group" aria-label="Group">
                          <button type="submit" name="edit" class="btn btn-icon icon-left btn-primary" data-toggle="tooltip" title="Update"><i class="fas fa-check"></i> Update</button>
                        </td>

                      </form>
                    </tr>
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