<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="section-body">
      <h2 class="section-title">Create Jadwal</h2>
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
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <form action="<?= BASE_PATH ?>jadwal/store" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                        <td>
                          <select class="form-control" required="" name="hari" style="width: 150px;">
                            <option selected value="">Choose ...</option>
                            <?php
                            foreach ($data['hari'] as $hari) {
                            ?>
                              <option value="<?= $hari['id_hari'] ?>"><?= $hari['nama_hari'] ?></option>
                            <?php } ?>
                          </select>
                          <div class="invalid-feedback">Choose Hari</div>
                        </td>
                        <td>
                          <select class="form-control" required="" name="ruangan" style="width: 150px;">
                            <option selected value="">Choose ...</option>
                            <?php
                            foreach ($data['ruangan'] as $d) {
                            ?>
                              <option value="<?= $d['id_ruangan'] ?>"><?= $d['nama_ruangan'] ?></option>
                            <?php } ?>
                            <div class="invalid-feedback">Input Nim Mahasiswa</div>
                          </select>
                          <div class="invalid-feedback">Choose Hari</div>
                        </td>
                        <td>
                          <select class="form-control" required="" name="dosen" style="width: 200px;">
                            <option selected value="">Choose ...</option>
                            <?php
                            foreach ($data['dosen'] as $d) {
                            ?>
                              <option value="<?= $d['id_dosen'] ?>"><?= $d['nama_dosen'] ?> | <?= $d['nama_matakuliah'] ?></option>
                            <?php } ?>
                            <div class="invalid-feedback">Input Nim Mahasiswa</div>
                          </select>
                          <div class="invalid-feedback">Choose Hari</div>
                        </td>
                        <td><input type="time" class="form-control " style="width: 100px;" name="mulai" required=""></td>
                        <td><input type="time" class="form-control " style="width: 100px;" name="selesai" required=""></td>
                        <td role="group" aria-label="Group">
                          <button type="submit" name="create" class="btn btn-icon icon-left btn-primary" data-toggle="tooltip" title="Create"><i class="fas fa-check"></i> Create</button>
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