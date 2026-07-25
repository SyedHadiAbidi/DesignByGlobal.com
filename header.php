<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="google-site-verification" content="6lIZEscBo76GKtDkt-a2p9nJ0ycTizIniAGAf-Z43OQ" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php 
    if ( ! current_theme_supports( 'title-tag' ) ) : ?>
        <title><?php wp_title('|', true, 'right'); ?> Design By Global</title>
    <?php endif; ?>
    
    <style id="dg-global-base">
        html { 
            scroll-behavior: smooth; 
        }
        body {
            background-color: #030303;
            color: #d4d4d8;
            font-family: 'Poppins', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            margin: 0;
            padding: 0;
            position: relative;
        }
        body ::selection {
            background-color: rgba(47, 228, 59, 0.3);
            color: #2fe43b;
        }
    </style>

    <style id="dg-header-styles">
        :root {
            --color-primary: #2fe43b;
            --color-bg-dark: #030303;
            --color-text-muted: rgba(255, 255, 255, 0.6);
            --color-border-green: rgba(47, 228, 59, 0.35);
            --color-border-green-hover: rgba(47, 228, 59, 0.8);
            --glass-blur: 24px;
            --ease-premium: cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Floating Capsule Wrapper */
        .dg-capsule-wrapper {
            position: fixed;
            top: 1rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            width: 95%;
            max-width: 56rem; 
        }

        @media (min-width: 768px) {
            .dg-capsule-wrapper {
                top: 1.5rem;
                width: 100%;
            }
        }

        /* Liquid Frosted Glass Navigation Bar */
        .dg-capsule-nav {
            background: linear-gradient(135deg, rgba(20, 20, 22, 0.7) 0%, rgba(5, 5, 5, 0.5) 100%);
            backdrop-filter: blur(var(--glass-blur)) saturate(190%);
            -webkit-backdrop-filter: blur(var(--glass-blur)) saturate(190%);
            border: 1px solid var(--color-border-green);
            border-radius: 9999px;
            padding: 0.5rem 0.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.7), 0 0 20px rgba(47, 228, 59, 0.05);
            transition: all 0.5s var(--ease-premium);
            position: relative;
            z-index: 1010;
        }

        @media (min-width: 768px) {
            .dg-capsule-nav {
                padding: 0.625rem 0.625rem 0.625rem 1.75rem;
                box-shadow: 0 30px 60px -10px rgba(0, 0, 0, 0.8), 0 0 25px rgba(47, 228, 59, 0.08);
            }
        }

        .dg-capsule-nav:hover {
            border-color: var(--color-border-green-hover);
            background: linear-gradient(135deg, rgba(25, 25, 28, 0.75) 0%, rgba(10, 10, 10, 0.55) 100%);
            box-shadow: 0 30px 60px -10px rgba(0, 0, 0, 0.9), 0 0 30px rgba(47, 228, 59, 0.2);
        }

        /* Mobile Hamburger Icon Setup (Left Side) */
        .dg-menu-toggle {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 1.75rem;
            height: 1.15rem;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
            margin-left: 0.5rem;
            z-index: 1010;
        }

        @media (min-width: 768px) {
            .dg-menu-toggle {
                display: none;
            }
        }

        .dg-menu-toggle span {
            width: 100%;
            height: 2px;
            background-color: #ffffff;
            border-radius: 2px;
            transition: all 0.3s var(--ease-premium);
            transform-origin: left center;
        }

        .dg-menu-toggle span:nth-child(2) {
            width: 75%; 
        }

        .dg-capsule-wrapper.is-active .dg-menu-toggle span:nth-child(1) {
            transform: rotate(45deg) translateY(-2px);
            background-color: var(--color-primary);
            width: 100%;
        }

        .dg-capsule-wrapper.is-active .dg-menu-toggle span:nth-child(2) {
            width: 0%;
            opacity: 0;
        }

        .dg-capsule-wrapper.is-active .dg-menu-toggle span:nth-child(3) {
            transform: rotate(-45deg) translateY(2px);
            background-color: var(--color-primary);
            width: 100%;
        }

        /* Branding Logo styling */
        .dg-nav-logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            z-index: 1010;
            transition: opacity 0.3s ease;
        }

        @media (min-width: 768px) {
            .dg-nav-logo {
                margin-right: auto;
            }
        }

        .dg-nav-logo:hover {
            opacity: 0.85;
        }

        .dg-header-logo-img {
            height: 26px; /* Crisp size for mobile */
            width: auto;
            display: block;
            object-fit: contain;
        }

        @media (min-width: 380px) {
            .dg-header-logo-img {
                height: 26px;
            }
        }

        @media (min-width: 768px) {
            .dg-header-logo-img {
                height: 35px; /* Perfect desktop size */
            }
        }

        /* Desktop Links Styling */
        .dg-nav-links {
            display: none;
            align-items: center;
            gap: 2.25rem;
            margin-right: 2.25rem;
        }

        @media (min-width: 768px) {
            .dg-nav-links {
                display: flex;
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                margin-right: 0;
            }
        }

        .dg-nav-links a {
            color: var(--color-text-muted);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.25rem 0;
        }

        .dg-nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 1px;
            background: var(--color-primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        /* Merged Hover and Active States for Desktop */
        .dg-nav-links a:hover,
        .dg-nav-links a.is-active {
            color: #ffffff;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.2);
        }

        .dg-nav-links a:hover::after,
        .dg-nav-links a.is-active::after {
            width: 80%;
        }

        /* Right Header Container Layout */
        .dg-nav-actions {
            display: flex;
            align-items: center;
        }

        /* Premium Call-to-Action Button */
        .dg-nav-cta {
            background: var(--color-primary);
            color: #000000;
            padding: 0.5rem 0.85rem;
            border-radius: 9999px;
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-decoration: none;
            white-space: nowrap;
            box-shadow: 0 8px 20px rgba(47, 228, 59, 0.2), inset 0 1px 1px rgba(255, 255, 255, 0.5);
            transition: all 0.4s var(--ease-premium);
            position: relative;
            overflow: hidden;
            z-index: 1010;
        }

        @media (min-width: 380px) {
            .dg-nav-cta {
                padding: 0.55rem 1.15rem;
                font-size: 0.6875rem;
                letter-spacing: 0.1em;
            }
        }

        @media (min-width: 768px) {
            .dg-nav-cta {
                padding: 0.75rem 1.75rem;
                font-size: 0.75rem;
                letter-spacing: 0.15em;
            }
        }

        .dg-nav-cta::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.4) 50%, rgba(255,255,255,0) 100%);
            transform: skewX(-25deg);
            transition: all 0.6s ease;
        }

        .dg-nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(47, 228, 59, 0.45), inset 0 1px 1px rgba(255, 255, 255, 0.7);
        }

        .dg-nav-cta:hover::after {
            left: 150%;
        }
        
        .dg-nav-cta:active {
            transform: scale(0.97);
        }

        /* Mobile Dropdown Panel */
        .dg-mobile-dropdown {
            position: absolute;
            top: calc(100% + 0.75rem);
            left: 0;
            width: 100%;
            background: linear-gradient(135deg, rgba(20, 20, 22, 0.95) 0%, rgba(5, 5, 5, 0.95) 100%);
            backdrop-filter: blur(var(--glass-blur)) saturate(190%);
            -webkit-backdrop-filter: blur(var(--glass-blur)) saturate(190%);
            border: 1px solid var(--color-border-green);
            border-radius: 1.5rem;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.4s var(--ease-premium);
            box-shadow: 0 20px 40px rgba(0,0,0,0.8), 0 0 20px rgba(47, 228, 59, 0.05);
            z-index: 1005;
        }

        .dg-capsule-wrapper.is-active .dg-mobile-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        @media (min-width: 768px) {
            .dg-mobile-dropdown {
                display: none;
            }
        }

        .dg-mobile-dropdown a {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }

        /* Merged Hover and Active States for Mobile */
        .dg-mobile-dropdown a:hover,
        .dg-mobile-dropdown a:active,
        .dg-mobile-dropdown a.is-active {
            color: #000000;
            background-color: var(--color-primary);
            transform: translateX(5px);
        }
    </style>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="dg-capsule-wrapper" id="dgCapsuleMenu">
        <div class="dg-capsule-nav">
            
            <!-- Left: Mobile Hamburger Toggle -->
            <button class="dg-menu-toggle" id="dgMenuButton" aria-label="Toggle Navigation Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <!-- Center: Company Branding / Image Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="dg-nav-logo">
                <img src="/wp-content/uploads/2026/06/tittle-logo-2.png" alt="design by global tittle logo" class="dg-header-logo-img">
            </a>

            <!-- Desktop Links Grid Navigation -->
            <nav class="dg-nav-links">
                <a href="<?php echo esc_url( home_url('/pricing/') ); ?>">Pricing</a>
                <a href="<?php echo esc_url( home_url('/case-studies/') ); ?>">Case Studies</a>
                <a href="<?php echo esc_url( home_url('/about/') ); ?>">About</a>
                <a href="<?php echo esc_url( home_url('/support/') ); ?>">Support</a>
            </nav>

            <!-- Right: Action & Interface Hub -->
            <div class="dg-nav-actions">
                <a href="<?php echo esc_url( site_url('/hire-talent/') ); ?>" class="dg-nav-cta">
                    Hire Talent
                </a>
            </div>
            
        </div>

        <!-- Sleek Mobile Dropdown Panel -->
        <nav class="dg-mobile-dropdown" id="dgMobileLinks">
            <a href="<?php echo esc_url( home_url('/how-it-works/') ); ?>">Process</a>
            <a href="<?php echo esc_url( home_url('/case-studies/') ); ?>">Work</a>
            <a href="<?php echo esc_url( home_url('/about/') ); ?>">About</a>
            <a href="<?php echo esc_url( home_url('/support/') ); ?>">Support</a>
        </nav>
    </header>

    <!-- Lightweight Functional Toggle & Active State Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuWrapper = document.getElementById('dgCapsuleMenu');
            const menuButton = document.getElementById('dgMenuButton');
            const mobileLinks = document.querySelectorAll('#dgMobileLinks a');
            const allNavLinks = document.querySelectorAll('.dg-nav-links a, .dg-mobile-dropdown a');

            // 1. Smart Active Navigation State Tracker
            const currentPath = window.location.pathname;
            
            allNavLinks.forEach(link => {
                const linkPath = new URL(link.href).pathname;
                
                // Highlight link if the current URL contains the link's path (ignores homepage root '/')
                if (linkPath !== '/' && currentPath.includes(linkPath)) {
                    link.classList.add('is-active');
                }
            });

            // 2. Toggle dropdown visibility
            function toggleMenu() {
                menuWrapper.classList.toggle('is-active');
            }

            menuButton.addEventListener('click', toggleMenu);

            // 3. Auto dismiss panel structure upon explicit link activation
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    menuWrapper.classList.remove('is-active');
                });
            });

            // 4. Close dropdown if clicking outside the header
            document.addEventListener('click', function(event) {
                const isClickInside = menuWrapper.contains(event.target);
                if (!isClickInside && menuWrapper.classList.contains('is-active')) {
                    menuWrapper.classList.remove('is-active');
                }
            });
        });
    </script>