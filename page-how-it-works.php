<?php 
/* Template Name: How It Works */
get_header(); 
?>

<style id="dg-how-it-works-styles">
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

    .hw-wrapper {
        position: relative;
        background-color: var(--color-bg);
        color: var(--color-text);
        overflow-x: hidden;
        width: 100%;
        min-height: 100vh;
        /* Enhanced Platform Grid */
        background-image: 
            linear-gradient(rgba(47, 228, 59, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(47, 228, 59, 0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        background-position: center center;
    }

    /* Ambient Orbs & Background Grain */
    .hw-wrapper::before {
        content: ""; position: absolute; inset: 0; z-index: 1; pointer-events: none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noise"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noise)"/%3E%3C/svg%3E');
        opacity: 0.04; mix-blend-mode: overlay;
    }
    
    .hw-orb {
        position: absolute; border-radius: 50%; pointer-events: none;
        animation: hw-float 25s infinite ease-in-out alternate;
    }
    .hw-orb-1 { width: 80vw; height: 80vw; background: radial-gradient(circle, rgba(47,228,59,0.08) 0%, transparent 60%); top: -20vw; left: -10vw; }
    .hw-orb-2 { width: 60vw; height: 60vw; background: radial-gradient(circle, rgba(47,228,59,0.05) 0%, transparent 60%); bottom: 5vw; right: -10vw; animation-delay: -5s; }
    
    @keyframes hw-float { 
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
    @keyframes scanline {
        0% { transform: translateY(-100%); }
        100% { transform: translateY(100vh); }
    }

    .animate-fade { opacity: 0; animation: fade-in-up 1s var(--premium-ease) forwards; }

    /* Container */
    .dg-container { 
        width: 100%; max-width: 1440px; margin: 0 auto; padding: 0 1.25rem; position: relative; z-index: 10; 
    }
    @media (min-width: 768px) { .dg-container { padding: 0 3rem; } }

    /* ==========================================================================
       HERO SECTION (Dashboard Header Style)
       ========================================================================== */
    .hw-hero { padding: 8rem 0 3rem; text-align: center; position: relative; }
    @media (min-width: 768px) { .hw-hero { padding: 10rem 0 4rem; } }
    
    .hw-eyebrow {
        display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
        color: var(--color-primary); padding: 0.5rem 1.25rem; border: 1px solid var(--color-border-green);
        border-radius: 999px; background: rgba(20, 20, 22, 0.8); backdrop-filter: blur(10px); margin-bottom: 1.5rem;
        box-shadow: 0 0 20px rgba(47, 228, 59, 0.1);
    }
    .hw-status-dot {
        width: 6px; height: 6px; background-color: var(--color-primary); border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }
    
    .hw-title { font-size: clamp(2.5rem, 8vw, 5.5rem); font-weight: 800; line-height: 1.1; margin-bottom: 1rem; letter-spacing: -0.03em; }
    .hw-title span { color: transparent; background-clip: text; -webkit-background-clip: text; background-image: linear-gradient(100deg, #ffffff 0%, rgba(47,228,59,0.9) 50%, #ffffff 100%); }
    
    .hw-sub { color: var(--color-muted); font-size: clamp(1rem, 3vw, 1.25rem); max-width: 600px; margin: 0 auto; line-height: 1.6; }

    /* Stats Row - Widget Feel */
    .hw-stats-row {
        display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; margin-top: 3rem;
    }
    .hw-stat-pill {
        background: linear-gradient(180deg, var(--color-surface) 0%, rgba(255,255,255,0.005) 100%); 
        border: 1px solid rgba(47, 228, 59, 0.2);
        padding: 1rem 1.5rem; border-radius: 1rem; backdrop-filter: blur(10px);
        display: flex; align-items: center; gap: 0.75rem;
        box-shadow: inset 0 1px 1px rgba(255,255,255,0.05), 0 4px 15px rgba(0,0,0,0.2);
    }
    .hw-stat-pill strong { color: #fff; font-weight: 800; font-size: 1.1rem; }
    .hw-stat-pill span { color: var(--color-muted); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600; }
    .hw-stat-icon { color: var(--color-primary); font-size: 1.25rem; }

    /* ==========================================================================
       TIMELINE STEPS (Platform Widget UI)
       ========================================================================== */
    .hw-steps { padding: 2rem 0 5rem; max-width: 1000px; margin: 0 auto; position: relative; }
    
    /* Glowing Data Stream Line */
    .hw-timeline-line {
        position: absolute; top: 2rem; bottom: 2rem; left: 1.75rem; width: 2px;
        background: rgba(255,255,255,0.05);
        z-index: 0; overflow: hidden;
    }
    .hw-timeline-line::after {
        content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 30%;
        background: linear-gradient(to bottom, transparent, var(--color-primary), transparent);
        animation: scanline 4s linear infinite;
        box-shadow: 0 0 15px var(--color-primary);
    }
    @media (min-width: 768px) { .hw-timeline-line { left: 50%; transform: translateX(-50%); } }

    .hw-step {
        display: flex; flex-direction: column; position: relative; z-index: 1; margin-bottom: 3rem;
        padding-left: 4.5rem;
    }
    @media (min-width: 768px) {
        .hw-step { flex-direction: row; justify-content: space-between; align-items: center; padding-left: 0; margin-bottom: 5rem; }
        .hw-step:nth-child(even) { flex-direction: row-reverse; }
    }

    /* Platform Node Indicators */
    .hw-step-num {
        position: absolute; left: 0; top: 0;
        width: 3.5rem; height: 3.5rem; border-radius: 50%; background: #0a0a0a;
        border: 2px solid var(--color-border-hover); color: #fff;
        display: flex; align-items: center; justify-content: center; font-size: 1.25rem; font-weight: 800;
        box-shadow: 0 0 20px rgba(47,228,59,0.15); font-family: monospace;
        transition: all 0.4s ease;
    }
    @media (min-width: 768px) {
        .hw-step-num { left: 50%; transform: translateX(-50%); width: 4.5rem; height: 4.5rem; font-size: 1.5rem; }
    }
    .hw-step:hover .hw-step-num {
        background: var(--color-primary); color: #000; border-color: var(--color-primary);
        box-shadow: 0 0 30px rgba(47,228,59,0.5); transform: translateX(-50%) scale(1.1);
    }

    /* Hardware Accelerated Glass Widgets */
    .hw-step-content {
        background: linear-gradient(135deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.95) 100%);
        border: 1px solid rgba(255,255,255,0.05); 
        border-radius: 1.25rem; 
        padding: 2rem;
        backdrop-filter: blur(16px); 
        -webkit-backdrop-filter: blur(16px);
        transition: all 0.4s var(--premium-ease);
        
        /* Forces hardware acceleration to stop scroll glitching */
        transform: translateZ(0);
        -webkit-transform: translateZ(0);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        will-change: transform, box-shadow, border-color;
    }
    @media (min-width: 768px) {
        .hw-step-content { width: calc(50% - 4.5rem); padding: 2.5rem; }
    }
    
    .hw-step-content:hover {
        transform: translateY(-5px) translateZ(0); 
        border-color: var(--color-border-hover);
        box-shadow: 0 20px 40px rgba(0,0,0,0.8), inset 0 0 20px rgba(47,228,59,0.05);
    }

    /* Widget Header Meta */
    .hw-widget-meta {
        display: flex; align-items: center; justify-content: space-between;
        margin-bottom: 1.25rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .hw-widget-tag {
        font-size: 0.65rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 700;
        color: rgba(255,255,255,0.5); background: rgba(255,255,255,0.03); padding: 0.3rem 0.6rem; border-radius: 0.25rem;
    }
    .hw-icon { font-size: 1.5rem; color: var(--color-primary); }

    .hw-step-content h2 { font-size: 1.35rem; font-weight: 700; color: #fff; margin-bottom: 0.75rem; border: none; padding: 0; }
    @media (min-width: 768px) { .hw-step-content h2 { font-size: 1.75rem; } }
    
    .hw-step-content p { font-size: 0.9rem; color: var(--color-muted); line-height: 1.6; margin: 0; }
    @media (min-width: 768px) { .hw-step-content p { font-size: 1rem; } }

    /* ==========================================================================
       CALL TO ACTION (Platform Panel)
       ========================================================================== */
    .hw-cta { 
        text-align: center; padding: 4rem 2rem; 
        background: linear-gradient(180deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.98) 100%);
        border-radius: 1.5rem; border: 1px solid var(--color-border-green); margin-bottom: 4rem;
        position: relative; overflow: hidden;
        box-shadow: inset 0 1px 1px rgba(255,255,255,0.1), 0 20px 40px rgba(0,0,0,0.5);
    }
    @media (min-width: 768px) { .hw-cta { padding: 6rem 4rem; border-radius: 2rem; margin-bottom: 6rem; } }
    
    .hw-cta::before {
        content: ''; position: absolute; inset: 0; opacity: 0.15;
        background-image: linear-gradient(rgba(47,228,59,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(47,228,59,0.3) 1px, transparent 1px);
        background-size: 20px 20px; pointer-events: none;
    }
    .hw-cta-glow {
        position: absolute; bottom: -50%; left: 50%; transform: translateX(-50%); width: 80%; height: 80%;
        background: radial-gradient(circle, rgba(47,228,59,0.15) 0%, transparent 70%); pointer-events: none;
    }
    
    .hw-cta h2 { font-size: clamp(2rem, 5vw, 3.5rem); color: #fff; margin-bottom: 1rem; font-weight: 800; position: relative; z-index: 2; border: none; padding: 0; letter-spacing: -0.02em; }
    .hw-cta p { color: var(--color-muted); margin-bottom: 2.5rem; font-size: 1.1rem; position: relative; z-index: 2; }
    
    .hw-btn {
        display: inline-flex; align-items: center; justify-content: center; height: 3.5rem; padding: 0 2.5rem;
        background: linear-gradient(135deg, #44f050 0%, #2fe43b 100%); color: #000; font-weight: 800;
        text-transform: uppercase; letter-spacing: 0.1em; border-radius: 999px; text-decoration: none;
        transition: all 0.3s var(--premium-ease); position: relative; z-index: 2;
        box-shadow: 0 10px 25px rgba(47,228,59,0.3);
    }
    @media (min-width: 768px) { .hw-btn { height: 4.5rem; padding: 0 3.5rem; font-size: 1rem; } }
    
    .hw-btn:hover { transform: translateY(-4px); box-shadow: 0 15px 35px rgba(47,228,59,0.5), inset 0 1px 1px rgba(255,255,255,0.8); }
    .hw-btn i { margin-left: 0.75rem; transition: transform 0.3s ease; }
    .hw-btn:hover i { transform: translateX(5px); }
</style>

<main class="hw-wrapper">
    <!-- Ambient Background Effects -->
    <div class="hw-orb hw-orb-1"></div>
    <div class="hw-orb hw-orb-2"></div>

    <div class="dg-container">
        <!-- Hero Section -->
        <section class="hw-hero">
            <div class="animate-fade" style="animation-delay: 0.1s;">
                <div class="hw-eyebrow">
                    <div class="hw-status-dot"></div> System Process Overview
                </div>
            </div>
            <h2 class="hw-title animate-fade" style="animation-delay: 0.2s;">
                How it <span>Works</span>
            </h2>
            <p class="hw-sub animate-fade" style="animation-delay: 0.3s;">
                We've engineered the friction out of traditional hiring. Connect with our pre-vetted platform network in three optimised steps.
            </p>
            
            <!-- Platform Stats Row -->
            <div class="hw-stats-row animate-fade" style="animation-delay: 0.4s;">
                <div class="hw-stat-pill">
                    <i class="fa-solid fa-microchip hw-stat-icon"></i>
                    <div>
                        <strong>48h</strong><br><span>Matching Engine</span>
                    </div>
                </div>
                <div class="hw-stat-pill">
                    <i class="fa-solid fa-database hw-stat-icon"></i>
                    <div>
                        <strong>Top 2.3%</strong><br><span>Verified Pool</span>
                    </div>
                </div>
                <div class="hw-stat-pill">
                    <i class="fa-solid fa-shield-check hw-stat-icon"></i>
                    <div>
                        <strong>0 Risk</strong><br><span>Evaluation Phase</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Vertical Timeline Steps -->
        <section class="hw-steps animate-fade" style="animation-delay: 0.5s;">
            <div class="hw-timeline-line"></div>

            <!-- Step 1 -->
            <div class="hw-step">
                <div class="hw-step-num">01</div>
                <div class="hw-step-content">
                    <div class="hw-widget-meta">
                        <span class="hw-widget-tag">Initialisation</span>
                        <i class="fa-solid fa-terminal hw-icon"></i>
                    </div>
                    <h2>Define Parameters</h2>
                    <p>Input your project parameters, tech stack requirements, and timeline constraints into our secure briefing portal. We parse your needs to establish the exact technical and cultural profile required for deployment.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="hw-step">
                <div class="hw-step-num">02</div>
                <div class="hw-step-content">
                    <div class="hw-widget-meta">
                        <span class="hw-widget-tag">Processing</span>
                        <i class="fa-solid fa-network-wired hw-icon"></i>
                    </div>
                    <h2>Algorithmic Matching</h2>
                    <p>Our system cross-references your criteria against our verified database. Within 48 hours, you'll receive a curated shortlist of elite developers ready for immediate integration. No endless resume scanning required.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="hw-step">
                <div class="hw-step-num">03</div>
                <div class="hw-step-content">
                    <div class="hw-widget-meta">
                        <span class="hw-widget-tag">Deployment</span>
                        <i class="fa-solid fa-server hw-icon"></i>
                    </div>
                    <h2>System Integration</h2>
                    <p>Approve your match and they plug straight into your workflow. We manage the background protocol—handling international compliance, contracts, and localized payroll—ensuring a seamless operational launch.</p>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="hw-cta animate-fade" style="animation-delay: 0.6s;">
            <div class="hw-cta-glow"></div>
            <h2>Initialise your team scale</h2>
            <p>Access the global talent grid today and execute your product roadmap with zero hiring friction.</p>
            <a href="<?php echo site_url('/hire-talent'); ?>" class="hw-btn">
                Execute Search <i class="fa-solid fa-arrow-right"></i>
            </a>
        </section>
    </div>
</main>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "How It Works",
  "url": "https://designbyglobal.com/how-it-works/"
}
</script>

<?php get_footer(); ?>