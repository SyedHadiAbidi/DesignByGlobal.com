<?php 
/* Template Name: Case Studies */
get_header(); 
?>

<style id="dg-case-studies-styles">
    /* ==========================================================================
       VARIABLES & BASE STYLES
       ========================================================================== */
    :root {
        --color-primary: #2fe43b;
        --color-bg: #030303;
        --color-text: #ffffff;
        --color-muted: #a1a1aa;
        --color-border-green: rgba(47, 228, 59, 0.4);
        --color-border-hover: rgba(47, 228, 59, 0.8);
        --color-surface: rgba(255, 255, 255, 0.02);
        --premium-ease: cubic-bezier(0.16, 1, 0.3, 1);
    }

    .cs-wrapper {
        position: relative;
        background-color: var(--color-bg);
        color: var(--color-text);
        overflow-x: hidden;
        width: 100%;
        min-height: 100vh;
        background-image: 
            linear-gradient(rgba(47, 228, 59, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(47, 228, 59, 0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        background-position: center center;
    }

    /* Ambient Background Grain */
    .cs-wrapper::before {
        content: ""; position: absolute; inset: 0; z-index: 1; pointer-events: none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noise"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noise)"/%3E%3C/svg%3E');
        opacity: 0.04; mix-blend-mode: overlay;
    }
    
    .cs-orb {
        position: absolute; border-radius: 50%; pointer-events: none;
        animation: cs-float 25s infinite ease-in-out alternate;
    }
    .cs-orb-1 { width: 80vw; height: 80vw; background: radial-gradient(circle, rgba(47,228,59,0.08) 0%, transparent 60%); top: -20vw; left: -10vw; }
    .cs-orb-2 { width: 60vw; height: 60vw; background: radial-gradient(circle, rgba(47,228,59,0.05) 0%, transparent 60%); bottom: 10vw; right: -10vw; animation-delay: -5s; }
    
    @keyframes cs-float { 
        0% { transform: translateY(0); } 
        100% { transform: translateY(-30px); } 
    }
    @keyframes fade-in-up {
        from { opacity: 0; transform: translate3d(0, 30px, 0); filter: blur(4px); }
        to   { opacity: 1; transform: translate3d(0, 0, 0);   filter: blur(0); }
    }
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); box-shadow: 0 0 8px var(--color-primary); }
        50%      { opacity: 0.5; transform: scale(1.1); box-shadow: 0 0 15px var(--color-primary); }
    }
    @keyframes modal-pop {
        0% { opacity: 0; transform: scale(0.95) translateY(20px); }
        100% { opacity: 1; transform: scale(1) translateY(0); }
    }

    .animate-fade { opacity: 0; animation: fade-in-up 1s var(--premium-ease) forwards; }

    .dg-container { 
        width: 100%; max-width: 1440px; margin: 0 auto; padding: 0 1.25rem; position: relative; z-index: 10; 
    }
    @media (min-width: 768px) { .dg-container { padding: 0 3rem; } }

    /* ==========================================================================
       HERO SECTION
       ========================================================================== */
    .cs-hero { padding: 8rem 0 3rem; text-align: center; position: relative; }
    @media (min-width: 768px) { .cs-hero { padding: 10rem 0 4rem; } }
    
    .cs-eyebrow {
        display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
        color: var(--color-primary); padding: 0.5rem 1.25rem; border: 1px solid var(--color-border-green);
        border-radius: 999px; background: rgba(20, 20, 22, 0.8); backdrop-filter: blur(10px); margin-bottom: 1.5rem;
    }
    .cs-status-dot {
        width: 6px; height: 6px; background-color: var(--color-primary); border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }
    
    .cs-title { font-size: clamp(2.5rem, 8vw, 5.5rem); font-weight: 800; line-height: 1.1; margin-bottom: 1rem; letter-spacing: -0.03em; }
    .cs-title span { color: transparent; background-clip: text; -webkit-background-clip: text; background-image: linear-gradient(100deg, #ffffff 0%, rgba(47,228,59,0.9) 50%, #ffffff 100%); }
    
    .cs-sub { color: var(--color-muted); font-size: clamp(1rem, 3vw, 1.25rem); max-width: 600px; margin: 0 auto; line-height: 1.6; }

    /* ==========================================================================
       FILTER SYSTEM
       ========================================================================== */
    .cs-filters {
        display: flex; flex-wrap: wrap; justify-content: center; gap: 0.75rem; margin: 3rem 0;
    }
    .cs-filter-btn {
        background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1);
        color: var(--color-muted); padding: 0.6rem 1.5rem; border-radius: 999px; font-size: 0.875rem;
        font-weight: 600; cursor: pointer; transition: all 0.3s ease;
    }
    .cs-filter-btn:hover, .cs-filter-btn.active {
        background: rgba(47,228,59,0.1); border-color: var(--color-primary); color: #fff;
        box-shadow: 0 0 15px rgba(47,228,59,0.2);
    }

    /* ==========================================================================
       CASE STUDIES GRID
       ========================================================================== */
    .cs-grid {
        display: grid; grid-template-columns: 1fr; gap: 2rem; padding-bottom: 6rem;
    }
    @media (min-width: 768px) { .cs-grid { grid-template-columns: repeat(2, 1fr); gap: 2.5rem; } }
    @media (min-width: 1024px) { .cs-grid { grid-template-columns: repeat(3, 1fr); } }

    .cs-card {
        background: linear-gradient(135deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.95) 100%);
        border: 1px solid rgba(255,255,255,0.05); border-radius: 1.25rem; overflow: hidden;
        backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
        display: flex; flex-direction: column; transition: all 0.4s var(--premium-ease);
        
        transform: translateZ(0); -webkit-transform: translateZ(0);
        backface-visibility: hidden; -webkit-backface-visibility: hidden;
        will-change: transform, box-shadow, border-color;
    }
    .cs-card:hover {
        transform: translateY(-8px) translateZ(0); border-color: var(--color-border-hover);
        box-shadow: 0 20px 40px rgba(0,0,0,0.8), inset 0 0 20px rgba(47,228,59,0.05);
    }

    /* Real Image Thumbnails */
    .cs-card-visual {
        height: 220px; width: 100%; position: relative; overflow: hidden;
        border-bottom: 1px solid rgba(255,255,255,0.05); background: #0a0a0a;
    }
    .cs-thumbnail {
        width: 100%; height: 100%; object-fit: cover; object-position: top;
        transition: transform 0.6s var(--premium-ease);
        opacity: 0.85;
    }
    .cs-card:hover .cs-thumbnail {
        transform: scale(1.05); opacity: 1;
    }

    .cs-card-content { padding: 1.75rem; display: flex; flex-direction: column; flex-grow: 1; }
    
    .cs-tags { display: flex; gap: 0.5rem; margin-bottom: 1rem; flex-wrap: wrap; }
    .cs-tag {
        font-size: 0.65rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 700;
        color: var(--color-primary); background: rgba(47,228,59,0.1); padding: 0.3rem 0.6rem; border-radius: 0.25rem;
    }

    .cs-card h2 { font-size: 1.25rem; font-weight: 700; color: #fff; margin-bottom: 0.75rem; }
    .cs-card p { font-size: 0.85rem; color: var(--color-muted); line-height: 1.6; margin-bottom: 1.5rem; flex-grow: 1; }

    .cs-metrics {
        display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;
        padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.05);
    }
    .cs-metric-val { color: #fff; font-size: 1.1rem; font-weight: 800; display: block; margin-bottom: 0.2rem; }
    .cs-metric-label { color: var(--color-muted); font-size: 0.65rem; text-transform: uppercase; letter-spacing: 0.05em; }

    .cs-card-btn {
        display: inline-flex; align-items: center; gap: 0.5rem; color: #fff; font-size: 0.85rem;
        font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none;
        transition: color 0.3s ease; margin-top: auto; cursor: pointer; border: none; background: transparent; padding: 0;
    }
    .cs-card-btn i { color: var(--color-primary); transition: transform 0.3s ease; }
    .cs-card:hover .cs-card-btn { color: var(--color-primary); }
    .cs-card:hover .cs-card-btn i { transform: translateX(5px); }

    /* ==========================================================================
       MODAL POPUP SYSTEM
       ========================================================================== */
    .cs-modal-overlay {
        position: fixed; inset: 0; background: rgba(0,0,0,0.85); backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px); z-index: 9999; display: flex; align-items: center; justify-content: center;
        opacity: 0; pointer-events: none; transition: opacity 0.3s ease; padding: 1rem;
    }
    .cs-modal-overlay.active { opacity: 1; pointer-events: auto; }
    
    .cs-modal-content {
        background: linear-gradient(180deg, rgba(20,20,22,1) 0%, rgba(10,10,12,1) 100%);
        border: 1px solid var(--color-border-green); border-radius: 1.5rem;
        width: 100%; max-width: 800px; max-height: 90vh; overflow-y: auto;
        position: relative; transform: scale(0.95); transition: transform 0.3s var(--premium-ease);
        box-shadow: 0 30px 60px rgba(0,0,0,0.8), inset 0 1px 1px rgba(255,255,255,0.1);
    }
    .cs-modal-overlay.active .cs-modal-content { animation: modal-pop 0.4s var(--premium-ease) forwards; }

    .cs-modal-close {
        position: absolute; top: 1.5rem; right: 1.5rem; background: rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.2);
        color: #fff; width: 2.5rem; height: 2.5rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
        cursor: pointer; z-index: 10; transition: all 0.3s ease; backdrop-filter: blur(4px);
    }
    .cs-modal-close:hover { background: var(--color-primary); color: #000; transform: rotate(90deg); border-color: var(--color-primary); }

    .cs-modal-img { width: 100%; height: 350px; object-fit: cover; object-position: top; border-bottom: 1px solid rgba(255,255,255,0.05); }
    @media (min-width: 768px) { .cs-modal-img { height: 450px; } }

    .cs-modal-body { padding: 2rem; }
    @media (min-width: 768px) { .cs-modal-body { padding: 3rem; } }
    
    .cs-modal-title { font-size: 1.75rem; font-weight: 800; color: #fff; margin-bottom: 1rem; }
    @media (min-width: 768px) { .cs-modal-title { font-size: 2.25rem; } }
    
    .cs-modal-desc { color: var(--color-muted); font-size: 1rem; line-height: 1.7; margin-bottom: 2rem; }

    /* ==========================================================================
       CALL TO ACTION
       ========================================================================== */
    .cs-cta { 
        text-align: center; padding: 4rem 2rem; 
        background: linear-gradient(180deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.98) 100%);
        border-radius: 1.5rem; border: 1px solid var(--color-border-green); margin-bottom: 4rem;
        position: relative; overflow: hidden;
    }
    @media (min-width: 768px) { .cs-cta { padding: 6rem 4rem; border-radius: 2rem; margin-bottom: 6rem; } }
    
    .cs-cta-glow {
        position: absolute; bottom: -50%; left: 50%; transform: translateX(-50%); width: 80%; height: 80%;
        background: radial-gradient(circle, rgba(47,228,59,0.15) 0%, transparent 70%); pointer-events: none;
    }
    
    .cs-cta h2 { font-size: clamp(2rem, 5vw, 3.5rem); color: #fff; margin-bottom: 1rem; font-weight: 800; position: relative; z-index: 2; }
    .cs-cta p { color: var(--color-muted); margin-bottom: 2.5rem; font-size: 1.1rem; position: relative; z-index: 2; }
    
    .cs-btn {
        display: inline-flex; align-items: center; justify-content: center; height: 3.5rem; padding: 0 2.5rem;
        background: linear-gradient(135deg, #44f050 0%, #2fe43b 100%); color: #000; font-weight: 800;
        text-transform: uppercase; letter-spacing: 0.1em; border-radius: 999px; text-decoration: none;
        transition: all 0.3s var(--premium-ease); position: relative; z-index: 2;
    }
    .cs-btn:hover { transform: translateY(-4px); box-shadow: 0 15px 35px rgba(47,228,59,0.5); }
</style>

<main class="cs-wrapper">
    <div class="cs-orb cs-orb-1"></div>
    <div class="cs-orb cs-orb-2"></div>

    <div class="dg-container">
        
        <section class="cs-hero">
            <div class="animate-fade" style="animation-delay: 0.1s;">
                <div class="cs-eyebrow">
                    <div class="cs-status-dot"></div> Production Logs
                </div>
            </div>
            <h2 class="cs-title animate-fade" style="animation-delay: 0.2s;">
                Our <span>Case Studies</span>
            </h2>
            <p class="cs-sub animate-fade" style="animation-delay: 0.3s;">
                See how industry-leading brands scale their engineering, design, and growth seamlessly using our elite digital strategies.
            </p>

            <div class="cs-filters animate-fade" style="animation-delay: 0.4s;" id="cs-filter-container">
                <button class="cs-filter-btn active" data-filter="all">All Projects</button>
                <button class="cs-filter-btn" data-filter="development">Development</button>
                <button class="cs-filter-btn" data-filter="designing">Design & UI/UX</button>
                <button class="cs-filter-btn" data-filter="marketing">Digital Marketing</button>
                <button class="cs-filter-btn" data-filter="product">Product Management</button>
            </div>
        </section>

        <section class="cs-grid animate-fade" style="animation-delay: 0.5s;">
            
            <!-- 1. Development (Checkout UI Mockup) -->
            <div class="cs-card cs-item" data-category="development">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=800&q=80" alt="E-Commerce Architecture" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Development</span><span class="cs-tag">E-Commerce</span>
                    </div>
                    <h2>High-Performance Checkout Infrastructure</h2>
                    <p>Developed and optimised the e-commerce architecture for a massive digital marketplace using custom PHP and dynamic UI components.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">+45%</span><span class="cs-metric-label">Conversion Rate</span></div>
                        <div><span class="cs-metric-val">1.2s</span><span class="cs-metric-label">Load Time</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="High-Performance Checkout Infrastructure"
                        data-img="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1200&q=80"
                        data-desc="This digital marketplace was losing significant revenue due to cart abandonment caused by slow load times and a clunky checkout process. We deployed a senior full-stack developer who completely rewrote the core checkout architecture using robust PHP frameworks and responsive front-end elements. <br><br>The result was a frictionless, lightning-fast payment gateway that securely handles massive traffic spikes during seasonal sales without dropping a single transaction.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 2. Designing (SaaS Dashboard Dark Mode) -->
            <div class="cs-card cs-item" data-category="designing">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80" alt="SaaS UI" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Design</span><span class="cs-tag">SaaS UI</span>
                    </div>
                    <h2>Complete SaaS Dashboard Overhaul</h2>
                    <p>Redesigned a complex data analytics interface using a minimal, dark-theme UI approach to eliminate user friction.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">+340%</span><span class="cs-metric-label">User Retention</span></div>
                        <div><span class="cs-metric-val">100%</span><span class="cs-metric-label">Adoption Rate</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="Complete SaaS Dashboard Overhaul"
                        data-img="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80"
                        data-desc="Our client had a powerful analytics tool, but enterprise users found it overwhelmingly complex. We introduced an elite UX/UI product designer who conducted deep user flow analysis. <br><br>By stripping away unnecessary visual noise and implementing a modern, high-contrast dark theme, data visualization became intuitive. The redesign not only looked premium but drastically reduced support tickets and increased daily active engagement.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 3. Marketing (Analytics / SEO Screen) -->
            <div class="cs-card cs-item" data-category="marketing">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=800&q=80" alt="Local SEO Analytics" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Marketing</span><span class="cs-tag">Local SEO</span>
                    </div>
                    <h2>Dominating UK Organic Search</h2>
                    <p>Executed a comprehensive content strategy for a cinematography agency, securing top Google Business rankings to drive organic traffic.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">+310%</span><span class="cs-metric-label">Organic Traffic</span></div>
                        <div><span class="cs-metric-val">#1</span><span class="cs-metric-label">Local Ranking</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="Dominating UK Organic Search"
                        data-img="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=1200&q=80"
                        data-desc="A premium drone cinematography agency in the UK was struggling to generate inbound leads against entrenched competitors. Our SEO specialists audited their entire digital presence, rebuilding their local search strategy from the ground up.<br><br>Through rigorous on-page optimisation, targeted local backlinking, and semantic content updates, the agency dominated Google Maps rankings for high-intent keywords, completely transforming their lead generation pipeline.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 4. Product (Growth/Business Graphs) -->
            <div class="cs-card cs-item" data-category="product">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1555421689-491a97ff2040?auto=format&fit=crop&w=800&q=80" alt="Growth Dashboard" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Product</span><span class="cs-tag">Growth</span>
                    </div>
                    <h2>Scaling B2B Software Growth</h2>
                    <p>Implemented a data-driven product strategy, streamlining the onboarding funnel for a global platform and reducing early drop-offs.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">-22%</span><span class="cs-metric-label">Churn Rate</span></div>
                        <div><span class="cs-metric-val">+150%</span><span class="cs-metric-label">User LTV</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="Scaling B2B Software Growth"
                        data-img="https://images.unsplash.com/photo-1555421689-491a97ff2040?auto=format&fit=crop&w=1200&q=80"
                        data-desc="Early user churn is a massive problem for subscription software. Our Product Manager mapped out the entire lifecycle, identifying exactly where enterprise users were losing momentum during onboarding.<br><br>By introducing targeted tooltips, simplifying the initial setup requirements, and aligning the product roadmap with core user demands, we successfully reversed the churn trend and significantly extended the lifetime value of every new client.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 5. Development (Crypto Trading UI) -->
            <div class="cs-card cs-item" data-category="development">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1642132652859-3ef5a1048fd1?auto=format&fit=crop&w=800&q=80" alt="Crypto Trading UI" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Development</span><span class="cs-tag">Web3</span>
                    </div>
                    <h2>Real-Time Trading Interface</h2>
                    <p>Developed a high-frequency trading dashboard featuring spot wallet integration for a crypto exchange, ensuring zero latency.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">50k+</span><span class="cs-metric-label">Transactions/Sec</span></div>
                        <div><span class="cs-metric-val">0</span><span class="cs-metric-label">System Lag</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="Real-Time Trading Interface"
                        data-img="https://images.unsplash.com/photo-1642132652859-3ef5a1048fd1?auto=format&fit=crop&w=1200&q=80"
                        data-desc="In the Web3 space, milliseconds cost millions. We deployed senior engineers to architect a real-time trading interface capable of handling intense API data streams from various blockchain nodes.<br><br>The frontend was optimised to render live candlestick charts and order books instantly without draining the user's browser memory, creating a professional-grade environment for high-volume traders.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 6. Designing (Clean Branding Mockup) -->
            <div class="cs-card cs-item" data-category="designing">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=800&q=80" alt="Brand Identity" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Design</span><span class="cs-tag">Branding</span>
                    </div>
                    <h2>Minimalist Engineering Branding</h2>
                    <p>Crafted a stark, text-only visual identity and clean interface for an engineering firm to maintain an authoritative professional tone.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">100%</span><span class="cs-metric-label">Brand Consistency</span></div>
                        <div><span class="cs-metric-val">3x</span><span class="cs-metric-label">Faster Approvals</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="Minimalist Engineering Branding"
                        data-img="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=1200&q=80"
                        data-desc="An industrial engineering group felt their digital presence looked outdated and untrustworthy. Our brand designers stripped away the clutter, implementing a hyper-minimalist aesthetic focusing heavily on typography, whitespace, and sharp geometry.<br><br>This new identity communicated precision, reliability, and modern engineering excellence, repositioning the firm completely in the eyes of their enterprise clients.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 7. Marketing (Social Media UI) -->
            <div class="cs-card cs-item" data-category="marketing">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=800&q=80" alt="Social Ads Dashboard" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Marketing</span><span class="cs-tag">Social Ads</span>
                    </div>
                    <h2>Driving UK Safari Bookings</h2>
                    <p>Launched a high-converting social media marketing campaign targeting the UK market for luxury Uganda-based safari tours.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">+4.2x</span><span class="cs-metric-label">Ad Return (ROAS)</span></div>
                        <div><span class="cs-metric-val">15k+</span><span class="cs-metric-label">Engagements</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="Driving UK Safari Bookings"
                        data-img="https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=1200&q=80"
                        data-desc="Selling high-ticket travel packages requires extreme audience targeting. We built a comprehensive Meta advertising funnel for an African safari operator, specifically targeting affluent demographics in the UK.<br><br>By utilizing high-quality short-form video assets and aggressive A/B testing on ad copy, we dropped their cost-per-lead significantly, securing fully booked tours for the entire season.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 8. Product (Database/Terminal Structure) -->
            <div class="cs-card cs-item" data-category="product">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=800&q=80" alt="Data Architecture" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Product</span><span class="cs-tag">Data Architecture</span>
                    </div>
                    <h2>Unifying Disparate Data Streams</h2>
                    <p>Led the product lifecycle for a centralised data warehouse tool, prioritising cross-platform API integrations and real-time reporting.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">12</span><span class="cs-metric-label">API Integrations</span></div>
                        <div><span class="cs-metric-val">100%</span><span class="cs-metric-label">Data Accuracy</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="Unifying Disparate Data Streams"
                        data-img="https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80"
                        data-desc="A logistics company was drowning in scattered data across different regional platforms. Our Product Lead stepped in to architect a unified data warehouse solution.<br><br>By establishing clear API requirements and leading the engineering team through rigorous sprint cycles, we delivered a unified dashboard that gave stakeholders a crystal-clear, real-time view of their entire global operation.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 9. Development (Code Editor & Preview) -->
            <div class="cs-card cs-item" data-category="development">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?auto=format&fit=crop&w=800&q=80" alt="Angular Code" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Development</span><span class="cs-tag">Angular</span>
                    </div>
                    <h2>Dynamic Web Application Framework</h2>
                    <p>Engineered a robust front-end web application using Angular. We streamlined the component architecture to drastically reduce loading times.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">-40%</span><span class="cs-metric-label">Render Time</span></div>
                        <div><span class="cs-metric-val">99.9%</span><span class="cs-metric-label">Uptime SLA</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="Dynamic Web Application Framework"
                        data-img="https://images.unsplash.com/photo-1547658719-da2b51169166?auto=format&fit=crop&w=1200&q=80"
                        data-desc="Legacy code was causing this client's main web app to buckle under pressure. We integrated a senior front-end specialist who refactored the entire codebase into a modular Angular framework.<br><br>This allowed the app to lazy-load components, cutting initial render times nearly in half and providing a buttery-smooth experience for end-users, while making future updates much easier for the dev team.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 10. Designing (Mobile Wireframes) -->
            <div class="cs-card cs-item" data-category="designing">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1618761714954-0b8cd0026356?auto=format&fit=crop&w=800&q=80" alt="App Wireframes" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Design</span><span class="cs-tag">App Interface</span>
                    </div>
                    <h2>Next-Gen Mobile UI/UX</h2>
                    <p>Designed an intuitive, high-performance mobile interface focusing on fluid micro-interactions and a premium aesthetic.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">4.9</span><span class="cs-metric-label">App Store Rating</span></div>
                        <div><span class="cs-metric-val">+60%</span><span class="cs-metric-label">Session Length</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="Next-Gen Mobile UI/UX"
                        data-img="https://images.unsplash.com/photo-1618761714954-0b8cd0026356?auto=format&fit=crop&w=1200&q=80"
                        data-desc="A startup's mobile app lacked the polished feel needed to compete with industry giants. We brought in a UI/UX expert to completely overhaul the user journey.<br><br>By focusing on thumb-friendly navigation, satisfying haptic feedback, and a sleek, modern visual language built from extensive wireframing, the redesigned app won rave reviews on launch day and significantly boosted user session duration.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 11. Marketing (Marketing Funnel Charts) -->
            <div class="cs-card cs-item" data-category="marketing">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80" alt="B2B Leads Dashboard" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Marketing</span><span class="cs-tag">B2B Leads</span>
                    </div>
                    <h2>High-Intent B2B Acquisition</h2>
                    <p>Deployed highly targeted digital advertising campaigns specifically designed to capture enterprise-level leads requiring premium services.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">+200%</span><span class="cs-metric-label">Lead Volume</span></div>
                        <div><span class="cs-metric-val">-35%</span><span class="cs-metric-label">Cost Per Action</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="High-Intent B2B Acquisition"
                        data-img="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80"
                        data-desc="Generating qualified B2B leads is notoriously difficult. Our growth marketers built a multi-channel funnel utilizing LinkedIn Ads and intent-based Google Search campaigns to capture decision-makers.<br><br>By refining the messaging to focus purely on ROI and enterprise solutions, we doubled their lead pipeline while driving down the overall acquisition cost, resulting in several major contract wins.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- 12. Product (Agile Kanban Board) -->
            <div class="cs-card cs-item" data-category="product">
                <div class="cs-card-visual">
                    <img src="https://images.unsplash.com/photo-1607705703571-c5a8695f18f6?auto=format&fit=crop&w=800&q=80" alt="Agile Kanban Board" class="cs-thumbnail">
                </div>
                <div class="cs-card-content">
                    <div class="cs-tags">
                        <span class="cs-tag">Product</span><span class="cs-tag">Agile</span>
                    </div>
                    <h2>Enterprise Roadmap Realignment</h2>
                    <p>Managed a stalled enterprise software product, realigning the agile development roadmap and bridging the gap between stakeholders and engineers.</p>
                    <div class="cs-metrics">
                        <div><span class="cs-metric-val">100%</span><span class="cs-metric-label">On-Time Delivery</span></div>
                        <div><span class="cs-metric-val">0</span><span class="cs-metric-label">Scope Creep</span></div>
                    </div>
                    <button class="cs-card-btn open-modal" 
                        data-title="Enterprise Roadmap Realignment"
                        data-img="https://images.unsplash.com/photo-1607705703571-c5a8695f18f6?auto=format&fit=crop&w=1200&q=80"
                        data-desc="Development had completely stalled due to misaligned priorities and severe scope creep. We injected a veteran Product Manager into the team to take control.<br><br>By enforcing strict Agile methodologies, cleaning up the sprint backlog, and protecting the developers from shifting stakeholder demands via structured Kanban boards, the team was able to ship the MVP exactly on schedule.">
                        View Deployment <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

        </section>

        <!-- Call to Action -->
        <section class="cs-cta animate-fade" style="animation-delay: 0.6s;">
            <div class="cs-cta-glow"></div>
            <h2>Ready to be our next success story?</h2>
            <p>Connect with Rafay and the team to scale your digital presence.</p>
            <a href="<?php echo site_url('/hire-talent'); ?>" class="cs-btn">
                Start Your Project <i class="fa-solid fa-arrow-right"></i>
            </a>
        </section>

    </div>
</main>

<!-- Modal Container -->
<div class="cs-modal-overlay" id="csModal">
    <div class="cs-modal-content">
        <button class="cs-modal-close" id="csModalClose"><i class="fa-solid fa-xmark"></i></button>
        <img src="" alt="Case Study Details" class="cs-modal-img" id="csModalImg">
        <div class="cs-modal-body">
            <h2 class="cs-modal-title" id="csModalTitle">Project Title</h2>
            <div class="cs-tags" id="csModalTags" style="margin-bottom: 1.5rem;">
                <!-- Tags injected via JS -->
            </div>
            <p class="cs-modal-desc" id="csModalDesc">Project details will appear here.</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- 1. Filter Logic ---
        const filterBtns = document.querySelectorAll('.cs-filter-btn');
        const caseItems = document.querySelectorAll('.cs-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const targetFilter = this.getAttribute('data-filter');

                caseItems.forEach(item => {
                    item.style.display = 'flex'; 
                    if(targetFilter !== 'all' && item.getAttribute('data-category') !== targetFilter) {
                        item.style.display = 'none';
                    }
                });
            });
        });

        // --- 2. Modal Logic ---
        const modal = document.getElementById('csModal');
        const modalClose = document.getElementById('csModalClose');
        const modalImg = document.getElementById('csModalImg');
        const modalTitle = document.getElementById('csModalTitle');
        const modalDesc = document.getElementById('csModalDesc');
        const modalTags = document.getElementById('csModalTags');
        const openBtns = document.querySelectorAll('.open-modal');

        openBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                const title = this.getAttribute('data-title');
                const img = this.getAttribute('data-img');
                const desc = this.getAttribute('data-desc');
                
                const tagsHtml = this.closest('.cs-card-content').querySelector('.cs-tags').innerHTML;

                modalTitle.textContent = title;
                modalImg.src = img;
                modalDesc.innerHTML = desc; 
                modalTags.innerHTML = tagsHtml;

                modal.classList.add('active');
                document.body.style.overflow = 'hidden'; 
            });
        });

        function closeModal() {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto'; 
        }

        modalClose.addEventListener('click', closeModal);

        modal.addEventListener('click', function(e) {
            if(e.target === modal) {
                closeModal();
            }
        });
    });
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "Our Case Studies",
  "url": "https://designbyglobal.com/case-studies/"
}
</script>

<?php get_footer(); ?>