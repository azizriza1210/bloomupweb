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
    <link rel="stylesheet" href="/css/rekomendasi.css" />
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

    <div class="rekomendasi">
        <div style="display: flex;">
          <div style="flex: 1;">
            <div class="card_2">
                <div class="card-content_2">
                    <p class="filtertexthead">Filter</p><hr>
                    <p class="filtertextcontent" style="padding-top: 5px;">Berdasarkan Jenis</p>
                    <a href="{{ url('artikel') }}" class="button_filter d-inline-block mb-2 text-decoration-none" >Obat</a>
                    <a href="{{ url('artikel') }}" class="button_filter d-inline-block mb-2 text-decoration-none">Hias</a>
                    <a href="{{ url('artikel') }}" class="button_filter d-inline-block mb-2 text-decoration-none">Buah</a>
                    <a href="{{ url('artikel') }}" class="button_filter d-inline-block mb-2 text-decoration-none">Sayur</a>
                    <p class="filtertextcontent" style="padding-top: 40px;">Berdasarkan Tempat</p>
                    <a href="{{ url('artikel') }}" class="button_filter d-inline-block mb-2 text-decoration-none" >Tanah</a>
                    <a href="{{ url('artikel') }}" class="button_filter d-inline-block mb-2 text-decoration-none">Pot</a>
                </div>
            </div>
          </div>
          <div style="display: flex; flex: 2; padding: 10px;">
            <div class="container">
              <div class="row">
                <div class="col">
                  <p class="articlestext">Rekomendasi</p>
                  <div class="card d-inline-block me-1 mb-2 rounded-5" style="width: 12rem;">
                    <img src="/gambar/jasmine 1.png" class="card-img-top w-50 mx-auto d-block" alt="...">
                    <div class="card-body rounded-bottom-5 text-center" style="background-color: #0D3824;">
                      <p class="card-text fs-4" style="color: #CCFCBB;">Melati</p>
                    </div>
                  </div>
                  <div class="card d-inline-block me-1 mb-2 rounded-5" style="width: 12rem;">
                    <img src="/gambar/aglaonema.png" class="card-img-top w-50 mx-auto d-block" alt="...">
                    <div class="card-body rounded-bottom-5 text-center" style="background-color: #0D3824;">
                      <p class="card-text fs-4" style="color: #CCFCBB;">Aglaonema</p>
                    </div>
                  </div>
                  <div class="card d-inline-block me-1 mb-2 rounded-5" style="width: 12rem;">
                    <img src="/gambar/lidah_buaya.png" height="124px" class="card-img-top w-75 mx-auto d-block" alt="...">
                    <div class="card-body rounded-bottom-5 text-center" style="background-color: #0D3824;">
                      <p class="card-text fs-4" style="color: #CCFCBB;">Lidah Buaya</p>
                    </div>
                  </div>
                  <div class="card d-inline-block me-1 mb-2 rounded-5" style="width: 12rem;">
                    <img src="/gambar/lidah_mertua.png" height="124px" class="card-img-top w-50 mx-auto d-block" alt="...">
                    <div class="card-body rounded-bottom-5 text-center" style="background-color: #0D3824;">
                      <p class="card-text fs-4" style="color: #CCFCBB;">Lidah Mertua</p>
                    </div>
                  </div>
                  <div class="card d-inline-block me-1 mb-2 rounded-5" style="width: 12rem;">
                    <img src="/gambar/jasmine 1.png" class="card-img-top w-50 mx-auto d-block" alt="...">
                    <div class="card-body rounded-bottom-5 text-center" style="background-color: #0D3824;">
                      <p class="card-text fs-4" style="color: #CCFCBB;">Melati</p>
                    </div>
                  </div>
                  <div class="card d-inline-block me-1 mb-2 rounded-5" style="width: 12rem;">
                    <img src="/gambar/aglaonema.png" class="card-img-top w-50 mx-auto d-block" alt="...">
                    <div class="card-body rounded-bottom-5 text-center" style="background-color: #0D3824;">
                      <p class="card-text fs-4" style="color: #CCFCBB;">Aglaonema</p>
                    </div>
                  </div>
                  <div class="card d-inline-block me-1 mb-2 rounded-5" style="width: 12rem;">
                    <img src="/gambar/lidah_buaya.png" height="124px" class="card-img-top w-75 mx-auto d-block" alt="...">
                    <div class="card-body rounded-bottom-5 text-center" style="background-color: #0D3824;">
                      <p class="card-text fs-4" style="color: #CCFCBB;">Lidah Buaya</p>
                    </div>
                  </div>
                  <div class="card d-inline-block me-1 mb-2 rounded-5" style="width: 12rem;">
                    <img src="/gambar/lidah_mertua.png" height="124px" class="card-img-top w-50 mx-auto d-block" alt="...">
                    <div class="card-body rounded-bottom-5 text-center" style="background-color: #0D3824;">
                      <p class="card-text fs-4" style="color: #CCFCBB;">Lidah Mertua</p>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
