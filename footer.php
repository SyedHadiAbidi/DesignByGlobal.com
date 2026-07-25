<footer class="dg-footer-section">
    <div class="dg-footer-glow-line"></div>

    <div class="dg-container">
        <div class="dg-footer-grid">
            
            <div class="dg-footer-brand-col">
                <h2 class="dg-footer-logo">Design by <span>Global</span></h2>
                <p class="dg-footer-desc">
                    Enterprise-level web development architecture and premium digital marketplace solutions. 
                </p>
                <div class="dg-social-links">
                    <a href="facebook.com/designbyglobal" class="dg-social-icon" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="dg-social-icon" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="instagram.com/design_by_global/" class="dg-social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="dg-footer-links-col">
                <h2 class="dg-footer-heading">Platform</h2>
                <ul class="dg-footer-list">
                    <li><a href="/how-it-works">How It Works</a></li>
                    <li><a href="/pricing">Pricing</a></li>
					<li><a href="/blogs">Blogs</a></li>
                </ul>
            </div>

            <div class="dg-footer-links-col">
                <h2 class="dg-footer-heading">Resources</h2>
                <ul class="dg-footer-list">
                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                    <li><a href="/terms-conditions">Terms & Conditions</a></li>
                    <li><a href="/support">Contact Support</a></li>
                </ul>
            </div>

            <div class="dg-footer-cta-col">
                <h2 class="dg-footer-heading">Stay Updated</h2>
                <p class="dg-footer-desc-sm">Get the latest platform updates and feature releases.</p>
                <form class="dg-footer-form">
                    <input type="email" placeholder="Enter your email" class="dg-footer-input" required>
                    <button type="submit" class="dg-footer-submit">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
            </div>

        </div>

        <div class="dg-footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Design by Global. All rights reserved.</p>
            <div class="dg-footer-legal">
                <a href="/privacy-policy">Privacy Policy</a>
                <span class="dg-separator">&bull;</span>
                <a href="/terms-conditions">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>

<style>
	/* ==========================================================================
   FOOTER CONTAINER (Ensures layout works on all pages)
   ========================================================================== */
.dg-container {
    width: 100%;
    max-width: 1440px;
    margin: 0 auto;
    padding: 0 1.25rem;
    position: relative;
    z-index: 10;
}

@media (min-width: 768px) { 
    .dg-container { 
        padding: 0 3rem; 
    } 
}
    /* ==========================================================================
       FOOTER STYLES
       ========================================================================== */
   .dg-footer-section {
    background-color: #020202; 
    position: relative;
    padding-top: 5rem;
    /* margin-top: 4rem;  <-- REMOVE THIS LINE */
    z-index: 10;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
}

@media (min-width: 768px) {
    .dg-footer-section { 
        padding-top: 7rem; 
        /* margin-top: 6rem;  <-- REMOVE THIS LINE */
    }
}

    .dg-footer-glow-line {
        position: absolute;
        top: -1px;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, rgba(47, 228, 59, 0.5) 50%, transparent 100%);
        box-shadow: 0 0 20px rgba(47, 228, 59, 0.3);
    }

    .dg-footer-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
        margin-bottom: 4rem;
    }

    @media (min-width: 640px) {
        .dg-footer-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (min-width: 1024px) {
        .dg-footer-grid { grid-template-columns: 2fr 1fr 1fr 1.5fr; gap: 4rem; }
    }

    .dg-footer-logo {
        font-size: 1.75rem;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 1rem;
        letter-spacing: -0.02em;
    }

    .dg-footer-logo span {
        color: var(--color-primary);
    }

    .dg-footer-desc {
        color: var(--color-muted);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 2rem;
        max-width: 300px;
    }

    .dg-social-links {
        display: flex;
        gap: 1rem;
    }

    .dg-social-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--color-border-green);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s var(--premium-ease);
    }

    .dg-social-icon:hover {
        background: rgba(47, 228, 59, 0.1);
        border-color: var(--color-primary);
        color: var(--color-primary);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(47, 228, 59, 0.2);
    }

    .dg-footer-heading {
        color: #ffffff;
        font-size: 1.125rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        letter-spacing: 0.02em;
    }

    .dg-footer-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .dg-footer-list a {
        color: var(--color-muted);
        text-decoration: none;
        font-size: 0.9375rem;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .dg-footer-list a:hover {
        color: var(--color-primary);
        transform: translateX(5px);
    }

    .dg-footer-desc-sm {
        color: var(--color-muted);
        font-size: 0.9375rem;
        margin-bottom: 1.5rem;
        line-height: 1.5;
    }

    .dg-footer-form {
        display: flex;
        position: relative;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 999px;
        padding: 0.25rem;
        transition: all 0.3s ease;
        width: 100%; /* Forces form to stay within column */
        max-width: 400px; /* Prevents it from getting too wide on large screens */
    }

    .dg-footer-form:focus-within {
        border-color: var(--color-border-green-hover);
        box-shadow: 0 0 15px rgba(47, 228, 59, 0.1);
        background: rgba(255, 255, 255, 0.04);
    }

    .dg-footer-input {
        flex-grow: 1;
        min-width: 0; /* Crucial fix: Stops flex item from blowing out container width on mobile */
        width: 100%; 
        background: transparent;
        border: none;
        padding: 0.75rem 1rem; /* Slightly tighter padding for mobile */
        color: #ffffff;
        font-size: 0.9375rem;
        font-family: inherit;
        outline: none;
    }

    @media (min-width: 640px) {
        .dg-footer-input {
            padding: 0.75rem 1.25rem; /* Restores padding on larger screens */
        }
    }

    .dg-footer-input::placeholder {
        color: rgba(255, 255, 255, 0.3);
    }

    .dg-footer-submit {
        background: var(--color-primary);
        border: none;
        width: 2.75rem;
        height: 2.75rem;
        flex-shrink: 0; /* Prevents button from squishing on tiny screens */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000000;
        cursor: pointer;
        transition: all 0.3s var(--premium-ease);
    }

    .dg-footer-submit:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(47, 228, 59, 0.4);
    }

    .dg-footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        padding: 2rem 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        color: rgba(255, 255, 255, 0.4);
        font-size: 0.875rem;
        text-align: center; /* Centres text on mobile */
    }

    @media (min-width: 768px) {
        .dg-footer-bottom {
            flex-direction: row;
            text-align: left;
        }
    }

    .dg-footer-legal {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap; /* Allows wrap on very thin mobile screens */
        gap: 0.75rem;
    }

    .dg-footer-legal a {
        color: rgba(255, 255, 255, 0.4);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .dg-footer-legal a:hover {
        color: var(--color-primary);
    }

    .dg-separator {
        color: rgba(255, 255, 255, 0.2);
    }
</style>