<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Peminjaman ITENAS</title>
    
    <!-- Tailwind CSS CDN (FIX untuk deployment) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom styles untuk ITENAS dengan tema ORANGE -->
    <style>
        .bg-itenas-gradient {
            background: linear-gradient(135deg, #ea580c 0%, #fb923c 100%);
        }
        .bg-itenas-light {
            background: linear-gradient(135deg, #fed7aa 0%, #fdba74 100%);
        }
        .bg-itenas-dark {
            background: linear-gradient(135deg, #c2410c 0%, #ea580c 100%);
        }
        .text-itenas {
            color: #ea580c;
        }
        .text-itenas-dark {
            color: #c2410c;
        }
        .border-itenas {
            border-color: #ea580c;
        }
        .btn-itenas {
            background: #ea580c;
            color: white;
            padding: 12px 32px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
        }
        .btn-itenas:hover {
            background: #c2410c;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(234, 88, 12, 0.3);
        }
        .btn-secondary {
            background: #f97316;
            color: white;
            padding: 12px 32px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background: #ea580c;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
        }
        .btn-outline-orange {
            background: transparent;
            color: #ea580c;
            border: 2px solid #ea580c;
            padding: 12px 32px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
        }
        .btn-outline-orange:hover {
            background: #ea580c;
            color: white;
            transform: translateY(-2px);
        }
        .section-padding {
            padding: 80px 0;
        }
        .card-hover {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(234, 88, 12, 0.15);
        }
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            transition: transform 0.3s;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-orange-100">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Brand -->
                <div class="flex items-center">
                    <span class="text-xl font-bold text-itenas">Sistem Peminjaman</span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-itenas font-medium hover-lift">Beranda</a>
                    <a href="/layanan" class="text-gray-700 hover:text-itenas font-medium hover-lift">Layanan</a>
                    <a href="/inventaris" class="text-gray-700 hover:text-itenas font-medium hover-lift">Inventaris</a>
                    <a href="/tentang" class="text-gray-700 hover:text-itenas font-medium hover-lift">Tentang Sistem</a>
                </div>
                
                <!-- Auth Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="/login" class="px-4 py-2 text-itenas border border-itenas rounded-lg hover:bg-orange-50 transition hover-lift">Login</a>
                    <a href="/register" class="px-4 py-2 bg-itenas text-white rounded-lg hover:bg-orange-700 transition hover-lift">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-itenas-gradient text-white section-padding">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight text-shadow">
                Sistem Peminjaman Ruangan & Inventaris
            </h1>
            <h2 class="text-3xl mb-8 font-semibold text-shadow">ITENAS</h2>
            <p class="text-xl mb-10 max-w-3xl mx-auto leading-relaxed">
                Kelola dan Ajustkan Peminjaman ruangan serta inventaris kampus dengan sistem terintegrasi yang cepat.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="/login" class="btn-itenas bg-white text-itenas hover:bg-gray-100 hover:text-itenas-dark">Login untuk Memulai</a>
                <a href="/peminjaman" class="btn-outline-orange border-white text-white hover:bg-white hover:text-itenas">Ajustkan Peminjaman</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section-padding">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-itenas mb-4">Layanan Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Fitur lengkap untuk manajemen peminjaman yang efisien</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white p-6 rounded-xl shadow-lg card-hover border-t-4 border-orange-500">
                    <div class="text-orange-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-itenas">Peminjaman Ruangan</h3>
                    <p class="text-gray-600">Booking ruangan kuliah, laboratorium, auditorium dengan mudah dan cepat.</p>
                </div>
                
                <!-- Service 2 -->
                <div class="bg-white p-6 rounded-xl shadow-lg card-hover border-t-4 border-orange-500">
                    <div class="text-orange-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-itenas">Manajemen Inventaris</h3>
                    <p class="text-gray-600">Kelola peminjaman alat lab, proyektor, dan peralatan kampus lainnya.</p>
                </div>
                
                <!-- Service 3 -->
                <div class="bg-white p-6 rounded-xl shadow-lg card-hover border-t-4 border-orange-500">
                    <div class="text-orange-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-itenas">Approval Online</h3>
                    <p class="text-gray-600">Proses persetujuan digital yang mengurangi paperwork dan mempercepat proses.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products/Features Section -->
    <section class="bg-orange-50 section-padding">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-itenas mb-4">Fitur Unggulan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Semua yang Anda butuhkan dalam satu sistem</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg border-l-4 border-orange-500">
                    <h3 class="text-2xl font-bold mb-4 text-itenas">Tracking Real-time</h3>
                    <p class="text-gray-600 mb-6">Pantau status peminjaman secara real-time. Lihat ketersediaan ruangan dan inventaris secara langsung.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Status peminjaman langsung update</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Notifikasi email & WhatsApp</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Kalender integrasi</span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-lg border-l-4 border-orange-500">
                    <h3 class="text-2xl font-bold mb-4 text-itenas">Laporan & Analytics</h3>
                    <p class="text-gray-600 mb-6">Generate laporan penggunaan ruangan dan inventaris untuk keputusan manajemen yang lebih baik.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Laporan bulanan/tahunan</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Analytics penggunaan</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Export data ke Excel/PDF</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section-padding">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-itenas mb-6">Tentang Sistem Ini</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Sistem Peminjaman Ruangan & Inventaris ITENAS adalah platform terintegrasi yang dirancang khusus untuk mempermudah proses administrasi peminjaman di lingkungan kampus.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Dengan sistem ini, mahasiswa, dosen, dan staf dapat mengajukan peminjaman secara online, mendapatkan persetujuan lebih cepat, dan memantau status peminjaman kapan saja.
                    </p>
                    <a href="/tentang" class="btn-itenas">Pelajari Lebih Lanjut</a>
                </div>
                <div class="bg-itenas-light rounded-xl p-8 text-itenas-dark border-2 border-orange-200">
                    <h3 class="text-2xl font-bold mb-6">Mengapa Memilih Sistem Kami?</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 mr-3 mt-1 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="font-medium">Mengurangi paperwork hingga 80%</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 mr-3 mt-1 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="font-medium">Proses peminjaman 3x lebih cepat</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 mr-3 mt-1 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="font-medium">Integrasi dengan sistem akademik ITENAS</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 mr-3 mt-1 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="font-medium">Dukungan penuh dari tim IT kampus</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-itenas-dark text-white section-padding">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Siap Mengoptimalkan Peminjaman Kampus?</h2>
            <p class="text-xl mb-10 max-w-2xl mx-auto">
                Bergabunglah dengan ratusan pengguna yang sudah merasakan kemudahan sistem peminjaman digital.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="/register" class="btn-itenas bg-white text-itenas hover:bg-orange-50">Daftar Sekarang</a>
                <a href="/login" class="btn-outline-orange border-white text-white hover:bg-white hover:text-itenas">Login ke Akun</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 text-orange-400">Sistem Peminjaman</h3>
                    <p class="text-gray-400">Platform terintegrasi untuk manajemen peminjaman ruangan dan inventaris kampus ITENAS.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-orange-300">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-orange-300">Beranda</a></li>
                        <li><a href="/layanan" class="text-gray-400 hover:text-orange-300">Layanan</a></li>
                        <li><a href="/inventaris" class="text-gray-400 hover:text-orange-300">Inventaris</a></li>
                        <li><a href="/tentang" class="text-gray-400 hover:text-orange-300">Tentang</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-orange-300">Akun</h4>
                    <ul class="space-y-2">
                        <li><a href="/login" class="text-gray-400 hover:text-orange-300">Login</a></li>
                        <li><a href="/register" class="text-gray-400 hover:text-orange-300">Register</a></li>
                        <li><a href="/dashboard" class="text-gray-400 hover:text-orange-300">Dashboard</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-orange-300">Kontak</h4>
                    <p class="text-gray-400">Institut Teknologi Nasional<br>Bandung, Indonesia</p>
                    <p class="text-gray-400 mt-2">📧 support@itenas.ac.id</p>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Sistem Peminjaman ITENAS. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>