<div class="col-lg-12 col-12">
    <div class="scrollmenu mb-3">
        <a href="{{route('about.visi_misi')}}" class="p-3 text-decoration-none {{ request()->segment(2) == 'visi-misi' ? 'alert-danger' : '' }}">
            <i class="bi bi-eye me-2"></i>Visi & Misi
        </a>
        <a href="{{route('about.sejarah')}}" class="p-3 text-decoration-none {{ request()->segment(2) == 'sejarah' ? 'alert-danger' : '' }}">
            <i class="bi bi-easel me-2"></i>Sejarah
        </a>
        <a href="{{route('about.kepala')}}" class="p-3 text-decoration-none {{ request()->segment(2) == 'kepala-bapenda' ? 'alert-danger' : '' }}">
            <i class="bi bi-person-square me-2"></i>Kepala Bapenda
        </a>
        <a href="{{route('about.struktur')}}" class="p-3 text-decoration-none {{ request()->segment(2) == 'struktur-organisasi' ? 'alert-danger' : '' }}">
            <i class="bi bi-diagram-3 me-2"></i>Struktur Organisasi
        </a>
    </div>
</div>