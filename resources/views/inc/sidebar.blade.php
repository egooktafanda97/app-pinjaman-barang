<aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
    <div class="app-brand demo">
        <a class="app-brand-link" href="{{ url('/home/show') }}">
            <span class="app-brand-logo demo">
                {{-- <img alt="{{ config('app.name') }}" src="{{ url(config('app.favicon')) }}" style="width:30px;"> --}}
            </span>
            <span class="app-brand-text demo menu-text fw-bold">{{ config('app.name') }}</span>
        </a>

        <a class="layout-menu-toggle menu-link text-large ms-auto" href="javascript:void(0);">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item active">
            <a class="menu-link" href="{{ url('/home/show') }}">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="{{ __('Dashboard') }}">{{ __('Dashboard') }}</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="{{ __('Menu') }}">{{ __('Menu') }}</span>
        </li>

        <li class="menu-item">
            <a class="menu-link" href="{{ url('') }}">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div title="">{{ __('Data Alat Musik') }}</div>
            </a>
        </li>

        <li class="menu-item">
            <a class="menu-link" href="{{ url('') }}">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div title="">{{ __('Kategori Alat Musik') }}</div>
            </a>
        </li>

        <li class="menu-item">
            <a class="menu-link" href="{{ url('') }}">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div title="">{{ __('Data Peminjam') }}</div>
            </a>
        </li>

        <li class="menu-item">
            <a class="menu-link" href="{{ url('') }}">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div title="">{{ __('Daftar User') }}</div>
            </a>
        </li>


        <li class="menu-item">
            <a class="menu-link" href="{{ url('') }}">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div title="">{{ __('Tentang') }}</div>
            </a>
        </li>


        <li class="menu-item">
            <a class="menu-link" href="{{ url('') }}">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div title="">{{ __('Artikel') }}</div>
            </a>
        </li>

        <li class="menu-item">
            <a class="menu-link" href="{{ url('') }}">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div title="">{{ __('Laporan') }}</div>
            </a>
        </li>

    </ul>
</aside>
