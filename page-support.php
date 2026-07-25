<?php get_header(); ?>

<style id="dg-support-styles">
/* ==========================================================================
   CUSTOM SCROLLBAR — SINGLE GREEN ONLY
   ========================================================================== */

/* Remove default, force single scrollbar on html only */
*, *::before, *::after {
    scrollbar-width: none; /* Firefox — hide everywhere first */
}
::-webkit-scrollbar {
    display: none; /* Chrome/Safari — hide everywhere first */
}

/* Then show ONLY on html (main page scrollbar) */
html {
    scrollbar-width: auto;
    scrollbar-color: #2fe43b transparent;
    overflow-y: scroll; /* Forces only ONE scrollbar */
}
html::-webkit-scrollbar {
    display: block;
    width: 10px;
}
html::-webkit-scrollbar-track {
    background: transparent;
}
html::-webkit-scrollbar-thumb {
    background: #2fe43b;
    border-radius: 999px;
}
html::-webkit-scrollbar-thumb:hover {
    background: #4fff5a;
}
    /* ==========================================================================
       VARIABLES — same as main theme
       ========================================================================== */
    :root {
        --color-primary:       #2fe43b;
        --color-primary-glow:  rgba(47, 228, 59, 0.4);
        --color-border-green:  rgba(47, 228, 59, 0.4);
        --color-border-hover:  rgba(47, 228, 59, 0.8);
        --color-bg:            #030303;
        --color-text:          #ffffff;
        --color-muted:         #a1a1aa;
        --color-surface:       rgba(255,255,255,0.015);
        --premium-ease:        cubic-bezier(0.16, 1, 0.3, 1);
    }

    body, .dg-support-wrapper *:not(i) {
        font-family: 'Poppins', sans-serif !important;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* ==========================================================================
       ANIMATIONS
       ========================================================================== */
    @keyframes sp-orb-float {
        0%   { transform: translate3d(0,0,0) scale(1); }
        50%  { transform: translate3d(3%,4%,0) scale(1.02); }
        100% { transform: translate3d(-3%,-4%,0) scale(0.98); }
    }
    @keyframes sp-fade-up {
        from { opacity:0; transform:translate3d(0,28px,0); filter:blur(4px); }
        to   { opacity:1; transform:translate3d(0,0,0);   filter:blur(0); }
    }
    @keyframes sp-gradient-x {
        0%,100% { background-position:0% 50%; }
        50%     { background-position:100% 50%; }
    }
    @keyframes sp-pulse {
        0%,100% { box-shadow: 0 0 0 0 rgba(47,228,59,0.4); }
        50%     { box-shadow: 0 0 0 8px rgba(47,228,59,0); }
    }
    @keyframes sp-faq-in {
        from { opacity:0; transform:translateY(-8px); }
        to   { opacity:1; transform:translateY(0); }
    }
    @keyframes sp-success-pop {
        0%   { opacity:0; transform:scale(0.85) translateY(10px); }
        100% { opacity:1; transform:scale(1) translateY(0); }
    }

    .sp-fade-up { opacity:0; animation: sp-fade-up 1s var(--premium-ease) forwards; }

    /* ==========================================================================
       WRAPPER & BACKGROUND
       ========================================================================== */
  body, .dg-support-wrapper *:not(i) {
    font-family: 'Poppins', sans-serif !important;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

body {
    overflow-x: hidden; /* Stops horizontal scrolling globally */
}

.dg-support-wrapper {
    position: relative;
    background-color: var(--color-bg);
    color: var(--color-text);
    overflow-x: hidden; /* Only hide horizontal overflow, keep vertical scrolling intact */ 
    width: 100%;
    min-height: 100vh;
}

    /* grain */
    .dg-support-wrapper::before {
        content:"";
        position:absolute; inset:0; z-index:1; pointer-events:none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="n"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23n)"/%3E%3C/svg%3E');
        opacity:0.04; mix-blend-mode:overlay;
    }

    .sp-orb {
        position:absolute; border-radius:50%; pointer-events:none;
        animation: sp-orb-float 28s infinite ease-in-out alternate;
        will-change: transform;
    }
    .sp-orb-1 { width:80vw; height:80vw; background:radial-gradient(circle, rgba(47,228,59,0.07) 0%, transparent 65%); top:-25vw; left:-15vw; }
    .sp-orb-2 { width:60vw; height:60vw; background:radial-gradient(circle, rgba(47,228,59,0.04) 0%, transparent 65%); bottom:-15vw; right:-10vw; animation-delay:-9s; }
    @media(min-width:768px){
        .sp-orb-1{ width:55vw; height:55vw; top:-18vw; left:-10vw; }
        .sp-orb-2{ width:45vw; height:45vw; bottom:-12vw; right:-8vw; }
    }

    .sp-bg-blur {
        position:absolute; inset:0;
        background:rgba(3,3,3,0.82);
        backdrop-filter:blur(120px);
        -webkit-backdrop-filter:blur(120px);
        z-index:0; pointer-events:none;
    }

    /* ==========================================================================
       LAYOUT
       ========================================================================== */
    .sp-container {
        width:100%; max-width:1300px;
        margin:0 auto;
        padding:0 1.25rem;
        position:relative; z-index:10;
    }
    @media(min-width:768px){ .sp-container{ padding:0 3rem; } }

    /* ==========================================================================
       HERO STRIP
       ========================================================================== */
    .sp-hero {
        padding: 7rem 0 3rem;
        text-align: center;
        position: relative;
    }
    @media(min-width:768px){ .sp-hero{ padding:11rem 0 5rem; } }

    .sp-eyebrow {
        display:inline-block;
        font-size:0.6rem; font-weight:700;
        letter-spacing:0.18em; text-transform:uppercase;
        color:var(--color-primary);
        padding:0.4rem 1.1rem;
        border:2px solid var(--color-border-green);
        border-radius:999px;
        background:rgba(47,228,59,0.04);
        margin-bottom:1.25rem;
    }
    @media(min-width:768px){ .sp-eyebrow{ font-size:0.75rem; margin-bottom:1.75rem; padding:0.5rem 1.5rem; } }

    .sp-hero-title {
        font-size:clamp(2rem, 8vw, 5rem);
        font-weight:800;
        letter-spacing:-0.035em;
        line-height:1.08;
        margin-bottom:1rem;
    }
    .sp-hero-title span {
        color:transparent;
        background-clip:text; -webkit-background-clip:text;
        background-image:linear-gradient(100deg,#fff 0%, rgba(47,228,59,0.9) 50%,#fff 100%);
        background-size:200% 200%;
        animation: sp-gradient-x 9s ease infinite;
        display:inline-block;
    }
    .sp-hero-sub {
        color:var(--color-muted);
        font-size:clamp(0.9rem,3vw,1.25rem);
        line-height:1.6;
        max-width:42rem;
        margin:0 auto;
    }

    /* ==========================================================================
       MAIN CONTENT — 2 COLUMN
       ========================================================================== */
    .sp-body { padding:3rem 0 5rem; }
    @media(min-width:768px){ .sp-body{ padding:4rem 0 8rem; } }

    .sp-grid {
        display:grid;
        grid-template-columns:1fr;
        gap:2rem;
        align-items:start;
    }
    @media(min-width:900px){
        .sp-grid{
            grid-template-columns:1fr 400px;
            gap:3rem;
        }
    }
    @media(min-width:1100px){
        .sp-grid{
            grid-template-columns:1fr 460px;
            gap:4rem;
        }
    }

    /* ==========================================================================
       CONTACT FORM (LEFT)
       ========================================================================== */
    .sp-form-card {
        background:linear-gradient(180deg,rgba(255,255,255,0.025) 0%,rgba(255,255,255,0.008) 100%);
        border:2px solid var(--color-border-green);
        border-radius:1.5rem;
        padding:2rem 1.5rem;
        backdrop-filter:blur(20px);
        -webkit-backdrop-filter:blur(20px);
    }
    @media(min-width:768px){ .sp-form-card{ padding:3rem; border-radius:2rem; } }

    .sp-form-title {
        font-size:clamp(1.35rem,4vw,2rem);
        font-weight:800;
        letter-spacing:-0.02em;
        margin-bottom:0.4rem;
    }
    .sp-form-title span{ color:var(--color-primary); }

    .sp-form-desc {
        color:var(--color-muted);
        font-size:0.875rem;
        line-height:1.6;
        margin-bottom:2rem;
    }
    @media(min-width:768px){ .sp-form-desc{ font-size:1rem; margin-bottom:2.5rem; } }

    .sp-field { margin-bottom:1.25rem; }
    @media(min-width:768px){ .sp-field{ margin-bottom:1.5rem; } }

    .sp-label {
        display:block;
        font-size:0.75rem; font-weight:700;
        letter-spacing:0.08em; text-transform:uppercase;
        color:rgba(255,255,255,0.7);
        margin-bottom:0.5rem;
    }

    .sp-input, .sp-select, .sp-textarea {
        width:100%; background:rgba(255,255,255,0.03);
        border:2px solid var(--color-border-green);
        border-radius:0.875rem;
        padding:0.875rem 1.1rem;
        color:#fff;
        font-size:0.9rem; font-weight:400;
        font-family:'Poppins',sans-serif;
        transition:border-color 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
        outline:none;
        box-sizing:border-box;
        appearance:none; -webkit-appearance:none;
    }
    .sp-input::placeholder, .sp-textarea::placeholder { color:rgba(255,255,255,0.3); }
    .sp-input:focus, .sp-select:focus, .sp-textarea:focus {
        border-color:var(--color-primary);
        background:rgba(47,228,59,0.04);
        box-shadow:0 0 0 4px rgba(47,228,59,0.12);
    }
    @media(min-width:768px){
        .sp-input, .sp-select, .sp-textarea{ padding:1rem 1.25rem; font-size:0.9625rem; border-radius:1rem; }
    }

    .sp-select {
        background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%232fe43b' d='M1 1l5 5 5-5'/%3E%3C/svg%3E");
        background-repeat:no-repeat;
        background-position:right 1.1rem center;
        padding-right:2.5rem;
        cursor:pointer;
    }
    .sp-select option { background:#0f0f0f; color:#fff; }

    .sp-textarea { resize:vertical; min-height:130px; line-height:1.6; }
    @media(min-width:768px){ .sp-textarea{ min-height:155px; } }

    .sp-row-2 {
        display:grid;
        grid-template-columns:1fr;
        gap:1.25rem;
    }
    @media(min-width:560px){ .sp-row-2{ grid-template-columns:1fr 1fr; } }

    .sp-submit-btn {
        width:100%; height:3.5rem;
        background:linear-gradient(135deg,#44f050 0%,#2fe43b 100%);
        color:#000;
        font-weight:800; font-size:0.9rem;
        letter-spacing:0.06em; text-transform:uppercase;
        border:none; border-radius:9999px;
        cursor:pointer; display:flex; align-items:center; justify-content:center; gap:0.7rem;
        box-shadow:0 8px 28px rgba(47,228,59,0.28), inset 0 1px 1px rgba(255,255,255,0.4);
        transition:all 0.3s var(--premium-ease);
        margin-top:0.5rem;
        font-family:'Poppins',sans-serif;
    }
    @media(min-width:768px){
        .sp-submit-btn{ height:3.75rem; font-size:0.9625rem; }
        .sp-submit-btn:hover{ transform:translateY(-2px); box-shadow:0 16px 42px rgba(47,228,59,0.45), inset 0 1px 1px rgba(255,255,255,0.6); }
    }
    .sp-submit-btn:active{ transform:scale(0.97); }
    .sp-submit-btn i{ font-size:0.875rem; }

    /* Success message */
    .sp-success {
        display:none;
        text-align:center;
        padding:2.5rem 1rem;
        animation: sp-success-pop 0.5s var(--premium-ease) forwards;
    }
    .sp-success-icon {
        width:4.5rem; height:4.5rem; border-radius:50%;
        background:rgba(47,228,59,0.12);
        border:2px solid var(--color-primary);
        display:flex; align-items:center; justify-content:center;
        color:var(--color-primary); font-size:1.75rem;
        margin:0 auto 1.25rem;
        animation: sp-pulse 2s infinite;
    }
    .sp-success h4{ font-size:1.25rem; font-weight:800; margin-bottom:0.5rem; }
    .sp-success p{ color:var(--color-muted); font-size:0.9rem; line-height:1.6; }

    /* ==========================================================================
       INFO SIDEBAR (RIGHT)
       ========================================================================== */
    .sp-sidebar { display:flex; flex-direction:column; gap:1.25rem; }
    @media(min-width:768px){ .sp-sidebar{ gap:1.5rem; } }

    .sp-info-card {
        background:linear-gradient(180deg,rgba(255,255,255,0.025) 0%,rgba(255,255,255,0.008) 100%);
        border:2px solid var(--color-border-green);
        border-radius:1.25rem;
        padding:1.5rem;
        backdrop-filter:blur(16px);
        transition:border-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }
    @media(min-width:768px){
        .sp-info-card{ padding:2rem; border-radius:1.5rem; }
        .sp-info-card:hover{ border-color:var(--color-border-hover); transform:translateY(-3px); box-shadow:0 16px 36px -8px rgba(0,0,0,0.5), 0 0 20px rgba(47,228,59,0.1); }
    }

    .sp-info-card-header {
        display:flex; align-items:center; gap:0.9rem;
        margin-bottom:1.1rem;
        padding-bottom:1rem;
        border-bottom:1px solid rgba(47,228,59,0.2);
    }
    @media(min-width:768px){ .sp-info-card-header{ gap:1rem; margin-bottom:1.25rem; padding-bottom:1.1rem; } }

    .sp-info-icon {
        width:2.75rem; height:2.75rem; flex-shrink:0;
        border-radius:0.75rem;
        background:linear-gradient(135deg,rgba(47,228,59,0.14) 0%,rgba(47,228,59,0.03) 100%);
        border:2px solid var(--color-border-green);
        display:flex; align-items:center; justify-content:center;
        color:var(--color-primary); font-size:1.1rem;
    }
    @media(min-width:768px){ .sp-info-icon{ width:3.25rem; height:3.25rem; font-size:1.25rem; border-radius:0.875rem; } }

    .sp-info-card-header h3 {
        font-size:0.95rem; font-weight:700;
        letter-spacing:-0.01em; margin:0;
    }
    @media(min-width:768px){ .sp-info-card-header h3{ font-size:1.1rem; } }

    /* contact rows inside info cards */
    .sp-contact-row {
        display:flex; align-items:center; gap:0.875rem;
        padding:0.75rem 0;
        border-bottom:1px solid rgba(255,255,255,0.04);
        text-decoration:none;
        transition:color 0.2s ease;
    }
    .sp-contact-row:last-child{ border-bottom:none; padding-bottom:0; }
    .sp-contact-row:first-child{ padding-top:0; }

    .sp-contact-row-icon {
        width:2.25rem; height:2.25rem; flex-shrink:0;
        border-radius:0.6rem;
        background:rgba(255,255,255,0.04);
        border:1px solid rgba(47,228,59,0.25);
        display:flex; align-items:center; justify-content:center;
        color:var(--color-primary); font-size:0.875rem;
    }

    .sp-contact-row-text { flex:1; min-width:0; }
    .sp-contact-row-label {
        font-size:0.65rem; font-weight:700;
        letter-spacing:0.1em; text-transform:uppercase;
        color:rgba(255,255,255,0.4);
        display:block; margin-bottom:0.1rem;
    }
    .sp-contact-row-value {
        font-size:0.85rem; font-weight:600;
        color:#fff;
        white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
    }
    @media(min-width:768px){ .sp-contact-row-value{ font-size:0.9rem; } }

    a.sp-contact-row:hover .sp-contact-row-value { color:var(--color-primary); }

    /* Social row */
    .sp-social-grid {
        display:grid; grid-template-columns:repeat(4,1fr); gap:0.75rem;
    }
    .sp-social-btn {
        aspect-ratio:1;
        border-radius:0.875rem;
        background:rgba(255,255,255,0.03);
        border:2px solid var(--color-border-green);
        display:flex; align-items:center; justify-content:center;
        color:rgba(255,255,255,0.7); font-size:1.2rem;
        text-decoration:none;
        transition:all 0.25s ease;
    }
    @media(min-width:768px){
        .sp-social-btn:hover{ background:rgba(47,228,59,0.1); border-color:var(--color-primary); color:var(--color-primary); transform:translateY(-2px); box-shadow:0 6px 18px rgba(47,228,59,0.15); }
    }
    .sp-social-btn:active{ transform:scale(0.95); }

    /* Hours card */
    .sp-hours-row {
        display:flex; justify-content:space-between; align-items:center;
        padding:0.6rem 0;
        border-bottom:1px solid rgba(255,255,255,0.04);
    }
    .sp-hours-row:last-child{ border-bottom:none; padding-bottom:0; }
    .sp-hours-row:first-child{ padding-top:0; }
    .sp-hours-day{ font-size:0.8rem; font-weight:600; color:rgba(255,255,255,0.65); }
    .sp-hours-time{ font-size:0.8rem; font-weight:700; color:#fff; }
    .sp-hours-badge {
        font-size:0.6rem; font-weight:700; text-transform:uppercase; letter-spacing:0.1em;
        padding:0.2rem 0.6rem; border-radius:999px;
        background:rgba(47,228,59,0.12); color:var(--color-primary);
        border:1px solid rgba(47,228,59,0.3);
    }

    /* response time badge */
    .sp-response-badge {
        display:flex; align-items:center; gap:0.75rem;
        background:rgba(47,228,59,0.06);
        border:2px solid var(--color-border-green);
        border-radius:1rem;
        padding:1rem 1.25rem;
        margin-top:0;
    }
    .sp-response-dot {
        width:0.6rem; height:0.6rem; border-radius:50%;
        background:var(--color-primary);
        box-shadow:0 0 10px var(--color-primary);
        flex-shrink:0;
        animation: sp-pulse 2s infinite;
    }
    .sp-response-text { font-size:0.8rem; font-weight:600; color:rgba(255,255,255,0.8); line-height:1.4; }
    .sp-response-text strong{ color:var(--color-primary); }

    /* ==========================================================================
       FAQ SECTION
       ========================================================================== */
    .sp-faq-section{ padding:0 0 5rem; }
    @media(min-width:768px){ .sp-faq-section{ padding:0 0 8rem; } }

    .sp-faq-header{ text-align:center; margin-bottom:2.5rem; }
    @media(min-width:768px){ .sp-faq-header{ margin-bottom:4rem; } }

    .sp-section-title {
        font-size:clamp(1.75rem,6vw,3.5rem);
        font-weight:800; letter-spacing:-0.03em;
        line-height:1.15; margin-bottom:0.75rem;
    }
    .sp-section-title span{ color:var(--color-primary); }

    .sp-section-sub {
        color:var(--color-muted);
        font-size:clamp(0.875rem,3vw,1.1rem);
        line-height:1.6; max-width:42rem; margin:0 auto;
    }

    .sp-faq-list {
        max-width:860px; margin:0 auto;
        display:flex; flex-direction:column; gap:0.75rem;
    }
    @media(min-width:768px){ .sp-faq-list{ gap:1rem; } }

    details.sp-faq-item {
        background:linear-gradient(180deg,rgba(255,255,255,0.02) 0%,rgba(255,255,255,0.005) 100%);
        border:2px solid var(--color-border-green);
        border-radius:1rem;
        overflow:hidden;
        transition:border-color 0.3s ease, box-shadow 0.3s ease;
    }
    @media(min-width:768px){
        details.sp-faq-item{ border-radius:1.25rem; }
        details.sp-faq-item:hover{ border-color:var(--color-border-hover); }
    }
    details.sp-faq-item[open]{
        border-color:var(--color-primary);
        background:linear-gradient(180deg,rgba(255,255,255,0.035) 0%,rgba(255,255,255,0.01) 100%);
        box-shadow:0 10px 30px -8px rgba(0,0,0,0.5), 0 0 18px rgba(47,228,59,0.12);
    }

    summary.sp-faq-q {
        padding:1.1rem 1.25rem;
        font-size:0.9rem; font-weight:700; color:#fff;
        cursor:pointer;
        display:flex; justify-content:space-between; align-items:center;
        list-style:none; outline:none; gap:0.75rem;
        user-select:none;
    }
    summary.sp-faq-q::-webkit-details-marker{ display:none; }
    @media(min-width:768px){ summary.sp-faq-q{ padding:1.5rem 2rem; font-size:1.05rem; gap:1.25rem; } }

    .sp-faq-icon {
        width:2rem; height:2rem; flex-shrink:0;
        border-radius:50%;
        background:rgba(47,228,59,0.12);
        border:2px solid var(--color-border-green);
        display:flex; align-items:center; justify-content:center;
        color:var(--color-primary); font-size:0.75rem;
        transition:transform 0.3s var(--premium-ease), background 0.3s ease, border-color 0.3s ease;
    }
    @media(min-width:768px){ .sp-faq-icon{ width:2.5rem; height:2.5rem; font-size:0.875rem; } }
    details.sp-faq-item[open] .sp-faq-icon{
        transform:rotate(45deg);
        background:rgba(47,228,59,0.22);
        border-color:var(--color-primary);
    }

    .sp-faq-answer {
        padding:0 1.25rem 1.25rem;
        color:var(--color-muted);
        font-size:0.85rem; line-height:1.7;
        animation: sp-faq-in 0.3s var(--premium-ease) forwards;
    }
    @media(min-width:768px){ .sp-faq-answer{ padding:0 2rem 1.75rem; font-size:0.9625rem; line-height:1.8; } }

    /* ==========================================================================
       DIVIDER
       ========================================================================== */
    .sp-divider {
        width:100%; height:1px;
        background:linear-gradient(90deg, transparent 0%, rgba(47,228,59,0.3) 30%, rgba(47,228,59,0.3) 70%, transparent 100%);
        margin:3rem 0;
        position:relative; z-index:10;
    }
    @media(min-width:768px){ .sp-divider{ margin:5rem 0; } }
</style>

<main class="dg-support-wrapper">

    <!-- orbs & blur -->
    <div class="sp-orb sp-orb-1"></div>
    <div class="sp-orb sp-orb-2"></div>
    <div class="sp-bg-blur"></div>

    <!-- ===================== HERO ===================== -->
    <section class="sp-hero">
        <div class="sp-container">
            <div class="sp-fade-up" style="animation-delay:0.05s;">
                <span class="sp-eyebrow"><i class="fa-solid fa-headset" style="margin-right:0.4rem;"></i> Support Center</span>
            </div>
            <h1 class="sp-hero-title sp-fade-up" style="animation-delay:0.15s;">
                We're here to <span>help you.</span>
            </h1>
            <p class="sp-hero-sub sp-fade-up" style="animation-delay:0.25s;">
                Have a question, issue, or just want to say hi? Drop us a message and our team will get back to you within 24 hours.
            </p>
        </div>
    </section>

    <!-- ===================== BODY ===================== -->
    <section class="sp-body">
        <div class="sp-container">
            <div class="sp-grid">

                <!-- LEFT: Contact Form -->
                <div class="sp-form-card sp-fade-up" style="animation-delay:0.3s;">

                    <h2 class="sp-form-title">Send us a <span>message</span></h2>
                    <p class="sp-form-desc">Fill in the form below and we'll respond as soon as possible — usually within a few hours.</p>

                    <form id="sp-contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
                        <?php wp_nonce_field('sp_contact_form', 'sp_nonce'); ?>
                        <input type="hidden" name="action" value="sp_contact_submit">

                        <div class="sp-row-2">
                            <div class="sp-field">
                                <label class="sp-label" for="sp_name">Your Name</label>
                                <input class="sp-input" type="text" id="sp_name" name="sp_name"
                                    placeholder="John Smith" required>
                            </div>
                            <div class="sp-field">
                                <label class="sp-label" for="sp_email">Email Address</label>
                                <input class="sp-input" type="email" id="sp_email" name="sp_email"
                                    placeholder="john@company.com" required>
                            </div>
                        </div>

                        <div class="sp-field">
                            <label class="sp-label" for="sp_subject">Subject</label>
                            <select class="sp-select" id="sp_subject" name="sp_subject" required>
                                <option value="" disabled selected>Select a topic…</option>
                                <option value="billing">Billing & Payments</option>
                                <option value="talent">Talent Matching</option>
                                <option value="technical">Technical Issue</option>
                                <option value="account">Account & Profile</option>
                                <option value="partnership">Partnership Inquiry</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="sp-field">
                            <label class="sp-label" for="sp_message">Your Message</label>
                            <textarea class="sp-textarea" id="sp_message" name="sp_message"
                                placeholder="Tell us what's on your mind…" required></textarea>
                        </div>

                        <button type="submit" class="sp-submit-btn">
                            Send Message <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>

                    <!-- Success state (shown via JS) -->
                    <div class="sp-success" id="sp-success-msg">
                        <div class="sp-success-icon"><i class="fa-solid fa-check"></i></div>
                        <h4>Message Sent!</h4>
                        <p>Thanks for reaching out. Our team will get back to you within 24 hours.</p>
                    </div>
                </div>

                <!-- RIGHT: Info Sidebar -->
                <div class="sp-sidebar sp-fade-up" style="animation-delay:0.4s;">

                    <!-- Response time badge -->
                    <div class="sp-response-badge">
                        <div class="sp-response-dot"></div>
                        <div class="sp-response-text">Avg. response time: <strong>under 4 hours</strong> during business hours</div>
                    </div>

                    <!-- Email & Phone -->
                    <div class="sp-info-card">
                        <div class="sp-info-card-header">
                            <div class="sp-info-icon"><i class="fa-solid fa-address-book"></i></div>
                            <h3>Direct Contact</h3>
                        </div>
                        <a href="mailto:info@designbyglobal.com" class="sp-contact-row">
                            <div class="sp-contact-row-icon"><i class="fa-solid fa-envelope"></i></div>
                            <div class="sp-contact-row-text">
                                <span class="sp-contact-row-label">Email</span>
                                <span class="sp-contact-row-value">info@designbyglobal.com</span>
                            </div>
                        </a>
                        <a href="https://wa.me/1234567890" target="_blank" rel="noopener" class="sp-contact-row">
                            <div class="sp-contact-row-icon"><i class="fa-brands fa-whatsapp"></i></div>
                            <div class="sp-contact-row-text">
                                <span class="sp-contact-row-label">WhatsApp</span>
                                <span class="sp-contact-row-value">+44 7495 371662</span>
                            </div>
                        </a>
                        <a href="tel:+11234567890" class="sp-contact-row">
                            <div class="sp-contact-row-icon"><i class="fa-solid fa-phone"></i></div>
                            <div class="sp-contact-row-text">
                                <span class="sp-contact-row-label">Phone</span>
                                <span class="sp-contact-row-value">+44 7495 371662</span>
                            </div>
                        </a>
                    </div>

                    <!-- Office Hours -->
                    <div class="sp-info-card">
                        <div class="sp-info-card-header">
                            <div class="sp-info-icon"><i class="fa-solid fa-clock"></i></div>
                            <h3>Office Hours</h3>
                        </div>
                        <div class="sp-hours-row">
                            <span class="sp-hours-day">Monday – Friday</span>
                            <span class="sp-hours-time">9:00 AM – 6:00 PM EST</span>
                        </div>
                        <div class="sp-hours-row">
                            <span class="sp-hours-day">Saturday</span>
                            <span class="sp-hours-time">10:00 AM – 2:00 PM EST</span>
                        </div>
                        <div class="sp-hours-row">
                            <span class="sp-hours-day">Sunday</span>
                            <span class="sp-hours-badge">Closed</span>
                        </div>
                    </div>

                </div>
                <!-- / sidebar -->
            </div>
        </div>
    </section>

    <!-- ===================== DIVIDER ===================== -->
    <div class="sp-container"><div class="sp-divider"></div></div>

    <!-- ===================== FAQ ===================== -->
    <section class="sp-faq-section">
        <div class="sp-container">
            <div class="sp-faq-header sp-fade-up" style="animation-delay:0.1s;">
                <h2 class="sp-section-title">Common <span>questions</span></h2>
                <p class="sp-section-sub">Quick answers to things our clients ask most often.</p>
            </div>

            <div class="sp-faq-list">

                <details class="sp-faq-item">
                    <summary class="sp-faq-q">
                        How quickly will I get a response?
                        <span class="sp-faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </summary>
                    <div class="sp-faq-answer">
                        During business hours (Mon–Fri, 9 AM–6 PM EST) our average response time is under 4 hours. Messages sent on weekends or outside office hours will be replied to first thing the next business day.
                    </div>
                </details>

                <details class="sp-faq-item">
                    <summary class="sp-faq-q">
                        What if I want to change or pause my talent contract?
                        <span class="sp-faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </summary>
                    <div class="sp-faq-answer">
                        You can pause or modify your engagement at any time with 7 days' notice. Select "Account & Profile" in the subject dropdown above and our team will process your request within one business day — no penalties, no hassle.
                    </div>
                </details>

                <details class="sp-faq-item">
                    <summary class="sp-faq-q">
                        I'm a freelancer — how do I join the talent network?
                        <span class="sp-faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </summary>
                    <div class="sp-faq-answer">
                        We love hearing from talented professionals! Select "Partnership Inquiry" in the form above and describe your skills, experience, and availability. Our talent sourcing team reviews every application personally.
                    </div>
                </details>

                <details class="sp-faq-item">
                    <summary class="sp-faq-q">
                        Is my data and message kept confidential?
                        <span class="sp-faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </summary>
                    <div class="sp-faq-answer">
                        Absolutely. All communication through this form is encrypted and only accessed by authorised support staff. We never share your personal information with third parties. You can review our full Privacy Policy for more details.
                    </div>
                </details>

                <details class="sp-faq-item">
                    <summary class="sp-faq-q">
                        I have an urgent billing issue — what's the fastest way to reach you?
                        <span class="sp-faq-icon"><i class="fa-solid fa-plus"></i></span>
                    </summary>
                    <div class="sp-faq-answer">
                        For urgent billing matters, WhatsApp or a direct phone call during office hours is the fastest route. You'll find both numbers in the "Direct Contact" card on this page. For non-urgent billing questions, selecting "Billing & Payments" in the form gets it to the right inbox immediately.
                    </div>
                </details>

            </div>
        </div>
    </section>

</main>

<script>
(function(){
    var form    = document.getElementById('sp-contact-form');
    var success = document.getElementById('sp-success-msg');
    if(!form) return;

    form.addEventListener('submit', function(e){
        // PREVENT default page reload for that premium SaaS feel
        e.preventDefault(); 

        var btn = form.querySelector('.sp-submit-btn');
        var originalText = btn.innerHTML;
        
        // Show loading state
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sending…';
        btn.style.opacity = '0.75';
        btn.disabled = true;

        var fd = new FormData(form);
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";

        fetch(ajaxUrl, { 
            method: 'POST', 
            body: fd 
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Instantly swap the form for the success message
                form.style.display = 'none';
                success.style.display = 'block';
            } else {
                alert('Error: ' + data.data);
                btn.innerHTML = originalText;
                btn.style.opacity = '1';
                btn.disabled = false;
            }
        })
        .catch(error => {
            console.error(error);
            alert('A system error occurred. Please try again.');
            btn.innerHTML = originalText;
            btn.style.opacity = '1';
            btn.disabled = false;
        });
    });
})();
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Support",
  "url": "https://designbyglobal.com/support/"
}
</script>

<?php get_footer(); ?>