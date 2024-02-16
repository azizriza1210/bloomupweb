<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>BloomUp</title>
    <link rel="shortcut icon" href="/gambar/logo.svg" type="image/x-icon">
    <!---CSS File!--->
    <link rel="stylesheet" href="/css/artikelstyle.css" />
  </head>

  <body>
    <body>
      @include('components.navbar')
    
    <div class="wrapper">
        <div class="label">Cari Artikel</div>
        <div class="searchBar">
          <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Cari Artikel" value="" />
          <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
            </svg>
          </button>
        </div>
    </div>

    <div class="article">
      <div style="display: flex;">
        <div style="flex: 1; padding: 10px;">
          <p class="articlestext">Artikel Teratas</p>
        </div>
        <div style="display: flex; justify-content: flex-end; flex: 2; padding: 10px;">
          <a href="{{ url('artikel') }}" class="button_bawah" style="text-decoration: None">Lihat Semua</a>
        </div>
      </div>

      <div class="carousel">

        <div class="carousel-inner">
          <div class="carousel-item">
            <div class="gambar-container">
              <img src="/gambar/artikel.png" alt="Image 1" class="gambar-gelap">
              <div class="teks-di-gambar tanggal">11 November 2023</div>
              <div class="teks-di-gambar judul-artikel">Panduan pemula untuk merawat tanaman anggrek</div>
              <button class="button">Baca Selengkapnya</button>
            </div>
            <img src="/gambar/artikel.png" alt="Image 2">
            <img src="/gambar/artikel.png" alt="Image 3">
          </div>
          <!-- Tambahkan slide sesuai kebutuhan -->
        </div>
      </div>
    </div>

    <div class="article">
      <p class="articlestext">Artikel Terbaru</p>
      <div class="container-flex">
        <div class="kolom">
          <img src="/gambar/artikel.png" style="width: 280px; height: 220px;" alt="Image 1">
          <a href="#" class="articlestext" style="font-size: 20px;">Cara Menanam & Merawat Melati</a>
          <p class="articlestext deskripsi_singkat" style="font-size: 15px; padding-top: 5px;">Melati (Jasmine polyanthum) adalah tanaman merambat yang kuat dengan bunga putih dan merah muda yang beraroma manis sepanjang musim semi dan musim panas. Melati lebih menyukai sinar matahari penuh atau tempat teduh di tanah yang lembab....</p>
          <p class="tanggalartikel" style="font-size: 15px;">Daily Plant • 22 Oktober 2023</p>
        </div>
        <div class="kolom">
          <img src="/gambar/artikel.png" style="width: 280px; height: 220px;" alt="Image 2">
          <a href="#" class="articlestext" style="font-size: 20px;">Cara Menanam & Merawat Melati</a>
          <p class="articlestext deskripsi_singkat" style="font-size: 15px; padding-top: 5px;">Melati (Jasmine polyanthum) adalah tanaman merambat yang kuat dengan bunga putih dan merah muda yang beraroma manis sepanjang musim semi dan musim panas. Melati lebih menyukai sinar matahari penuh atau tempat teduh di tanah yang lembab....</p>
          <p class="tanggalartikel" style="font-size: 15px;">Daily Plant • 22 Oktober 2023</p>
        </div>
        <div class="kolom">
          <img src="/gambar/artikel.png" style="width: 280px; height: 220px;" alt="Image 3">
          <a href="#" class="articlestext" style="font-size: 20px;">Cara Menanam & Merawat Melati</a>
          <p class="articlestext deskripsi_singkat" style="font-size: 15px; padding-top: 5px;">Melati (Jasmine polyanthum) adalah tanaman merambat yang kuat dengan bunga putih dan merah muda yang beraroma manis sepanjang musim semi dan musim panas. Melati lebih menyukai sinar matahari penuh atau tempat teduh di tanah yang lembab....</p>
          <p class="tanggalartikel" style="font-size: 15px;">Daily Plant • 22 Oktober 2023</p>
        </div>
        <div class="kolom">
          <img src="/gambar/artikel.png" style="width: 280px; height: 220px;" alt="Image 4">
          <a href="#" class="articlestext" style="font-size: 20px;">Cara Menanam & Merawat Melati</a>
          <p class="articlestext deskripsi_singkat" style="font-size: 15px; padding-top: 5px;">Melati (Jasmine polyanthum) adalah tanaman merambat yang kuat dengan bunga putih dan merah muda yang beraroma manis sepanjang musim semi dan musim panas. Melati lebih menyukai sinar matahari penuh atau tempat teduh di tanah yang lembab....</p>
          <p class="tanggalartikel" style="font-size: 15px;">Daily Plant • 22 Oktober 2023</p>
        </div>
      </div>
    </div>

    <script>
      // Ambil semua elemen dengan class "articlestext"
      var articles = document.querySelectorAll(".deskripsi_singkat");
    
      // Batasi jumlah karakter maksimal untuk setiap elemen
      var maxLength = 100;
    
      // Loop melalui setiap elemen dan potong teks jika melebihi jumlah karakter maksimal
      articles.forEach(function(article) {
        var trimmedText = article.innerText.length > maxLength ? article.innerText.substring(0, maxLength) + "..." : article.innerText;
        article.innerText = trimmedText;
      });
    </script>

  </body>
</html>