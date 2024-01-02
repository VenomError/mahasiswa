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
    <section class="section">
      <div class="container mt-5">
        <?php
        $cont = new View($content);
        $cont->bind('data', $data);
        $cont->render();
        ?>
      </div>
    </section>
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