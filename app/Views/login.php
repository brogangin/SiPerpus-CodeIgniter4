<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .full-height {
            height: 100vh;
        }

        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .p-5 {
            border: 1px solid black;
            height: 30rem;
        }

        .col-lg-12 {
            height: 25rem;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container full-height">
        <div class="row centered-form">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login SiPerpus</h1>
                                    </div>
                                    <form class="user" action="/logging" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?= isset($validation['username']) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username">
                                            <div class="invalid-feedback"><?= isset($validation['username']) ? $validation['username'] : ''; ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?= isset($validation['password']) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                                            <div class="invalid-feedback"><?= isset($validation['password']) ? $validation['password'] : ''; ?></div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>
</body>

</html>