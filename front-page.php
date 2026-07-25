<?php get_header(); ?>

<style id="dg-global-hero-styles">
    
    /* ==========================================================================
       PREMIUM VARIABLES & BASE STYLES
       ========================================================================== */
    :root {
        --color-primary: #2fe43b;
        --color-primary-glow: rgba(47, 228, 59, 0.4);
        --color-border-green: rgba(47, 228, 59, 0.4);
        --color-border-green-hover: rgba(47, 228, 59, 0.8);
        --color-bg: #030303;
        --color-text: #ffffff;
        --color-muted: #a1a1aa;
        --color-surface: rgba(255, 255, 255, 0.015);
        --premium-ease: cubic-bezier(0.16, 1, 0.3, 1);
        
        /* Interactive Mesh Variables */
        --mesh-gap: 2px;
        --triangle-base: 60px;
        --triangle-base-height: calc(1.733 * var(--triangle-base));
        --triangle-width: calc(var(--triangle-base) - var(--mesh-gap));
        --triangle-height: calc(var(--triangle-base-height) - var(--mesh-gap));
    }

    body, .dg-global-wrapper *:not(i) {
        font-family: 'Poppins', sans-serif !important;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .dg-global-wrapper {
        position: relative;
        z-index: 0;
        background-color: var(--color-bg);
        color: var(--color-text);
        overflow-x: hidden;
        width: 100%;
    }

    .dg-global-wrapper::before {
        content: "";
        position: fixed; 
        inset: 0;
        z-index: 5;
        pointer-events: none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noiseFilter"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noiseFilter)"/%3E%3C/svg%3E');
        opacity: 0.04;
        mix-blend-mode: overlay;
    }

    .dg-global-wrapper ::selection {
        background-color: rgba(47, 228, 59, 0.2);
        color: var(--color-primary);
    }

    /* ==========================================================================
       GLOBAL INTERACTIVE MESH BACKGROUND
       ========================================================================== */
    .dg-fixed-mesh-bg {
        position: fixed;
        inset: 0;
        width: 100vw;
        height: 100vh;
        z-index: 1; 
        pointer-events: none;
        overflow: hidden;
    }

    #dg-global-glow {
        position: absolute;
        width: 60vw;
        height: 60vw;
        max-width: 900px;
        max-height: 900px;
        background: radial-gradient(circle closest-side, var(--color-primary-glow) 0%, transparent 100%);
        transform: translate(-50%, -50%);
        pointer-events: none;
        will-change: left, top;
        z-index: 1;
        opacity: 0.8;
        animation: glow-pulse 4s ease-in-out infinite alternate;
    }

    .dg-triangle-container {
        position: absolute;
        inset: 0;
        display: grid;
        grid-template-columns: repeat(var(--columns), calc(var(--triangle-base) * 2 + var(--mesh-gap)));
        width: 100%;
        height: 100%;
        z-index: 2;
        pointer-events: none;
    }

    .dg-triangle-set {
        display: inline-block;
        position: relative;
        width: calc(var(--triangle-base) * 2 + var(--mesh-gap));
        height: var(--triangle-base-height);
    }
    
    .dg-triangle-set--offset {
        transform: translateX(calc(-1 * var(--triangle-base) - 0.5 * var(--mesh-gap)));
    }
    
    .dg-triangle-set::before, 
    .dg-triangle-set::after {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        top: var(--mesh-gap);
        border-right: var(--triangle-width) solid transparent; 
        border-left: var(--triangle-width) solid transparent;
    }
    
    .dg-triangle-set::before {
        left: calc(-1 * var(--triangle-base));
        border-bottom: var(--triangle-height) solid var(--color-bg);
    }
    
    .dg-triangle-set::after {
        right: calc(var(--mesh-gap) * 2.5);
        border-top: var(--triangle-height) solid var(--color-bg);
    }

    /* ==========================================================================
       ANIMATIONS
       ========================================================================== */
    @keyframes fade-in-up {
        from { opacity: 0; transform: translate3d(0, 30px, 0); filter: blur(4px); }
        to   { opacity: 1; transform: translate3d(0, 0, 0);   filter: blur(0); }
    }
    @keyframes gradient-x {
        0%, 100% { background-position: 0% 50%; }
        50%       { background-position: 100% 50%; }
    }
    @keyframes dg-marquee {
        from { transform: translate3d(0, 0, 0); }
        to   { transform: translate3d(-100%, 0, 0); }
    }
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50%       { opacity: 0.6; transform: scale(1.2); }
    }
    @keyframes faq-fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes glow-pulse {
        0% { transform: translate(-50%, -50%) scale(0.95); opacity: 0.6; }
        100% { transform: translate(-50%, -50%) scale(1.05); opacity: 0.9; }
    }
    @keyframes dg-float-gentle {
        0%   { transform: translateY(0px); }
        50%  { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .animate-fade-in-up {
        opacity: 0;
        animation: fade-in-up 1.2s var(--premium-ease) forwards;
    }
    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient-x 10s ease infinite;
        will-change: background-position;
    }

    /* ==========================================================================
       LAYOUT
       ========================================================================== */
    .dg-container {
        width: 100%;
        max-width: 1440px;
        margin: 0 auto;
        padding: 0 1.25rem;
        position: relative;
        z-index: 10;
    }
    @media (min-width: 768px) { .dg-container { padding: 0 3rem; } }

    .dg-container-sm { max-width: 1200px; }
    .dg-text-center  { text-align: center; }
    .dg-relative     { position: relative; }
    .dg-flex         { display: flex; }
    .dg-flex-col     { flex-direction: column; }
    .dg-items-center { align-items: center; }
    .dg-justify-center { justify-content: center; }
    .dg-mb-10 { margin-bottom: 2rem; }
    @media (min-width: 768px) { .dg-mb-10 { margin-bottom: 2.5rem; } }

    /* ==========================================================================
       SECTION HEADINGS
       ========================================================================== */
    .dg-section-title {
        font-size: clamp(1.75rem, 6.5vw, 4.5rem);
        font-weight: 800;
        letter-spacing: -0.03em;
        margin: 0 0 0.75rem 0;
        line-height: 1.15;
    }
    .dg-section-title span { color: var(--color-primary); }

    .dg-section-subtitle {
        color: var(--color-muted);
        font-size: clamp(0.9rem, 3.5vw, 1.375rem);
        font-weight: 400;
        line-height: 1.6;
        max-width: 50rem;
        margin: 0 auto;
    }

    /* ==========================================================================
       HERO SECTION 
       ========================================================================== */
    .dg-hero-section {
        min-height: 100svh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding-top: 7rem;
        padding-bottom: 3rem;
        position: relative;
        z-index: 10;
    }
    @media (min-width: 768px) {
        .dg-hero-section { min-height: 95vh; padding-top: 12rem; padding-bottom: 6rem; }
    }

    .dg-hero-title {
        font-size: clamp(2.1rem, 8.5vw, 6.5rem);
        font-weight: 800;
        letter-spacing: -0.03em;
        line-height: 1.08;
        margin: 0 0 1rem 0;
    }
    @media (min-width: 768px) {
        .dg-hero-title { font-size: clamp(3rem, 10vw, 6.5rem); letter-spacing: -0.04em; margin-bottom: 1.5rem; }
    }

    .dg-hero-title-gradient {
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        background-image: linear-gradient(100deg, #ffffff 0%, rgba(47,228,59,0.9) 50%, #ffffff 100%);
        display: inline-block;
    }

    .dg-hero-subtitle {
        font-size: clamp(0.9rem, 3.5vw, 1.5rem);
        color: var(--color-text);
        font-weight: 400;
        line-height: 1.55;
        max-width: 54rem;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 2rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.8);
    }
    @media (min-width: 768px) {
        .dg-hero-subtitle { font-size: clamp(1.125rem, 3vw, 1.5rem); margin-bottom: 3.5rem; }
    }

    .dg-btn-group {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    @media (min-width: 480px) { .dg-btn-group { flex-direction: row; gap: 1rem; width: auto; } }
    @media (min-width: 768px) { .dg-btn-group { gap: 1.5rem; } }

    .dg-btn-primary, .dg-btn-secondary {
        height: 3.25rem;
        width: 100%;
        max-width: 280px;
        border-radius: 9999px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.6rem;
        text-decoration: none;
        font-size: 0.875rem;
        transition: all 0.3s var(--premium-ease);
    }
    @media (min-width: 480px) { .dg-btn-primary, .dg-btn-secondary { width: auto; max-width: none; padding: 0 1.75rem; } }
    @media (min-width: 768px) { .dg-btn-primary, .dg-btn-secondary { height: 4.25rem; padding: 0 2.5rem; font-size: 1rem; gap: 1rem; } }

    .dg-btn-primary {
        background: linear-gradient(135deg, #44f050 0%, #2fe43b 100%);
        color: #000;
        font-weight: 800;
        letter-spacing: 0.04em;
        box-shadow: 0 6px 24px rgba(47,228,59,0.25), inset 0 1px 1px rgba(255,255,255,0.4);
    }
    .dg-btn-primary:active { transform: scale(0.97); }
    @media (min-width: 768px) {
        .dg-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 15px 45px rgba(47,228,59,0.5), inset 0 1px 1px rgba(255,255,255,0.6); }
    }

    .dg-btn-secondary {
        background: #141414;
        border: 2px solid var(--color-border-green);
        color: #fff;
        font-weight: 600;
        backdrop-filter: blur(20px);
    }
    .dg-btn-secondary:active { transform: scale(0.97); }
    @media (min-width: 768px) {
        .dg-btn-secondary:hover { background: #141414; border-color: var(--color-border-green-hover); transform: translateY(-2px); box-shadow: 0 0 25px rgba(47,228,59,0.15); }
    }

    .dg-hero-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.6rem;
        margin-top: 2.5rem;
        width: 100%;
        padding-top: 1.5rem;
    }
    @media (min-width: 640px) { .dg-hero-stats { gap: 1.25rem; margin-top: 4rem; padding-top: 2.5rem; } }
    @media (min-width: 768px) { .dg-hero-stats { max-width: 1000px; gap: 2rem; margin-top: 6rem; padding-top: 3rem; } }

    .dg-stat-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem 0.5rem;
        background:  #141414;
        border: 2px solid var(--color-border-green);
        border-radius: 1rem;
        transition: all 0.4s var(--premium-ease);
        backdrop-filter: blur(10px);
    }
    @media (min-width: 768px) {
        .dg-stat-item { padding: 2.5rem 2rem; border-radius: 1.25rem; }
        .dg-stat-item:hover { border-color: var(--color-border-green-hover); transform: translateY(-5px); box-shadow: 0 15px 30px -10px rgba(0,0,0,0.5), 0 0 20px rgba(47,228,59,0.1); }
    }

    .dg-stat-number {
        font-size: clamp(1.5rem, 5vw, 3.5rem);
        font-weight: 800;
        color: #fff;
        margin-bottom: 0.25rem;
        letter-spacing: -0.03em;
        line-height: 1;
    }
    .dg-stat-label {
        font-size: clamp(0.55rem, 1.8vw, 0.875rem);
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--color-primary);
        font-weight: 700;
        opacity: 0.9;
        text-align: center;
    }

    .dg-trust-section { margin-top: 3rem; scroll-margin-top: 80px; position: relative; z-index: 10; }
    @media (min-width: 768px) { .dg-trust-section { margin-top: 8rem; } }

    .dg-trust-label {
        display: inline-block;
        color: rgba(255,255,255,0.8);
        font-size: 0.55rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        padding: 0.4rem 1rem;
        border-radius: 999px;
        background:  #141414;
        border: 2px solid var(--color-border-green);
        backdrop-filter: blur(10px);
    }
    @media (min-width: 768px) { .dg-trust-label { font-size: 0.75rem; margin-bottom: 3rem; padding: 0.75rem 2rem; } }

    .dg-trust-logos {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 1.75rem;
        opacity: 0.6;
        filter: grayscale(100%) contrast(100%);
        transition: all 0.6s var(--premium-ease);
    }
    @media (min-width: 768px) { .dg-trust-logos { gap: 5rem; } }
    .dg-trust-logos:hover { opacity: 1; filter: grayscale(0%) contrast(100%); }

    .dg-trust-logos i {
        font-size: 1.5rem;
        color: rgba(255,255,255,0.8);
        transition: all 0.4s var(--premium-ease);
    }
    @media (min-width: 768px) { .dg-trust-logos i { font-size: 2.75rem; } }
    .dg-trust-logos i:hover { transform: scale(1.15) translateY(-2px); color: #fff; filter: drop-shadow(0 0 15px rgba(47,228,59,0.5)); }

    /* ==========================================================================
       TALENT SECTION
       ========================================================================== */
    .dg-talent-section { padding: 4rem 0; scroll-margin-top: 60px; position: relative; z-index: 10; }
    @media (min-width: 768px) { .dg-talent-section { padding: 10rem 0; } }

    .dg-talent-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin-top: 2.5rem;
    }
    @media (min-width: 480px) { .dg-talent-grid { grid-template-columns: repeat(2, 1fr); gap: 1rem; } }
    @media (min-width: 768px) { .dg-talent-grid { gap: 2.5rem; margin-top: 5rem; } }

    .dg-talent-card {
        display: flex;
        align-items: center;
        padding: 1.1rem;
        border-radius: 1rem;
        background: #141414;
        border: 2px solid var(--color-border-green);
        text-decoration: none;
        transition: all 0.3s var(--premium-ease);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(16px);
    }
    @media (min-width: 768px) {
        .dg-talent-card { padding: 2.5rem; border-radius: 1.5rem; }
        .dg-talent-card:hover { border-color: var(--color-border-green-hover); transform: translateY(-4px); box-shadow: 0 20px 40px -10px rgba(0,0,0,0.5), 0 0 25px rgba(47,228,59,0.1); }
    }
    .dg-talent-card:active { transform: scale(0.98); }

    .dg-talent-icon {
        width: 2.75rem;
        height: 2.75rem;
        flex-shrink: 0;
        border-radius: 0.75rem;
        background: rgba(255,255,255,0.05);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: #fff;
        margin-right: 1rem;
        border: 2px solid var(--color-border-green);
        transition: all 0.3s var(--premium-ease);
    }
    @media (min-width: 768px) {
        .dg-talent-icon { width: 5rem; height: 5rem; border-radius: 1.25rem; font-size: 1.75rem; margin-right: 2rem; }
        .dg-talent-card:hover .dg-talent-icon { background: rgba(47,228,59,0.1); color: var(--color-primary); border-color: var(--color-primary); box-shadow: 0 0 20px rgba(47,228,59,0.2); }
    }

    .dg-talent-content h2 {
        color: #fff;
        font-size: 0.95rem;
        font-weight: 700;
        margin: 0 0 0.2rem 0;
        letter-spacing: -0.01em;
    }
    .dg-talent-content p {
        color: var(--color-muted);
        font-size: 0.8rem;
        font-weight: 400;
        margin: 0;
        line-height: 1.4;
    }
    @media (min-width: 768px) {
        .dg-talent-content h2 { font-size: 1.625rem; margin-bottom: 0.5rem; }
        .dg-talent-content p { font-size: 1.125rem; }
        .dg-talent-card:hover .dg-talent-content h2 { color: var(--color-primary); }
    }

    .dg-talent-arrow {
        margin-left: auto;
        color: var(--color-primary);
        font-size: 1rem;
        transition: all 0.3s var(--premium-ease);
        flex-shrink: 0;
        padding-left: 0.5rem;
    }
    @media (min-width: 768px) {
        .dg-talent-arrow { opacity: 0; transform: translateX(-15px); font-size: 1.75rem; }
        .dg-talent-card:hover .dg-talent-arrow { opacity: 1; transform: translateX(0); }
    }

    /* ==========================================================================
       FEATURES SECTION
       ========================================================================== */
    .dg-features-section { padding: 4rem 0; scroll-margin-top: 60px; position: relative; z-index: 10; }
    @media (min-width: 768px) { .dg-features-section { padding: 10rem 0; } }

    .dg-feature-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin-top: 2.5rem;
    }
    @media (min-width: 768px) { .dg-feature-grid { grid-template-columns: repeat(3, 1fr); gap: 3rem; margin-top: 6rem; } }

    .dg-feature-card {
        padding: 1.75rem;
        border-radius: 1.25rem;
        background: #141414;
        border: 2px solid var(--color-border-green);
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        transition: all 0.3s var(--premium-ease);
        position: relative;
        backdrop-filter: blur(16px);
    }
    @media (min-width: 768px) {
        .dg-feature-card { padding: 3rem; border-radius: 1.5rem; }
        .dg-feature-card:hover { transform: translateY(-10px); border-color: var(--color-border-green-hover); box-shadow: 0 25px 50px -10px rgba(0,0,0,0.5), 0 0 25px rgba(47,228,59,0.15); }
    }

    .dg-feature-icon {
        width: 3rem;
        height: 3rem;
        border-radius: 0.875rem;
        background: rgba(47,228,59,0.1);
        border: 2px solid var(--color-border-green-hover);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-primary);
        font-size: 1.2rem;
        margin-bottom: 1.25rem;
    }
    @media (min-width: 768px) {
        .dg-feature-icon { width: 5rem; height: 5rem; font-size: 2rem; border-radius: 1.25rem; margin-bottom: 2.5rem; }
        .dg-feature-card:hover .dg-feature-icon { border-color: var(--color-primary); }
    }

    .dg-feature-card h2 {
        font-size: 1.125rem;
        font-weight: 700;
        letter-spacing: -0.01em;
        margin: 0 0 0.6rem 0;
        color: #fff;
    }
    .dg-feature-card p {
        color: var(--color-muted);
        font-size: 0.9rem;
        line-height: 1.6;
        font-weight: 400;
        margin: 0;
    }
    @media (min-width: 768px) {
        .dg-feature-card h2 { font-size: 1.75rem; margin-bottom: 1.25rem; }
        .dg-feature-card p  { font-size: 1.125rem; line-height: 1.8; }
    }

    /* ==========================================================================
       PROCESS SECTION
       ========================================================================== */
    .dg-process-section { padding: 4rem 0; position: relative; overflow: hidden; scroll-margin-top: 60px; z-index: 10; }
    @media (min-width: 768px) { .dg-process-section { padding: 10rem 0; } }

    .dg-process-layout {
        display: flex;
        flex-direction: column;
        gap: 3rem;
        align-items: center;
    }
    @media (min-width: 768px) { .dg-process-layout { flex-direction: row; gap: 6rem; } }

    .dg-process-col { width: 100%; position: relative; }
    @media (min-width: 768px) { .dg-process-col { width: 50%; } }

    .dg-process-timeline {
        position: absolute;
        left: 1.75rem;
        top: 2rem;
        bottom: 2rem;
        width: 3px;
        background: linear-gradient(to bottom, rgba(47,228,59,0.8) 0%, rgba(47,228,59,0.2) 50%, transparent 100%);
        z-index: 1;
    }
    @media (min-width: 768px) { .dg-process-timeline { left: 3rem; width: 4px; } }

    .dg-process-step-card {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1rem;
        padding: 1.25rem;
        background: #141414;
        border: 2px solid var(--color-border-green);
        border-radius: 1rem;
        position: relative;
        z-index: 2;
        transition: all 0.3s var(--premium-ease);
        backdrop-filter: blur(12px);
    }
    @media (min-width: 768px) {
        .dg-process-step-card { gap: 2.5rem; margin-bottom: 3rem; padding: 2.5rem; border-radius: 1.5rem; }
        .dg-process-step-card:hover { border-color: var(--color-border-green-hover); transform: translateX(15px); box-shadow: 0 15px 40px -10px rgba(0,0,0,0.5), 0 0 20px rgba(47,228,59,0.15); }
    }

    .dg-step-number-glow {
        width: 2.75rem;
        height: 2.75rem;
        flex-shrink: 0;
        border-radius: 50%;
        background: #030303;
        border: 2px solid var(--color-primary);
        color: var(--color-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1rem;
        box-shadow: 0 0 16px rgba(47,228,59,0.2), inset 0 0 8px rgba(47,228,59,0.1);
        transition: all 0.3s ease;
    }
    @media (min-width: 768px) {
        .dg-step-number-glow { width: 4.5rem; height: 4.5rem; font-size: 1.75rem; border: 3px solid var(--color-primary); box-shadow: 0 0 25px rgba(47,228,59,0.3), inset 0 0 15px rgba(47,228,59,0.15); }
        .dg-process-step-card:hover .dg-step-number-glow { background: var(--color-primary); color: #000; box-shadow: 0 0 40px rgba(47,228,59,0.6); }
    }

    .dg-step-content-box h2 {
        font-size: 1rem;
        font-weight: 700;
        color: #fff;
        margin: 0.15rem 0 0.3rem 0;
        letter-spacing: -0.01em;
    }
    .dg-step-content-box p {
        color: var(--color-muted);
        font-size: 0.85rem;
        font-weight: 400;
        line-height: 1.5;
        margin: 0;
    }
    @media (min-width: 768px) {
        .dg-step-content-box h2 { font-size: 1.75rem; margin-bottom: 0.75rem; margin-top: 0.5rem; }
        .dg-step-content-box p  { font-size: 1.125rem; line-height: 1.7; }
    }

    /* Match widget */
    .dg-talent-match-widget {
        position: relative;
        width: 100%;
        max-width: 380px;
        margin: 0 auto;
        background: #141414;
        border: 2px solid var(--color-border-green);
        border-radius: 1.25rem;
        padding: 1.5rem;
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.6), 0 0 30px rgba(47,228,59,0.1);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
    }
    @media (min-width: 768px) {
        .dg-talent-match-widget { max-width: 500px; border-radius: 2rem; padding: 3rem; animation: dg-float-gentle 6s ease-in-out infinite; }
        .dg-talent-match-widget:hover { border-color: var(--color-border-green-hover); box-shadow: 0 40px 80px -20px rgba(0,0,0,0.8), 0 0 70px rgba(47,228,59,0.25); }
    }

    .dg-talent-match-widget::before {
        content: '';
        position: absolute;
        inset: -1px;
        border-radius: 1.25rem;
        z-index: -1;
        background: linear-gradient(135deg, rgba(47,228,59,0.5), transparent 50%);
        opacity: 0.3;
    }
    @media (min-width: 768px) { .dg-talent-match-widget::before { border-radius: 2rem; } }

    .dg-widget-header {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        margin-bottom: 1.25rem;
        padding-bottom: 1rem;
    }
    @media (min-width: 768px) { .dg-widget-header { gap: 1rem; margin-bottom: 3rem; padding-bottom: 2rem; } }

    .dg-widget-status-dot {
        width: 0.6rem;
        height: 0.6rem;
        border-radius: 50%;
        background-color: var(--color-primary);
        box-shadow: 0 0 12px var(--color-primary);
        animation: pulse-dot 2s infinite;
    }
    @media (min-width: 768px) { .dg-widget-status-dot { width: 0.75rem; height: 0.75rem; } }

    .dg-widget-status-text {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: rgba(255,255,255,0.8);
        font-weight: 700;
    }
    @media (min-width: 768px) { .dg-widget-status-text { font-size: 1rem; } }

    .dg-widget-profile {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.25rem;
    }
    @media (min-width: 768px) { .dg-widget-profile { gap: 2rem; margin-bottom: 3rem; } }

    .dg-widget-avatar {
        width: 3.25rem;
        height: 3.25rem;
        border-radius: 50%;
        background: rgba(47,228,59,0.1);
        border: 2px dashed var(--color-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
        color: var(--color-primary);
        flex-shrink: 0;
    }
    @media (min-width: 768px) { .dg-widget-avatar { width: 6rem; height: 6rem; font-size: 2.25rem; } }

    .dg-widget-lines { flex-grow: 1; display: flex; flex-direction: column; gap: 0.6rem; }
    .dg-widget-line-1 { height: 0.75rem; width: 70%; background: rgba(47,228,59,0.2); border-radius: 999px; }
    .dg-widget-line-2 { height: 0.6rem; width: 40%; background: rgba(47,228,59,0.1); border-radius: 999px; }
    @media (min-width: 768px) {
        .dg-widget-lines { gap: 1rem; }
        .dg-widget-line-1 { height: 1.25rem; }
        .dg-widget-line-2 { height: 1rem; }
    }

    .dg-widget-match-score {
        background: rgba(47,228,59,0.05);
        border: 2px solid var(--color-border-green-hover);
        border-radius: 0.875rem;
        padding: 1rem;
        text-align: center;
    }
    @media (min-width: 768px) { .dg-widget-match-score { border-radius: 1.25rem; padding: 2rem; } }

    .dg-widget-match-score h2 {
        color: var(--color-primary);
        font-size: 1.75rem;
        font-weight: 800;
        margin: 0 0 0.2rem 0;
    }
    .dg-widget-match-score p {
        color: rgba(255,255,255,0.7);
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin: 0;
        font-weight: 600;
    }
    @media (min-width: 768px) {
        .dg-widget-match-score h2 { font-size: 3rem; margin-bottom: 0.5rem; }
        .dg-widget-match-score p  { font-size: 1rem; }
    }

 /* ==========================================================================
   NEW TEAM SECTION (REAL PORTRAITS - ELITE UI UPGRADE)
   ========================================================================== */

.dg-team-section { 
    padding: 6rem 0; 
    position: relative; 
    overflow: hidden; 
    z-index: 10;
}

.dg-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.dg-text-center { 
    text-align: center; 
}

.dg-mb-10 { 
    margin-bottom: 4rem; 
}

.dg-section-title {
    font-size: 2.75rem;
    font-weight: 800;
    color: #ffffff;
    margin-top: 0;
    margin-bottom: 1rem;
    letter-spacing: -0.02em;
}

.dg-section-title span {
    color: #2fe43b; /* Premium accent colour */
}

.dg-section-subtitle {
    color: #a0a0a0;
    font-size: 1.1rem;
    max-width: 650px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Grid Layout Configuration */
.dg-team-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.75rem;
}
@media (min-width: 640px) { .dg-team-grid { grid-template-columns: repeat(2, 1fr); } }
@media (min-width: 1024px) { .dg-team-grid { grid-template-columns: repeat(4, 1fr); gap: 2rem; } }

/* Ultra-Premium Glassmorphism Team Card */
.dg-team-card {
    background: linear-gradient(180deg, rgba(25, 25, 25, 0.65) 0%, rgba(10, 10, 10, 0.95) 100%);
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 1.75rem;
    padding: 3rem 1.5rem 2.5rem;
    text-align: center;
    transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
    z-index: 1;
    backdrop-filter: blur(30px);
    -webkit-backdrop-filter: blur(30px);
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Backlit Radial Glow Pattern */
.dg-team-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: radial-gradient(circle at 50% 0%, rgba(47, 228, 59, 0.18), transparent 65%);
    opacity: 0;
    transition: opacity 0.6s ease;
    z-index: -1;
}

/* Hover Physics Engine */
.dg-team-card:hover {
    transform: translateY(-14px) scale(1.02);
    border-color: rgba(47, 228, 59, 0.45);
    box-shadow: 0 30px 60px -15px rgba(0,0,0,0.95), 0 0 40px rgba(47, 228, 59, 0.15);
}

.dg-team-card:hover::before {
    opacity: 1;
}

/* Avatar Border Lighting Effects */
.dg-team-avatar {
    width: 6.75rem;
    height: 6.75rem;
    margin-bottom: 1.5rem;
    border-radius: 50%;
    padding: 4px;
    background: linear-gradient(135deg, rgba(255,255,255,0.12), rgba(255,255,255,0.02));
    border: 1px solid rgba(255,255,255,0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.dg-team-avatar img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #0f0f0f;
    transition: all 0.6s ease;
}

.dg-team-card:hover .dg-team-avatar {
    background: linear-gradient(135deg, #2fe43b, rgba(47,228,59,0.2));
    border-color: rgba(47, 228, 59, 0.6);
    transform: scale(1.06) rotate(2deg);
    box-shadow: 0 0 30px rgba(47,228,59,0.35);
}

/* Typography elements */
.dg-team-card h2 {
    font-size: 1.4rem;
    font-weight: 800;
    color: #ffffff;
    margin: 0 0 0.4rem 0;
    letter-spacing: -0.02em;
    transition: color 0.3s ease;
}

.dg-team-card:hover h2 {
    color: #2fe43b;
}

p.dg-team-role {
    display: inline-block;
    background: rgba(255, 255, 255, 0.03);
    color: #a1a1aa;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    font-weight: 700;
    margin: 0 0 1.2rem 0;
    padding: 0.4rem 0.8rem;
    border-radius: 999px;
    border: 1px solid rgba(255, 255, 255, 0.08);
    transition: all 0.4s ease;
}

.dg-team-card:hover p.dg-team-role {
    background: rgba(47, 228, 59, 0.1);
    color: #2fe43b;
    border-color: rgba(47, 228, 59, 0.25);
}

p.dg-team-desc {
    color: #94949e;
    font-size: 0.85rem;
    line-height: 1.65;
    margin: 0 0 1.75rem 0;
    flex-grow: 1; /* Aligns skills section seamlessly at bottom */
}

/* Micro-Glowing Skill Badges Engine */
.dg-team-skills {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
    width: 100%;
    margin-top: auto;
}

.dg-skill-badge {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.05);
    color: #e4e4e7;
    font-size: 0.725rem;
    font-weight: 600;
    padding: 0.35rem 0.7rem;
    border-radius: 0.5rem;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    letter-spacing: -0.01em;
}

.dg-team-card:hover .dg-skill-badge {
    background: rgba(255, 255, 255, 0.04);
    border-color: rgba(255, 255, 255, 0.12);
    color: #ffffff;
}

/* Individual badge micro-lighting on indirect pointer focus */
.dg-skill-badge:hover {
    background: rgba(47, 228, 59, 0.15) !important;
    border-color: #2fe43b !important;
    color: #2fe43b !important;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 5px 15px rgba(47, 228, 59, 0.2);
}
    /* ==========================================================================
       TESTIMONIALS
       ========================================================================== */
    .dg-testimonials-section { padding: 4rem 0; position: relative; overflow: hidden; scroll-margin-top: 60px; z-index: 10; }
    @media (min-width: 768px) { .dg-testimonials-section { padding: 10rem 0; } }

    .dg-marquee-wrapper {
        position: relative;
        width: 100%;
        display: flex;
        padding: 1.5rem 0;
    }
    @media (min-width: 768px) { .dg-marquee-wrapper { padding: 4rem 0; } }

    .dg-marquee-fade-left  { position: absolute; top: 0; bottom: 0; left: 0; width: 3rem; background: linear-gradient(to right, var(--color-bg), rgba(3,3,3,0.5) 50%, transparent); z-index: 10; pointer-events: none; }
    .dg-marquee-fade-right { position: absolute; top: 0; bottom: 0; right: 0; width: 3rem; background: linear-gradient(to left, var(--color-bg), rgba(3,3,3,0.5) 50%, transparent); z-index: 10; pointer-events: none; }
    @media (min-width: 768px) { .dg-marquee-fade-left, .dg-marquee-fade-right { width: 12rem; } }

    .dg-marquee-track {
        display: flex;
        flex-shrink: 0;
        gap: 1rem;
        padding-right: 1rem;
        animation: dg-marquee 30s linear infinite;
        will-change: transform;
    }
    @media (min-width: 768px) { .dg-marquee-track { gap: 3rem; padding-right: 3rem; animation: dg-marquee 70s linear infinite; } }

    .dg-marquee-track.reverse { animation-direction: reverse; }
    .dg-marquee-wrapper:hover .dg-marquee-track { animation-play-state: paused; }

    .dg-review-card {
        width: 78vw;
        max-width: 320px;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        padding: 1.5rem;
        border-radius: 1rem;
        position: relative;
        background: #141414;
        border: 2px solid var(--color-border-green);
        box-shadow: 0 10px 20px -5px rgba(0,0,0,0.3);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }
    @media (min-width: 768px) {
        .dg-review-card { max-width: 520px; padding: 3.5rem; border-radius: 1.75rem; }
        .dg-review-card:hover { z-index: 20; transform: scale(1.02) translateY(-8px); border-color: var(--color-border-green-hover); box-shadow: 0 35px 70px -15px rgba(0,0,0,0.6), 0 0 40px rgba(47,228,59,0.15); }
    }

    .dg-review-quote-icon {
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 0;
        color: rgba(47,228,59,0.1);
        font-size: 2.25rem;
    }
    @media (min-width: 768px) { .dg-review-quote-icon { top: 3.5rem; right: 3.5rem; font-size: 4.5rem; color: rgba(255,255,255,0.02); } }
    @media (min-width: 768px) { .dg-review-card:hover .dg-review-quote-icon { color: rgba(47,228,59,0.2); transform: scale(1.05) rotate(5deg); } }

    .dg-review-stars {
        color: var(--color-primary);
        font-size: 0.75rem;
        margin-bottom: 0.75rem;
        display: flex;
        gap: 0.25rem;
        filter: drop-shadow(0 0 6px rgba(47,228,59,0.5));
    }
    @media (min-width: 768px) { .dg-review-stars { font-size: 1.125rem; margin-bottom: 2.5rem; gap: 0.5rem; } }

    .dg-review-text {
        color: #d4d4d8;
        font-size: 0.85rem;
        line-height: 1.55;
        margin-bottom: 1rem;
        font-weight: 400;
        position: relative;
        z-index: 10;
    }
    @media (min-width: 768px) { .dg-review-text { font-size: 1.25rem; line-height: 1.7; margin-bottom: 3rem; } }

    .dg-review-author {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-top: auto;
        padding-top: 1rem;
    }
    @media (min-width: 768px) { .dg-review-author { gap: 1.5rem; padding-top: 2.5rem; } }

    .dg-author-avatar {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background: rgba(47,228,59,0.1);
        color: var(--color-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.8rem;
        border: 2px dashed var(--color-border-green);
        flex-shrink: 0;
    }
    @media (min-width: 768px) { .dg-author-avatar { width: 4rem; height: 4rem; font-size: 1.25rem; } }

    .dg-author-name {
        color: #fff;
        font-weight: 700;
        font-size: 0.875rem;
        letter-spacing: 0.01em;
        margin: 0;
    }
    .dg-author-role {
        color: #71717a;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-top: 0.2rem;
        font-weight: 600;
    }
    @media (min-width: 768px) {
        .dg-author-name { font-size: 1.25rem; }
        .dg-author-role { font-size: 0.9375rem; margin-top: 0.35rem; }
    }

    /* ==========================================================================
       FAQ SECTION
       ========================================================================== */
    .dg-faq-section { padding: 4rem 0; scroll-margin-top: 60px; position: relative; z-index: 10; }
    @media (min-width: 768px) { .dg-faq-section { padding: 10rem 0; } }

    .dg-faq-list {
        max-width: 1000px;
        margin: 2.5rem auto 0;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    @media (min-width: 768px) { .dg-faq-list { margin: 5rem auto 0; gap: 1.5rem; } }

    details.dg-faq-item {
        background: #141414;
        border: 2px solid var(--color-border-green);
        border-radius: 1rem;
        overflow: hidden;
        transition: all 0.3s var(--premium-ease);
        backdrop-filter: blur(12px);
    }
    @media (min-width: 768px) {
        details.dg-faq-item { border-radius: 1.5rem; }
        details.dg-faq-item:hover { border-color: var(--color-border-green-hover); }
    }
    details.dg-faq-item[open] { border-color: var(--color-primary); box-shadow: 0 10px 25px -8px rgba(0,0,0,0.5); }
    @media (min-width: 768px) { details.dg-faq-item[open] { box-shadow: 0 20px 40px -10px rgba(0,0,0,0.6), 0 0 20px rgba(47,228,59,0.15); } }

    summary.dg-faq-question {
        padding: 1.1rem 1.25rem;
        font-size: 0.95rem;
        font-weight: 700;
        color: #fff;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        list-style: none;
        outline: none;
        gap: 0.75rem;
    }
    @media (min-width: 768px) { summary.dg-faq-question { padding: 2rem 2.5rem; font-size: 1.375rem; gap: 1.5rem; } }
    summary.dg-faq-question::-webkit-details-marker { display: none; }

    .dg-faq-icon {
        color: var(--color-primary);
        font-size: 0.875rem;
        transition: transform 0.3s var(--premium-ease);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        background: rgba(47,228,59,0.15);
        flex-shrink: 0;
        border: 2px solid var(--color-border-green);
    }
    @media (min-width: 768px) { .dg-faq-icon { font-size: 1.5rem; width: 3rem; height: 3rem; } }

    details.dg-faq-item[open] .dg-faq-icon { transform: rotate(45deg); background: rgba(47,228,59,0.25); border-color: var(--color-primary); }

    .dg-faq-answer {
        padding: 0 1.25rem 1.25rem 1.25rem;
        color: var(--color-muted);
        font-size: 0.875rem;
        line-height: 1.65;
        font-weight: 400;
        animation: faq-fade-in 0.3s var(--premium-ease) forwards;
    }
    @media (min-width: 768px) { .dg-faq-answer { padding: 0 2.5rem 2.5rem 2.5rem; font-size: 1.125rem; line-height: 1.8; } }

    /* ==========================================================================
       CTA SECTION
       ========================================================================== */
    .dg-cta-section { padding: 4rem 0; position: relative; overflow: hidden; z-index: 10; }
    @media (min-width: 768px) { .dg-cta-section { padding: 10rem 0 6rem 0; } }

    .dg-cta-card-wrapper {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 1.5rem;
        border-radius: 1.25rem;
        background: #141414;
        border: 2px solid var(--color-border-green);
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.7);
        text-align: center;
        overflow: hidden;
        transition: all 0.4s ease;
        backdrop-filter: blur(20px);
    }
    @media (min-width: 768px) {
        .dg-cta-card-wrapper { padding: 8rem 5rem; border-radius: 2.5rem; box-shadow: 0 50px 100px -20px rgba(0,0,0,0.8), 0 0 50px rgba(47,228,59,0.15); }
        .dg-cta-card-wrapper:hover { border-color: var(--color-border-green-hover); box-shadow: 0 50px 100px -20px rgba(0,0,0,0.8), 0 0 80px rgba(47,228,59,0.25); }
    }

    .dg-cta-card-wrapper::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.15;
        background-image: linear-gradient(rgba(47,228,59,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(47,228,59,0.3) 1px, transparent 1px);
        background-size: 20px 20px;
        z-index: 1;
        pointer-events: none;
    }
    @media (min-width: 768px) { .dg-cta-card-wrapper::before { background-size: 40px 40px; } }

    .dg-cta-card-glow {
        position: absolute;
        bottom: -30%;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        height: 70%;
        background: radial-gradient(ellipse at bottom center, rgba(47,228,59,0.25) 0%, rgba(0,0,0,0) 70%);
        z-index: 1;
        pointer-events: none;
        border-radius: 50%;
    }

    .dg-cta-content { position: relative; z-index: 10; display: flex; flex-direction: column; align-items: center; }

    .dg-cta-title {
        font-size: clamp(2rem, 7.5vw, 5rem);
        font-weight: 900;
        letter-spacing: -0.04em;
        margin: 0 0 1rem 0;
        color: #fff;
        line-height: 1.1;
    }
    @media (min-width: 768px) { .dg-cta-title { margin-bottom: 2rem; } }
    .dg-cta-title span { color: var(--color-primary); }

    .dg-cta-subtitle {
        color: var(--color-muted);
        font-size: clamp(0.9rem, 3.5vw, 1.5rem);
        font-weight: 400;
        margin-bottom: 2rem;
        max-width: 44rem;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }
    @media (min-width: 768px) { .dg-cta-subtitle { margin-bottom: 4rem; } }

    .dg-cta-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 3.25rem;
        width: 100%;
        max-width: 260px;
        padding: 0 1.75rem;
        white-space: nowrap;
        background: linear-gradient(135deg, #44f050 0%, #2fe43b 100%);
        color: #000;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.08em;
        border-radius: 9999px;
        text-decoration: none;
        box-shadow: 0 10px 30px rgba(47,228,59,0.3), inset 0 1px 1px rgba(255,255,255,0.5);
        transition: all 0.3s var(--premium-ease);
    }
    @media (min-width: 640px) {
        .dg-cta-btn { width: auto; max-width: none; height: 5rem; padding: 0 4rem; font-size: 1.125rem; letter-spacing: 0.15em; }
    }
    .dg-cta-btn i { margin-left: 0.75rem; transition: transform 0.3s ease; }
    @media (min-width: 768px) { .dg-cta-btn i { margin-left: 1.25rem; font-size: 1.25rem; } }
    .dg-cta-btn:active { transform: scale(0.97); }
    @media (min-width: 768px) {
        .dg-cta-btn:hover { transform: translateY(-4px); box-shadow: 0 20px 60px rgba(47,228,59,0.4), inset 0 1px 1px rgba(255,255,255,0.8); }
        .dg-cta-btn:hover i { transform: translateX(6px); }
    }
</style>

<main class="dg-global-wrapper">

    <!-- Global Fixed Interactive Mesh Background -->
    <div class="dg-fixed-mesh-bg">
        <div id="dg-global-glow"></div>
        <div class="dg-triangle-container" id="dg-triangle-grid"></div>
    </div>
    
    <section class="dg-hero-section">
        <div class="dg-container dg-text-center dg-flex dg-flex-col dg-items-center dg-justify-center" style="flex-grow: 1;">
            
            <h2 class="dg-hero-title animate-fade-in-up" style="animation-delay: 0.1s;">
                Deploy elite tech teams <br/>
                <span class="dg-hero-title-gradient animate-gradient-x">in hours, not weeks.</span>
            </h2>

            <p class="dg-hero-subtitle animate-fade-in-up" style="animation-delay: 0.2s;">
                Access vetted developers, designers, and product specialists matched to your stack, timeline, and company culture within 48 hours.
            </p>

            <div class="dg-btn-group animate-fade-in-up" style="animation-delay: 0.3s;">
                <a href="<?php echo site_url('/hire-talent'); ?>" class="dg-btn-primary">
                    Hire Talent Now <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="#process" class="dg-btn-secondary">
                    <i class="fa-solid fa-play" style="font-size: 0.75rem; opacity: 0.7;"></i> How it works
                </a>
            </div>

            <div class="dg-hero-stats animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="dg-stat-item">
                    <span class="dg-stat-number">48h</span>
                    <span class="dg-stat-label">Match Window</span>
                </div>
                <div class="dg-stat-item">
                    <span class="dg-stat-number">2.3%</span>
                    <span class="dg-stat-label">Talent Pool</span>
                </div>
                <div class="dg-stat-item">
                    <span class="dg-stat-number">0 Risk</span>
                    <span class="dg-stat-label">Trial Period</span>
                </div>
            </div>
        </div>

        <div id="reviews" class="dg-container dg-text-center dg-trust-section animate-fade-in-up" style="animation-delay: 0.5s;">
            <p class="dg-trust-label">Trusted by companies scaling product teams</p>
            <div class="dg-trust-logos">
                <i class="fa-brands fa-stripe"></i>
                <i class="fa-brands fa-aws"></i>
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-meta"></i>
                <i class="fa-brands fa-microsoft"></i>
            </div>
        </div>
    </section>

    <section id="talent" class="dg-talent-section">
        <div class="dg-container dg-container-sm">
            <div class="dg-text-center dg-mb-10">
                <h2 class="dg-section-title">What kind of talent are you <span>hiring?</span></h2>
                <p class="dg-section-subtitle">Choose the role that you need to fill first.</p>
            </div>
            <div class="dg-talent-grid">
                <a href="<?php echo site_url('/hire-talent/'); ?>" class="dg-talent-card">
                    <div class="dg-talent-icon"><i class="fa-solid fa-code"></i></div>
                    <div class="dg-talent-content"><h2>Developers</h2><p>Front-end, back-end, mobile, and more</p></div>
                    <i class="fa-solid fa-arrow-right dg-talent-arrow"></i>
                </a>
                <a href="<?php echo site_url('/hire-talent/'); ?>" class="dg-talent-card">
                    <div class="dg-talent-icon"><i class="fa-solid fa-pen-nib"></i></div>
                    <div class="dg-talent-content"><h2>Designers</h2><p>UI/UX, product, graphic, and more</p></div>
                    <i class="fa-solid fa-arrow-right dg-talent-arrow"></i>
                </a>
                <a href="<?php echo site_url('/hire-talent/'); ?>" class="dg-talent-card">
                    <div class="dg-talent-icon"><i class="fa-solid fa-bullhorn"></i></div>
                    <div class="dg-talent-content"><h2>Marketers</h2><p>Paid search, SEO, email, and more</p></div>
                    <i class="fa-solid fa-arrow-right dg-talent-arrow"></i>
                </a>
                <a href="<?php echo site_url('/hire-talent/'); ?>" class="dg-talent-card">
                    <div class="dg-talent-icon"><i class="fa-solid fa-cubes"></i></div>
                    <div class="dg-talent-content"><h2>Product managers</h2><p>Software, growth, data, and more</p></div>
                    <i class="fa-solid fa-arrow-right dg-talent-arrow"></i>
                </a>
            </div>
        </div>
    </section>

    <section id="features" class="dg-features-section">
        <div class="dg-container">
            <div class="dg-text-center dg-mb-10">
                <h2 class="dg-section-title">Why choose <span>Design By Global</span>?</h2>
                <p class="dg-section-subtitle">We eliminate the friction of traditional hiring. Get direct access to pre-vetted senior professionals who are ready to make an impact from day one.</p>
            </div>
            <div class="dg-feature-grid">
                <div class="dg-feature-card">
                    <div class="dg-feature-icon"><i class="fa-solid fa-ranking-star"></i></div>
                    <h2>Top 2.3% Talent</h2>
                    <p>Every candidate goes through a rigorous multi-stage vetting process testing technical skills, communication, and problem-solving.</p>
                </div>
                <div class="dg-feature-card">
                    <div class="dg-feature-icon"><i class="fa-solid fa-bolt"></i></div>
                    <h2>48-Hour Matching</h2>
                    <p>Stop waiting weeks for interviews. Tell us what you need, and we'll introduce you to the perfect match within 48 hours.</p>
                </div>
                <div class="dg-feature-card">
                    <div class="dg-feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h2>Zero Risk Trial</h2>
                    <p>Work with your new team member for a trial period. If it's not a perfect fit, you pay nothing and we'll rematch you immediately.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="process" class="dg-process-section">
        <div class="dg-container">
            <div class="dg-process-layout">
                <div class="dg-process-col">
                    <h2 class="dg-section-title" style="text-align: left;">How it works</h2>
                    <p class="dg-section-subtitle" style="margin: 0 0 2rem 0; text-align: left;">A streamlined process designed to save you hundreds of hours in sourcing, vetting, and interviewing.</p>
                    <div style="position: relative;">
                        <div class="dg-process-timeline"></div>
                        <div class="dg-process-step-card">
                            <div class="dg-step-number-glow">1</div>
                            <div class="dg-step-content-box">
                                <h2>Tell us your needs</h2>
                                <p>Fill out a quick form detailing the role, tech stack, and your company culture.</p>
                            </div>
                        </div>
                        <div class="dg-process-step-card">
                            <div class="dg-step-number-glow">2</div>
                            <div class="dg-step-content-box">
                                <h2>Meet your match</h2>
                                <p>Within 48 hours, we'll introduce you to 1-3 highly vetted candidates that fit your exact requirements.</p>
                            </div>
                        </div>
                        <div class="dg-process-step-card">
                            <div class="dg-step-number-glow">3</div>
                            <div class="dg-step-content-box">
                                <h2>Start building</h2>
                                <p>Onboard your new team member and start building. We handle all the compliance, contracts, and payroll.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dg-process-col" style="display: flex; align-items: center; justify-content: center; padding-top: 1rem;">
                    <div class="dg-talent-match-widget">
                        <div class="dg-widget-header">
                            <div class="dg-widget-status-dot"></div>
                            <div class="dg-widget-status-text">Candidate Found</div>
                        </div>
                        <div class="dg-widget-profile">
                            <div class="dg-widget-avatar"><i class="fa-solid fa-user-astronaut"></i></div>
                            <div class="dg-widget-lines">
                                <div class="dg-widget-line-1"></div>
                                <div class="dg-widget-line-2"></div>
                            </div>
                        </div>
                        <div class="dg-widget-match-score">
                            <h2>98.5%</h2>
                            <p>Technical Fit & Alignment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         NEW TEAM SECTION (REAL PORTRAITS)
         ========================================================================== -->
    <section id="team" class="dg-team-section">
    <div class="dg-container">
        <div class="dg-text-center dg-mb-10">
            <h2 class="dg-section-title">Meet the <span>Elite</span></h2>
            <p class="dg-section-subtitle">A glimpse into the caliber of pre-vetted engineering and design talent actively building on our platform right now.</p>
        </div>
        
        <div class="dg-team-grid">
            <div class="dg-team-card">
                <div class="dg-team-avatar">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Alex Mercer" width="96" height="96" loading="lazy">
                </div>
                <h2>Alex Mercer</h2>
                <p class="dg-team-role">Lead Full-Stack Engineer</p>
                <p class="dg-team-desc">Specializes in the MERN stack and architecting highly scalable cloud solutions for high-traffic environments.</p>
                
                <div class="dg-team-skills">
                    <span class="dg-skill-badge">React</span>
                    <span class="dg-skill-badge">Node.js</span>
                    <span class="dg-skill-badge">Next.js</span>
                    <span class="dg-skill-badge">Python</span>
                </div>
            </div>

            <div class="dg-team-card">
                <div class="dg-team-avatar">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Jenkins" width="96" height="96" loading="lazy">
                </div>
                <h2>Sarah Jenkins</h2>
                <p class="dg-team-role">UX/UI Design Lead</p>
                <p class="dg-team-desc">Crafts premium, conversion-focused user interfaces with pixel-perfect precision and deep user empathy.</p>
                
                <div class="dg-team-skills">
                    <span class="dg-skill-badge">Figma</span>
                    <span class="dg-skill-badge">Adobe XD</span>
                    <span class="dg-skill-badge">Spline 3D</span>
                    <span class="dg-skill-badge">Principle</span>
                </div>
            </div>

            <div class="dg-team-card">
                <div class="dg-team-avatar">
                    <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="David Chen" width="96" height="96" loading="lazy">
                </div>
                <h2>David Chen</h2>
                <p class="dg-team-role">Senior DevOps Engineer</p>
                <p class="dg-team-desc">Ensures 99.99% infrastructure uptime and deploys seamless CI/CD pipelines across AWS and GCP.</p>
                
                <div class="dg-team-skills">
                    <span class="dg-skill-badge">AWS</span>
                    <span class="dg-skill-badge">Docker</span>
                    <span class="dg-skill-badge">Kubernetes</span>
                    <span class="dg-skill-badge">Terraform</span>
                </div>
            </div>

            <div class="dg-team-card">
                <div class="dg-team-avatar">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Elena Rodriguez" width="96" height="96" loading="lazy">
                </div>
                <h2>Elena Rodriguez</h2>
                <p class="dg-team-role">Product Manager</p>
                <p class="dg-team-desc">Translates complex business requirements into clear, actionable technical sprints for engineering teams.</p>
                
                <div class="dg-team-skills">
                    <span class="dg-skill-badge">Jira</span>
                    <span class="dg-skill-badge">Linear</span>
                    <span class="dg-skill-badge">Notion</span>
                    <span class="dg-skill-badge">Miro</span>
                </div>
            </div>
        </div>
    </div>
</section>

    <section id="testimonials" class="dg-testimonials-section">
        <div class="dg-container dg-text-center dg-mb-10">
            <h2 class="dg-section-title">Trusted by <span>visionaries</span></h2>
            <p class="dg-section-subtitle">See what engineering leaders and founders are saying about our elite talent network.</p>
        </div>

        <div class="dg-marquee-wrapper">
            <div class="dg-marquee-fade-left"></div>
            <div class="dg-marquee-fade-right"></div>
            <div class="dg-marquee-track">
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"The caliber of talent is unmatched. We needed a senior React engineer fast, and they delivered a perfect match in 48 hours. Absolute game-changer."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>MT</span></div><div><h2 class="dg-author-name">Mark T.</h2><p class="dg-author-role">VP of Engineering</p></div></div></div>
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"Design by Global completely transformed our hiring process. Instead of sifting through hundreds of resumes, we interviewed two vetted candidates and hired both."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>SJ</span></div><div><h2 class="dg-author-name">Sarah J.</h2><p class="dg-author-role">CTO, FinTech Startup</p></div></div></div>
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"Zero friction. High impact. They really mean it when they say the top 2.3%. Our new Lead Designer integrated flawlessly and elevated our product."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>DK</span></div><div><h2 class="dg-author-name">David K.</h2><p class="dg-author-role">Founder & CEO</p></div></div></div>
            </div>
            <div class="dg-marquee-track" aria-hidden="true">
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"The caliber of talent is unmatched. We needed a senior React engineer fast, and they delivered a perfect match in 48 hours. Absolute game-changer."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>MT</span></div><div><h2 class="dg-author-name">Mark T.</h2><p class="dg-author-role">VP of Engineering</p></div></div></div>
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"Design by Global completely transformed our hiring process. Instead of sifting through hundreds of resumes, we interviewed two vetted candidates and hired both."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>SJ</span></div><div><h2 class="dg-author-name">Sarah J.</h2><p class="dg-author-role">CTO, FinTech Startup</p></div></div></div>
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"Zero friction. High impact. They really mean it when they say the top 2.3%. Our new Lead Designer integrated flawlessly and elevated our product."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>DK</span></div><div><h2 class="dg-author-name">David K.</h2><p class="dg-author-role">Founder & CEO</p></div></div></div>
            </div>
        </div>

        <div class="dg-marquee-wrapper" style="padding-top: 0;">
            <div class="dg-marquee-fade-left"></div>
            <div class="dg-marquee-fade-right"></div>
            <div class="dg-marquee-track reverse">
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"The seamless process and high-quality candidates blew us away. We bypassed the usual recruiter spam and got straight to interviewing exceptional talent."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>ER</span></div><div><h2 class="dg-author-name">Elena R.</h2><p class="dg-author-role">Product Lead</p></div></div></div>
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"What impressed me most was the speed. We scaled our design team by 3x in less than a month without compromising on quality or culture."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>AS</span></div><div><h2 class="dg-author-name">Anita S.</h2><p class="dg-author-role">VP of Product</p></div></div></div>
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"Finding true senior talent in today's market is a nightmare. This platform made it effortless. We will definitely be hiring through them again."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>MF</span></div><div><h2 class="dg-author-name">Marcus F.</h2><p class="dg-author-role">Technical Founder</p></div></div></div>
            </div>
            <div class="dg-marquee-track reverse" aria-hidden="true">
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"The seamless process and high-quality candidates blew us away. We bypassed the usual recruiter spam and got straight to interviewing exceptional talent."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>ER</span></div><div><h2 class="dg-author-name">Elena R.</h2><p class="dg-author-role">Product Lead</p></div></div></div>
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"What impressed me most was the speed. We scaled our design team by 3x in less than a month without compromising on quality or culture."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>AS</span></div><div><h2 class="dg-author-name">Anita S.</h2><p class="dg-author-role">VP of Product</p></div></div></div>
                <div class="dg-review-card"><i class="fa-solid fa-quote-right dg-review-quote-icon"></i><div class="dg-review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div><p class="dg-review-text">"Finding true senior talent in today's market is a nightmare. This platform made it effortless. We will definitely be hiring through them again."</p><div class="dg-review-author"><div class="dg-author-avatar"><span>MF</span></div><div><h2 class="dg-author-name">Marcus F.</h2><p class="dg-author-role">Technical Founder</p></div></div></div>
            </div>
        </div>
    </section>

    <section id="faq" class="dg-faq-section">
        <div class="dg-container">
            <div class="dg-text-center dg-mb-10">
                <h2 class="dg-section-title">Frequently asked <span>questions</span></h2>
                <p class="dg-section-subtitle">Everything you need to know about scaling your team with us.</p>
            </div>
            <div class="dg-faq-list">
                <details class="dg-faq-item">
                    <summary class="dg-faq-question">What happens if the talent isn't a good fit during the trial?<span class="dg-faq-icon"><i class="fa-solid fa-plus"></i></span></summary>
                    <div class="dg-faq-answer">We offer a zero-risk trial period. If you decide the candidate isn't the perfect fit for your team within this timeframe, you pay absolutely nothing. We will immediately restart the matching process and introduce you to new candidates at no extra cost.</div>
                </details>
                <details class="dg-faq-item">
                    <summary class="dg-faq-question">How does billing, compliance, and payroll work?<span class="dg-faq-icon"><i class="fa-solid fa-plus"></i></span></summary>
                    <div class="dg-faq-answer">We handle all the heavy lifting. You pay one consolidated invoice, and we take care of all international compliance, contractor agreements, and localized payroll. It keeps your books clean and protects your business from complex labor laws.</div>
                </details>
                <details class="dg-faq-item">
                    <summary class="dg-faq-question">What time zones do your developers work in?<span class="dg-faq-icon"><i class="fa-solid fa-plus"></i></span></summary>
                    <div class="dg-faq-answer">We match talent based on your specific operational needs. Whether you require someone to overlap completely with your local working hours, or you prefer asynchronous work to keep development moving 24/7, we will source candidates who align with your schedule.</div>
                </details>
                <details class="dg-faq-item">
                    <summary class="dg-faq-question">How fast can I get a developer integrated into my team?<span class="dg-faq-icon"><i class="fa-solid fa-plus"></i></span></summary>
                    <div class="dg-faq-answer">Our standard matching window is 48 hours. Once you give the green light after interviewing the matched candidate, they can typically begin onboarding and contributing to your codebase within 3 to 5 business days.</div>
                </details>
            </div>
        </div>
    </section>

    <section class="dg-cta-section">
        <div class="dg-container">
            <div class="dg-cta-card-wrapper">
                <div class="dg-cta-card-glow"></div>
                <div class="dg-cta-content">
                    <h2 class="dg-cta-title">Ready to scale your <br/><span>engineering?</span></h2>
                    <p class="dg-cta-subtitle">Don't let a talent shortage slow down your roadmap. Bypass the traditional hiring friction and connect with world-class engineers instantly.</p>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="dg-cta-btn">
                        Find Your Expert <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const triangleBase = 60;
        const container = document.getElementById("dg-triangle-grid");
        const glow = document.getElementById("dg-global-glow");

        /* Calculate exactly how many triangles are needed to cover the user's screen */
        const instantiateGrid = () => {
            if(!container) return;
            container.innerHTML = '';
            
            /* Use window dimensions since the mesh is now locked to the viewport */
            const width = window.innerWidth;
            const height = window.innerHeight;

            let columns = Math.ceil(width / (triangleBase * 2)) + 2;
            let rows = Math.ceil(height / (triangleBase * 1.733)) + 2;
            container.style.setProperty('--columns', columns);

            const fragment = document.createDocumentFragment();

            for (let y = 0; y < rows; y++) {
                for (let x = 0; x < columns; x++) {
                    let el = document.createElement("div");
                    el.classList.add("dg-triangle-set");
                    if (y % 2 === 0) el.classList.add("dg-triangle-set--offset");
                    fragment.appendChild(el);
                }
            }
            container.appendChild(fragment);
        };

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(instantiateGrid, 200);
        });

        instantiateGrid();

        /* Track mouse movements relative to the fixed browser window */
        let isTicking = false;
        document.addEventListener('mousemove', (event) => {
            if (!isTicking) {
                window.requestAnimationFrame(() => {
                    if(glow) {
                        glow.style.left = `${event.clientX}px`;
                        glow.style.top = `${event.clientY}px`;
                    }
                    isTicking = false;
                });
                isTicking = true;
            }
        });
        
        if(glow) {
            glow.style.left = '50%';
            glow.style.top = '50%';
        }
    });
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Design By Global",
  "url": "https://designbyglobal.com"
}
</script>

<?php get_footer(); ?>