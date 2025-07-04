@extends('home')
@section('content')

<!-- Header -->
<header class="bg-blue-800 text-white py-6 px-4 md:px-8 shadow-md">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl md:text-3xl font-bold mb-2">Panduan Sistem Manajemen Hotel</h1>
        <p class="text-sm md:text-base opacity-90 font-light">
            Panduan lengkap untuk mengelola stok barang, kamar, surat menyurat, dan arsip
        </p>
    </div>
</header>

<!-- Main Content -->
<main class="flex-1 bg-gray-50">
    <div class="max-w-6xl mx-auto py-8 px-4 md:px-8">
        <!-- Introduction -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-info-circle text-blue-600 mr-2"></i> Pengenalan Sistem
            </h2>
            <p class="text-gray-600 mb-4">
                Sistem Manajemen Hotel Grand Luxury merupakan platform terintegrasi untuk mengelola:
            </p>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                    <span>Stok barang dan inventaris hotel</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                    <span>Manajemen status dan fasilitas kamar</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                    <span>Surat menyurat internal karyawan</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                    <span>Arsip dokumen penting hotel</span>
                </li>
            </ul>
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r">
                <p class="text-sm text-blue-800 flex items-start">
                    <i class="fas fa-lightbulb text-yellow-500 mr-2 mt-1"></i>
                    Untuk bantuan lebih lanjut, hubungi tim IT di ext. 123 atau email it-support@grandluxuryhotel.com
                </p>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Stock Management Guide -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-200 bg-gradient-to-r from-blue-600 to-blue-500">
                        <h2 class="text-lg font-bold text-white flex items-center">
                            <i class="fas fa-boxes mr-2"></i> Panduan Manajemen Stok
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-plus-circle text-blue-500 mr-2"></i> Menambahkan Stok Baru
                            </h3>
                            <ol class="list-decimal list-inside text-sm text-gray-600 space-y-2 pl-2">
                                <li>Buka menu <span class="font-medium">Stok Barang</span></li>
                                <li>Klik tombol <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">+ Tambah Barang</span></li>
                                <li>Isi formulir dengan detail barang (nama, kategori, jumlah, dll)</li>
                                <li>Upload gambar barang jika diperlukan</li>
                                <li>Klik <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Simpan</span></li>
                            </ol>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-sync-alt text-purple-500 mr-2"></i> Memperbarui Stok
                            </h3>
                            <ol class="list-decimal list-inside text-sm text-gray-600 space-y-2 pl-2">
                                <li>Cari barang yang ingin diperbarui menggunakan fitur pencarian</li>
                                <li>Klik pada nama barang untuk melihat detail</li>
                                <li>Klik tombol <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Edit</span></li>
                                <li>Perbarui jumlah stok atau informasi lainnya</li>
                                <li>Tambahkan catatan perubahan jika diperlukan</li>
                                <li>Klik <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Simpan Perubahan</span></li>
                            </ol>
                        </div>

                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r mb-4">
                            <p class="text-sm text-yellow-800 flex items-start">
                                <i class="fas fa-exclamation-triangle mr-2 mt-1"></i>
                                Sistem akan otomatis mengirim notifikasi ketika stok mencapai level minimum
                            </p>
                        </div>

                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-file-pdf mr-2 text-red-500"></i>
                            <a href="#" class="text-blue-600 hover:underline">Download Panduan Lengkap Manajemen Stok (PDF)</a>
                        </div>
                    </div>
                </div>

                <!-- Room Management Guide -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden mt-6">
                    <div class="p-5 border-b border-gray-200 bg-gradient-to-r from-green-600 to-green-500">
                        <h2 class="text-lg font-bold text-white flex items-center">
                            <i class="fas fa-door-open mr-2"></i> Panduan Manajemen Kamar
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-bed text-green-500 mr-2"></i> Mengubah Status Kamar
                            </h3>
                            <ol class="list-decimal list-inside text-sm text-gray-600 space-y-2 pl-2">
                                <li>Buka menu <span class="font-medium">Manajemen Kamar</span></li>
                                <li>Temukan kamar yang ingin diubah statusnya</li>
                                <li>Klik dropdown status di kolom "Status"</li>
                                <li>Pilih status baru (Tersedia, Dipesan, Dalam Perawatan, dll)</li>
                                <li>Tambahkan catatan jika diperlukan</li>
                                <li>Status akan otomatis diperbarui</li>
                            </ol>
                            <div class="mt-3 grid grid-cols-3 gap-2 text-xs">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-center">Tersedia</span>
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-center">Dipesan</span>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-center">Dalam Perawatan</span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-clipboard-check text-teal-500 mr-2"></i> Inventaris Kamar
                            </h3>
                            <p class="text-sm text-gray-600 mb-3">
                                Untuk mencatat kerusakan atau kehilangan barang di kamar:
                            </p>
                            <ol class="list-decimal list-inside text-sm text-gray-600 space-y-2 pl-2">
                                <li>Buka detail kamar yang bersangkutan</li>
                                <li>Pilih tab <span class="font-medium">Inventaris</span></li>
                                <li>Klik <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">+ Laporkan Masalah</span></li>
                                <li>Isi formulir laporan kerusakan/kehilangan</li>
                                <li>Upload foto pendukung jika ada</li>
                                <li>Submit laporan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Correspondence Guide -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-200 bg-gradient-to-r from-purple-600 to-purple-500">
                        <h2 class="text-lg font-bold text-white flex items-center">
                            <i class="fas fa-envelope mr-2"></i> Panduan Surat Menyurat
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-paper-plane text-purple-500 mr-2"></i> Mengirim Surat Internal
                            </h3>
                            <ol class="list-decimal list-inside text-sm text-gray-600 space-y-2 pl-2">
                                <li>Buka menu <span class="font-medium">Surat Menyurat</span></li>
                                <li>Klik <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">+ Buat Surat Baru</span></li>
                                <li>Pilih jenis surat (Permohonan, Laporan, dll)</li>
                                <li>Pilih penerima (Manager, Keuangan, atau departemen lain)</li>
                                <li>Tulis isi surat dengan jelas</li>
                                <li>Lampirkan dokumen pendukung jika diperlukan</li>
                                <li>Klik <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Kirim</span></li>
                            </ol>
                        </div>

                        <div class="mb-4">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-inbox text-indigo-500 mr-2"></i> Melacak Status Surat
                            </h3>
                            <p class="text-sm text-gray-600 mb-3">
                                Anda dapat melacak status surat yang dikirim:
                            </p>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded mr-2">Draft</span>
                                    <span>Surat disimpan tapi belum dikirim</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded mr-2">Terkirim</span>
                                    <span>Surat telah dikirim ke penerima</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded mr-2">Dibaca</span>
                                    <span>Penerima telah membuka surat</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded mr-2">Ditindak</span>
                                    <span>Penerima telah menindaklanjuti</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded-r">
                            <p class="text-sm text-purple-800 flex items-start">
                                <i class="fas fa-clock mr-2 mt-1"></i>
                                Surat ke departemen Keuangan biasanya ditindak dalam 1-3 hari kerja
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Archive Management Guide -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden mt-6">
                    <div class="p-5 border-b border-gray-200 bg-gradient-to-r from-gray-700 to-gray-600">
                        <h2 class="text-lg font-bold text-white flex items-center">
                            <i class="fas fa-archive mr-2"></i> Panduan Manajemen Arsip
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-upload text-gray-500 mr-2"></i> Mengunggah Dokumen ke Arsip
                            </h3>
                            <ol class="list-decimal list-inside text-sm text-gray-600 space-y-2 pl-2">
                                <li>Buka menu <span class="font-medium">Arsip Dokumen</span></li>
                                <li>Klik <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">+ Unggah Dokumen</span></li>
                                <li>Pilih kategori dokumen (Keuangan, HRD, Operasional, dll)</li>
                                <li>Tambahkan judul dan deskripsi dokumen</li>
                                <li>Tentukan tanggal dokumen</li>
                                <li>Unggah file dari komputer Anda</li>
                                <li>Klik <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Simpan</span></li>
                            </ol>
                        </div>

                        <div class="mb-4">
                            <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-search text-blue-500 mr-2"></i> Mencari Dokumen Arsip
                            </h3>
                            <p class="text-sm text-gray-600 mb-3">
                                Fitur pencarian canggih memungkinkan Anda menemukan dokumen dengan:
                            </p>
                            <ul class="grid grid-cols-2 gap-2 text-sm text-gray-600">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                    Kata kunci
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                    Rentang tanggal
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                    Kategori dokumen
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                    Departemen terkait
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-800 mb-2 flex items-center">
                                <i class="fas fa-shield-alt text-gray-600 mr-2"></i> Keamanan Arsip
                            </h4>
                            <p class="text-xs text-gray-600">
                                Dokumen dengan label <span class="bg-red-100 text-red-800 px-2 py-1 rounded">Rahasia</span> hanya dapat diakses oleh manajemen tingkat atas dengan hak akses khusus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-white rounded-xl shadow-md p-6 mt-8">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                <i class="fas fa-question-circle text-yellow-500 mr-2"></i> Pertanyaan yang Sering Diajukan
            </h2>
            <div class="space-y-4">
                <div class="border-b border-gray-200 pb-4">
                    <button class="flex items-center justify-between w-full text-left font-medium text-gray-700 focus:outline-none">
                        <span>Bagaimana cara reset password saya?</span>
                        <i class="fas fa-chevron-down text-gray-500"></i>
                    </button>
                    <div class="mt-2 text-sm text-gray-600 hidden">
                        Hubungi admin IT untuk mereset password Anda. Setelah reset, Anda akan menerima email dengan link untuk membuat password baru.
                    </div>
                </div>
                <div class="border-b border-gray-200 pb-4">
                    <button class="flex items-center justify-between w-full text-left font-medium text-gray-700 focus:outline-none">
                        <span>Apakah ada batas ukuran untuk dokumen yang diarsipkan?</span>
                        <i class="fas fa-chevron-down text-gray-500"></i>
                    </button>
                    <div class="mt-2 text-sm text-gray-600 hidden">
                        Ya, maksimal ukuran file untuk setiap dokumen adalah 25MB. Untuk dokumen lebih besar, silahkan kompres terlebih dahulu atau hubungi IT untuk solusi alternatif.
                    </div>
                </div>
                <div class="border-b border-gray-200 pb-4">
                    <button class="flex items-center justify-between w-full text-left font-medium text-gray-700 focus:outline-none">
                        <span>Bagaimana cara mencetak laporan stok?</span>
                        <i class="fas fa-chevron-down text-gray-500"></i>
                    </button>
                    <div class="mt-2 text-sm text-gray-600 hidden">
                        Di halaman Stok Barang, gunakan filter untuk menampilkan data yang diinginkan, lalu klik tombol <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Cetak Laporan</span> di pojok kanan atas. Pilih format (PDF atau Excel) sebelum mencetak.
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-4 px-4 md:px-8">
    <div class="max-w-6xl mx-auto text-center">
        <p class="text-sm">
            &copy; 2023 Sistem Manajemen Hotel Grand Luxury. Versi 2.1.0
        </p>
        <p class="text-xs opacity-80 mt-1">
            Panduan ini terakhir diperbarui pada 3 Juli 2025
        </p>
    </div>
</footer>

<script>
    // Simple FAQ toggle functionality
    document.querySelectorAll('.border-b button').forEach(button => {
        button.addEventListener('click', () => {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('i');
            
            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                answer.classList.add('hidden');
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        });
    });
</script>

@endsection