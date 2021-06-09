<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"><title>COW - Cinema On Web</title>
    <script src='../assets/js/fetch.js'></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        var sessionId = urlParams.get('sessionId'); 
        if (sessionId == null ){
            sessionId = 0;
        }
    </script>
    <meta property="og:type" content=""><meta name="description" content="Tempat menyediakan layanan pemesanan film terbesar di Indonesia."><link rel="apple-touch-icon" type="image/png" sizes="180x180" href="../assets/img/cinema180x180.png"><link rel="icon" type="image/png" sizes="16x16" href="../assets/img/cinema16x16.png"><link rel="icon" type="image/png" sizes="32x32" href="../assets/img/cinema32x32.png"><link rel="icon" type="image/png" sizes="180x180" href="../assets/img/cinema180x180.png"><link rel="icon" type="image/png" sizes="192x192" href="../assets/img/cinema192x192.png"><link rel="icon" type="image/png" sizes="512x512" href="../assets/img/cinema512x512.png"><link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"><link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css"><link rel="stylesheet" href="../assets/css/styles.min.css"></head><body id="page-top">
        <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNavi">
            <div class="container"><a class="navbar-brand" href="../index.html" style="border-color: rgb(254, 209, 54);border-top-color: rgb(254,;border-right-color: 209,;border-bottom-color: 54);border-left-color: 209,;color: rgb(254, 209, 54);font-family: 'Kaushan Script', serif;font-size: 28px;">COW</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" style="color: rgb(255,255,255);background: rgb(254,209,54);"><i class="fa fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">  
                    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>  
                    <ul class="navbar-nav ms-auto text-uppercase">
                        <li class="nav-item"><a class="nav-link" id="hov-color" href="../sub-menu/search.php"><i class="fa fa-search"></i> Search</a></li>
                        <li class="nav-item"><a class="nav-link" id="hov-color" href="../sub-menu/film-1.php">Film</a></li>
                        <li class="nav-item"><a class="nav-link" id="hov-color" href="../sub-menu/about.html">ABouts</a></li>
                        <li class="nav-item dropdown"><a aria-expanded="false" data-bs-toggle="dropdown" class="dropdown-toggle nav-link" id="hov-colors" href="#">Account</a>
                            <div class="dropdown-menu dropdown-menu-dark">
                                <a class="dropdown-item" id="var_t" style="display: none;" href="profil.html"><i class="fa fa-user"></i><script>accountFirstname(sessionId)</script></a>
                                <a class="dropdown-item disabled text-capitalize" id="wallet" style="display: none" href="#"><script>accountWallet(sessionId)</script><br /></a>
                                <a class="dropdown-item disabled" id="guest" href="./login/signin.html"><i class="fa fa-user"></i>  Guest</a>
                                <a class="dropdown-item" id="logout" href="../index.html" style="display: none;color: rgb(220,53,69);"><i class="fa fa-power-off"></i> LOG out</a>
                                <a class="dropdown-item" id="logger" href="./login/signin.html" style="color: rgb(49, 185, 37);"><i class="fa fa-power-off"></i> LOGIN</a></div>
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
                    document.getElementById("logout").href="../index.html";
                    document.getElementById("btn-bottom").href="#page-top";
                    document.getElementById("hov-colors").href="#";
                }
                })
                
            </script>
          
</nav><header class="masthead" style="background: rgb(33,37,41);">
    <div class="container">     
        <div class="intro-text" style="padding-bottom: 100px;">
            <h1 style="color: rgb(254,209,54);margin-bottom: 5%;">RIWAYAT TRANSAKSI</h1>
            <table class="table">
                <tbody style="color: rgb(255,255,255);">
                    <tbody style="color: rgb(255,255,255);">
                    <tr>
                        <td class="text-start" style="border-color: rgba(255,255,255,0);">Saldo Saat Ini:</td>
                        <td id="walletsa" style="border-color: rgba(255,255,255,0)" ><script>accountSaldo(sessionId)</script><br /></td>
                    </tr>
                    </tbody>
                </tbody>
            </table>
            <script>
                document.getElementById("walletsa").id = `s${sessionId}`;
            </script>
            <?php
                $db = pg_connect("host=localhost port=5432 dbname=proyeksbd user=postgres password="); 
                $accountid = $_GET['sessionId'];
                $result = pg_query($db,"SELECT * FROM order_data AS ORD, film AS FIL, price_data AS PRC WHERE account_id = '$accountid' AND ((ORD.film_id = FIL.film_id) AND (FIL.film_id = PRC.film_id));");
                while($row=pg_fetch_assoc($result)){
                echo '<div class="table-responsive">';
                echo '<div style="margin-top: 3%;margin-bottom: 3%;border-style: solid;border-color: rgb(44,44,44);"></div>';
                echo    '<table class="table">';
                echo        '<tbody style="color: rgb(255,255,255);">';
                echo           '<tr>' ;
                echo                '<td class="text-start" style="border-color: rgba(255,255,255,0);">Order ID:</td>';
                echo                '<td class="text-start" style="border-color: rgba(255,255,255,0);">'.$row['order_id'].'</td>';
                echo            '</tr>';
                echo            '<tr>';
                echo                '<td class="text-start" style="border-color: rgba(255,255,255,0);">ID Film:</td>';
                echo                '<td class="text-start" style="border-color: rgba(255,255,255,0);">'.$row['film_id'].'</td>';
                echo           '</tr>';
                echo            '<tr>';
                echo                '<td class="text-start" style="border-color: rgba(255,255,255,0);">Judul Film:</td>';
                echo                '<td class="text-start" style="border-color: rgba(255,255,255,0);">'.$row['title'].'</td>';
                echo           '</tr>';
                echo            '<tr>';
                echo                '<td class="text-start" style="border-color: rgba(255,255,255,0);">Harga Film:</td>';
                echo                '<td class="text-start" style="border-color: rgba(255,255,255,0);">'.$row['price'].'</td>';
                echo           '</tr>';
                echo            '<tr>';
                echo               '<td class="text-start" style="border-color: rgba(255,255,255,0);">Jumlah:</td>';
                echo               '<td class="text-start" style="border-color: rgba(255,255,255,0);">'.$row['amount'].'</td>';
                echo            '</tr>';
                echo       '</tbody>';
                echo   '</table>';
                echo'</div>';
                }
            ?>
            <div style="margin-top: 3%;margin-bottom: 3%;border-style: solid;border-color: rgb(44,44,44);"></div>

             <!-- <div class="table-responsive">
                 <table class="table">
                     <tbody style="color: rgb(255,255,255);">
                         <tr>
                             <td class="text-start" style="border-color: rgba(255,255,255,0);">Order ID:</td>
                             <td class="text-start" style="border-color: rgba(255,255,255,0);">Marvel</td>
                         </tr>
                         <tr>
                             <td class="text-start" style="border-color: rgba(255,255,255,0);">ID Film:</td>
                         <td class="text-start" style="border-color: rgba(255,255,255,0);">Marvel</td>
                         </tr>
                         <tr>
                             <td class="text-start" style="border-color: rgba(255,255,255,0);">Nama Film:</td>
                             <td class="text-start" style="border-color: rgba(255,255,255,0);">Marvel</td>
                         </tr>
                         <tr>
                             <td class="text-start" style="border-color: rgba(255,255,255,0);">Harga:</td>
                             <td class="text-start" style="border-color: rgba(255,255,255,0);">Rp 00,-</td>
                         </tr>
                     </tbody>
                 </table>
             </div> -->
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
                    <li><a href="../sub-menu/film-1.php">Film</a></li>
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
</footer><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script><script src="../assets/js/script.min.js"></script></body></html>
