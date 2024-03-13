<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        {{-- <div class="navbar-nav align-items-center">
                <div class="nav-item navbar-search-wrapper mb-0">
                  <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                    <i class="ti ti-search ti-md me-2"></i>
                    <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                  </a>
                </div>
              </div> --}}
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">


            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown" href="javascript:void(0);">
                    <div class="avatar avatar-online">
                        <img alt class="h-auto rounded-circle" src="https://lippianfamilydentistry.net/wp-content/uploads/2015/11/user-default.png" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="<?= url('/login') ?>">
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
        <input aria-label="Search..." class="form-control search-input container-xxl border-0" placeholder="Search..."
            type="text" />
        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
    </div>
</nav>

<!-- / Navbar -->

<script>
    $(document).ready(function() {
        $(document).on('click', '.change-lang', function(event) {
            // $('.change-lang').click(function(event) {
            event.preventDefault(); // Mencegah aksi default

            var language = $(this).data('language'); // Ambil data bahasa dari atribut data-language

            // Kirimkan permintaan AJAX ke endpoint untuk mengubah bahasa
            // Ganti '/change-language' dengan URL endpoint yang sesuai di aplikasi Anda
            console.log(language);
            $.ajax({
                url: '/change-language',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    language: language
                },
                success: function(response) {
                    console.log('Bahasa berhasil diubah');
                    updateAppConfig(response.language);
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan:', error);
                }
            });
        });
    });

    function updateAppConfig(language) {
        // Kirim permintaan ke server untuk memperbarui konfigurasi bahasa di app.php
        // Pastikan untuk menyesuaikan dengan endpoint yang sesuai di aplikasi Anda
        $.ajax({
            url: '/update-language-config',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                language: language
            },
            success: function(response) {
                console.log('Konfigurasi bahasa di app.php berhasil diperbarui');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    }
</script>
