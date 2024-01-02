  <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Create Dosen </h4>
        </div>
        <div class="card-body">
          <form action="<?= BASE_PATH ?>dosen/store" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama Dosen</label>
              <input type="text" class="form-control" required="" name="nama" placeholder="Nama Dosen">
              <div class="invalid-feedback">Input Nama Dosen</div>
            </div>

            <div class="form-group">
              <label>Nid</label>
              <input type="number" class="form-control" required="" name="nid" placeholder="Nid Dosen">
              <div class="invalid-feedback">Input Nid Dosen</div>
            </div>

            <div class="form-group">
              <label>Tempat Tanggal Lahir</label>
              <input type="text" class="form-control" required="" name="ttl" placeholder="Tempat , DD/MM/YYYY">
              <div class="invalid-feedback">Input TTL Dosen</div>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" required="" name="alamat" placeholder="Alamat">
              <div class="invalid-feedback">Input Alamat Dosen</div>
            </div>

            <div class="form-group">
              <label>Matakuliah</label>
              <select class="form-control" required="" name="matakuliah">
                <option selected value="">Choose ...</option>
                <?php
                foreach ($data['matakuliah'] as $d) {
                ?>
                  <option value="<?= $d['id_matakuliah'] ?>"><?= $d['nama_matakuliah'] ?></option>
                <?php } ?>
              </select>
              <div class="invalid-feedback">Choose Matakuliah</div>
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
              <div class="invalid-feedback">Pilih Foto Dosen</div>
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