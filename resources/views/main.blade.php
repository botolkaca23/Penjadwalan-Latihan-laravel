<?php
// session_start();
if (empty($_SESSION['username_decafe'])) {
    header('location:login');
}

include "proses/connect.php";
$query  = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_decafe]'");
$hasil = mysqli_fetch_array($query);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DeCafe - Aplikasi Pemesanan Makanan dan Minuman Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <!-- Navbar -->
    <?php include "header.php" ?>
    <!-- End Navbar -->

    <!-- Container Sidebar & Content -->
    <div class="container-lg">
        <div class="row mb-5">
            <!-- Sidebar -->
            <?php include "sidebar.php"; ?>
            <!-- End Sidebar -->

            <!-- Content -->
            <?php
            include $page;
            ?>
            <!-- End Content-->
        </div>
        <!-- End Container Sidebar & Content -->

        <!-- Footer -->
        <div class="container-fluid fixed-bottom">
            <div class="card text-center border-0 bg-light py-2">
                <i><b><center>CopyLeft Dawi 2002 Copyright Haris't 2022</center></b></i>
            </div>
            <!-- End Footer -->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
</body>

</html>