<div class="col-lg-12 col-12">
    <div class="scrollmenu mb-3">
        <a href="{{route('about')}}" class="p-3 text-decoration-none {{ request()->segment(1) == 'about' ? 'alert-danger' : '' }}">
            <i class="bi bi-eye me-2"></i>Visi & Misi
        </a>
        <a href="{{route('history')}}" class="p-3 text-decoration-none {{ request()->segment(1) == 'history' ? 'alert-danger' : '' }}">
            <i class="bi bi-easel me-2"></i>Sejarah
        </a>
        <a href="{{route('director')}}" class="p-3 text-decoration-none {{ request()->segment(1) == 'director' ? 'alert-danger' : '' }}">
            <i class="bi bi-person-square me-2"></i>Kepala Bapenda
        </a>
        <a href="{{route('organization')}}" class="p-3 text-decoration-none {{ request()->segment(1) == 'organization' ? 'alert-danger' : '' }}">
            <i class="bi bi-diagram-3 me-2"></i>Struktur Organisasi
        </a>
    </div>
</div>