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
    <link rel="stylesheet" href="/css/artikelstyle.css" />
  </head>

  <body>
    <body>
      @include('components.navbar')
    
    <div class="wrapper">
        <div class="label">Cari Artikel</div>
        <form action="{{ route('artikel.search') }}" method="GET">
            <div class="searchBar">
            <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Cari Artikel" value="" />
            <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                </svg>
            </button>
            </div>
        </form>
    </div>
      
    <div class="container" id="awal" style="padding-left: -20%;">
        <div class="row">
        <div class="col">
            <p class="articlestext">Artikel Terbaru</p>
            @foreach($news as $article)
                <div class="d-inline-block me-1 mb-2" style="width: 16rem;">
                    <img src={{ $article['image'] }} class="w-100 mx-auto d-block" style="border-radius: 20px;" alt="Image 4">
                    <a href={{ $article['url'] }} class="articlestext title_singkat" style="font-size: 20px;">{{ $article['title'] }}</a>
                    <p class="articlestext deskripsi_singkat" style="font-size: 15px; padding-top: 5px;">{{ $article['description'] }}</p>
                    <p class="tanggalartikel" style="font-size: 15px;">Daily Plant • {{ Carbon::parse($article['publishedAt'])->isoFormat('DD MMM YYYY') }}</p>
                </div>
            @endforeach
        </div>
        </div>
      </div>
    </div>

    <script>
      // Ambil semua elemen dengan class "articlestext"
      var articles = document.querySelectorAll(".deskripsi_singkat");
      var title = document.querySelectorAll(".title_singkat");
    
      // Batasi jumlah karakter maksimal untuk setiap elemen
      var maxLength = 79;
    
      // Loop melalui setiap elemen dan potong teks jika melebihi jumlah karakter maksimal
      articles.forEach(function(article) {
        var trimmedText = article.innerText.length > maxLength ? article.innerText.substring(0, maxLength) + "..." : article.innerText;
        article.innerText = trimmedText;
      });

      title.forEach(function(title) {
        var trimText = title.innerText.length > 30 ? title.innerText.substring(0, 30) + "..." : title.innerText;
        title.innerText = trimText;
      });
    </script>
    <script>
        document.getElementById('searchResults').style.display = 'none';
    </script>
    <script>
        // Ajax untuk mengirimkan permintaan pencarian
        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
    
            var query = document.querySelector('input[name="query"]').value;
    
            fetch('{{ route("artikel.search") }}?query=' + query)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('searchResults').innerHTML = data;
                });
        });
    </script>

  </body>
</html>