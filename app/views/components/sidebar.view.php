<li class="menu-header">Dashboard</li>
<li class="
<?php
if (isset($data['navAdmin'])) {
  echo "active";
}
?>
"><a class="nav-link" href="<?= BASE_PATH ?>admin"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
<li class="menu-header">Database</li>
<li class="
<?php
if (isset($data['navMHS'])) {
  echo "active";
}
?>"><a class="nav-link" href="<?= BASE_PATH ?>mahasiswa"><i class="fas fa-user-graduate"></i> <span>Mahasiswa</span></a></li>
<li class="
<?php
if (isset($data['navDosen'])) {
  echo "active";
}
?>"><a class="nav-link" href="<?= BASE_PATH ?>dosen"><i class="fas fa-user-graduate"></i> <span>Dosen</span></a></li>
<li class="
<?php
if (isset($data['navJurusan'])) {
  echo "active";
}
?>"><a class="nav-link" href="<?= BASE_PATH ?>jurusan"><i class="fas fa-graduation-cap"></i> <span>Jurusan</span></a></li>

<li class="
<?php
if (isset($data['navSemester'])) {
  echo "active";
}
?>"><a class="nav-link" href="<?= BASE_PATH ?>semester"><i class="fas fa-school"></i><span>Semester</span></a></li>

<li class="
<?php
if (isset($data['navKelas'])) {
  echo "active";
}
?>"><a class="nav-link" href="<?= BASE_PATH ?>kelas"><i class="fas fa-chalkboard-teacher"></i><span>Kelas</span></a></li>

<li class="
<?php
if (isset($data['navMatakuliah'])) {
  echo "active";
}
?>"><a class="nav-link" href="<?= BASE_PATH ?>matakuliah"><i class="fas fa-book-open"></i><span>Matakuliah</span></a></li>

<li class="
<?php
if (isset($data['navRuangan'])) {
  echo "active";
}
?>"><a class="nav-link" href="<?= BASE_PATH ?>ruangan"><i class="fas fa-chalkboard"></i><span>Ruangan</span></a></li>

<li class="
<?php
if (isset($data['navJadwal'])) {
  echo "active";
}
?>"><a class="nav-link" href="<?= BASE_PATH ?>jadwal"><i class="fas fa-calendar"></i><span>Jadwal</span></a></li>