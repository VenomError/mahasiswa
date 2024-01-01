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
if (isset($data['navJurusan'])) {
  echo "active";
}
?>"><a class="nav-link" href="<?= BASE_PATH ?>jurusan"><i class="fas fa-graduation-cap"></i> <span>Jurusan</span></a></li>