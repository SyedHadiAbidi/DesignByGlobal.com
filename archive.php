<?php 
get_header(); 
?>

<style id="dg-archive-styles">
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

    body, .ar-wrapper {
        overflow-x: clip; /* Ensures sticky sidebar functions perfectly */
    }

    .ar-wrapper {
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
    .ar-wrapper::before {
        content: ""; position: absolute; inset: 0; z-index: 1; pointer-events: none;
        background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noise"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noise)"/%3E%3C/svg%3E');
        opacity: 0.04; mix-blend-mode: overlay;
    }
    
    .ar-orb {
        position: absolute; border-radius: 50%; pointer-events: none;
        animation: ar-float 25s infinite ease-in-out alternate;
    }
    .ar-orb-1 { width: 80vw; height: 80vw; background: radial-gradient(circle, rgba(47,228,59,0.06) 0%, transparent 60%); top: -20vw; left: -10vw; }
    .ar-orb-2 { width: 60vw; height: 60vw; background: radial-gradient(circle, rgba(47,228,59,0.04) 0%, transparent 60%); bottom: 10vw; right: -10vw; animation-delay: -5s; }
    
    @keyframes ar-float { 
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
    .ar-layout-container { 
        width: 100%; max-width: 1280px; margin: 0 auto; padding: 8rem 1.25rem 6rem; position: relative; z-index: 10; 
    }
    @media (min-width: 768px) { .ar-layout-container { padding: 10rem 2rem 8rem; } }

    .ar-grid {
        display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: start;
    }
    @media (min-width: 1024px) {
        .ar-grid { grid-template-columns: 1fr 340px; gap: 4rem; }
    }

    .ar-main-col { min-width: 0; display: flex; flex-direction: column; gap: 2.5rem; }
    
    .ar-sidebar-col { 
        min-width: 0; 
        position: -webkit-sticky; 
        position: sticky; 
        top: 8rem; 
        align-self: start; 
    }

    /* ==========================================================================
       ARCHIVE HEADER
       ========================================================================== */
    .ar-header { margin-bottom: 1.5rem; }
    .ar-eyebrow {
        display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
        color: var(--color-primary); padding: 0.5rem 1.25rem; border: 1px solid var(--color-border-green);
        border-radius: 999px; background: rgba(20, 20, 22, 0.8); backdrop-filter: blur(10px); margin-bottom: 1.5rem;
    }
    .ar-status-dot {
        width: 6px; height: 6px; background-color: var(--color-primary); border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }
    .ar-title { 
        font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 800; line-height: 1.15; margin-bottom: 1rem; letter-spacing: -0.02em; color: #fff;
    }
    .ar-title span { color: var(--color-primary); }
    .ar-desc { color: var(--color-muted); font-size: 1.1rem; line-height: 1.6; max-width: 800px; }

    /* ==========================================================================
       ARCHIVE CARDS
       ========================================================================== */
    .ar-card {
        background: linear-gradient(135deg, rgba(20,20,22,0.9) 0%, rgba(10,10,12,0.95) 100%);
        border: 1px solid rgba(255,255,255,0.05); border-radius: 1.25rem; overflow: hidden;
        backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
        display: flex; flex-direction: column; transition: all 0.4s var(--premium-ease);
        text-decoration: none;
        
        transform: translateZ(0); -webkit-transform: translateZ(0);
        backface-visibility: hidden; -webkit-backface-visibility: hidden;
        will-change: transform, box-shadow, border-color;
    }
    @media (min-width: 640px) {
        .ar-card { flex-direction: row; align-items: center; }
    }
    
    .ar-card:hover {
        transform: translateY(-5px) translateZ(0); border-color: var(--color-border-hover);
        box-shadow: 0 15px 35px rgba(0,0,0,0.6), inset 0 0 20px rgba(47,228,59,0.05);
    }

    .ar-card-img {
        width: 100%; height: 200px; overflow: hidden; background: #0a0a0a; flex-shrink: 0;
    }
    @media (min-width: 640px) {
        .ar-card-img { width: 280px; height: 100%; align-self: stretch; }
    }
    .ar-card-img img {
        width: 100%; height: 100%; object-fit: cover; opacity: 0.85; transition: transform 0.6s var(--premium-ease);
    }
    .ar-card:hover .ar-card-img img { transform: scale(1.05); opacity: 1; }
    
    .ar-card-content {
        padding: 2rem; display: flex; flex-direction: column; justify-content: center;
    }
    
    .ar-card-meta {
        font-size: 0.75rem; color: var(--color-muted); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1rem; font-weight: 700;
        display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;
    }
    .ar-card-meta i { color: var(--color-primary); }
    
    .ar-card h2 { font-size: 1.5rem; font-weight: 800; color: #fff; margin-bottom: 1rem; transition: color 0.3s ease; }
    .ar-card:hover h2 { color: var(--color-primary); }
    
    .ar-card p { font-size: 1rem; color: var(--color-muted); line-height: 1.6; margin-bottom: 1.5rem; }
    
    .ar-card-btn {
        display: inline-flex; align-items: center; gap: 0.5rem; color: #fff; font-size: 0.85rem;
        font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; transition: color 0.3s ease;
    }
    .ar-card-btn i { color: var(--color-primary); transition: transform 0.3s ease; }
    .ar-card:hover .ar-card-btn { color: var(--color-primary); }
    .ar-card:hover .ar-card-btn i { transform: translateX(5px); }

    /* ==========================================================================
       PAGINATION
       ========================================================================== */
    .ar-pagination {
        display: flex; justify-content: space-between; align-items: center; margin-top: 3rem;
    }
    .ar-pagination a {
        color: #fff; text-decoration: none; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;
        background: rgba(255,255,255,0.03); padding: 0.75rem 1.5rem; border-radius: 999px; border: 1px solid rgba(255,255,255,0.1);
        transition: all 0.3s ease;
    }
    .ar-pagination a:hover { background: rgba(47,228,59,0.1); border-color: var(--color-primary); color: var(--color-primary); }
</style>

<main class="ar-wrapper">
    <div class="ar-orb ar-orb-1"></div>
    <div class="ar-orb ar-orb-2"></div>

    <div class="ar-layout-container">
        <div class="ar-grid">
            
            <div class="ar-main-col">
                
                <header class="ar-header animate-fade" style="animation-delay: 0.1s;">
                    <div class="ar-eyebrow">
                        <div class="ar-status-dot"></div> Directory
                    </div>
                    <h2 class="ar-title">
                        <?php 
                        if ( is_category() ) {
                            single_cat_title( 'Topic: <span>', true ); echo '</span>';
                        } elseif ( is_tag() ) {
                            single_tag_title( 'Tag: <span>', true ); echo '</span>';
                        } elseif ( is_author() ) {
                            the_post();
                            echo 'Author: <span>' . get_the_author() . '</span>';
                            rewind_posts();
                        } elseif ( is_day() ) {
                            echo 'Daily Archive: <span>' . get_the_date() . '</span>';
                        } elseif ( is_month() ) {
                            echo 'Monthly Archive: <span>' . get_the_date( 'F Y' ) . '</span>';
                        } elseif ( is_year() ) {
                            echo 'Yearly Archive: <span>' . get_the_date( 'Y' ) . '</span>';
                        } else {
                            echo 'Archives';
                        }
                        ?>
                    </h2>
                    <?php if ( get_the_archive_description() ) : ?>
                        <div class="ar-desc">
                            <?php echo wp_strip_all_tags( get_the_archive_description() ); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <?php if ( have_posts() ) : ?>
                    
                    <?php 
                    $delay = 0.2;
                    while ( have_posts() ) : the_post(); 
                    ?>
                        <a href="<?php the_permalink(); ?>" class="ar-card animate-fade" style="animation-delay: <?php echo $delay; ?>s;">
                            
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ar-card-img">
                                    <?php the_post_thumbnail('medium_large'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="ar-card-content">
                                <div class="ar-card-meta">
                                    <span><i class="fa-solid fa-calendar-day"></i> <?php echo get_the_date(); ?></span>
                                    <span><i class="fa-solid fa-user"></i> <?php the_author(); ?></span>
                                </div>
                                <h2><?php the_title(); ?></h2>
                                <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                                <div class="ar-card-btn">Read Article <i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                        </a>
                    <?php 
                    $delay += 0.1;
                    endwhile; 
                    ?>

                    <div class="ar-pagination animate-fade" style="animation-delay: <?php echo $delay; ?>s;">
                        <div><?php previous_posts_link( '<i class="fa-solid fa-arrow-left"></i> Previous' ); ?></div>
                        <div><?php next_posts_link( 'Next <i class="fa-solid fa-arrow-right"></i>' ); ?></div>
                    </div>

                <?php else : ?>
                    
                    <div class="ar-card animate-fade" style="animation-delay: 0.2s; padding: 4rem 2rem; text-align: center; display: block;">
                        <i class="fa-solid fa-folder-open" style="font-size: 3rem; color: rgba(47,228,59,0.3); margin-bottom: 1.5rem; display: block;"></i>
                        <h2>No Data Found</h2>
                        <p style="margin-bottom: 0;">We could not locate any items categorised under this section. Please browse our other topics in the sidebar.</p>
                    </div>

                <?php endif; ?>

            </div>

            <aside class="ar-sidebar-col animate-fade" style="animation-delay: 0.2s;">
                <?php get_sidebar(); ?>
            </aside>

        </div>
    </div>
</main>

<?php get_footer(); ?>