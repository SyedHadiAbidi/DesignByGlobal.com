<?php 
/* Template Name: Pricing */
get_header(); 
?>

<style id="dg-pricing-styles">
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

    .pr-wrapper {
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
    .pr-wrapper::before {
        content: ""; position: absolute; inset: 0; z-index: 1; pointer-events: none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noise"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noise)"/%3E%3C/svg%3E');
        opacity: 0.04; mix-blend-mode: overlay;
    }
    
    .pr-orb {
        position: absolute; border-radius: 50%; pointer-events: none;
        animation: pr-float 25s infinite ease-in-out alternate;
    }
    .pr-orb-1 { width: 80vw; height: 80vw; background: radial-gradient(circle, rgba(47,228,59,0.08) 0%, transparent 60%); top: -20vw; left: -10vw; }
    .pr-orb-2 { width: 60vw; height: 60vw; background: radial-gradient(circle, rgba(47,228,59,0.05) 0%, transparent 60%); bottom: 10vw; right: -10vw; animation-delay: -5s; }
    
    @keyframes pr-float { 
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
    .pr-hero { padding: 8rem 0 3rem; text-align: center; position: relative; }
    @media (min-width: 768px) { .pr-hero { padding: 10rem 0 4rem; } }
    
    .pr-eyebrow {
        display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
        color: var(--color-primary); padding: 0.5rem 1.25rem; border: 1px solid var(--color-border-green);
        border-radius: 999px; background: rgba(20, 20, 22, 0.8); backdrop-filter: blur(10px); margin-bottom: 1.5rem;
    }
    .pr-status-dot {
        width: 6px; height: 6px; background-color: var(--color-primary); border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }
    
    .pr-title { font-size: clamp(2.5rem, 8vw, 5.5rem); font-weight: 800; line-height: 1.1; margin-bottom: 1rem; letter-spacing: -0.03em; }
    .pr-title span { color: transparent; background-clip: text; -webkit-background-clip: text; background-image: linear-gradient(100deg, #ffffff 0%, rgba(47,228,59,0.9) 50%, #ffffff 100%); }
    
    .pr-sub { color: var(--color-muted); font-size: clamp(1rem, 3vw, 1.25rem); max-width: 600px; margin: 0 auto; line-height: 1.6; }

    /* ==========================================================================
       PRICING CATEGORIES & GRIDS
       ========================================================================== */
    .pr-category-section {
        margin-bottom: 6rem;
        padding-top: 2rem;
        border-top: 1px solid rgba(255,255,255,0.05);
    }
    .pr-category-section:first-of-type {
        border-top: none;
    }

    .pr-category-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .pr-category-header h2 {
        font-size: clamp(1.75rem, 4vw, 2.5rem);
        font-weight: 800;
        color: #ffffff;
        letter-spacing: -0.02em;
        display: inline-flex;
        align-items: center;
        gap: 1rem;
    }

    .pr-category-header h2 i {
        color: var(--color-primary);
        font-size: 0.85em;
    }

    .pr-grid-3 {
        display: grid; grid-template-columns: 1fr; gap: 2rem;
    }
    @media (min-width: 1024px) { .pr-grid-3 { grid-template-columns: repeat(3, 1fr); } }

    .pr-card {
        background: linear-gradient(135deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.95) 100%);
        border: 1px solid rgba(255,255,255,0.05); border-radius: 1.5rem; padding: 2.5rem 2rem;
        backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
        display: flex; flex-direction: column; transition: all 0.4s var(--premium-ease);
        
        transform: translateZ(0); -webkit-transform: translateZ(0);
        backface-visibility: hidden; -webkit-backface-visibility: hidden;
        will-change: transform, box-shadow, border-color;
        position: relative;
    }
    .pr-card:hover {
        transform: translateY(-8px) translateZ(0); border-color: var(--color-border-hover);
        box-shadow: 0 20px 40px rgba(0,0,0,0.8), inset 0 0 20px rgba(47,228,59,0.05);
    }
    
    .pr-card.popular {
        border-color: var(--color-border-green);
        background: linear-gradient(135deg, rgba(30,35,30,0.9) 0%, rgba(10,15,10,0.95) 100%);
        box-shadow: 0 10px 30px rgba(47,228,59,0.05);
        z-index: 2;
    }
    @media (min-width: 1024px) {
        .pr-card.popular {
            transform: scale(1.05);
        }
        .pr-card.popular:hover {
            transform: scale(1.05) translateY(-8px);
        }
    }
    .pr-card.popular:hover { border-color: var(--color-primary); box-shadow: 0 20px 40px rgba(0,0,0,0.8), 0 0 30px rgba(47,228,59,0.15); }

    .pr-badge {
        position: absolute; top: -12px; left: 50%; transform: translateX(-50%);
        background: var(--color-primary); color: #000; font-size: 0.7rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 0.1em; padding: 0.3rem 1rem; border-radius: 999px;
    }

    .pr-card h2 { font-size: 1.25rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem; }
    
    .pr-price-block { margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid rgba(255,255,255,0.05); }
    .pr-price { font-size: 2.5rem; font-weight: 800; color: #fff; letter-spacing: -0.03em; line-height: 1; margin-bottom: 0.25rem; }
    .pr-price span { font-size: 1rem; color: var(--color-muted); font-weight: 500; letter-spacing: 0; }
    .pr-price-sub { font-size: 0.85rem; color: var(--color-primary); font-weight: 600; }

    .pr-features { list-style: none; padding: 0; margin: 0 0 2.5rem 0; flex-grow: 1; }
    .pr-features li {
        position: relative; padding-left: 1.75rem; font-size: 0.9rem; color: var(--color-muted);
        margin-bottom: 1rem; line-height: 1.5;
    }
    .pr-features li::before {
        content: '\f00c'; font-family: 'Font Awesome 6 Free'; font-weight: 900;
        position: absolute; left: 0; top: 2px; color: var(--color-primary); font-size: 0.85rem;
    }

    .pr-btn {
        display: flex; align-items: center; justify-content: center; height: 3.25rem; width: 100%;
        background: rgba(255,255,255,0.03); color: #fff; font-weight: 700; border: 1px solid rgba(255,255,255,0.1);
        text-transform: uppercase; letter-spacing: 0.05em; border-radius: 999px; text-decoration: none;
        transition: all 0.3s var(--premium-ease); font-size: 0.85rem;
    }
    .pr-btn:hover { background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.2); transform: translateY(-2px); }
    
    .pr-card.popular .pr-btn {
        background: linear-gradient(135deg, #44f050 0%, #2fe43b 100%); color: #000; border: none;
        box-shadow: 0 8px 20px rgba(47,228,59,0.25);
    }
    .pr-card.popular .pr-btn:hover { transform: translateY(-3px); box-shadow: 0 12px 25px rgba(47,228,59,0.4); }

    /* ==========================================================================
       GLOBAL INCLUSIONS SECTION
       ========================================================================== */
    .pr-includes { padding: 4rem 0 6rem; border-top: 1px solid rgba(255,255,255,0.05); }
    .pr-includes-header { text-align: center; margin-bottom: 4rem; }
    .pr-includes-header h2 { font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; color: #fff; margin-bottom: 1rem; }
    .pr-includes-header p { color: var(--color-muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto; }

    .pr-includes-grid { display: grid; grid-template-columns: 1fr; gap: 2rem; }
    @media (min-width: 768px) { .pr-includes-grid { grid-template-columns: repeat(3, 1fr); } }

    .pr-include-item {
        background: rgba(255,255,255,0.015); border: 1px solid rgba(255,255,255,0.05);
        border-radius: 1.25rem; padding: 2.5rem; text-align: center; transition: all 0.3s ease;
    }
    .pr-include-item:hover { background: rgba(255,255,255,0.03); border-color: rgba(47,228,59,0.3); transform: translateY(-5px); }
    
    .pr-include-icon {
        width: 3.5rem; height: 3.5rem; margin: 0 auto 1.5rem; border-radius: 50%;
        background: rgba(47,228,59,0.1); color: var(--color-primary);
        display: flex; align-items: center; justify-content: center; font-size: 1.25rem; border: 1px solid var(--color-border-green);
    }
    .pr-include-item h2 { font-size: 1.25rem; font-weight: 700; color: #fff; margin-bottom: 0.75rem; }
    .pr-include-item p { font-size: 0.9rem; color: var(--color-muted); line-height: 1.6; margin: 0; }

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

<main class="pr-wrapper">
    <!-- Ambient Background Effects -->
    <div class="pr-orb pr-orb-1"></div>
    <div class="pr-orb pr-orb-2"></div>

    <div class="dg-container">
        
        <!-- Hero Section -->
        <section class="pr-hero">
            <div class="animate-fade" style="animation-delay: 0.1s;">
                <div class="pr-eyebrow">
                    <div class="pr-status-dot"></div> Transparent Investment
                </div>
            </div>
            <h2 class="pr-title animate-fade" style="animation-delay: 0.2s;">
                Simple, Scalable <span>Pricing</span>
            </h2>
            <p class="pr-sub animate-fade" style="animation-delay: 0.3s;">
                No hidden fees or complex retainers. Choose your required talent profile and deploy elite professionals instantly.
            </p>
        </section>

        <!-- Category 1: Web Development (Prioritised) -->
        <section class="pr-category-section animate-fade" style="animation-delay: 0.4s;">
            <div class="pr-category-header">
                <h2><i class="fa-solid fa-code"></i> Web Development</h2>
            </div>
            <div class="pr-grid-3">
                <!-- Tier 1 -->
                <div class="pr-card">
                    <h2>Full-Stack Developer</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$45<span>/hr</span></div>
                        <div class="pr-price-sub">From $7,200 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Mid-Level Full-Stack Engineers</li>
                        <li>Front & Back-end Proficiency</li>
                        <li>Clean, Scalable Architecture</li>
                        <li>Standard API Integration</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>

                <!-- Tier 2 (Popular) -->
                <div class="pr-card popular">
                    <div class="pr-badge">Most Requested</div>
                    <h2>Senior Engineer</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$60<span>/hr</span></div>
                        <div class="pr-price-sub">From $9,600 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Top 2.3% Senior Engineers</li>
                        <li>Complex Systems & Microservices</li>
                        <li>Advanced Database Integration</li>
                        <li>Code Review & Optimisation</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>

                <!-- Tier 3 -->
                <div class="pr-card">
                    <h2>Solutions Architect</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$85<span>/hr</span></div>
                        <div class="pr-price-sub">From $13,600 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Elite Technical Leads</li>
                        <li>Enterprise Infrastructure Design</li>
                        <li>High-Availability Scalability</li>
                        <li>Security & Compliance Protocols</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>
            </div>
        </section>

        <!-- Category 2: Digital Marketing -->
        <section class="pr-category-section animate-fade" style="animation-delay: 0.5s;">
            <div class="pr-category-header">
                <h2><i class="fa-solid fa-bullseye"></i> Digital Marketing</h2>
            </div>
            <div class="pr-grid-3">
                <!-- Tier 1 -->
                <div class="pr-card">
                    <h2>Growth Specialist</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$35<span>/hr</span></div>
                        <div class="pr-price-sub">From $5,600 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Campaign Execution & Tracking</li>
                        <li>Basic SEO & SEM Implementation</li>
                        <li>Social Media Management</li>
                        <li>Weekly Performance Reporting</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>

                <!-- Tier 2 (Popular) -->
                <div class="pr-card popular">
                    <div class="pr-badge">Most Requested</div>
                    <h2>Senior Growth Marketer</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$45<span>/hr</span></div>
                        <div class="pr-price-sub">From $7,200 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Comprehensive Growth Strategy</li>
                        <li>Advanced SEO Optimisation</li>
                        <li>Paid Ads Management (ROAS Focus)</li>
                        <li>Conversion Rate Optimisation</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>

                <!-- Tier 3 -->
                <div class="pr-card">
                    <h2>Marketing Lead</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$65<span>/hr</span></div>
                        <div class="pr-price-sub">From $10,400 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Director-Level Strategy Formulation</li>
                        <li>Multi-Channel Brand Positioning</li>
                        <li>Marketing Budget Allocation</li>
                        <li>High-Level Analytics & Data Modelling</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>
            </div>
        </section>

        <!-- Category 3: Design & UI/UX -->
        <section class="pr-category-section animate-fade" style="animation-delay: 0.6s;">
            <div class="pr-category-header">
                <h2><i class="fa-solid fa-pen-nib"></i> Design & UI/UX</h2>
            </div>
            <div class="pr-grid-3">
                <!-- Tier 1 -->
                <div class="pr-card">
                    <h2>UI/UX Designer</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$40<span>/hr</span></div>
                        <div class="pr-price-sub">From $6,400 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Standard Interface Design</li>
                        <li>Figma Wireframing & Layouts</li>
                        <li>Asset & Iconography Creation</li>
                        <li>Responsive Mobile Adaptation</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>

                <!-- Tier 2 (Popular) -->
                <div class="pr-card popular">
                    <div class="pr-badge">Most Requested</div>
                    <h2>Senior Product Designer</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$50<span>/hr</span></div>
                        <div class="pr-price-sub">From $8,000 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Senior User Experience Specialists</li>
                        <li>Advanced Interactive Prototypes</li>
                        <li>User Flow & Journey Mapping</li>
                        <li>Comprehensive Brand Identity</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>

                <!-- Tier 3 -->
                <div class="pr-card">
                    <h2>Design Director</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$75<span>/hr</span></div>
                        <div class="pr-price-sub">From $12,000 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Elite Design Systems Architecture</li>
                        <li>Global Brand Vision & Guidelines</li>
                        <li>Cross-Platform Experience Strategy</li>
                        <li>Audience Research & Validation</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>
            </div>
        </section>

        <!-- Category 4: Product Management -->
        <section class="pr-category-section animate-fade" style="animation-delay: 0.7s;">
            <div class="pr-category-header">
                <h2><i class="fa-solid fa-chart-line"></i> Product Management</h2>
            </div>
            <div class="pr-grid-3">
                <!-- Tier 1 -->
                <div class="pr-card">
                    <h2>Product Owner</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$55<span>/hr</span></div>
                        <div class="pr-price-sub">From $8,800 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Sprint Planning & Backlog Management</li>
                        <li>Feature Requirement Documentation</li>
                        <li>Daily Stand-up Facilitation</li>
                        <li>Stakeholder Communication</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>

                <!-- Tier 2 (Popular) -->
                <div class="pr-card popular">
                    <div class="pr-badge">Most Requested</div>
                    <h2>Senior Product Manager</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$75<span>/hr</span></div>
                        <div class="pr-price-sub">From $12,000 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Veteran Product Strategy Leads</li>
                        <li>Data-Driven Roadmap Scaling</li>
                        <li>Agile & Scrum Methodologies</li>
                        <li>Cross-Functional Team Orchestration</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>

                <!-- Tier 3 -->
                <div class="pr-card">
                    <h2>Head of Product</h2>
                    <div class="pr-price-block">
                        <div class="pr-price">$95<span>/hr</span></div>
                        <div class="pr-price-sub">From $15,200 / month</div>
                    </div>
                    <ul class="pr-features">
                        <li>Executive-Level Product Vision</li>
                        <li>Market Expansion Strategies</li>
                        <li>P&L & Portfolio Management</li>
                        <li>Go-To-Market Execution</li>
                        <li>Dedicated Account Manager</li>
                    </ul>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="pr-btn">Hire Talent</a>
                </div>
            </div>
        </section>

        <!-- Global Inclusions -->
        <section class="pr-includes animate-fade" style="animation-delay: 0.8s;">
            <div class="pr-includes-header">
                <h2>Included with every engagement</h2>
                <p>We eliminate the bureaucratic friction so you can focus entirely on scaling your operations.</p>
            </div>
            
            <div class="pr-includes-grid">
                <div class="pr-include-item">
                    <div class="pr-include-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h2>Zero-Risk Trial Period</h2>
                    <p>Evaluate your matched talent in your own live production environment. If they are not the perfect fit, you pay absolutely nothing and we will rematch you instantly.</p>
                </div>
                <div class="pr-include-item">
                    <div class="pr-include-icon"><i class="fa-solid fa-file-signature"></i></div>
                    <h2>Compliance Handled</h2>
                    <p>Forget international labour laws and tax codes. We manage all contractor agreements, localised payroll, and compliance logistics to keep your business fully protected.</p>
                </div>
                <div class="pr-include-item">
                    <div class="pr-include-icon"><i class="fa-solid fa-bolt"></i></div>
                    <h2>48-Hour Deployment</h2>
                    <p>Stop waiting weeks for recruiters to scan CVs. Tell us your technical requirements, and our system will match you with elite, ready-to-work talent within 48 hours.</p>
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
  "name": "Pricing",
  "url": "https://designbyglobal.com/pricing/"
}
</script>
<?php get_footer(); ?>