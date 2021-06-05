<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"><title>COW - Cinema On Web</title>
    <script src='../assets/js/fetch.js'></script>
    <meta property="og:type" content=""><meta name="description" content="Tempat menyediakan layanan pemesanan film terbesar di Indonesia.">
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="../assets/img/cinema180x180.png"><link rel="icon" type="image/png" sizes="16x16" href="../assets/img/cinema16x16.png"><link rel="icon" type="image/png" sizes="32x32" href="../assets/img/cinema32x32.png"><link rel="icon" type="image/png" sizes="180x180" href="../assets/img/cinema180x180.png"><link rel="icon" type="image/png" sizes="192x192" href="../assets/img/cinema192x192.png"><link rel="icon" type="image/png" sizes="512x512" href="../assets/img/cinema512x512.png"><link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"><link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css"><link rel="stylesheet" href="../assets/css/styles.min.css"></head><body id="page-top"><nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
    <div class="container"><a class="navbar-brand" href="../index.html" style="border-color: rgb(254, 209, 54);border-top-color: rgb(254,;border-right-color: 209,;border-bottom-color: 54);border-left-color: 209,;">COW</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: rgb(254, 209, 54);"><i class="fa fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto text-uppercase">
                <li class="nav-item"><a class="nav-link" href="search.html"><i class="fa fa-search"></i> Search</a></li>
                <li class="nav-item"><a class="nav-link" href="film-1.php">Film</a></li>
                <li class="nav-item"><a class="nav-link" href="../profil-user/login/signin.html">Account</a></li>
                <li class="nav-item"><a class="nav-link" href="about.html">ABout</a></li>
            </ul>
        </div>
    </div>
<?php
	$db = pg_connect("host=localhost port=5432 dbname=proyeksbd user=postgres password=");
?>
</nav><header class="masthead">
    <div class="intro-text" style="background: rgb(33,37,41);">
        <div class="container">
            <h1 class="text-start">Page 2</h1>
            <div class="row">
                <div class="col content-right">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item" target="_parent"><a class="page-link" href="film-1.php" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item"><a class="page-link" href="film-1.php">1</a></li>
							<li class="page-item active"><a class="page-link" href="film-2.php">2</a></li>
							<li class="page-item"><a class="page-link" href="film-3.php">3</a></li>
							<li class="page-item"><a class="page-link" href="film-4.php">4</a></li>
							<li class="page-item"><a class="page-link" href="film-5.php">5</a></li>
                            <li class="page-item" target="_top"><a class="page-link" href="film-3.php" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <?php
                $result = pg_query($db,"SELECT * FROM film ORDER BY release_date DESC LIMIT 10 OFFSET 10;");
                while($row=pg_fetch_assoc($result)){
                echo '<div class="row" style="margin-bottom: 10%;margin-top: 10%;">';
                echo '<div class="col-md-4" style="margin-bottom: 5%;">';
                echo '<a href="#">';
                            
                    echo '<img class="img-fluid" src='.$row['poster_url'].'></a></div>';
                    echo '<div class="col-md-8 text-start"><h2>'.$row['title'].'</h2>';

                    echo '<p id="d'.$row['film_id'].'"><script>readFilmDescById('.$row['film_id'].');</script><br /></p>';
                    echo '<a class="btn btn-primary" role="button" href="../payment/pay-confirmation.html"><i class="fa fa-ticket"></i> PESAN</a>';
                    echo '<div style="margin-top: 3%;"></div>';
                    echo '<div class="table-responsive"><table class="table"><tbody style="color: rgb(255,255,255);">';
                    
                    echo '<tr>';
                    echo '<td class="text-start" style="border-color: rgba(255,255,255,0);">Studio:</td>';
                    echo '<td class="text-start" id="st'.$row['film_id'].'" style="border-color: rgba(255,255,255,0);">'.$row['studio'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="text-start" style="border-color: rgba(255,255,255,0);">Kategori:</td>';
                    echo '<td class="text-start" style="border-color: rgba(255,255,255,0);">'.$row['genre1'].','.$row['genre2'].','.$row['genre3'].'<br></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="text-start" style="border-color: rgba(255,255,255,0);">Tanggal Rilis:</td>';
                    echo '<td class="text-start" style="border-color: rgba(255,255,255,0);">'.$row['release_date'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="text-start" style="border-color: rgba(255,255,255,0);">Rating:</td>';
                    echo '<td class="text-start" style="border-color: rgba(255,255,255,0);">'.$row['rating'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="text-start" style="border-color: rgba(255,255,255,0);">Durasi:</td>';
                    echo '<td class="text-start" style="border-color: rgba(255,255,255,0);">'.$row['length'].' menit</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="text-start" style="border-color: rgba(255,255,255,0);">Harga:</td>';
                    echo '<td class="text-start" id="h'.$row['film_id'].'" style="border-color: rgba(255,255,255,0);"><script>hargaId('.$row['film_id'].');</script></td>';
                    echo '</tr>';
                    echo '</tbody></table>';
                    echo '</div></div>';
                    echo '</div>';
                }
            ?>    
            <div class="row">
                <div class="col content-right">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item" target="_parent"><a class="page-link" href="film-1.php" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item"><a class="page-link" href="film-1.php">1</a></li>
							<li class="page-item active"><a class="page-link" href="film-2.php">2</a></li>
							<li class="page-item"><a class="page-link" href="film-3.php">3</a></li>
							<li class="page-item"><a class="page-link" href="film-4.php">4</a></li>
							<li class="page-item"><a class="page-link" href="film-5.php">5</a></li>
                            <li class="page-item" target="_top"><a class="page-link" href="film-3.php" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
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
                    <li><a href="film-1.php">Film</a></li>
                    <li><a href="about.html">About</a></li>
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