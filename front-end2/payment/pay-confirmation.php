<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"><title>COW - Cinema On Web</title>
    <script src='../assets/js/fetch.js'></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const film_id = urlParams.get('film_id');
        var sessionId = urlParams.get('?sessionId'); 
        if (sessionId == null ){
            sessionId = 0;
        }
        console.log(sessionId);
    </script>
    <meta property="og:type" content=""><meta name="description" content="Tempat menyediakan layanan pemesanan film terbesar di Indonesia."><link rel="apple-touch-icon" type="image/png" sizes="180x180" href="../assets/img/cinema180x180.png"><link rel="icon" type="image/png" sizes="16x16" href="../assets/img/cinema16x16.png"><link rel="icon" type="image/png" sizes="32x32" href="../assets/img/cinema32x32.png"><link rel="icon" type="image/png" sizes="180x180" href="../assets/img/cinema180x180.png"><link rel="icon" type="image/png" sizes="192x192" href="../assets/img/cinema192x192.png"><link rel="icon" type="image/png" sizes="512x512" href="../assets/img/cinema512x512.png"><link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"><link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css"><link rel="stylesheet" href="../assets/css/styles.min.css"></head>
    <body id="page-top">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNavi">
        <div class="container"><a class="navbar-brand" href="../index.html" style="border-color: rgb(254, 209, 54);border-top-color: rgb(254,;border-right-color: 209,;border-bottom-color: 54);border-left-color: 209,;color: rgb(254, 209, 54);font-family: 'Kaushan Script', serif;font-size: 28px;">COW</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" style="color: rgb(255,255,255);background: rgb(254,209,54);"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">  
                <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>  
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link" id="hov-color" href="../sub-menu/search.php"><i class="fa fa-search"></i> Search</a></li>
                    <li class="nav-item"><a class="nav-link" id="hov-color" href="../sub-menu/film-1.php">Film</a></li>
                    <li class="nav-item"><a class="nav-link" id="hov-color" href="../sub-menu/about.html">ABout</a></li>
                    <li class="nav-item dropdown"><a aria-expanded="false" data-bs-toggle="dropdown" class="dropdown-toggle nav-link" id="hov-colors" href="#">Account</a>
                        <div class="dropdown-menu dropdown-menu-dark">
                            <a class="dropdown-item" id="var_t" style="display: none;" href="../profil-user/profil.html"><i class="fa fa-user"></i><script>accountFirstname(sessionId)</script></a>
                            <a class="dropdown-item disabled text-capitalize" id="wallet" style="display: none" href="#"><script>accountSaldo(sessionId)</script><br /></a>
                            <a class="dropdown-item disabled" id="guest" href="../profil-user/login/signin.html"><i class="fa fa-user"></i>  Guest</a>
                            <a class="dropdown-item" id="logout" href="../index.html" style="display: none;color: rgb(220,53,69);"><i class="fa fa-power-off"></i> LOG out</a>
                            <a class="dropdown-item" id="logger" href="../profil-user/login/signin.html" style="color: rgb(49, 185, 37);"><i class="fa fa-power-off"></i> LOGIN</a></div>
                    </li>
                </ul>
            </div>
        </div>
        <script>
            document.getElementById("var_t").id = `t${sessionId}`;
            document.getElementById("wallet").id = `s${sessionId}`;
            $(document).ready(function () {
            // Check if gagal
            if (sessionId > 0) {
                $(`#var_t`).show();
                $(`#wallet`).show();
            }
            if (sessionId > 0) {
                $(`#t${sessionId}`).show();
                $(`#s${sessionId}`).show();
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
                document.getElementById("logout").href="../index.html";
                document.getElementById("btn-bottom").href="#page-top";
                document.getElementById("hov-colors").href="#";
                document.getElementById("modal").href="#confirmation";
            }
            })
        </script>
<?php
	$db = pg_connect("host=localhost port=5432 dbname=proyeksbd user=postgres password=");
    $accountid = $_GET['?sessionId'];
    $filmId = $_GET['film_id'];
    $query = pg_query($db, "SELECT * FROM price_data WHERE film_id = $filmId;");
    $fetch = pg_fetch_assoc($query);
    $price = $fetch['price'];
    
    if (isset($_POST['submit'])) {
        $result = pg_query($db,"UPDATE account_test SET wallet = wallet - $price WHERE account_id = $accountid");
        sleep(1);
        echo "<script type='text/javascript'>location.href= '../profil-user/history.php?sessionId=${accountid}';</script>";
    }
?>
</nav><header class="masthead" style="background: rgb(33,37,41);">
    <div class="container">
        <div class="intro-text" style="padding-bottom: 100px;">
            <h1 style="color: rgb(254,209,54);margin-bottom: 5%;">Pembayaran</h1>
            <div class="col" style="margin-left: 10%;">
                <div class="table-responsive" style="margin-bottom: 5%;">
                    <table class="table">
                        <tbody style="color: rgb(255,255,255);">
                            <tr>
                                <td class="text-start" style="border-color: rgba(255,255,255,0);width: 200px;">ID Film:</td>
                                <td class="text-start" id="var_id" style="border-color: rgba(255,255,255,0);text-align: left;"></td>
                            </tr>
                            <tr>
                                <td class="text-start" style="border-color: rgba(255,255,255,0);width: 200px;">Nama Film:</td>
                                <td class="text-start" id="var_t" style="border-color: rgba(255,255,255,0);text-align: left;"><script>readFilmsById(film_id);</script>></td>
                            </tr>
                            <tr>
                                <td class="text-start" style="border-color: rgba(255,255,255,0);width: 200px;">Harga:</td>
                                <td class="text-start" id="var_h" style="border-color: rgba(255,255,255,0);text-align: left;"><script>hargaId(film_id);</script></td>
                            </tr>
                        </tbody>
                    </table>
                    <script>
                        document.getElementById("var_id").innerHTML = film_id;
                        document.getElementById("var_t").id = `t${film_id}`;
                        document.getElementById("var_h").id = `h${film_id}`;
                        document.getElementById("modals").href="#confirmation";
                    </script>
                </div>
            </div>
            <form method="POST" action="">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="col"><a class="btn btn-danger" role="button" href="#confirmation" id="modal" data-bs-toggle="modal"><i class="fa fa-close"></i>  Batal</a></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="col"><button class="btn btn-primary" type="submit" name="submit" onclick="loading()" href="../profil-user/history.php"><span id="payment" style="display:inline;" > <i class="fa fa-dollar"></i>  Bayar</span><span id="loader" style="display:none;"><span role="status" class="spinner-border spinner-border-sm"></span>  Loading...</span></button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header><a class="btn btn-primary rounded-circle position-fixed flex-fill" role="button" id="btn-bottom" href="#page-top" style="bottom: 20px;z-index: 10000;right: 40px;display: inline-block;width: 55px;height: 55px;padding-top: 12px;"><i class="fa fa-angle-double-up" style="font-size: 26px;"></i></a><footer class="footer-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 item">
                <p style="font-family: 'Kaushan Script', serif;color: rgb(254,209,54);font-size: 38px;text-align: right;">COW</p>
            </div>
            <div class="col-sm-6 col-md-3 item" style="text-align: left;">
                <h2 style="margin: 5%;">Cinema On Web</h2>
                <ul style="margin: 5%;">
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../sub-menu/film-1.html">Film</a></li>
                    <li><a href="../sub-menu/about.html">About</a></li>
                </ul>
            </div>
            <div class="col item social">
                <h4>Kontak Kami</h4>
                <div style="height: 20px;"></div><a href="https://www.facebook.com"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com/"><i class="icon ion-social-twitter"></i></a><a href="https://gmail.com"><i class="icon ion-android-mail"></i></a><a href="https://instagram.com"><i class="icon ion-social-instagram"></i></a>
            </div>
        </div>
        <p class="copyright">COW © 2021</p>
    </div>
</footer><div role="dialog" tabindex="-1" class="modal fade flex-fill" id="confirmation">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Batal Transaksi</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda ingin membatalkan pemesanan tiket?</p>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Tidak</button><button class="btn btn-primary" type="button" onclick="history.go(-1)">Iya</button></div>
        </div>
    </div>
</div><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script><script src="../assets/js/script.min.js"></script>
    <script>
function loading() {
    document.getElementById("payment").style.display ="none";
    document.getElementById("loader").style.display = "inline";
}
</script>
    </body></html>
