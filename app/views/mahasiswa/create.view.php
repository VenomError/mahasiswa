  <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Create Mahasiswa </h4>
        </div>
        <div class="card-body">
          <form action="<?= BASE_PATH ?>mahasiswa/store" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama Mahasiswa</label>
              <input type="text" class="form-control" required="" name="nama" placeholder="Nama Mahasiswa">
              <div class="invalid-feedback">Input Nama Mahasiswa</div>
            </div>

            <div class="form-group">
              <label>Nim</label>
              <input type="number" class="form-control" required="" name="nim" placeholder="Nim Mahasiswa">
              <div class="invalid-feedback">Input Nim Mahasiswa</div>
            </div>

            <div class="form-group">
              <label>Tempat Tanggal Lahir</label>
              <input type="text" class="form-control" required="" name="ttl" placeholder="Tempat , DD/MM/YYYY">
              <div class="invalid-feedback">Input TTL Mahasiswa</div>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" required="" name="alamat" placeholder="Alamat">
              <div class="invalid-feedback">Input Nim Mahasiswa</div>
            </div>

            <div class="form-group">
              <label>Jurusan</label>
              <select class="form-control" required="" name="jurusan">
                <option selected value="">Choose ...</option>
                <?php
                foreach ($data['jurusan'] as $d) {
                ?>
                  <option value="<?= $d['id_jurusan'] ?>"><?= $d['nama_jurusan'] ?></option>
                <?php } ?>
              </select>
              <div class="invalid-feedback">Choose Jurusan</div>
            </div>

            <div class="form-group">
              <label>Semester</label>
              <select class="form-control" required="" name="semester">
                <option selected value="">Choose ...</option>
                <?php
                foreach ($data['semester'] as $d) {
                ?>
                  <option value="<?= $d['id_semester'] ?>"><?= $d['nama_semester'] ?></option>
                <?php } ?>
              </select>
              <div class="invalid-feedback">Choose Semester</div>
            </div>

            <div class="form-group">
              <label>Kelas</label>
              <select class="form-control" required="" name="kelas">
                <option selected value="">Choose ...</option>
                <?php
                foreach ($data['kelas'] as $d) {
                ?>
                  <option value="<?= $d['id_kelas'] ?>"><?= $d['nama_kelas'] ?></option>
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
                <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
              </div>
              <div id="pwindicator" class="pwindicator">
                <div class="bar"></div>
                <div class="label"></div>
              </div>
            </div>

            <div class="form-group">
              <label>Foto</label>
              <input type="file" class="form-control" required="" name="avatars">
              <div class="invalid-feedback">Pilih Foto Mahasiswa</div>
            </div>

            <div class="form-group">
              <div class="form-group">
                <button type="submit" name="create" class="btn btn-icon icon-left btn-primary">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>