<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"><title>COW - Cinema On Web</title>
    <script src='../../assets/js/fetch.js'></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const film_id = urlParams.get('film_id');
        var sessionId = urlParams.get('sessionId'); 
        if (sessionId == null ){
            sessionId = 0;
        }
        console.log(sessionId);
    </script>
    <meta property="og:type" content=""><meta name="description" content="Tempat menyediakan layanan pemesanan film terbesar di Indonesia."><link rel="apple-touch-icon" type="image/png" sizes="180x180" href="../../assets/img/cinema180x180.png"><link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/cinema16x16.png"><link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/cinema32x32.png"><link rel="icon" type="image/png" sizes="180x180" href="../../assets/img/cinema180x180.png"><link rel="icon" type="image/png" sizes="192x192" href="../../assets/img/cinema192x192.png"><link rel="icon" type="image/png" sizes="512x512" href="../../assets/img/cinema512x512.png"><link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"><link rel="stylesheet" href="../../assets/fonts/fontawesome5-overrides.min.css"><link rel="stylesheet" href="../../assets/css/styles.min.css"></head>
    <body id="page-top">
        <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNavi">
            <div class="container"><a class="navbar-brand" href="../../index.html" style="border-color: rgb(254, 209, 54);border-top-color: rgb(254,;border-right-color: 209,;border-bottom-color: 54);border-left-color: 209,;color: rgb(254, 209, 54);font-family: 'Kaushan Script', serif;font-size: 28px;">COW</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" style="color: rgb(255,255,255);background: rgb(254,209,54);"><i class="fa fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">  
                    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>  
                    <ul class="navbar-nav ms-auto text-uppercase">
                        <li class="nav-item"><a class="nav-link" id="hov-color" href="../../sub-menu/search.php"><i class="fa fa-search"></i>??Search</a></li>
                        <li class="nav-item"><a class="nav-link" id="hov-color" href="../../sub-menu/film-1.php">Film</a></li>
                        <li class="nav-item"><a class="nav-link" id="hov-color" href="../../sub-menu/about.html">ABout</a></li>
                        <li class="nav-item dropdown"><a aria-expanded="false" data-bs-toggle="dropdown" class="dropdown-toggle nav-link" id="hov-colors" href="#">Account</a>
                            <div class="dropdown-menu dropdown-menu-dark">
                                <a class="dropdown-item" id="var_t" style="display: none;" href="../profil.html"><i class="fa fa-user"></i><script>accountFirstname(sessionId)</script></a>
                                <a class="dropdown-item disabled text-capitalize" id="wallet" style="display: none" href="#"><script>accountWallet(sessionId)</script><br /></a>
                                <a class="dropdown-item disabled" id="guest" href="../login/signin.html"><i class="fa fa-user"></i>?? Guest</a>
                                <a class="dropdown-item" id="logout" href="../../index.html" style="display: none;color: rgb(220,53,69);"><i class="fa fa-power-off"></i>??LOG out</a>
                                <a class="dropdown-item" id="logger" href="../login/signin.html" style="color: rgb(49, 185, 37);"><i class="fa fa-power-off"></i>??LOGIN</a></div>
                        </li>
                    </ul>
                </div>
            </div>
            <script>
                document.getElementById("var_t").id = `t${sessionId}`;
                document.getElementById("wallet").id = `h${sessionId}`;
                $(document).ready(function () {
                // Check if gagal
                if (sessionId > 0) {
                    $(`#var_t`).show();
                    $(`#wallet`).show();
                }
                if (sessionId > 0) {
                    $(`#t${sessionId}`).show();
                    $(`#h${sessionId}`).show();
                    $('#logout').show();
                }
                if (sessionId > 0) {
                    $(`#logger`).hide();
                    $(`#guest`).hide();
                }
                if (sessionId > 0) {
                    var a = document.getElementsByTagName('a');   // Get all `<a>`
                    var href;
                    // Loop through all `<a>`
                    for (var i = 0; i < a.length; i++){
                        // Add `?who=123` to all hrefs found.
                        a[i].href += `?sessionId=${sessionId}`;
                    }
                    document.getElementById("logout").href="../../index.html";
                    document.getElementById("btn-bottom").href="#page-top";
                    document.getElementById("hov-colors").href="#";
                }
                })            
            </script>
<?php
	$db = pg_connect("host=localhost port=5432 dbname=proyeksbd user=postgres password=");
    
    if (isset($_POST['submit'])) {
        $wallet = $_POST['wallet'];
        $accountid = $_POST['account_id'];
        $query = pg_query($db, "UPDATE account_test SET wallet = wallet + '$wallet' WHERE account_id = '$accountid';");
        // if ( $query ) {
        //     echo  "Record Successfully Updated!";
        // }
    }
?>
</nav><header class="masthead" style="background: rgb(33,37,41);">
    <div class="container profile profile-view" id="profile-1">
        <div class="intro-text" style="padding-bottom: 100px;">
            <form id="myForm" method="POST" action="">
                <div class="row profile-row">
                    <div class="col">
                        <h1 id="saldo">ISI SALDO</h1>
                        <hr />
                        <div class="form-group mb-3">
                            <p class="text-start">Saldo Saat Ini:</p><label type="text"  id="var_s" class="form-control" name="saldo" style="text-align:left" readonly><script>accountSaldo(sessionId)</script></label>
                            <p class="text-start"></p><input type="hidden" id="account_id" name="account_id" class="form-control" min="0" value="" />
                            <p class="text-start">Isi Saldo: (Rupiah)</p><input type="number" id="saldo" name="wallet" class="form-control" min="5000" placeholder="Isi minimal 5000" required/>
                        </div>
                        <hr />
                        <br><br>
                        <div class="row">
                            <div class="col-md-12 content-right"><button class="btn btn-success form-btn" type="submit" name="submit"> ISI </button><a class="btn btn-danger form-btn" role="button" href="../profil.html"><i class="fa fa-close"></i>?? KEMBALI</a></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>;
        // document.getElementById("myForm").action=`http://localhost:3001/accounts/saldo/${sessionId}`
        document.getElementById("var_s").id = `s${sessionId}`;
        document.getElementById("account_id").value = `${sessionId}`;
    </script>
</header><a class="btn btn-primary rounded-circle position-fixed flex-fill" role="button" id="btn-bottom" href="#page-top" style="bottom: 20px;z-index: 10000;right: 40px;display: inline-block;width: 55px;height: 55px;padding-top: 12px;"><i class="fa fa-angle-double-up" style="font-size: 26px;"></i></a><footer class="footer-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 item">
                <p style="font-family: 'Kaushan Script', serif;color: rgb(254,209,54);font-size: 38px;text-align: right;">COW</p>
            </div>
            <div class="col-sm-6 col-md-3 item" style="text-align: left;">
                <h2 style="margin: 5%;">Cinema On Web</h2>
                <ul style="margin: 5%;">
                    <li><a href="../../index.html">Home</a></li>
                    <li><a href="../../sub-menu/film-1.php">Film</a></li>
                    <li><a href="../../sub-menu/about.html">About</a></li>
                </ul>
            </div>
            <div class="col item social">
                <h4>Kontak Kami</h4>
                <div style="height: 20px;"></div><a href="https://www.facebook.com"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com/"><i class="icon ion-social-twitter"></i></a><a href="https://gmail.com"><i class="icon ion-android-mail"></i></a><a href="https://instagram.com"><i class="icon ion-social-instagram"></i></a>
            </div>
        </div>
        <p class="copyright">COW ?? 2021</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script><script src="../../assets/js/script.min.js"></script></body></html>
