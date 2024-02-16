@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>BloomUp</title>
    <link rel="shortcut icon" href="/gambar/logo.svg" type="image/x-icon">
    <!---CSS File!--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/homestyle.css" />
    
  </head>

  <body>
    @include('components.navbar')
     
    <div class="content">
      <div class="textdec">
        <p style="color: var(--homesecol);font-size: 65px;font-weight: 500">Perawatan Tanaman</p>
        <p class="deskripsi">
          Rawatlah tanaman Anda dan buatlah <br/>tanaman Anda mekar dengan indah
          {{-- Take care of your plants and make<br />them bloom beautifully --}}
        </p>
      </div>
      <div class="roundedbiru">
        <div class="rectangle">
          <div class="gambar">
            <img src="/gambar/bungabesar.png" class="bungabesar">
            <img src="/gambar/bungakecil.png" class="bungakecil">
          </div>
        </div>
      </div>
    </div>

    <div class="article">
      <div style="display: flex;">
        <div style="flex: 1; padding: 10px;">
          <p class="articlestext">Artikel</p>
        </div>
        <div style="display: flex; justify-content: flex-end; flex: 2; padding: 10px;">
          <a href="{{ url('artikel') }}" class="button_bawah" style="text-decoration: None">Lihat Semua</a>
        </div>
      </div>

      <div style="display: flex;">
        <div style="flex: 1; padding: 10px;">
          @foreach($news as $article)
              <div class="gambar-container">
                <img src={{ $article['image'] }} alt="Image 1" class="gambar-gelap">
                <div class="teks-di-gambar tanggal">{{ Carbon::parse($article['publishedAt'])->isoFormat('DD MMM YYYY') }}</div>
                <div class="teks-di-gambar judul-artikel deskripsi_singkat">{{ $article['title'] }}</div>
                <a class="button text-decoration-none" href={{ $article['url'] }}>Baca Selengkapnya</a>
              </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="container-grid">
      <div class="kolom">
        <p class="articlestext">Deteksi Penyakit</p>
        <div style="display: flex;">
          <div style="flex: 1; padding: 10px;">
            <img src="/gambar/DP.png">
          </div>
          <div style="flex: 2; padding: 10px;">
            <p class="articlestext" style="font-size: 22px">
              Ketahui penyakit yang ada pada tanaman anda dan temukan solusinya
            </p>
            <a class="button_bawah text-decoration-none">Pergi ke Halaman</a>
          </div>
        </div>
      </div>
      <div class="kolom">
        <p class="articlestext">Rekomendasi Tanaman</p>
        <div style="display: flex;">
          <div style="flex: 1; padding: 10px;">
            <img src="/gambar/RT.png">
          </div>
          <div style="flex: 2; padding: 10px;">
            <p class="articlestext" style="font-size: 22px">
              Temukan tanaman terbaik sesuai dengan kategori yang Anda inginkan
            </p>
            <a class="button_bawah text-decoration-none" href="/rekomendasi">Pergi ke Halaman</a>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Ambil semua elemen dengan class "articlestext"
      var articles = document.querySelectorAll(".deskripsi_singkat");
    
      // Batasi jumlah karakter maksimal untuk setiap elemen
      var maxLength = 60;
    
      // Loop melalui setiap elemen dan potong teks jika melebihi jumlah karakter maksimal
      articles.forEach(function(article) {
        var trimmedText = article.innerText.length > maxLength ? article.innerText.substring(0, maxLength) + "..." : article.innerText;
        article.innerText = trimmedText;
      });
    </script>
  </body>
</html>
