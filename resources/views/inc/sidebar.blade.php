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
        {{-- menu super ----------- --}}
        {{-- @role('super-admin')
            <li class="menu-item">
                <a class="menu-link menu-toggle" href="javascript:void(0);">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="{{ __('sidebar.setup') }}">{{ __('sidebar.setup') }}</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('web.role.show') }}">
                            <div data-i18n="{{ __('sidebar.role') }}">{{ __('sidebar.role') }}</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('web.university.show') }}">
                            <div data-i18n="{{ __('sidebar.university') }}">{{ __('sidebar.university') }}
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole --}}
        {{-- ------------------------- --}}
        {{-- {!! App\Service\MenuServices\TreeMenu::BuildTree(
            \App\Models\Modules::with(['parentModule', 'childModules'])->get(),
        ) !!} --}}





        <!-- Misc -->

        @if (auth()->user()->role == 'super-admin')
            <li class="menu-item">
                <a class="menu-link" href="{{ url('bawaslu/show') }}">
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div title="">{{ __('Data Bawaslu') }}</div>
                </a>
            </li>
        @endif
        @if (auth()->user()->role == 'anggota')
            <li class="menu-item">
                <a class="menu-link" href="{{ url('profile-anggota/show') }}">
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div title="">{{ __('Profile') }}</div>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{ url('pskt/show') }}">
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div title="Permohonan Surat Keluar Bawaslu">{{ __('PSKB') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="{{ url('ptpsppds/show') }}">
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div title="Permohonan Surat Tugas dan Pencairan PPPD">{{ __('PSTP SPPD') }}</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->role == 'bawaslu')
            <li class="menu-item">
                <a class="menu-link" href="{{ url('surat-masuk/show') }}">
                    <i class="menu-icon tf-icons ti ti-mail"></i>
                    <div title="">{{ __('Surat Masuk') }}</div>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{ url('anggota/show') }}">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div title="">{{ __('Data Angota') }}</div>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{ url('jabatan/show') }}">
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div title="">{{ __('Data Jabatan') }}</div>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{ url('jenis-surat/show') }}">
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div title="">{{ __('Data Jenis Surat') }}</div>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{ url('laporan/show') }}">
                    <i class="menu-icon tf-icons ti ti-report"></i>
                    <div title="">{{ __('Laporan') }}</div>
                </a>
            </li>
        @endif


    </ul>
</aside>
