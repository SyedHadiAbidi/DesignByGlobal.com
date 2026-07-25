<?php 
get_header(); 
?>

<style id="dg-search-styles">
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
        --premium-ease: cubic-bezier(0.16, 1, 0.3, 1);
    }

    body, .sr-wrapper {
        overflow-x: clip; /* Fixes sticky sidebar */
    }

    .sr-wrapper {
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
    .sr-wrapper::before {
        content: ""; position: absolute; inset: 0; z-index: 1; pointer-events: none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noise"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noise)"/%3E%3C/svg%3E');
        opacity: 0.04; mix-blend-mode: overlay;
    }
    
    .sr-orb {
        position: absolute; border-radius: 50%; pointer-events: none;
        animation: sr-float 25s infinite ease-in-out alternate;
    }
    .sr-orb-1 { width: 80vw; height: 80vw; background: radial-gradient(circle, rgba(47,228,59,0.06) 0%, transparent 60%); top: -20vw; left: -10vw; }
    .sr-orb-2 { width: 60vw; height: 60vw; background: radial-gradient(circle, rgba(47,228,59,0.04) 0%, transparent 60%); bottom: 10vw; right: -10vw; animation-delay: -5s; }
    
    @keyframes sr-float { 
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

    /* Layout Container for Main Content & Sidebar */
    .sr-layout-container { 
        width: 100%; max-width: 1280px; margin: 0 auto; padding: 8rem 1.25rem 6rem; position: relative; z-index: 10; 
    }
    @media (min-width: 768px) { .sr-layout-container { padding: 10rem 2rem 8rem; } }

    .sr-grid {
        display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: start;
    }
    @media (min-width: 1024px) {
        .sr-grid { grid-template-columns: 1fr 340px; gap: 4rem; }
    }

    .sr-main-col { min-width: 0; display: flex; flex-direction: column; gap: 2rem; }
    
    .sr-sidebar-col { 
        min-width: 0; 
        position: -webkit-sticky; 
        position: sticky; 
        top: 8rem; 
        align-self: start; 
    }

    /* ==========================================================================
       PAGE HEADER
       ========================================================================== */
    .sr-header { margin-bottom: 2rem; }
    .sr-eyebrow {
        display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
        color: var(--color-primary); padding: 0.5rem 1.25rem; border: 1px solid var(--color-border-green);
        border-radius: 999px; background: rgba(20, 20, 22, 0.8); backdrop-filter: blur(10px); margin-bottom: 1.5rem;
    }
    .sr-status-dot {
        width: 6px; height: 6px; background-color: var(--color-primary); border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }
    .sr-title { 
        font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 800; line-height: 1.15; margin-bottom: 1rem; letter-spacing: -0.02em; color: #fff;
    }
    .sr-title span { color: var(--color-primary); }

    /* ==========================================================================
       SEARCH RESULT CARDS
       ========================================================================== */
    .sr-card {
        background: linear-gradient(135deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.95) 100%);
        border: 1px solid rgba(255,255,255,0.05); border-radius: 1.25rem; padding: 2rem;
        backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
        display: flex; flex-direction: column; transition: all 0.4s var(--premium-ease);
        text-decoration: none;
        
        transform: translateZ(0); -webkit-transform: translateZ(0);
        backface-visibility: hidden; -webkit-backface-visibility: hidden;
        will-change: transform, box-shadow, border-color;
    }
    .sr-card:hover {
        transform: translateY(-5px) translateZ(0); border-color: var(--color-border-hover);
        box-shadow: 0 15px 35px rgba(0,0,0,0.6), inset 0 0 20px rgba(47,228,59,0.05);
    }
    
    .sr-card-meta {
        font-size: 0.75rem; color: var(--color-muted); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1rem; font-weight: 700;
        display: flex; gap: 1rem; align-items: center;
    }
    .sr-card-meta i { color: var(--color-primary); }
    
    .sr-card h2 { font-size: 1.5rem; font-weight: 800; color: #fff; margin-bottom: 1rem; transition: color 0.3s ease; }
    .sr-card:hover h2 { color: var(--color-primary); }
    
    .sr-card p { font-size: 1rem; color: var(--color-muted); line-height: 1.6; margin-bottom: 1.5rem; }
    
    .sr-card-btn {
        display: inline-flex; align-items: center; gap: 0.5rem; color: #fff; font-size: 0.85rem;
        font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; transition: color 0.3s ease; margin-top: auto;
    }
    .sr-card-btn i { color: var(--color-primary); transition: transform 0.3s ease; }
    .sr-card:hover .sr-card-btn { color: var(--color-primary); }
    .sr-card:hover .sr-card-btn i { transform: translateX(5px); }

    /* ==========================================================================
       NO RESULTS & PAGINATION
       ========================================================================== */
    .sr-no-results {
        background: rgba(255,255,255,0.02); border: 1px dashed rgba(255,255,255,0.1);
        border-radius: 1.5rem; padding: 4rem 2rem; text-align: center;
    }
    .sr-no-results i { font-size: 3rem; color: rgba(47,228,59,0.3); margin-bottom: 1.5rem; }
    .sr-no-results h2 { font-size: 1.5rem; color: #fff; margin-bottom: 1rem; font-weight: 700; }
    .sr-no-results p { color: var(--color-muted); font-size: 1rem; }

    .sr-pagination {
        display: flex; justify-content: space-between; align-items: center; margin-top: 2rem;
        padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.05);
    }
    .sr-pagination a {
        color: #fff; text-decoration: none; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;
        background: rgba(255,255,255,0.03); padding: 0.75rem 1.5rem; border-radius: 999px; border: 1px solid rgba(255,255,255,0.1);
        transition: all 0.3s ease;
    }
    .sr-pagination a:hover { background: rgba(47,228,59,0.1); border-color: var(--color-primary); color: var(--color-primary); }
</style>

<main class="sr-wrapper">
    <div class="sr-orb sr-orb-1"></div>
    <div class="sr-orb sr-orb-2"></div>

    <div class="sr-layout-container">
        <div class="sr-grid">
            
            <!-- Left Column: Search Results -->
            <div class="sr-main-col">
                
                <header class="sr-header animate-fade" style="animation-delay: 0.1s;">
                    <div class="sr-eyebrow">
                        <div class="sr-status-dot"></div> System Query
                    </div>
                    <h2 class="sr-title">
                        Results for: <span>"<?php echo get_search_query(); ?>"</span>
                    </h2>
                </header>

                <?php if ( have_posts() ) : ?>
                    
                    <?php 
                    $delay = 0.2;
                    while ( have_posts() ) : the_post(); 
                    ?>
                        <a href="<?php the_permalink(); ?>" class="sr-card animate-fade" style="animation-delay: <?php echo $delay; ?>s;">
                            <div class="sr-card-meta">
                                <span><i class="fa-solid fa-calendar-day"></i> <?php echo get_the_date(); ?></span>
                                <span><i class="fa-solid fa-folder"></i> 
                                    <?php 
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        echo esc_html( $categories[0]->name );
                                    } else {
                                        echo 'Article';
                                    }
                                    ?>
                                </span>
                            </div>
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?></p>
                            <div class="sr-card-btn">Read Article <i class="fa-solid fa-arrow-right"></i></div>
                        </a>
                    <?php 
                    $delay += 0.1;
                    endwhile; 
                    ?>

                    <!-- Pagination -->
                    <div class="sr-pagination animate-fade" style="animation-delay: <?php echo $delay; ?>s;">
                        <div><?php previous_posts_link( '<i class="fa-solid fa-arrow-left"></i> Previous' ); ?></div>
                        <div><?php next_posts_link( 'Next <i class="fa-solid fa-arrow-right"></i>' ); ?></div>
                    </div>

                <?php else : ?>
                    
                    <div class="sr-no-results animate-fade" style="animation-delay: 0.2s;">
                        <i class="fa-solid fa-magnifying-glass-minus"></i>
                        <h2>No Data Found</h2>
                        <p>We couldn't find any articles matching your query. Please try adjusting your search terms or browse our topics in the sidebar.</p>
                    </div>

                <?php endif; ?>

            </div>

            <!-- Right Column: Sticky Sidebar -->
            <aside class="sr-sidebar-col animate-fade" style="animation-delay: 0.2s;">
                <?php get_sidebar(); ?>
            </aside>

        </div>
    </div>
</main>

<?php get_footer(); ?>