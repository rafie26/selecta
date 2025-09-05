{{-- resources/views/components/navbar.blade.php --}}
<style>
    /* Header & Navigation - NAVBAR TRANSPARAN SEPERTI INDONESIA.TRAVEL */
    .header {
        background: transparent;
        padding: 1rem 0;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        backdrop-filter: none;
        border-bottom: none;
        transition: all 0.3s ease;
    }

    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center; /* Pastikan semua item center-aligned */
        padding: 0 2rem;
        position: relative;
        z-index: 10;
        height: 60px; /* Set fixed height untuk konsistensi */
    }

    /* Background putih yang muncul saat hover navbar */
    .nav-container::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(15px);
        opacity: 0;
        transition: opacity 0.3s ease;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        pointer-events: none;
        z-index: 1;
    }

    /* Efek hover pada navbar container */
    .nav-container:hover::before {
        opacity: 1;
    }

    .logo {
        font-size: 1.6rem;
        font-weight: 700;
        letter-spacing: -0.5px;
        transition: all 0.3s ease;
        text-decoration: none;
        color: #333;
        z-index: 10;
        position: relative;
        display: flex; /* Added flex untuk alignment */
        align-items: center; /* Center align logo */
        height: 100%; /* Full height */
    }

    .logo:hover {
        transform: scale(1.05);
    }

    /* Logo container untuk menampung kedua gambar */
    .logo-container {
        position: relative;
        display: flex; /* Changed to flex */
        align-items: center; /* Center align */
        z-index: 10;
        height: 100%; /* Full height */
    }

    /* Logo default (putih) */
    .logo-default {
        transition: all 0.3s ease;
        filter: brightness(1);
        position: relative;
        z-index: 3;
        height: 40px;
        width: auto;
    }

    /* Logo hover (berwarna) - tersembunyi secara default */
    .logo-hover {
        position: absolute;
        top: 50%; /* Center vertically */
        left: 0;
        transform: translateY(-50%); /* Perfect vertical centering */
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 2;
        height: 40px;
        width: auto;
    }

    /* Saat navbar container di-hover, tampilkan logo berwarna */
    .nav-container:hover .logo-default {
        opacity: 0;
    }

    .nav-container:hover .logo-hover {
        opacity: 1;
        filter: brightness(1.1) drop-shadow(0 4px 12px rgba(0,0,0,0.15));
    }

    /* Saat logo di-hover individual */
    .logo-container:hover .logo-hover {
        transform: translateY(-50%) scale(1.05); /* Maintain centering with scale */
    }

    .nav-center {
        display: flex;
        list-style: none;
        gap: 0;
        align-items: center; /* Perfect center alignment */
        padding: 0;
        margin: 0;
        position: absolute;
        left: 50%;
        top: 50%; /* Center vertically */
        transform: translate(-50%, -50%); /* Perfect centering */
        z-index: 10;
        height: 100%; /* Full height for alignment */
    }

    .nav-right {
        display: flex;
        align-items: center; /* Perfect center alignment */
        gap: 1rem;
        z-index: 10;
        position: relative;
        height: 100%; /* Full height for alignment */
    }

    .nav-item {
        position: relative;
        margin: 0;
        display: flex; /* Added flex */
        align-items: center; /* Center align items */
        height: 100%; /* Full height */
    }

    /* Default state - teks putih transparan */
    .nav-link {
        color: white;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        padding: 0.8rem 1.5rem;
        transition: all 0.3s ease;
        display: flex; /* Changed to flex */
        align-items: center; /* Perfect center alignment */
        justify-content: center; /* Center text horizontally */
        background: transparent;
        border: none;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        position: relative;
        border-radius: 6px;
        height: 100%; /* Full height for perfect alignment */
        line-height: 1; /* Remove line-height issues */
    }

    /* Saat navbar di-hover, semua teks berubah gelap */
    .nav-container:hover .nav-link {
        color: #374151;
        text-shadow: none;
    }

    /* Individual link hover */
    .nav-link:hover {
        color: #1e40af !important;
    }

    /* Active state */
    .nav-link.active {
        position: relative;
    }

    .nav-container:hover .nav-link.active {
        color: #1e40af;
        font-weight: 600;
    }

    /* Login button default state */
    .login-btn {
        color: white;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        padding: 0.8rem 1.5rem;
        transition: all 0.3s ease;
        background: transparent;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        border-radius: 6px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        cursor: pointer;
        display: flex; /* Added flex */
        align-items: center; /* Perfect center alignment */
        justify-content: center; /* Center text */
        height: auto; /* Auto height but centered */
        line-height: 1; /* Remove line-height issues */
    }

    /* Login button saat navbar di-hover */
    .nav-container:hover .login-btn {
        color: #374151;
        text-shadow: none;
        border-color: rgba(55, 65, 81, 0.2);
    }

    .login-btn:hover {
        color: #1e40af !important;
        border-color: rgba(30, 64, 175, 0.3);
    }

    /* User menu styling */
    .user-menu {
        display: flex;
        align-items: center; /* Perfect center alignment */
        gap: 1rem;
        height: 100%; /* Full height for alignment */
    }

    .user-name {
        color: white;
        font-weight: 600;
        font-size: 0.95rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        transition: all 0.3s ease;
        line-height: 1; /* Remove line-height issues */
    }

    .nav-container:hover .user-name {
        color: #374151;
        text-shadow: none;
    }

    .header.scrolled .user-name {
        color: #374151;
        text-shadow: none;
    }

    .logout-btn {
        color: white;
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        display: flex; /* Added flex */
        align-items: center; /* Perfect center alignment */
        line-height: 1; /* Remove line-height issues */
    }

    .nav-container:hover .logout-btn {
        color: #374151;
        text-shadow: none;
        border-color: rgba(55, 65, 81, 0.2);
    }

    .logout-btn:hover {
        color: #dc2626 !important;
        border-color: rgba(220, 38, 38, 0.3);
        background: rgba(220, 38, 38, 0.1);
    }

    .header.scrolled .logout-btn {
        color: #374151;
        text-shadow: none;
        border-color: rgba(55, 65, 81, 0.2);
    }

    .header.scrolled .logout-btn:hover {
        color: #dc2626;
        border-color: rgba(220, 38, 38, 0.3);
        background: rgba(220, 38, 38, 0.1);
    }

    /* User avatar container */
    .user-avatar-container {
        display: flex;
        align-items: center; /* Perfect center alignment */
        gap: 0.5rem;
        padding: 0.4rem 0.8rem;
        border-radius: 25px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        height: auto; /* Auto height but centered */
        line-height: 1; /* Remove line-height issues */
    }

    .nav-container:hover .user-avatar-container {
        border-color: rgba(55, 65, 81, 0.2);
        background: rgba(255, 255, 255, 0.05);
    }

    .user-avatar-container:hover {
        border-color: rgba(30, 64, 175, 0.3);
        background: rgba(30, 64, 175, 0.1);
    }

    .header.scrolled .user-avatar-container {
        border-color: rgba(55, 65, 81, 0.2);
    }

    .header.scrolled .user-avatar-container:hover {
        border-color: rgba(30, 64, 175, 0.3);
        background: rgba(30, 64, 175, 0.1);
    }

    /* User avatar - circular image */
    .user-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, 0.8);
        transition: all 0.3s ease;
        display: block; /* Ensure proper display */
        flex-shrink: 0; /* Prevent shrinking */
    }

    .nav-container:hover .user-avatar {
        border-color: rgba(55, 65, 81, 0.3);
    }

    .header.scrolled .user-avatar {
        border-color: rgba(55, 65, 81, 0.3);
    }

    /* User avatar initial - circular with letter */
    .user-avatar-initial {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
        border: 2px solid rgba(255, 255, 255, 0.8);
        transition: all 0.3s ease;
        text-shadow: none;
        flex-shrink: 0; /* Prevent shrinking */
        line-height: 1; /* Remove line-height issues */
    }

    .nav-container:hover .user-avatar-initial {
        border-color: rgba(55, 65, 81, 0.3);
        background: linear-gradient(135deg, #1e40af, #1e3a8a);
    }

    .header.scrolled .user-avatar-initial {
        border-color: rgba(55, 65, 81, 0.3);
    }

    /* Profile text */
    .profile-text {
        color: white;
        font-weight: 500;
        font-size: 0.9rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        transition: all 0.3s ease;
        white-space: nowrap; /* Prevent text wrapping */
        line-height: 1; /* Remove line-height issues */
    }

    .nav-container:hover .profile-text {
        color: #374151;
        text-shadow: none;
    }

    .user-avatar-container:hover .profile-text {
        color: #1e40af !important;
    }

    .header.scrolled .profile-text {
        color: #374151;
        text-shadow: none;
    }

    .header.scrolled .user-avatar-container:hover .profile-text {
        color: #1e40af;
    }

    /* Dropdown arrow */
    .dropdown-arrow {
        font-size: 12px;
        transition: transform 0.3s ease;
        color: white;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        display: flex; /* Added flex */
        align-items: center; /* Center alignment */
        line-height: 1; /* Remove line-height issues */
    }

    .nav-container:hover .dropdown-arrow {
        color: #374151;
        text-shadow: none;
    }

    .header.scrolled .dropdown-arrow {
        color: #374151;
        text-shadow: none;
    }

    .user-avatar-container.active .dropdown-arrow {
        transform: rotate(180deg);
    }

    /* Profile dropdown */
    .profile-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(0, 0, 0, 0.1);
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1000;
        margin-top: 8px;
    }

    .profile-dropdown.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        color: #374151;
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        font-size: 14px;
        line-height: 1; /* Remove line-height issues */
    }

    .dropdown-item:hover {
        background: #f3f4f6;
        color: #1e40af;
    }

    .dropdown-item:first-child {
        border-radius: 12px 12px 0 0;
    }

    .logout-item {
        color: #dc2626;
        border-radius: 0 0 12px 12px;
    }

    .logout-item:hover {
        background: #fef2f2;
        color: #dc2626;
    }

    .dropdown-divider {
        height: 1px;
        background: #e5e7eb;
        margin: 4px 0;
    }

    .dropdown-item i {
        width: 16px;
        text-align: center;
    }

    /* User menu positioning */
    .user-menu {
        position: relative;
    }

    /* Navbar scroll state - untuk backup jika diperlukan */
    .header.scrolled {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(15px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .header.scrolled .nav-container::before {
        opacity: 1;
        transform: translateY(0);
    }

    /* Saat di-scroll, gunakan logo berwarna */
    .header.scrolled .logo-default {
        opacity: 0;
    }

    .header.scrolled .logo-hover {
        opacity: 1;
    }

    .header.scrolled .nav-link {
        color: #374151;
        text-shadow: none;
    }

    .header.scrolled .nav-link:hover {
        color: #1e40af;
    }

    .header.scrolled .nav-link.active {
        color: #1e40af;
        font-weight: 600;
    }

    .header.scrolled .login-btn {
        color: #374151;
        text-shadow: none;
        border-color: rgba(55, 65, 81, 0.2);
    }

    .header.scrolled .login-btn:hover {
        color: #1e40af;
    }

    .header.scrolled .logo {
        color: #1e40af;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .nav-center {
            display: none;
        }
        
        .nav-container {
            padding: 0 1rem;
            height: 60px; /* Adjusted height for mobile */
        }

        .nav-container::before {
            border-radius: 8px;
            height: 70px; /* Adjusted untuk mobile */
        }

        .header {
            padding: 1rem 0; /* Adjusted padding for mobile */
        }

        .logo-default,
        .logo-hover {
            height: 35px;
        }

        .user-avatar,
        .user-avatar-initial {
            width: 32px; /* Smaller on mobile */
            height: 32px;
        }

        .user-avatar-initial {
            font-size: 14px; /* Smaller font on mobile */
        }

        .profile-text {
            font-size: 0.85rem; /* Smaller text on mobile */
        }

        .user-avatar-container {
            padding: 0.5rem 0.8rem; /* Less padding on mobile */
        }
    }

    /* Smooth animations */
    * {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Efek transisi yang lebih smooth */
    .nav-link, .login-btn {
        will-change: color, background-color;
    }
</style>

<!-- Header dengan Navbar -->
<header class="header" id="navbar">
    <div class="nav-container">
        <!-- Logo with image switching effect -->
        <div class="logo">
            <a href="{{ route('home') }}" class="logo-container">
                <!-- Logo putih (default state) -->
                <img src="/images/logo3.png" alt="Selecta" class="logo-default">
                <!-- Logo berwarna (hover state) -->
                <img src="/images/logo2.png" alt="Selecta" class="logo-hover">
            </a>
        </div>
        
        <!-- Center Navigation -->
        <nav>
            <ul class="nav-center" id="navMenu">
                @php
                    $navItems = [
                        ['name' => 'Beranda', 'route' => 'home', 'url' => route('home')],
                        ['name' => 'Tiket', 'route' => 'tickets.*', 'url' => route('tickets.index')],
                        ['name' => 'Hotel', 'route' => 'hotels.*', 'url' => route('hotels.index')],
                        ['name' => 'Restoran', 'route' => 'restaurants.*', 'url' => route('restaurants.index')],
                        ['name' => 'Galeri', 'route' => 'gallery.*', 'url' => route('gallery.index')]
                    ];
                @endphp

                @foreach($navItems as $item)
                    <li class="nav-item">
                        <a href="{{ $item['url'] }}" 
                           class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                            {{ $item['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <!-- Right side - Login Button or User Menu -->
        <div class="nav-right">
            @auth
                <!-- User is logged in - show avatar with dropdown -->
                <div class="user-menu">
                    <div class="user-avatar-container" onclick="toggleProfileDropdown()">
                        @if(Auth::user()->avatar)
                            <!-- Google profile picture -->
                            <img src="{{ Auth::user()->avatar }}" alt="Profile" class="user-avatar">
                        @else
                            <!-- Initial avatar for manual registration -->
                            <div class="user-avatar-initial">{{ Auth::user()->initials }}</div>
                        @endif
                        <span class="profile-text">Profil Saya</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </div>
                    
                    <!-- Dropdown Menu -->
                    <div class="profile-dropdown" id="profileDropdown">
                        <div class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span>Lihat Profil</span>
                        </div>
                        <div class="dropdown-item">
                            <i class="fas fa-cog"></i>
                            <span>Pengaturan</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item logout-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- User is not logged in - show login button -->
                <a href="{{ route('login') }}" class="login-btn">Login</a>
            @endauth
        </div>
    </div>
</header>

<script>
    // Improved navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Function to toggle profile dropdown
    function toggleProfileDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        const container = dropdown.parentElement.querySelector('.user-avatar-container');
        
        dropdown.classList.toggle('show');
        container.classList.toggle('active');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const userMenu = document.querySelector('.user-menu');
        const dropdown = document.getElementById('profileDropdown');
        
        if (dropdown && userMenu && !userMenu.contains(event.target)) {
            dropdown.classList.remove('show');
            userMenu.querySelector('.user-avatar-container').classList.remove('active');
        }
    });

    // Function to open login modal - sesuai dengan auth-modal.blade.php
    function openLoginModal() {
        const modal = document.getElementById('authModal');
        if (modal) {
            modal.classList.add('active'); // Sesuai dengan class di modal
            document.getElementById('loginModal').classList.add('active');
            document.getElementById('registerModal').classList.remove('active');
            document.body.style.overflow = 'hidden';
            console.log('Modal opened successfully');
        } else {
            console.log('Auth modal not found. Make sure to include auth-modal component.');
            // Fallback - redirect to login page if modal doesn't exist
            window.location.href = '/login';
        }
    }

    // Optional: Add subtle animation delay for each nav item
    document.addEventListener('DOMContentLoaded', function() {
        // Simple initialization without fancy animations
        console.log('Navbar initialized');
        
        // Make sure modal functions are available globally
        window.openLoginModal = openLoginModal;
        window.toggleProfileDropdown = toggleProfileDropdown;
    });
</script>