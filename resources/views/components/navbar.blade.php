<nav class="topnav" id="myTopnav">
    <div style="padding-left: 66px" class="logo">
        <img src="/gambar/logo.svg" class="logo">
    </div>
    <ul style="margin-top: 1.1rem">
        <li><a style="font-weight: 400;" class="text-decoration-none" href="{{ url('/') }}">BERANDA</a></li>
        <li><a style="font-weight: 400;" class="text-decoration-none" href="{{ url('artikel') }}">ARTIKEL</a></li>
        <li><a style="font-weight: 400;" class="text-decoration-none" href="{{ url('desease') }}">DETEKSI PENYAKIT</a></li>
        <li><a style="font-weight: 400;" class="text-decoration-none" href="{{ url('rekomendasi') }}">REKOMENDASI TANAMAN</a></li>
        <li class="login"><a href="#">Login</a></li>
    </ul>
    
    <div style="padding-right: 66px" class="buttons">
        <a href="{{ url('login') }}" class="loginmen">Log out</a>
    </div>
</nav>