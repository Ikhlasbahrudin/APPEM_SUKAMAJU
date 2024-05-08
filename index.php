<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>appem</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="logo/logo.png" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        integrity="sha512-3C06yPgWTKgZ6b6Uj2yBnJXDT0ejHGO8ywjWtZX3ePh9Rfw/LTALB99OvBMk2Sy0x9EasqB6OxqvaCwzFbW6qA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="path/to/bootstrap.min.css" rel="stylesheet">


    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Tambahkan Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
    /* Gaya tambahan untuk teks */
    .text-hover-effect {
        transition: all 0.3s ease;
    }



    /* Mengubah warna teks saat diinteraksi dengan kursor */
    .text-hover-effect:hover {
        color: #dba514;
        /* Warna biru saat diinteraksi dengan kursor */
    }


    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 */
        height: 0;
        overflow: hidden;
        max-width: 100%;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* CSS untuk membuat gambar responsif */
    .post-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Gambar akan mengisi kontainer tetapi tetap mempertahankan aspek rasio */
    }
    </style>



    <!-- =======================================================
  * Template Name: UpConstruction
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>desa sukamaju<span>.</span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#Blog" onclick="scrollToContact()">blog</a></li>
                    <li><a href="#Berita" onclick="scrollToContact()">berita</a></li>
                    <li><a href="#contact" onclick="scrollToContact()">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>


    </header>

    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center" style="color: white;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <img src="logo/logo.png" alt="Logo Desa Sukamaju" data-aos="fade-down" width="150" height="150">
                        <td></td>
                        <h1 data-aos="fade-up">SELAMAT DATANG </h1>
                        <p> "Ada masalah di Desa Sukamaju yang perlu kami tangani? Segera laporkan! Ayok, adukan
                            sekarang untuk solusi cepat."</p>
                        <a data-aos="fade-up" data-aos-delay="100" href="#login"
                            class="btn-get-started btn-warning">Mulai</a>

                    </div>
                </div>
            </div>
        </div>

        </div>


        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active"
                style="background-image: url(assets/img/hero-carousel/hero-carousel-9.jpg)"></div>
            <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-8.jpg)">
            </div>
            <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-10.jpg)">
            </div>
            <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-6.jpg)">
            </div>
            <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-7.jpg)">
            </div>


            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- End Hero Section -->

    <main id="login">

        <!-- ======= Get Started Section login ======= -->
        <section id="get-started" class="get-started section-bg">
            <div class="container">
                <div class="row justify-content-between gy-4">
                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                        <div class="content">
                            <h3>Silahkan masukan username dan password anda</h3>
                            <p>Berikut adalah kolom login untuk masyarakat
                            <p>jika anda <strong>petugas/admin</strong> silahkan login sesuai petunjuk yang sudah ada
                                terimakasih.</p>

                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade">
                        <div class="card shadow">
                            <div class="card-body">
                                <h3 class="card-title text-center mb-4">Lgin Masyarakat</h3>
                                <hr>
                                <form class="user" method="post" action="cek_login.php">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" class="form-control"
                                            placeholder="Masukan Username"
                                            onkeypress="return handleEnter(event, 'password')" />
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Password"
                                                onkeypress="return handleEnter(event, 'submit')" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-eye" id="togglePassword"
                                                        onclick="togglePassword()"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-block btn-outline-warning btn-lg"
                                            value="Login">

                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <h7 class="text-muted mb-2">Belum punya akun?</h7>
                                </div>
                                <div class="row justify-content-center mt-2">
                                    <div class="col-lg-6 text-center">
                                        <a class="btn btn-block btn-outline-warning btn-lg" href="register.php">Buat
                                            Akun</a><br>


                                        <a class="text-muted btn btn-link" href="index2.php"
                                            onclick="scrollToSection()"> <span class="text-hover-effect">Masuk sebagai
                                                admin/petugas</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    </div><!-- End Quote Form -->

    </div>

    </div>
    </section><!-- End Get Started Section -->

    <!-- About Section-->
    <section class="page-section bg-white text-black mb-0 shadow" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-black">About</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- About Section Content-->
            <div class="row shadow p-3 mb-5 bg-body rounded">
                <div class="col-lg-4 ms-auto">
                    <p class="lead">Desa merupakan bentuk pemerintahan terkecil atau instansi terkecil dari seluruh
                        instansi yang ada di Indonesia. Terdapat banyak desa di Indonesia termasuk di provinsi Jawa
                        Barat, Kabupaten Cianjur. Salah satunya adalah desa Sukamaju yang terletak di Kabupaten Cianjur,
                        Kecamatan Cianjur. Salah satu sarana penting di desa adalah pelayanan publik yang mencakup
                        berbagai kegiatan untuk memenuhi kebutuhan Masyarakat. </p>
                </div>
                <div class="col-lg-4 me-auto">
                    <p class="lead">penerapan teknologi dimanfaatkan sebagai upaya peningkatan pelayanan pengaduan
                        masyarakat berbasis online. Masyarakat yang akan melakukan pengaduan kepada pejabat yang
                        berwenang hanya perlu mengakses sistem pengaduan dimana saja dan kapan saja tanpa terhalang
                        waktu. </p>
                </div>


            </div>
            <section id="contact" class="contact">
                <div class="container">
                    <div class="section-title">
                        <h2>Contact</h2>
                        <p>
                            Anda masih bingung terkait penggunaan aplikasi atau anda ingin berkosultasi langsung
                            ke kantor desa berikut alamat lengkat dan kontak kami terimakasih
                        </p>
                    </div>

                    <div class="row" data-aos="fade-in">
                        <!-- Kolom identitas -->
                        <div class="col-lg-5 d-flex flex-column align-items-stretch">
                            <div class="info">
                                <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>desa sukamaju, kec. cianjur</p>
                                </div>

                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>info@example.com</p>
                                </div>

                                <div class="phone">
                                    <i class="bi bi-telephone"></i>
                                    <h4>Call:</h4>
                                    <p>+62 87731375513</p>
                                </div>
                                <div class="social-media">
                                    <h4>Social media</h4>
                                    <div class="social-links d-flex">
                                        <a href="#" class="social-link me-3"><i class="bi bi-twitter"></i></a>
                                        <a href="#" class="social-link me-3"><i class="bi bi-facebook"></i></a>
                                        <a href="#" class="social-link me-3"><i class="bi bi-instagram"></i></a>
                                        <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Kolom identitas -->

                        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                            <div id="map" style="width:100%; height:320px;"></div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="Blog" class="recent-blog-posts">
                <div class="container" data-aos="fade-up">
                    <h1>BLOG</h1>
                    <?php
        // Fungsi untuk mendapatkan ID video YouTube dari URL
        function parseYoutubeVideoId($url) {
            // Menentukan pola pencarian ID video YouTube dari URL
            $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

            // Mencocokkan pola pada URL video YouTube
            preg_match($pattern, $url, $matches);

            // Mengembalikan ID video jika ditemukan, jika tidak, kembalikan null
            return isset($matches[1]) ? $matches[1] : null;
        }

        // Sertakan file koneksi ke database
        include('koneksi.php');

        // Query untuk mengambil data postingan dari tabel posts
        $query = "SELECT * FROM posts";
        $result = mysqli_query($koneksi, $query);

        // Periksa apakah ada data postingan
        if(mysqli_num_rows($result) > 0) { ?>
                    <div id="postCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                    $num_columns = 4; // Jumlah kolom yang ingin ditampilkan
                    $num_posts = mysqli_num_rows($result);
                    $num_slides = ceil($num_posts / $num_columns);
                    $counter = 0;

                    for ($i = 0; $i < $num_slides; $i++) {
                        echo '<div class="carousel-item';
                        if ($i == 0) echo ' active'; // Tandai slide pertama sebagai aktif
                        echo '">';

                        echo '<div class="row gx-4">';

                        for ($j = 0; $j < $num_columns; $j++) {
                            $post = mysqli_fetch_assoc($result);
                            if (!$post) break; // Keluar dari loop jika tidak ada lagi postingan

                            $thumbnail = $post['thumbnail'];
                            $title = $post['title'];
                            $author = $post['author'];
                            $category = $post['category'];
                            $content = $post['content'];
                            $postDate = $post['post_date'];

                            // Menampilkan postingan
                            echo '<div class="col-lg-3 col-md-4 mb-4 post-column" data-aos="fade-up" data-aos-delay="100">
                                    <div class="post-item position-relative h-100">
                                        <div class="post-img position-relative overflow-hidden" style="height: 200px;">
                                            <img src="assets/img/post/' . $thumbnail . '" class="img-fluid rounded" alt="">
                                            <span class="post-date">' . date("F j", strtotime($postDate)) . '</span>
                                        </div>

                                        <div class="post-content d-flex flex-column align-items-center">
                                            <h3 class="post-title text-center">' . $title . '</h3>

                                            <div class="meta d-flex align-items-center mt-auto">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i> <span class="ps-2">' . $author . '</span>
                                                </div>
                                                <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-collection-play"></i> <span class="ps-2">' . $category . '</span>
                                                </div>
                                            </div>

                                            <hr>';

                            // Periksa apakah konten berisi tautan video YouTube
                            if (strpos($content, 'youtube.com/watch?v=') !== false) {
                                $video_url = explode(" ", $content)[0];
                                $video_id = parseYoutubeVideoId($video_url);
                                echo '<button class="btn btn-secondary mt-auto btn-slide-left" onclick="playVideo(\'' . $video_id . '\')">Lihat Video</button>';
                            }

                            echo '</div>
                                  </div>
                                  </div>';
                            $counter++;
                        }

                        echo '</div></div>';
                    }
                    ?>
                        </div>
                        <!-- Indikator Slide -->
                        <ol class="carousel-indicators mb-3">
                            <?php for ($i = 0; $i < $num_slides; $i++) : ?>
                            <li data-bs-target="#postCarousel" data-bs-slide-to="<?php echo $i; ?>"
                                <?php if ($i == 0) echo 'class="active"'; ?> onclick="goToSlide(<?php echo $i; ?>)">
                            </li>
                            <?php endfor; ?>
                        </ol>

                        <!-- Tombol Next dan Back dengan Icon -->
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button class="btn btn-secondary me-2" onclick="prevSlide()">
                                <i class="bi bi-chevron-double-left"></i>
                            </button>

                            <button class="btn btn-secondary" onclick="nextSlide()">
                                <i class="bi bi-chevron-double-right"></i>
                            </button>
                        </div>
                    </div>
                    <?php } else {
            // Jika tidak ada data postingan
            echo "<p>Tidak ada postingan yang tersedia.</p>";
        } ?>
                </div>

                <!-- Memutar video -->
                <script>
                function playVideo(videoId) {
                    // Scroll ke bawah ke container video
                    const videoContainer = document.getElementById('video-container');
                    videoContainer.style.display = 'block'; // Tampilkan container video jika tersembunyi
                    videoContainer.scrollIntoView({
                        behavior: 'smooth'
                    }); // Scrol ke bawah dengan efek halus

                    // Mulai pemutaran video
                    const videoFrame = document.getElementById('video-frame');
                    videoFrame.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                }

                function closeVideo() {
                    // Hentikan pemutaran video
                    const videoFrame = document.getElementById('video-frame');
                    videoFrame.src = '';

                    // Sembunyikan container video
                    const videoContainer = document.getElementById('video-container');
                    videoContainer.style.display = 'none';
                }

                function prevSlide() {
                    const carousel = new bootstrap.Carousel(document.getElementById('postCarousel'));
                    carousel.prev();
                }

                function nextSlide() {
                    const carousel = new bootstrap.Carousel(document.getElementById('postCarousel'));
                    carousel.next();
                }

                function goToSlide(slideIndex) {
                    const carousel = new bootstrap.Carousel(document.getElementById('postCarousel'));
                    carousel.to(slideIndex);
                }
                </script>

                <!-- Tempatkan iframe di bawah -->
                <div class="container mt-5" id="video-container" style="display: none;">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="video-container">
                                <iframe id="video-frame" width="560" height="315" src="" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                            <button type="button" class="btn-close btn btn-danger mt-3" aria-label="Close"
                                onclick="closeVideo()"></button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section berita-->
            <section id="Berita" class="recent-blog-posts">
                <div class="container" data-aos="fade-up">
                    <h1>Berita</h1>
                    <?php
        // Sertakan file koneksi ke database
        include('koneksi.php');

        // Query untuk mengambil data berita dari tabel berita
        $query = "SELECT * FROM berita";
        $result = mysqli_query($koneksi, $query);

        // Periksa apakah ada data berita
        if(mysqli_num_rows($result) > 0) { ?>
                    <div id="postCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                    $num_columns = 4; // Jumlah kolom yang ingin ditampilkan
                    $num_posts = mysqli_num_rows($result);
                    $num_slides = ceil($num_posts / $num_columns);
                    $counter = 0;

                    for ($i = 0; $i < $num_slides; $i++) {
                        echo '<div class="carousel-item';
                        if ($i == 0) echo ' active'; // Tandai slide pertama sebagai aktif
                        echo '">';

                        echo '<div class="row gx-4">';

                        for ($j = 0; $j < $num_columns; $j++) {
                            $berita = mysqli_fetch_assoc($result);
                            if (!$berita) break; // Keluar dari loop jika tidak ada lagi berita

                            $thumbnail = $berita['thumbnail'];
                            $judul = $berita['judul'];
                            $penulis = $berita['penulis'];
                            $kategori = $berita['kategori'];
                            $konten = $berita['konten'];
                            $tanggal_publikasi = $berita['tanggal_publikasi'];

                            // Menampilkan berita
                            echo '<div class="col-lg-3 col-md-4 mb-4 post-column" data-aos="fade-up" data-aos-delay="100">
        <div class="post-item position-relative h-100">
            <div class="post-img position-relative overflow-hidden" style="height: 200px;">
                <img src="assets/img/berita/' . $thumbnail . '" class="img-fluid rounded" alt="">
                <span class="post-date">' . date("F j", strtotime($tanggal_publikasi)) . '</span>
            </div>

            <div class="post-content d-flex flex-column align-items-center">';
                // Memeriksa panjang judul
                if (strlen($judul) > 10) {
                    $judul_potong = substr($judul, 0, 10) . '...';
                } else {
                    $judul_potong = $judul;
                }

                echo '<h3 class="post-title text-center">' . $judul_potong . '</h3>';
                
                echo '<div class="meta d-flex align-items-center mt-auto">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person"></i> <span class="ps-2">' . $penulis . '</span>
                    </div>
                    <span class="px-3 text-black-50">/</span>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-collection-play"></i> <span class="ps-2">' . $kategori . '</span>
                    </div>
                </div>

                <button type="button" class="btn btn-primary mt-3" onclick="showContent(`' . $konten . '`)">Tampilkan Konten</button>
            </div>
        </div>
    </div>';
                            $counter++;
                        }

                        echo '</div></div>';
                    }
                    ?>
                        </div>
                        <!-- Indikator Slide -->
                        <ol class="carousel-indicators mb-3">
                            <?php for ($i = 0; $i < $num_slides; $i++) : ?>
                            <li data-bs-target="#postCarousel" data-bs-slide-to="<?php echo $i; ?>"
                                <?php if ($i == 0) echo 'class="active"'; ?> onclick="goToSlide(<?php echo $i; ?>)">
                            </li>
                            <?php endfor; ?>
                        </ol>

                        <!-- Tombol Next dan Back dengan Icon -->
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button class="btn btn-secondary me-2" onclick="prevSlide()">
                                <i class="bi bi-chevron-double-left"></i>
                            </button>

                            <button class="btn btn-secondary" onclick="nextSlide()">
                                <i class="bi bi-chevron-double-right"></i>
                            </button>
                        </div>
                    </div>
                    <?php } else {
            // Jika tidak ada data berita
            echo "<p>Tidak ada berita yang tersedia.</p>";
        } ?>

                    <!-- Modal untuk menampilkan konten -->
                    <div class="modal fade" id="contentModal" tabindex="-1" aria-labelledby="contentModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="contentModalLabel">Konten Berita</h5>
                                </div>
                                <div class="modal-body" id="content-frame" style="max-height: 300px; overflow-y: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <script>
            // Fungsi untuk menampilkan teks konten berita saat thumbnail diklik
            function showContent(content) {
                // Isi konten frame dengan teks konten dari database
                var contentFrame = document.getElementById('content-frame');
                contentFrame.innerHTML = content;
                // Tampilkan modal
                var contentModal = new bootstrap.Modal(document.getElementById('contentModal'));
                contentModal.show();
            }
            </script>






            </main><!-- End #main -->

            <!-- ======= Footer ======= -->
            <footer id="footer" class="footer">

                <div class="footer-content position-relative">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-4 col-md-6">
                                <div class="footer-info">
                                    <h3>Footer</h3>
                                    <p>
                                        Desa Sukamaju <br>
                                        Admin<br><br>
                                        <strong>Phone:</strong> +1 5589 55488 55<br>
                                        <strong>Email:</strong> info@example.com<br>
                                    </p>
                                    <div class="social-links d-flex mt-3">
                                        <a href="#" class="d-flex align-items-center justify-content-center"><i
                                                class="bi bi-twitter"></i></a>
                                        <a href="#" class="d-flex align-items-center justify-content-center"><i
                                                class="bi bi-facebook"></i></a>
                                        <a href="#" class="d-flex align-items-center justify-content-center"><i
                                                class="bi bi-instagram"></i></a>
                                        <a href="#" class="d-flex align-items-center justify-content-center"><i
                                                class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div><!-- End footer info column-->

                            <div class="col-lg-2 col-md-3 footer-links">
                                <h4>contact</h4>
                                <ul>
                                    <li><a href="#contact">contact</a></li>

                                </ul>
                            </div><!-- End footer links column-->

                            <div class="col-lg-2 col-md-3 footer-links">
                                <h4>About</h4>
                                <ul>
                                    <li><a href="#about">about</a></li>

                                </ul>
                            </div><!-- End footer links column-->

                            <div class="col-lg-2 col-md-3 footer-links">
                                <h4>login</h4>
                                <ul>
                                    <li><a href="#login">login</a></li>

                                </ul>
                            </div><!-- End footer links column-->

                            <div class="col-lg-2 col-md-3 footer-links">
                                <h4>home</h4>
                                <ul>
                                    <li><a href="#header">home</a></li>
                                    <li><a href="#Blog">Blog</a></li>


                                </ul>
                            </div><!-- End footer links column-->

                        </div>
                    </div>
                </div>

                <div class="footer-legal text-center position-relative">
                    <div class="container">
                        <div class="copyright">
                            &copy; Copyright <strong><span>ikhlas bahrudin</span></strong>
                        </div>
                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->

                        </div>
                    </div>
                </div>

            </footer>
            <!-- End Footer -->

            <a href="#header" class="scroll-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i>
            </a>

            <div id="preloader"></div>


            <!-- Vendor JS Files -->
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/aos/aos.js"></script>
            <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
            <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
            <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
            <script src="assets/vendor/php-email-form/validate.js"></script>

            <!-- Template Main JS File -->
            <script src="assets/js/main.js"></script>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <script>
            // Fungsi untuk menangani pengalihan dan pengguliran ke sesi yang dituju
            function scrollToSection() {
                var targetSection = document.getElementById("login");
                // Menggunakan animasi pengguliran halus
                window.scrollTo({
                    top: targetSection.offsetTop,
                    behavior: "smooth"
                });
            }
            </script>


            <script>
            // Function untuk melihat masswprd
            function togglePassword() {
                var passwordInput = document.getElementById("password");
                var toggleIcon = document.getElementById("togglePassword");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    toggleIcon.classList.remove("fa-eye");
                    toggleIcon.classList.add("fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    toggleIcon.classList.remove("fa-eye-slash");
                    toggleIcon.classList.add("fa-eye");
                }
            }

            // Function to handle form submission on Enter key press
            function handleEnter(event, nextInput) {
                if (event.key === "Enter") {
                    if (nextInput === "submit") {
                        document.getElementById("loginForm").submit();
                    } else {
                        document.getElementById(nextInput).focus();
                    }
                    return false; // Prevent form submission
                }
                return true;
            }

            // Event listener for password visibility toggle
            document.getElementById("togglePassword").addEventListener("click", togglePassword);

            // Check if there are values saved in localStorage for username and password
            document.addEventListener('DOMContentLoaded', function() {
                var savedUsername = localStorage.getItem('savedUsername');
                var savedPassword = localStorage.getItem('savedPassword');

                // Insert saved values into input if they exist
                if (savedUsername) {
                    document.getElementById('username').value = savedUsername;
                }
                if (savedPassword) {
                    document.getElementById('password').value = savedPassword;
                }
            });

            // Save username and password values to localStorage when user changes them
            document.getElementById('username').addEventListener('input', function() {
                localStorage.setItem('savedUsername', this.value);
            });
            document.getElementById('password').addEventListener('input', function() {
                localStorage.setItem('savedPassword', this.value);
            });

            // Clear username and password values when user logs out or leaves the page
            window.addEventListener('beforeunload', function() {
                localStorage.removeItem('savedUsername');
                localStorage.removeItem('savedPassword');
            });
            </script>

            <script>
            function scrollAndPlayVideo(videoId) {
                // Scroll ke bawah ke container video
                const videoContainer = document.getElementById('video-container');
                videoContainer.style.display = 'block'; // Tampilkan container video jika tersembunyi
                videoContainer.scrollIntoView({
                    behavior: 'smooth'
                }); // Scrol ke bawah dengan efek halus

                // Mulai pemutaran video
                const videoFrame = document.getElementById('video-frame');
                videoFrame.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            }

            function closeVideo() {
                // Hentikan pemutaran video
                const videoFrame = document.getElementById('video-frame');
                videoFrame.src = '';

                // Sembunyikan container video
                const videoContainer = document.getElementById('video-container');
                videoContainer.style.display = 'none';
            }
            </script>
            <!-- Panggil pustaka Google Maps JavaScript API -->
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi-odF-Gt01kILpD8eq9dxlpqMwgLLRS4&callback=initMap"
                async defer></script>

            <!-- JavaScript untuk menampilkan peta dan marker -->
            <script>
            // Fungsi initMap akan dipanggil setelah pustaka Google Maps dimuat
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 20,
                    center: {
                        lat: -6.838084,
                        lng: 107.146801
                    }
                });

                var marker = new google.maps.Marker({
                    position: {
                        lat: -6.838084,
                        lng: 107.146801
                    },
                    map: map,
                    title: 'Jl.Tugu Desa Sukamaju, Kec. Cianjur'
                });

                // Tambahkan kontrol pilihan tampilan peta
                var mapTypeControlDiv = document.createElement('div');
                var mapTypeControl = new google.maps.MapTypeControl();

                mapTypeControlDiv.appendChild(mapTypeControl.setMap(map));

                map.controls[google.maps.ControlPosition.TOP_RIGHT].push(mapTypeControlDiv);

                // Tambahkan kontrol zoom
                var zoomControlDiv = document.createElement('div');
                var zoomControl = new google.maps.ZoomControl();

                zoomControlDiv.appendChild(zoomControl.setMap(map));

                map.controls[google.maps.ControlPosition.TOP_LEFT].push(zoomControlDiv);
            }
            </script>

</body>

</html>