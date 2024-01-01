<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $head = new View($header);
  $head->bind('data', $data);
  $head->render();
  ?>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <?php
        $nav = new View($navbar);
        $nav->bind('data', $data);
        $nav->render();
        ?>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> Admin<i class="fas fa-id-card" style="font-size: 30px; margin-right: 10px;"></i></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><i class="fab fa-centercode" style="font-size: 20px;"></i></a>
          </div>
          <ul class="sidebar-menu">
            <?php
            $side = new View($sidebar);
            $side->bind('data', $data);
            $side->render();
            ?>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $data['page'] ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">DataTables</div>
            </div>
          </div>
          <!-- CONTENT -->
          <?php
          $content = new View($content);
          $content->bind('data', $data);
          $content->render();
          ?>
          <!-- CONTENT END -->

        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>
  <!-- FOOTER -->
  <?php
  $foot = new View($footer);
  $foot->bind('data', $data);
  $foot->render();
  ?>
  <!-- EDN FOOTER -->
</body>

</html>