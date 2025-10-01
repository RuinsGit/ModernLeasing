<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Tailwind CSS Kaldırıldı - Bootstrap ile yetiniyoruz -->

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- AOS Animation -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">

<style>
    :root {
        --primary-color: #2289FF;
        --secondary-color: #1F1F1F;
        --accent-color: #4A9EFF;
        --dark-color: #1F1F1F;
        --darker-color: #0F0F0F;
        --light-color: #F0F2F4;
        --text-dark: #1F1F1F;
        --text-light: #666666;
        --border-color: #E0E0E0;
        --card-bg: #FFFFFF;
        --section-bg: #1F1F1F;
        --main-bg: #F0F2F4;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Mobile Container Fix */
    html {
        width: 100%;
        max-width: 100vw;
        overflow-x: hidden;
    }

    .container, .container-fluid {
        width: 100% !important;
        max-width: 100% !important;
        padding-left: 15px !important;
        padding-right: 15px !important;
        margin-left: auto;
        margin-right: auto;
    }

    .row {
        margin-left: -15px;
        margin-right: -15px;
    }

    [class*="col-"] {
        padding-left: 15px;
        padding-right: 15px;
    }

    body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.6;
        color: var(--text-dark);
        background-color: var(--main-bg);
        overflow-x: hidden !important;
        width: 100% !important;
        max-width: 100vw !important;
    }

    /* ===== COLOR OVERRIDES ===== */
    .text-primary {
        color: var(--primary-color) !important;
    }

    .text-primary:hover {
        color: #1976D2 !important;
    }

    .bg-primary {
        background-color: var(--primary-color) !important;
    }

    .border-primary {
        border-color: var(--primary-color) !important;
    }

    .btn-primary {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
    }

    .btn-primary:hover {
        background-color: #1976D2 !important;
        border-color: #1976D2 !important;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-color);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #1976D2;
    }

    /* Navbar Styles */
    .navbar {
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .navbar.scrolled {
        background: rgba(255, 255, 255, 0.95) !important;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        font-weight: 800;
        font-size: 1.8rem;
        color: var(--primary-color) !important;
    }

    .navbar-nav .nav-link {
        font-weight: 500;
        color: var(--text-dark) !important;
        margin: 0 0.5rem;
        transition: all 0.3s ease;
        position: relative;
    }

    .navbar-nav .nav-link:hover {
        color: var(--primary-color) !important;
    }

    .navbar-nav .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .navbar-nav .nav-link:hover::after {
        width: 100%;
    }

    /* Hero Section */
    .hero-section {
        min-height: 100vh;
        background: linear-gradient(135deg, rgba(31, 31, 31, 0.9), rgba(34, 137, 255, 0.8)),
                    url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%232289FF" stop-opacity="0.1"/><stop offset="100%" stop-color="%231F1F1F" stop-opacity="0.3"/></radialGradient></defs><rect width="100%" height="100%" fill="url(%23a)"/></svg>');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="%232289FF" opacity="0.3"><animate attributeName="opacity" values="0.3;0.8;0.3" dur="2s" repeatCount="indefinite"/></circle><circle cx="80" cy="40" r="1.5" fill="%234A9EFF" opacity="0.4"><animate attributeName="opacity" values="0.4;0.9;0.4" dur="3s" repeatCount="indefinite"/></circle><circle cx="40" cy="80" r="1" fill="%231F1F1F" opacity="0.2"><animate attributeName="opacity" values="0.2;0.6;0.2" dur="4s" repeatCount="indefinite"/></circle></svg>');
        background-size: 200px 200px;
        animation: float 20s linear infinite;
    }

    @keyframes float {
        0% { background-position: 0% 0%; }
        100% { background-position: 100% 100%; }
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2rem;
        font-weight: 400;
    }

    /* Buttons */
    .btn-primary-custom {
        background: var(--primary-color);
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        color: #fff;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary-custom:hover {
        background: #1976D2;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(34, 137, 255, 0.4);
        color: #fff;
    }

    .btn-outline-custom {
        border: 2px solid #fff;
        color: #fff;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        background: transparent;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-outline-custom:hover {
        background: #fff;
        color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 255, 255, 0.3);
    }

    /* Section Styles */
    .section-padding {
        padding: 80px 0;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 1rem;
        position: relative;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: var(--text-light);
        margin-bottom: 3rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Cards */
    .service-card {
        background: var(--card-bg);
        border-radius: 8px;
        padding: 2rem;
        height: 100%;
        transition: all 0.3s ease;
        border: 1px solid var(--border-color);
        position: relative;
        overflow: hidden;
        color: var(--text-dark);
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .service-card:hover::before {
        transform: scaleX(1);
    }

    .service-icon {
        width: 70px;
        height: 70px;
        background: var(--dark-color);
        border: 2px solid var(--primary-color);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        color: var(--primary-color);
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        background: var(--primary-color);
        color: #fff;
        transform: scale(1.1);
    }

    /* Footer */
    .footer {
        background: var(--dark-color);
        color: #fff;
        padding-top: 60px;
        padding-bottom: 20px;
    }

    .footer-section h5 {
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section ul li {
        margin-bottom: 0.5rem;
    }

    .footer-section ul li a {
        color: #ccc;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-section ul li a:hover {
        color: var(--primary-color);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .navbar-nav {
            text-align: center;
            margin-top: 1rem;
        }
        
        .hero-section {
            padding: 2rem 0;
            min-height: 80vh;
        }
    }

    /* Animation Classes */
    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }

    .fade-in-up.active {
        opacity: 1;
        transform: translateY(0);
    }

    .fade-in {
        opacity: 0;
        transition: opacity 0.8s ease;
    }

    .fade-in.active {
        opacity: 1;
    }

    /* Track shipment button */
    .track-btn {
        background: var(--primary-color);
        color: #fff;
        border: none;
        padding: 10px 25px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .track-btn:hover {
        background: #1976D2;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(34, 137, 255, 0.4);
    }

    /* Phone number styling */
    .phone-number {
        font-size: 1.1rem;
        font-weight: 600;
        color: #fff;
        text-decoration: none;
    }

    .phone-number:hover {
        color: var(--primary-color);
    }

    /* ===== LARGE SCREEN FIXES ===== */
    @media (min-width: 1400px) and (max-width: 1919.98px) {
        /* Extra Large Desktop - Container max width */
        .container {
            max-width: 1200px !important;
            padding-left: 20px !important;
            padding-right: 20px !important;
        }
        
        .navbar-content {
            padding: 0 20px !important;
        }
        
        /* Hero Section düzəlişləri */
        .hero-title {
            font-size: 3.5rem !important;
            line-height: 1.1 !important;
        }
        
        .hero-subtitle {
            font-size: 1.2rem !important;
        }
    }

    @media (min-width: 1920px) {
        /* TV/Ultra Wide Screens */
        .container {
            max-width: 1600px !important;
            padding-left: 25px !important;
            padding-right: 25px !important;
        }
        
        .navbar-content {
            padding: 0 25px !important;
        }
        
        /* Font sizes for large screens */
        .section-title {
            font-size: 3rem !important;
        }
        
        .hero-title {
            font-size: 4rem !important;
        }
    }

    /* ===== DESKTOP RESPONSIVE FIXES ===== */
    @media (min-width: 992px) and (max-width: 1919.98px) {
        /* Desktop Container düzəlişləri */
        .container {
            padding-left: 15px !important;
            padding-right: 15px !important;
        }
    }

    /* ===== TABLET RESPONSIVE FIXES ===== */
    @media (min-width: 768px) and (max-width: 991.98px) {
        /* Tablet Container düzəlişləri */
        .container {
            max-width: 100% !important;
            padding-left: 20px !important;
            padding-right: 20px !important;
        }
        
        .navbar-content {
            padding: 0 20px !important;
        }
    }

    /* ===== MOBILE RESPONSIVE FIXES ===== */
    @media (max-width: 767.98px) {
        /* Mobile Container düzəlişləri */
        .container {
            max-width: 100% !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        /* Section padding düzəlişləri */
        .section-padding {
            padding: 50px 0 !important;
        }

        /* Hero section düzəlişləri - Header.blade.php-də özelleşdirilmiş */
        /* Bu kısım header.blade.php-də daha detaylı tanımlandı */

        .hero-stats {
            margin-top: 1.5rem !important;
        }

        .stat-item {
            margin-bottom: 1rem;
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem !important;
        }

        .stat-label {
            font-size: 0.8rem !important;
        }

        /* Category cards düzəlişləri */
        .category-card {
            margin-bottom: 1rem !important;
            padding: 1.5rem !important;
        }

        .category-icon {
            width: 60px !important;
            height: 60px !important;
        }

        /* Service cards düzəlişləri */
        .service-card {
            margin-bottom: 1rem !important;
            padding: 1.5rem !important;
        }

        .service-icon {
            width: 60px !important;
            height: 60px !important;
        }
    }

    @media (max-width: 575.98px) {
        /* Extra small devices */
        .container {
            padding-left: 10px !important;
            padding-right: 10px !important;
            min-width: 320px !important; /* Minimum phone screen protection */
        }
        
        /* Overflow protection for small screens */
        body {
            min-width: 320px !important;
        }

        .hero-title {
            font-size: 1.5rem !important;
        }

        .hero-subtitle {
            font-size: 0.9rem !important;
        }

        .section-padding {
            padding: 30px 0 !important;
        }

        .btn-primary-custom,
        .btn-outline-custom {
            font-size: 0.8rem !important;
            padding: 0.6rem 1.2rem !important;
        }

        /* Hero actions - Header.blade.php-də özelleşdirilmiş */
        /* Bu qaydalr header.blade.php-də daha detaylı tanımlandı */
    }

    /* Viewport meta fix */
    @viewport {
        width: device-width;
        zoom: 1.0;
    }
</style>

<!-- Tailwind Config Kaldırıldı -->
