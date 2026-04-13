/**
 * Main JavaScript File
 *
 * Frontend scripts for D-Theme
 *
 * @package D_Theme
 * @since 1.0.0
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        console.log('D-Theme loaded successfully');
        
        // Initialize theme features
        initMobileMenu();
        initSmoothScroll();
        initLazyLoading();
    });

    /**
     * Initialize mobile menu
     */
    function initMobileMenu() {
        const menuBtn = document.querySelector('.menu-toggle');
        const navMenu = document.querySelector('nav');

        if (!menuBtn || !navMenu) {
            return;
        }

        menuBtn.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            menuBtn.setAttribute(
                'aria-expanded',
                navMenu.classList.contains('active')
            );
        });
    }

    /**
     * Initialize smooth scroll
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') {
                    return;
                }

                const target = document.querySelector(href);
                if (!target) {
                    return;
                }

                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });
    }

    /**
     * Initialize lazy loading for images
     */
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const images = document.querySelectorAll('img[loading="lazy"]');

            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.removeAttribute('loading');
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));
        }
    }

    /**
     * Utility: Check if device is mobile
     * @return {boolean}
     */
    window.dTheme = window.dTheme || {};
    window.dTheme.isMobile = function() {
        return window.innerWidth < 768;
    };

    /**
     * Utility: Debounce function
     * @param {Function} func
     * @param {number} wait
     * @return {Function}
     */
    window.dTheme.debounce = function(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    };

    /**
     * Utility: Throttle function
     * @param {Function} func
     * @param {number} limit
     * @return {Function}
     */
    window.dTheme.throttle = function(func, limit) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => (inThrottle = false), limit);
            }
        };
    };

})();
