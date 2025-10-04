<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- Counter Up -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

<script>
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Navbar scroll effect
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            $('.navbar').addClass('scrolled');
        } else {
            $('.navbar').removeClass('scrolled');
        }
    });

    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 70
            }, 1000);
        }
    });

    // Mobile menu toggle
    $('.navbar-toggler').on('click', function() {
        $(this).toggleClass('active');
        $('.navbar-collapse').toggleClass('show');
    });

    // Counter animation
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    // Fade in elements on scroll
    function fadeInOnScroll() {
        $('.fade-in-up').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('active');
            }
        });

        $('.fade-in').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('active');
            }
        });
    }

    $(window).on('scroll', fadeInOnScroll);
    $(document).ready(fadeInOnScroll);

    // Preloader
    $(window).on('load', function() {
        $('#preloader').fadeOut(500);
    });


    // Form validation
    function validateForm(form) {
        let isValid = true;
        $(form).find('input[required], textarea[required]').each(function() {
            if (!$(this).val().trim()) {
                $(this).addClass('is-invalid');
                isValid = false;
            } else {
                $(this).removeClass('is-invalid');
            }
        });
        return isValid;
    }

    // Contact form submission
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        if (!validateForm(this)) {
            return;
        }

        // Show loading state
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Gönderiliyor...').prop('disabled', true);

        // Simulate form submission (replace with actual AJAX call)
        setTimeout(function() {
            submitBtn.html('<i class="fas fa-check"></i> Gönderildi!').removeClass('btn-primary-custom').addClass('bg-success');
            
            setTimeout(function() {
                submitBtn.html(originalText).prop('disabled', false).removeClass('bg-success').addClass('btn-primary-custom');
                $('#contactForm')[0].reset();
            }, 2000);
        }, 2000);
    });

    // Shipping tracker
    $('#trackingForm').on('submit', function(e) {
        e.preventDefault();
        
        const trackingNumber = $('#trackingNumber').val().trim();
        if (!trackingNumber) {
            $('#trackingNumber').addClass('is-invalid');
            return;
        }

        // Show loading state
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Aranıyor...').prop('disabled', true);

        // Simulate tracking (replace with actual API call)
        setTimeout(function() {
            const trackingResult = `
                <div class="alert alert-success mt-3">
                    <h5><i class="fas fa-check-circle"></i> Gönderi Bulundu!</h5>
                    <p><strong>Takip Numarası:</strong> ${trackingNumber}</p>
                    <p><strong>Durum:</strong> Transit - Dağıtım merkezinde</p>
                    <p><strong>Son Güncelleme:</strong> ${new Date().toLocaleString('tr-TR')}</p>
                </div>
            `;
            
            $('#trackingResult').html(trackingResult);
            submitBtn.html(originalText).prop('disabled', false);
        }, 1500);
    });

    // Services slider
    if ($('.services-swiper').length) {
        new Swiper('.services-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    }

    // Testimonials slider
    if ($('.testimonials-swiper').length) {
        new Swiper('.testimonials-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    }

    // Typing animation for hero title
    function typeWriter(element, text, speed = 50) {
        let i = 0;
        element.innerHTML = '';
        
        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        
        type();
    }

    // Initialize typing animation when page loads
    $(document).ready(function() {
        const heroTitle = document.querySelector('.hero-title');
        if (heroTitle) {
            const originalText = heroTitle.textContent;
            setTimeout(() => {
                typeWriter(heroTitle, originalText, 80);
            }, 1000);
        }
    });

    // Parallax effect for hero section
    $(window).scroll(function() {
        const scrolled = $(this).scrollTop();
        const parallax = $('.hero-section');
        const speed = scrolled * 0.5;
        
        parallax.css('background-position', `center ${speed}px`);
    });

    // Number animation
    function animateNumbers() {
        $('.animate-number').each(function() {
            const $this = $(this);
            const countTo = parseInt($this.attr('data-count'));
            
            if (!$this.hasClass('counted')) {
                $this.addClass('counted');
                $({ countNum: 0 }).animate({
                    countNum: countTo
                }, {
                    duration: 2500,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(countTo);
                    }
                });
            }
        });
    }

    // Trigger number animation when in viewport  
    function checkStatsVisibility() {
        $('.animate-number').each(function() {
            const $this = $(this);
            const elementTop = $this.offset().top;
            const elementBottom = elementTop + $this.outerHeight();
            const viewportTop = $(window).scrollTop();
            const viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < (viewportBottom - 100)) {
                if (!$this.hasClass('counted')) {
                    const countTo = parseInt($this.attr('data-count'));
                    $this.addClass('counted');
                    
                    $({ countNum: 0 }).animate({
                        countNum: countTo
                    }, {
                        duration: 2500,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(countTo);
                        }
                    });
                }
            }
        });
    }
    
    $(window).scroll(checkStatsVisibility);
    $(document).ready(function() {
        setTimeout(checkStatsVisibility, 1000);
    });

    // Cookie consent (optional)
    if (!localStorage.getItem('cookieConsent')) {
        setTimeout(function() {
            $('body').append(`
                <div class="cookie-consent position-fixed bottom-0 start-0 end-0 bg-dark text-white p-3 z-index-1050">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <p class="mb-0">Bu web sitesi deneyiminizi geliştirmek için çerezler kullanmaktadır.</p>
                            </div>
                            <div class="col-md-2 text-end">
                                <button class="btn btn-primary-custom btn-sm" onclick="acceptCookies()">Kabul Et</button>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        }, 2000);
    }

    window.acceptCookies = function() {
        localStorage.setItem('cookieConsent', 'true');
        $('.cookie-consent').fadeOut();
    };

    // Lazy loading for images
    if ('IntersectionObserver' in window) {
        const lazyImages = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => {
            imageObserver.observe(img);
        });
    }

    // Page loading animation
    $(document).ready(function() {
        $('body').addClass('loaded');
        
        // Stagger animations for service cards
        $('.service-card').each(function(index) {
            $(this).css('animation-delay', (index * 0.2) + 's');
        });
    });

    // Search functionality (if needed)
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        const searchTerm = $('#searchInput').val().trim();
        if (searchTerm) {
            // Implement search logic here
            console.log('Searching for:', searchTerm);
        }
    });
</script>

<style>
    /* Preloader */
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .preloader-spinner {
        width: 50px;
        height: 50px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }


    /* Loading states */
    body:not(.loaded) .fade-in-up {
        opacity: 0;
        transform: translateY(50px);
    }

    .service-card {
        opacity: 0;
        animation: slideInUp 0.6s ease forwards;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Cookie consent styling */
    .cookie-consent {
        z-index: 1050;
        box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.2);
    }
</style>

<!-- Preloader HTML -->
<div id="preloader">
    <div class="preloader-spinner"></div>
</div>

