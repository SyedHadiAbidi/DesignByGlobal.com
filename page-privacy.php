<?php 
/* Template Name: Legal Policy */
get_header(); 
?>

<style id="dg-legal-styles">
    /* ==========================================================================
       VARIABLES & BASE STYLES
       ========================================================================== */
    :root {
        --color-primary: #2fe43b;
        --color-bg: #030303;
        --color-text: #ffffff;
        --color-muted: #a1a1aa;
        --color-border: rgba(255, 255, 255, 0.08);
        --premium-ease: cubic-bezier(0.16, 1, 0.3, 1);
    }

    .legal-wrapper {
        background-color: var(--color-bg);
        color: var(--color-text);
        position: relative;
        overflow-x: hidden;
        min-height: 100vh;
        padding: 8rem 0 4rem;
    }

    /* Subtle Background Noise */
    .legal-wrapper::before {
        content: ""; position: absolute; inset: 0; z-index: 1; pointer-events: none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noise"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noise)"/%3E%3C/svg%3E');
        opacity: 0.03; mix-blend-mode: overlay;
    }

    .legal-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
        position: relative;
        z-index: 10;
        display: flex;
        flex-direction: column;
        gap: 4rem;
    }

    @media (min-width: 992px) {
        .legal-container {
            flex-direction: row;
        }
    }

    /* ==========================================================================
       PAGE HEADER
       ========================================================================== */
    .legal-header-mobile {
        margin-bottom: 2rem;
    }
    @media (min-width: 992px) {
        .legal-header-mobile { display: none; }
    }

    .legal-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        letter-spacing: -0.03em;
        margin-bottom: 1rem;
        line-height: 1.1;
    }

    .legal-last-updated {
        font-size: 0.9rem;
        color: var(--color-primary);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* ==========================================================================
       STICKY SIDEBAR (TABLE OF CONTENTS)
       ========================================================================== */
    .legal-sidebar {
        width: 100%;
    }

    @media (min-width: 992px) {
        .legal-sidebar {
            width: 300px;
            flex-shrink: 0;
            position: sticky;
            top: 120px;
            height: max-content;
        }
    }

    .toc-card {
        background: rgba(20, 20, 22, 0.6);
        border: 1px solid var(--color-border);
        border-radius: 1rem;
        padding: 2rem;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .toc-card h2 {
        font-size: 1.1rem;
        color: #fff;
        margin-bottom: 1.5rem;
        font-weight: 700;
        border-bottom: 1px solid var(--color-border);
        padding-bottom: 1rem;
    }

    .toc-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .toc-links a {
        color: var(--color-muted);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .toc-links a:hover {
        color: var(--color-primary);
        transform: translateX(4px);
    }

    .toc-links a::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: transparent;
        border: 1px solid var(--color-muted);
        transition: all 0.3s ease;
    }

    .toc-links a:hover::before {
        background-color: var(--color-primary);
        border-color: var(--color-primary);
    }

    /* ==========================================================================
       MAIN CONTENT
       ========================================================================== */
    .legal-content {
        flex: 1;
        max-width: 800px;
    }

    .legal-header-desktop {
        display: none;
        margin-bottom: 4rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid var(--color-border);
    }
    @media (min-width: 992px) {
        .legal-header-desktop { display: block; }
    }

    .legal-section {
        margin-bottom: 4rem;
    }

    .legal-section h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 1.5rem;
        letter-spacing: -0.02em;
    }

    .legal-section p {
        color: var(--color-muted);
        font-size: 1.05rem;
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }

    .legal-section ul {
        color: var(--color-muted);
        font-size: 1.05rem;
        line-height: 1.8;
        margin-bottom: 1.5rem;
        padding-left: 1.5rem;
    }

    .legal-section li {
        margin-bottom: 0.75rem;
    }

    .legal-section li::marker {
        color: var(--color-primary);
    }

    .highlight-box {
        background: rgba(47, 228, 59, 0.05);
        border-left: 3px solid var(--color-primary);
        padding: 1.5rem;
        border-radius: 0 8px 8px 0;
        margin: 2rem 0;
    }

    .highlight-box p {
        margin: 0;
        color: #fff;
        font-size: 0.95rem;
    }

</style>

<main class="legal-wrapper">
    <div class="legal-container">
        
        <!-- Mobile Header -->
        <div class="legal-header-mobile">
            <div class="legal-last-updated"><i class="fa-regular fa-clock"></i> Last Updated: October 2026</div>
            <h2 class="legal-title">Privacy Policy</h2>
        </div>

        <!-- Sticky Sidebar Navigation -->
        <aside class="legal-sidebar">
            <div class="toc-card">
                <h2>Table of Contents</h2>
                <ul class="toc-links">
                    <li><a href="#introduction">1. Introduction</a></li>
                    <li><a href="#data-collection">2. Data We Collect</a></li>
                    <li><a href="#data-usage">3. How We Use Your Data</a></li>
                    <li><a href="#third-parties">4. Third-Party Sharing</a></li>
                    <li><a href="#security">5. Security Measures</a></li>
                    <li><a href="#contact">6. Contact Information</a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Content Area -->
        <article class="legal-content">
            
            <!-- Desktop Header -->
            <div class="legal-header-desktop">
                <div class="legal-last-updated"><i class="fa-regular fa-clock"></i> Last Updated: October 2026</div>
                <h2 class="legal-title">Privacy Policy</h2>
                <p style="color: var(--color-muted); font-size: 1.1rem; margin-top: 1rem;">
                    This document outlines how Design by Global collects, utilises, and safeguards your corporate and personal data across our marketplace infrastructure.
                </p>
            </div>

            <!-- Section 1 -->
            <section class="legal-section" id="introduction">
                <h2>1. Introduction</h2>
                <p>Welcome to Design by Global. We respect your privacy and are committed to protecting your professional data. This privacy policy will inform you as to how we look after your personal data when you visit our website (regardless of where you visit it from) and tell you about your privacy rights and how the law protects you.</p>
                <p>We require all marketplace participants, including enterprise clients and freelance contractors, to review this policy comprehensively to understand our strict data governance standards.</p>
            </section>

            <!-- Section 2 -->
            <section class="legal-section" id="data-collection">
                <h2>2. Data We Collect</h2>
                <p>To provide a premium matchmaking and deployment service, we must collect and process specific categories of information. This includes but is not limited to:</p>
                <ul>
                    <li><strong>Identity Data:</strong> First name, last name, username or similar identifier, title, and professional portfolio links.</li>
                    <li><strong>Contact Data:</strong> Billing address, email address, and telephone numbers.</li>
                    <li><strong>Financial Data:</strong> Encrypted payment gateway details and transaction histories (processed securely via our certified third-party providers).</li>
                    <li><strong>Technical Data:</strong> Internet protocol (IP) address, browser type and version, time zone setting, and operating system.</li>
                </ul>
                
                <div class="highlight-box">
                    <p><strong>Note:</strong> We do not collect any Special Categories of Personal Data about you (this includes details about your race or ethnicity, religious or philosophical beliefs, or political opinions).</p>
                </div>
            </section>

            <!-- Section 3 -->
            <section class="legal-section" id="data-usage">
                <h2>3. How We Use Your Data</h2>
                <p>We will only use your personal data when the law allows us to. Most commonly, we will utilise your data in the following circumstances:</p>
                <ul>
                    <li>To register you as a new client or premium contractor.</li>
                    <li>To process and deliver your project engagements, including managing payments, fees, and charges.</li>
                    <li>To manage our relationship with you, which will include notifying you about changes to our terms or privacy policy.</li>
                    <li>To administer and protect our business and this website (including troubleshooting, data analysis, testing, system maintenance, and support).</li>
                </ul>
            </section>

            <!-- Section 4 -->
            <section class="legal-section" id="security">
                <h2>4. Security Measures</h2>
                <p>We have put in place appropriate security measures to prevent your personal data from being accidentally lost, used, or accessed in an unauthorised way, altered, or disclosed. In addition, we limit access to your personal data to those employees, agents, contractors, and other third parties who have a strict business need to know.</p>
                <p>They will only process your personal data on our instructions and they are subject to a strict duty of confidentiality.</p>
            </section>

            <!-- Section 5 -->
            <section class="legal-section" id="contact">
                <h2>5. Contact Information</h2>
                <p>If you have any questions about this privacy policy or our privacy practices, please contact our data governance team.</p>
                <p>Email: <strong>info@designbyglobal.com</strong><br>
                Response Time: Within 24-48 business hours.</p>
            </section>

        </article>
    </div>
</main>

<script>
    // Smooth scrolling for sidebar links
    document.querySelectorAll('.toc-links a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 40,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Privacy Policy",
  "url": "https://designbyglobal.com/privacy-policy/"
}
</script>
<?php get_footer(); ?>