  <?php
  foreach ($data['mahasiswa'] as  $d) {
  ?>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Edit Mahasiswa</h4>
          </div>
          <div class="card-body">
            <form action="<?= BASE_PATH ?>mahasiswa/update" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $d['id_mahasiswa'] ?>">
              <div class="form-group text-center">
                <img alt="image" src="<?= BASE_ASSETS ?>assets/avatars/<?= $d['avatars'] ?>" class="rounded-circle" width="75" data-toggle="tooltip" title="<?= $d['nama_mahasiswa'] ?>">
              </div>
              <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" class="form-control" required="" name="nama" placeholder="Nama Mahasiswa" value="<?= $d['nama_mahasiswa'] ?>">
                <div class="invalid-feedback">Input Nama Mahasiswa</div>
              </div>

              <div class="form-group">
                <label>Nim</label>
                <input type="number" class="form-control" required="" name="nim" placeholder="Nim Mahasiswa" value="<?= $d['nim'] ?>">
                <div class="invalid-feedback">Input Nim Mahasiswa</div>
              </div>

              <div class="form-group">
                <label>Tempat Tanggal Lahir</label>
                <input type="text" class="form-control" required="" name="ttl" placeholder="Tempat , DD/MM/YYYY" value="<?= $d['ttl'] ?>">
                <div class="invalid-feedback">Input TTL Mahasiswa</div>
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" required="" name="alamat" placeholder="Alamat" value="<?= $d['alamat'] ?>">
                <div class="invalid-feedback">Input Nim Mahasiswa</div>
              </div>

              <div class="form-group">
                <label>Jurusan</label>
                <select class="form-control" required="" name="jurusan">
                  <option selected value="">Choose ...</option>
                  <?php
                  foreach ($data['jurusan'] as $j) {
                    if ($j['id_jurusan'] == $d['jurusan']) {
                      $selected = 'selected';
                    } else {
                      $selected = '';
                    }
                  ?>
                    <option <?= $selected ?> value="<?= $j['id_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>
                  <?php } ?>
                </select>
                <div class="invalid-feedback">Choose Jurusan</div>
              </div>

              <div class="form-group">
                <label>Semester</label>
                <select class="form-control" required="" name="semester">
                  <option selected value="">Choose ...</option>
                  <?php
                  foreach ($data['semester'] as $s) {
                    if ($s['id_semester'] == $d['semester']) {
                      $selected = 'selected';
                    } else {
                      $selected = '';
                    }
                  ?>
                    <option <?= $selected ?> value="<?= $s['id_semester'] ?>"><?= $s['nama_semester'] ?></option>
                  <?php } ?>
                </select>
                <div class="invalid-feedback">Choose Semester</div>
              </div>

              <div class="form-group">
                <label>Kelas</label>
                <select class="form-control" required="" name="kelas">
                  <option selected value="">Choose ...</option>
                  <?php
                  foreach ($data['kelas'] as $k) {
                    if ($k['id_kelas'] == $d['kelas']) {
                      $selected = 'selected';
                    } else {
                      $selected = '';
                    }
                  ?>
                    <option <?= $selected ?> value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
                  <?php } ?>
                </select>
                <div class="invalid-feedback">Choose Kelas</div>
              </div>

              <div class="form-group">
                <label>Password Strength</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </div>
                  </div>
                  <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required value="<?= $d['password'] ?>">
                </div>
                <div id="pwindicator" class="pwindicator">
                  <div class="bar"></div>
                  <div class="label"></div>
                </div>
              </div>

              <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="avatars">
                <input type="hidden" name="avatarsOld" value="<?= $d['avatars'] ?>">
                <div class="valid-feedback">It's Okey</div>
              </div>

              <div class="form-group">
                <div class="form-group">
                  <button type="submit" name="update" class="btn btn-icon icon-left btn-primary">Edit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php
  }


  ?>