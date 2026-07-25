<?php 
/* Template Name: Terms and Conditions */
get_header(); 
?>

<style id="dg-terms-styles">
    /* ==========================================================================
       VARIABLES & BASE STYLES
       ========================================================================== */
    :root {
        --color-primary: #2fe43b;
        --color-bg: #030303;
        --color-text: #ffffff;
        --color-muted: #a1a1aa;
        --color-border-green: rgba(47, 228, 59, 0.4);
        --premium-ease: cubic-bezier(0.16, 1, 0.3, 1);
    }

    body {
        overflow-x: hidden;
    }

    .tm-wrapper {
        position: relative;
        background-color: var(--color-bg);
        color: var(--color-text);
        width: 100%;
        min-height: 100vh;
        background-image: 
            linear-gradient(rgba(47, 228, 59, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(47, 228, 59, 0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        background-position: center center;
    }

    /* Ambient Background Grain */
    .tm-wrapper::before {
        content: ""; position: absolute; inset: 0; z-index: 1; pointer-events: none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noise"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noise)"/%3E%3C/svg%3E');
        opacity: 0.04; mix-blend-mode: overlay;
    }
    
    .tm-orb {
        position: absolute; border-radius: 50%; pointer-events: none;
        animation: tm-float 25s infinite ease-in-out alternate;
    }
    .tm-orb-1 { width: 80vw; height: 80vw; background: radial-gradient(circle, rgba(47,228,59,0.06) 0%, transparent 60%); top: -20vw; left: -10vw; }
    .tm-orb-2 { width: 60vw; height: 60vw; background: radial-gradient(circle, rgba(47,228,59,0.04) 0%, transparent 60%); bottom: 10vw; right: -10vw; animation-delay: -5s; }
    
    @keyframes tm-float { 
        0% { transform: translateY(0); } 
        100% { transform: translateY(-30px); } 
    }
    @keyframes fade-in-up {
        from { opacity: 0; transform: translate3d(0, 30px, 0); filter: blur(4px); }
        to   { opacity: 1; transform: translate3d(0, 0, 0);   filter: blur(0); }
    }

    .animate-fade { opacity: 0; animation: fade-in-up 1s var(--premium-ease) forwards; }

    /* Reading Container */
    .tm-reading-container { 
        width: 100%; max-width: 860px; margin: 0 auto; padding: 8rem 1.25rem 6rem; position: relative; z-index: 10; 
    }
    @media (min-width: 768px) { .tm-reading-container { padding: 12rem 2rem 8rem; } }

    /* ==========================================================================
       HEADER STYLING
       ========================================================================== */
    .tm-header {
        margin-bottom: 4rem;
        text-align: left;
    }
    .tm-eyebrow {
        display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
        color: var(--color-primary); padding: 0.5rem 1.25rem; border: 1px solid var(--color-border-green);
        border-radius: 999px; background: rgba(20, 20, 22, 0.8); backdrop-filter: blur(10px); margin-bottom: 1.5rem;
    }
    .tm-title { 
        font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 800; line-height: 1.15; margin-bottom: 1.5rem; letter-spacing: -0.02em; color: #fff;
    }
    .tm-last-updated {
        color: var(--color-muted); font-size: 0.95rem; font-weight: 500;
    }

    /* ==========================================================================
       CONTENT STYLING
       ========================================================================== */
    .tm-content {
        background: linear-gradient(135deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.95) 100%);
        border: 1px solid rgba(255,255,255,0.05); border-radius: 1.5rem; padding: 3rem 2rem;
        backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
        font-size: 1.1rem; line-height: 1.8; color: #d4d4d8;
    }
    @media (min-width: 768px) { .tm-content { padding: 4rem; } }
    
    .tm-content h2 {
        font-size: 1.5rem; font-weight: 800; color: #fff; margin: 3rem 0 1rem; letter-spacing: -0.01em;
    }
    
    /* Targeting the very first heading so it doesn't have a massive top margin */
    .tm-content h2:first-child { margin-top: 0; }
    
    .tm-content p { margin-bottom: 1.75rem; }
    .tm-content p:last-child { margin-bottom: 0; }
    
    .tm-content ul, .tm-content ol { margin: 0 0 2rem 1.5rem; padding: 0; }
    .tm-content li { margin-bottom: 0.75rem; padding-left: 0.5rem; }
    
    .tm-content a {
        color: var(--color-primary); text-decoration: none; border-bottom: 1px solid rgba(47, 228, 59, 0.3);
        transition: all 0.3s ease; font-weight: 600;
    }
    .tm-content a:hover { border-bottom-color: var(--color-primary); background: rgba(47, 228, 59, 0.1); }

</style>

<main class="tm-wrapper">
    <div class="tm-orb tm-orb-1"></div>
    <div class="tm-orb tm-orb-2"></div>

    <div class="tm-reading-container">
        
        <header class="tm-header animate-fade" style="animation-delay: 0.1s;">
            <div class="tm-eyebrow">Legal Governance</div>
            <h2 class="tm-title">Terms and Conditions</h2>
            <div class="tm-last-updated">Last Updated: <?php echo date('F j, Y'); ?></div>
        </header>

        <article class="tm-content animate-fade" style="animation-delay: 0.2s;">
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                <?php 
                // If you have added content via the WordPress editor, it will output here.
                // Otherwise, the default boilerplate below will be used.
                $content = get_the_content();
                if ( ! empty( $content ) ) : 
                    the_content();
                else : 
                ?>
                
                    <h2>1. Acceptance of Terms</h2>
                    <p>By accessing or utilising this platform, you agree to be bound by these Terms and Conditions. If you do not agree with any part of these terms, you must immediately cease usage of our digital programme and services.</p>

                    <h2>2. Provision of Services</h2>
                    <p>We provide a curated network designed to connect enterprise clients with elite talent across development, design, and product management. We reserve the right to modify, suspend, or discontinue any aspect of the programme at any time without prior notice. We constantly strive to optimise our infrastructure to ensure maximum uptime.</p>

                    <h2>3. Intellectual Property Licence</h2>
                    <p>All content, branding, and platform architecture remain the exclusive property of our network. You are granted a limited, non-exclusive, non-transferable licence to access the platform for the sole purpose of sourcing and managing professional talent. Unauthorised reproduction or distribution is strictly prohibited.</p>

                    <h2>4. User Obligations</h2>
                    <p>When engaging with our platform, you agree to:</p>
                    <ul>
                        <li>Provide accurate and current information during the onboarding process.</li>
                        <li>Maintain the confidentiality of your account credentials.</li>
                        <li>Utilise the platform strictly for legitimate business operations.</li>
                        <li>Refrain from reverse-engineering or attempting to compromise our server architecture.</li>
                    </ul>

                    <h2>5. Limitation of Liability</h2>
                    <p>To the maximum extent permitted by law, we shall not be liable for any indirect, incidental, or consequential damages arising from your use of the platform. Our total liability in any matter related to these terms is strictly limited to the amount paid by you for the specific services rendered.</p>

                    <h2>6. Governing Law</h2>
                    <p>These Terms and Conditions shall be governed by and construed in accordance with the applicable commercial laws. Any disputes arising from this agreement will be subject to the exclusive jurisdiction of the nominated courts.</p>

                    <h2>7. Contact and Support</h2>
                    <p>If you have any queries regarding these terms or require further clarification on our programme policies, please navigate to our <a href="<?php echo site_url('/support'); ?>">Support</a> page and submit a formal request to our administrative team.</p>

                <?php endif; ?>
                
            <?php endwhile; endif; ?>

        </article>

    </div>
</main>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Terms & Conditions",
  "url": "https://designbyglobal.com/terms-conditions/"
}
</script>
<?php get_footer(); ?>