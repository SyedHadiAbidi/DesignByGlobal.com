<?php 
/* Template Name: About Us */
get_header(); 
?>

<style id="dg-about-styles">
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

    .ab-wrapper {
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
    .ab-wrapper::before {
        content: ""; position: absolute; inset: 0; z-index: 1; pointer-events: none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noise"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noise)"/%3E%3C/svg%3E');
        opacity: 0.04; mix-blend-mode: overlay;
    }
    
    .ab-orb {
        position: absolute; border-radius: 50%; pointer-events: none;
        animation: ab-float 25s infinite ease-in-out alternate;
    }
    .ab-orb-1 { width: 80vw; height: 80vw; background: radial-gradient(circle, rgba(47,228,59,0.08) 0%, transparent 60%); top: -20vw; left: -10vw; }
    .ab-orb-2 { width: 60vw; height: 60vw; background: radial-gradient(circle, rgba(47,228,59,0.05) 0%, transparent 60%); bottom: 10vw; right: -10vw; animation-delay: -5s; }
    
    @keyframes ab-float { 
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

    .animate-fade { opacity: 0; animation: fade-in-up 1s var(--premium-ease) forwards; }

    .dg-container { 
        width: 100%; max-width: 1440px; margin: 0 auto; padding: 0 1.25rem; position: relative; z-index: 10; 
    }
    @media (min-width: 768px) { .dg-container { padding: 0 3rem; } }

    /* ==========================================================================
       HERO SECTION
       ========================================================================== */
    .ab-hero { padding: 8rem 0 3rem; text-align: center; position: relative; }
    @media (min-width: 768px) { .ab-hero { padding: 10rem 0 4rem; } }
    
    .ab-eyebrow {
        display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
        color: var(--color-primary); padding: 0.5rem 1.25rem; border: 1px solid var(--color-border-green);
        border-radius: 999px; background: rgba(20, 20, 22, 0.8); backdrop-filter: blur(10px); margin-bottom: 1.5rem;
    }
    .ab-status-dot {
        width: 6px; height: 6px; background-color: var(--color-primary); border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }
    
    .ab-title { font-size: clamp(2.5rem, 8vw, 5.5rem); font-weight: 800; line-height: 1.1; margin-bottom: 1rem; letter-spacing: -0.03em; }
    .ab-title span { color: transparent; background-clip: text; -webkit-background-clip: text; background-image: linear-gradient(100deg, #ffffff 0%, rgba(47,228,59,0.9) 50%, #ffffff 100%); }
    
    .ab-sub { color: var(--color-muted); font-size: clamp(1rem, 3vw, 1.25rem); max-width: 700px; margin: 0 auto; line-height: 1.6; }

    /* ==========================================================================
       MISSION SECTION (Split Layout)
       ========================================================================== */
    .ab-mission { padding: 4rem 0; }
    @media (min-width: 768px) { .ab-mission { padding: 6rem 0; } }

    .ab-mission-grid {
        display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;
    }
    @media (min-width: 1024px) {
        .ab-mission-grid { grid-template-columns: 1fr 1fr; gap: 5rem; }
    }

    .ab-mission-content h2 {
        font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; color: #fff; margin-bottom: 1.5rem; line-height: 1.2; letter-spacing: -0.02em;
    }
    .ab-mission-content p {
        font-size: 1.1rem; color: var(--color-muted); line-height: 1.7; margin-bottom: 1.5rem;
    }

    .ab-mission-visual {
        position: relative; border-radius: 1.5rem; overflow: hidden;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: 0 20px 40px rgba(0,0,0,0.5);
    }
    .ab-mission-img {
        width: 100%; height: auto; display: block; object-fit: cover; aspect-ratio: 4/3;
        opacity: 0.85; transition: transform 0.6s var(--premium-ease);
    }
    .ab-mission-visual:hover .ab-mission-img { transform: scale(1.05); opacity: 1; }

    /* ==========================================================================
       STATS BAR
       ========================================================================== */
    .ab-stats-wrapper {
        background: linear-gradient(90deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.95) 100%);
        border-top: 1px solid rgba(255,255,255,0.05); border-bottom: 1px solid rgba(255,255,255,0.05);
        padding: 4rem 0; margin: 2rem 0 5rem; position: relative;
    }
    .ab-stats-grid {
        display: grid; grid-template-columns: 1fr; gap: 2.5rem; text-align: center;
    }
    @media (min-width: 640px) { .ab-stats-grid { grid-template-columns: repeat(3, 1fr); gap: 2rem; } }

    .ab-stat-item h2 {
        font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; color: var(--color-primary); 
        margin-bottom: 0.5rem; letter-spacing: -0.02em; line-height: 1;
    }
    .ab-stat-item p {
        font-size: 0.85rem; color: #fff; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 700; margin: 0;
    }

    /* ==========================================================================
       VALUES GRID
       ========================================================================== */
    .ab-values { padding: 2rem 0 6rem; }
    
    .ab-section-header { text-align: center; margin-bottom: 4rem; }
    .ab-section-header h2 { font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 800; color: #fff; margin-bottom: 1rem; }
    .ab-section-header p { color: var(--color-muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto; }

    .ab-values-grid {
        display: grid; grid-template-columns: 1fr; gap: 2rem;
    }
    @media (min-width: 768px) { .ab-values-grid { grid-template-columns: repeat(2, 1fr); gap: 2.5rem; } }

    .ab-value-card {
        background: linear-gradient(135deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.95) 100%);
        border: 1px solid rgba(255,255,255,0.05); border-radius: 1.25rem; padding: 2.5rem;
        backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
        transition: all 0.4s var(--premium-ease);
        
        /* Hardware Acceleration to fix scroll bug */
        transform: translateZ(0); -webkit-transform: translateZ(0);
        backface-visibility: hidden; -webkit-backface-visibility: hidden;
        will-change: transform, box-shadow, border-color;
    }
    .ab-value-card:hover {
        transform: translateY(-8px) translateZ(0); border-color: var(--color-border-hover);
        box-shadow: 0 20px 40px rgba(0,0,0,0.8), inset 0 0 20px rgba(47,228,59,0.05);
    }

    .ab-value-icon {
        width: 4rem; height: 4rem; border-radius: 1rem; background: rgba(47,228,59,0.1);
        display: flex; align-items: center; justify-content: center; font-size: 1.75rem;
        color: var(--color-primary); margin-bottom: 1.5rem; border: 1px solid var(--color-border-green);
    }

    .ab-value-card h2 { font-size: 1.5rem; font-weight: 700; color: #fff; margin-bottom: 1rem; }
    .ab-value-card p { font-size: 1rem; color: var(--color-muted); line-height: 1.6; margin: 0; }

    /* ==========================================================================
       CALL TO ACTION
       ========================================================================== */
    .ab-cta { 
        text-align: center; padding: 4rem 2rem; 
        background: linear-gradient(180deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.98) 100%);
        border-radius: 1.5rem; border: 1px solid var(--color-border-green); margin-bottom: 4rem;
        position: relative; overflow: hidden;
        box-shadow: inset 0 1px 1px rgba(255,255,255,0.1), 0 20px 40px rgba(0,0,0,0.5);
    }
    @media (min-width: 768px) { .ab-cta { padding: 6rem 4rem; border-radius: 2rem; margin-bottom: 6rem; } }
    
    .ab-cta-glow {
        position: absolute; bottom: -50%; left: 50%; transform: translateX(-50%); width: 80%; height: 80%;
        background: radial-gradient(circle, rgba(47,228,59,0.15) 0%, transparent 70%); pointer-events: none;
    }
    
    .ab-cta h2 { font-size: clamp(2rem, 5vw, 3.5rem); color: #fff; margin-bottom: 1rem; font-weight: 800; position: relative; z-index: 2; }
    .ab-cta p { color: var(--color-muted); margin-bottom: 2.5rem; font-size: 1.1rem; position: relative; z-index: 2; }
    
    .ab-btn {
        display: inline-flex; align-items: center; justify-content: center; height: 3.5rem; padding: 0 2.5rem;
        background: linear-gradient(135deg, #44f050 0%, #2fe43b 100%); color: #000; font-weight: 800;
        text-transform: uppercase; letter-spacing: 0.1em; border-radius: 999px; text-decoration: none;
        transition: all 0.3s var(--premium-ease); position: relative; z-index: 2;
        box-shadow: 0 10px 25px rgba(47,228,59,0.3);
    }
    .ab-btn:hover { transform: translateY(-4px); box-shadow: 0 15px 35px rgba(47,228,59,0.5), inset 0 1px 1px rgba(255,255,255,0.8); }
    .ab-btn i { margin-left: 0.75rem; transition: transform 0.3s ease; }
    .ab-btn:hover i { transform: translateX(5px); }
</style>

<main class="ab-wrapper">
    <div class="ab-orb ab-orb-1"></div>
    <div class="ab-orb ab-orb-2"></div>

    <div class="dg-container">
        
        <!-- Hero Section -->
        <section class="ab-hero">
            <div class="animate-fade" style="animation-delay: 0.1s;">
                <div class="ab-eyebrow">
                    <div class="ab-status-dot"></div> Corporate Intelligence
                </div>
            </div>
            <h2 class="ab-title animate-fade" style="animation-delay: 0.2s;">
                Engineering the <span>Future</span>
            </h2>
            <p class="ab-sub animate-fade" style="animation-delay: 0.3s;">
                We specialise in bridging the gap between visionary companies and the world's most formidable technical and creative minds.
            </p>
        </section>

        <!-- Mission Section -->
        <section class="ab-mission animate-fade" style="animation-delay: 0.4s;">
            <div class="ab-mission-grid">
                <div class="ab-mission-content">
                    <h2>Redefining how enterprise teams scale.</h2>
                    <p>Traditional recruitment is broken. It is slow, deeply inefficient, and heavily reliant on scanning outdated CVs rather than evaluating genuine technical capability.</p>
                    <p>At Design by Global, we built a secure platform dedicated to finding, vetting, and deploying elite digital talent instantly. We strip away the administrative friction, allowing you to focus entirely on building, scaling, and deploying your core product.</p>
                </div>
                <div class="ab-mission-visual">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80" alt="Engineering Team Collaboration" class="ab-mission-img">
                </div>
            </div>
        </section>
    </div>

    <!-- Full Width Stats Bar -->
    <div class="ab-stats-wrapper animate-fade" style="animation-delay: 0.5s;">
        <div class="dg-container">
            <div class="ab-stats-grid">
                <div class="ab-stat-item">
                    <h2>2.3%</h2>
                    <p>Acceptance Rate</p>
                </div>
                <div class="ab-stat-item">
                    <h2>48h</h2>
                    <p>Average Match Time</p>
                </div>
                <div class="ab-stat-item">
                    <h2>98%</h2>
                    <p>Client Retention</p>
                </div>
            </div>
        </div>
    </div>

    <div class="dg-container">
        <!-- Core Values -->
        <section class="ab-values animate-fade" style="animation-delay: 0.6s;">
            <div class="ab-section-header">
                <h2>Our Operating Principles</h2>
                <p>The core philosophy that governs our vetting processes, client relations, and network management.</p>
            </div>

            <div class="ab-values-grid">
                <div class="ab-value-card">
                    <div class="ab-value-icon"><i class="fa-solid fa-gem"></i></div>
                    <h2>Uncompromising Calibre</h2>
                    <p>We do not settle for average. Every developer, designer, and marketer in our network is subjected to rigorous technical exams and peer reviews to guarantee top-tier proficiency.</p>
                </div>

                <div class="ab-value-card">
                    <div class="ab-value-icon"><i class="fa-solid fa-bolt"></i></div>
                    <h2>Velocity & Precision</h2>
                    <p>Business moves rapidly, and so do we. We specialise in identifying the perfect cultural and technical match for your stack in a fraction of the time required by traditional agencies.</p>
                </div>

                <div class="ab-value-card">
                    <div class="ab-value-icon"><i class="fa-solid fa-shield-check"></i></div>
                    <h2>Zero-Risk Deployments</h2>
                    <p>We completely absorb the initial hiring risk. We provide comprehensive trial periods so you can evaluate the talent in a live production environment before fully committing.</p>
                </div>

                <div class="ab-value-card">
                    <div class="ab-value-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                    <h2>Radical Transparency</h2>
                    <p>No hidden fees, no obscure contracts, and no bureaucratic red tape. We believe in clear, upfront communication regarding compliance, payroll, and developer expectations.</p>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="ab-cta animate-fade" style="animation-delay: 0.7s;">
            <div class="ab-cta-glow"></div>
            <h2>Ready to transform your workflow?</h2>
            <p>Join the organisations already leveraging our elite network to build superior products.</p>
            <a href="<?php echo site_url('/contact'); ?>" class="ab-btn">
                Partner With Us <i class="fa-solid fa-arrow-right"></i>
            </a>
        </section>
    </div>
</main>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "name": "About",
  "url": "https://designbyglobal.com/about/"
}
</script>
<?php get_footer(); ?>