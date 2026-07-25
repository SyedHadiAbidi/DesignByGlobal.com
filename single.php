<?php 
get_header(); 
?>

<style id="dg-single-styles">
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

    body {
        overflow-x: hidden; /* Apply this globally to stop horizontal scrolling */
    }

    .sg-wrapper {
        position: relative;
        background-color: var(--color-bg);
        color: var(--color-text);
        /* overflow-x: hidden; <-- REMOVE THIS LINE */
        width: 100%;
        min-height: 100vh;
        background-image: 
            linear-gradient(rgba(47, 228, 59, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(47, 228, 59, 0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        background-position: center center;
    }

    /* Ambient Background Grain */
    .sg-wrapper::before {
        content: ""; position: absolute; inset: 0; z-index: 1; pointer-events: none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noise"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noise)"/%3E%3C/svg%3E');
        opacity: 0.04; mix-blend-mode: overlay;
    }
    
    .sg-orb {
        position: absolute; border-radius: 50%; pointer-events: none;
        animation: sg-float 25s infinite ease-in-out alternate;
    }
    .sg-orb-1 { width: 80vw; height: 80vw; background: radial-gradient(circle, rgba(47,228,59,0.06) 0%, transparent 60%); top: -20vw; left: -10vw; }
    .sg-orb-2 { width: 60vw; height: 60vw; background: radial-gradient(circle, rgba(47,228,59,0.04) 0%, transparent 60%); bottom: 10vw; right: -10vw; animation-delay: -5s; }
    
    @keyframes sg-float { 
        0% { transform: translateY(0); } 
        100% { transform: translateY(-30px); } 
    }
    @keyframes fade-in-up {
        from { opacity: 0; transform: translate3d(0, 30px, 0); filter: blur(4px); }
        to   { opacity: 1; transform: translate3d(0, 0, 0);   filter: blur(0); }
    }

    .animate-fade { opacity: 0; animation: fade-in-up 1s var(--premium-ease) forwards; }

    /* Layout Container for Main Content & Sidebar */
    .sg-layout-container { 
        width: 100%; max-width: 1280px; margin: 0 auto; padding: 8rem 1.25rem 6rem; position: relative; z-index: 10; 
    }
    @media (min-width: 768px) { .sg-layout-container { padding: 12rem 2rem 8rem; } }

    .sg-grid {
        display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: start;
    }
    @media (min-width: 1024px) {
        .sg-grid { grid-template-columns: 1fr 340px; gap: 4rem; }
    }

    .sg-main-col { min-width: 0; }
  body, .sg-wrapper {
        /* 'clip' hides horizontal overflow perfectly but DOES NOT break sticky elements! */
        overflow-x: clip; 
    }

    .sg-sidebar-col { 
        min-width: 0; 
        
        /* Safari Support */
        position: -webkit-sticky; 
        
        /* Standard Sticky */
        position: sticky; 
        top: 8rem; 
        
        /* This is the magic line. It stops the sidebar from stretching to the full height of the grid */
        align-self: start; 
    }

    /* ==========================================================================
       POST HEADER
       ========================================================================== */
    .sg-category-tag {
        display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;
        color: var(--color-primary); padding: 0.5rem 1.25rem; border: 1px solid var(--color-border-green);
        border-radius: 999px; background: rgba(47, 228, 59, 0.05); backdrop-filter: blur(10px); margin-bottom: 1.5rem;
        text-decoration: none; transition: all 0.3s ease;
    }
    .sg-category-tag:hover { background: rgba(47, 228, 59, 0.15); box-shadow: 0 0 15px rgba(47, 228, 59, 0.2); }
    
    .sg-post-title { 
        font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 800; line-height: 1.15; margin-bottom: 1.5rem; letter-spacing: -0.02em; color: #fff;
    }
    
    .sg-post-meta {
        display: flex; align-items: center; flex-wrap: wrap; gap: 1.5rem; color: var(--color-muted); font-size: 0.85rem; font-weight: 500; margin-bottom: 3rem;
    }
    .sg-meta-item { display: flex; align-items: center; gap: 0.5rem; }
    .sg-meta-item i { color: var(--color-primary); }

    /* ==========================================================================
       FEATURED IMAGE
       ========================================================================== */
    .sg-featured-image {
        width: 100%; border-radius: 1.5rem; overflow: hidden; margin-bottom: 4rem;
        border: 1px solid rgba(255,255,255,0.05); box-shadow: 0 30px 60px rgba(0,0,0,0.6);
        position: relative;
    }
    .sg-featured-image img {
        width: 100%; height: auto; display: block; object-fit: cover; max-height: 500px;
    }

    /* ==========================================================================
       POST CONTENT STYLING
       ========================================================================== */
    /* ==========================================================================
       POST CONTENT STYLING
       ========================================================================== */
    .sg-content {
        font-size: 1.1rem; line-height: 1.8; color: #d4d4d8;
    }
    
    /* Upgraded H2 and H3 tags using your primary colour */
    .sg-content h2 {
        font-size: 1.8rem; font-weight: 800; color: var(--color-primary); margin: 3.5rem 0 1.5rem; letter-spacing: -0.02em;
    }
    
    .sg-content h3 {
        font-size: 1.5rem; font-weight: 800; color: var(--color-primary); margin: 2.5rem 0 1.25rem; letter-spacing: -0.01em;
    }
    
    .sg-content p { margin-bottom: 1.75rem; }
    
    .sg-content a {
        color: var(--color-primary); text-decoration: none; border-bottom: 1px solid rgba(47, 228, 59, 0.3);
        transition: all 0.3s ease; font-weight: 600;
    }
    .sg-content a:hover { border-bottom-color: var(--color-primary); background: rgba(47, 228, 59, 0.1); }
    
    .sg-content ul, .sg-content ol { margin: 0 0 2rem 1.5rem; padding: 0; }
    .sg-content li { margin-bottom: 0.75rem; padding-left: 0.5rem; }
    
    .sg-content blockquote {
        background: linear-gradient(90deg, rgba(47,228,59,0.05) 0%, transparent 100%);
        border-left: 4px solid var(--color-primary); padding: 2rem; margin: 3rem 0;
        border-radius: 0 1rem 1rem 0; font-size: 1.2rem; font-style: italic; color: #fff;
    }
    .sg-content blockquote p:last-child { margin-bottom: 0; }

    .sg-content img {
        max-width: 100%; height: auto; border-radius: 1rem; margin: 2.5rem 0;
        border: 1px solid rgba(255,255,255,0.05);
    }

    /* ==========================================================================
       POST NAVIGATION & CTA
       ========================================================================== */
    .sg-navigation {
        display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-top: 5rem;
        padding-top: 3rem; border-top: 1px solid rgba(255,255,255,0.05);
    }
    @media (min-width: 640px) { .sg-navigation { grid-template-columns: 1fr 1fr; } }
    
    .sg-nav-link {
        background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05);
        border-radius: 1rem; padding: 1.5rem; text-decoration: none; transition: all 0.3s ease;
        display: flex; flex-direction: column; justify-content: center;
    }
    .sg-nav-link:hover { background: rgba(47,228,59,0.05); border-color: var(--color-border-green); transform: translateY(-3px); }
    .sg-nav-label { font-size: 0.75rem; color: var(--color-muted); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem; font-weight: 700; }
    .sg-nav-title { font-size: 1rem; color: #fff; font-weight: 700; line-height: 1.4; }
    .sg-nav-link:hover .sg-nav-title { color: var(--color-primary); }

    .sg-cta {
        text-align: center; margin-top: 5rem; padding: 3rem 2rem;
        background: linear-gradient(180deg, rgba(47,228,59,0.05) 0%, transparent 100%);
        border-radius: 1.5rem; border: 1px dashed rgba(47,228,59,0.2);
    }
    .sg-cta h2 { font-size: 1.75rem; font-weight: 800; color: #fff; margin-bottom: 1rem; }
    .sg-cta p { color: var(--color-muted); margin-bottom: 2rem; font-size: 1rem; }
    .sg-btn {
        display: inline-flex; align-items: center; justify-content: center; height: 3.5rem; padding: 0 2.5rem;
        background: linear-gradient(135deg, #44f050 0%, #2fe43b 100%); color: #000; font-weight: 800;
        text-transform: uppercase; letter-spacing: 0.1em; border-radius: 999px; text-decoration: none;
        transition: all 0.3s var(--premium-ease); font-size: 0.85rem;
    }
    .sg-btn:hover { transform: translateY(-4px); box-shadow: 0 15px 35px rgba(47,228,59,0.4); }
</style>

<main class="sg-wrapper">
    <div class="sg-orb sg-orb-1"></div>
    <div class="sg-orb sg-orb-2"></div>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <div class="sg-layout-container">
        <div class="sg-grid">
            
            <!-- Left Column: Main Content -->
            <div class="sg-main-col">
                <header class="animate-fade" style="animation-delay: 0.1s;">
                    <?php 
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="sg-category-tag">' . esc_html( $categories[0]->name ) . '</a>';
                    }
                    ?>
                    
                    <h2 class="sg-post-title"><?php the_title(); ?></h2>
                    
                    <div class="sg-post-meta">
                        <div class="sg-meta-item">
                            <i class="fa-solid fa-calendar-day"></i> Published on <?php echo get_the_date('F j, Y'); ?>
                        </div>
                        <div class="sg-meta-item">
                            <i class="fa-solid fa-user-astronaut"></i> Written by <?php the_author(); ?>
                        </div>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="sg-featured-image animate-fade" style="animation-delay: 0.2s;">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <article class="sg-content animate-fade" style="animation-delay: 0.3s;">
                    <?php the_content(); ?>
                </article>

                <div class="sg-navigation animate-fade" style="animation-delay: 0.4s;">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    
                    <?php if ( ! empty( $prev_post ) ): ?>
                        <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="sg-nav-link" style="text-align: left;">
                            <span class="sg-nav-label"><i class="fa-solid fa-arrow-left"></i> Previous Article</span>
                            <span class="sg-nav-title"><?php echo get_the_title( $prev_post->ID ); ?></span>
                        </a>
                    <?php else: ?>
                        <div></div> 
                    <?php endif; ?>

                    <?php if ( ! empty( $next_post ) ): ?>
                        <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="sg-nav-link" style="text-align: right;">
                            <span class="sg-nav-label">Next Article <i class="fa-solid fa-arrow-right"></i></span>
                            <span class="sg-nav-title"><?php echo get_the_title( $next_post->ID ); ?></span>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="sg-cta animate-fade" style="animation-delay: 0.5s;">
                    <h2>Ready to execute your vision?</h2>
                    <p>Connect with elite talent and optimise your digital capabilities today.</p>
                    <a href="<?php echo site_url('/hire-talent'); ?>" class="sg-btn">Hire Talent Now</a>
                </div>
            </div>

            <!-- Right Column: Sidebar -->
            <aside class="sg-sidebar-col animate-fade" style="animation-delay: 0.2s;">
                <?php get_sidebar(); ?>
            </aside>

        </div>
    </div>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>