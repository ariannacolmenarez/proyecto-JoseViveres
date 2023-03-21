<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $data['page_tag']; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= _THEME_ ?>ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= _THEME_ ?>base/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= _THEME_ ?>sweetalert2/sweetalert2.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= _THEME_ ?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= _THEME_ ?>images/MP.png" />
  <script src="<?= _THEME_ ?>sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-center py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= _THEME_ ?>images/MP.png" alt="logo">
              </div>
              <h4 class="text-center">Bienvenid@, Empecemos...</h4>
              <h6 class="font-weight-light text-center">Inicio de Sessión</h6>
              <form class="pt-3 mt-4" method="POST" action="<?= _DIRECTORY_ ?>login" id="loginform">
                <div class="form-group mt-2">
                  <input type="text" class="form-control form-control-lg" name="usuario" id="usuario" placeholder="User Name">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                </div>
                <?php
                      if(isset($data['message']) && !empty($data['message'])){
                    ?><script>
                      Swal.fire({
                        icon: "error",
                        title: "<?php echo $data['message'] ?>"                      
                      })
                      </script>
                    <?php
                      }
                    ?>
                <div class="mt-3">
                  <button id="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <a id="recuperar" class="auth-link text-black">Recuperar acceso</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= _THEME_ ?>base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= _THEME_ ?>js/off-canvas.js"></script>
  <script src="<?= _THEME_ ?>js/hoverable-collapse.js"></script>
  <script src="<?= _THEME_ ?>js/template.js"></script>
  <script src="<?= _THEME_ ?>js/todolist.js"></script>
  <script src="<?= _THEME_ ?>js/jquery-ui.min.js"></script>
  <script src="<?= _THEME_ ?>js/jquery.validate.js"></script>
  <script src="<?= _THEME_ ?>js/messages_es.js"></script>
  <script src="<?= _THEME_ ?>/js/scripts/recuperarCont.js"></script>
  <script src="<?= _THEME_ ?>/js/scripts/alerts/login.js"></script>

  <!-- endinject -->
</body>

</html>
