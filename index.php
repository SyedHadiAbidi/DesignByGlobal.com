<?php 
get_header(); 
?>

<style id="dg-blog-index-styles">
    /* ==========================================================================
       VARIABLES & BASE STYLES
       ========================================================================== */
    :root {
        --color-primary: #2fe43b;
        --color-primary-rgb: 47, 228, 59;
        --color-primary-glow: rgba(47, 228, 59, 0.4);
        --color-bg: #030303;
        --color-box-bg: #141414;
        --color-text: #ffffff;
        --color-muted: #a1a1aa;
        --color-border-green: rgba(47, 228, 59, 0.4);
        --color-border-hover: rgba(47, 228, 59, 0.8);
        --premium-ease: cubic-bezier(0.16, 1, 0.3, 1);

        /* Interactive Mesh Variables */
        --mesh-gap: 2px;
        --triangle-base: 60px;
        --triangle-base-height: calc(1.733 * var(--triangle-base));
        --triangle-width: calc(var(--triangle-base) - var(--mesh-gap));
        --triangle-height: calc(var(--triangle-base-height) - var(--mesh-gap));
    }

    html, body {
        overflow-x: hidden !important; 
    }

    .blog-wrapper {
        position: relative;
        color: var(--color-text);
        width: 100%;
        min-height: 100vh;
        z-index: 0;
    }

    /* ==========================================================================
       GLOBAL INTERACTIVE MESH BACKGROUND
       ========================================================================== */
    .dg-fixed-mesh-bg {
        position: fixed;
        inset: 0;
        width: 100vw;
        height: 100vh;
        z-index: -1;
        pointer-events: none;
        overflow: hidden;
        background-color: var(--color-bg);
    }

    /* Faint permanent visibility so the grid is always slightly visible */
    .dg-mesh-ambient {
        position: absolute;
        inset: 0;
        background: rgba(47, 228, 59, 0.02); 
        z-index: 1;
    }

    #dg-global-glow {
        position: absolute;
        width: 60vw;
        height: 60vw;
        max-width: 900px;
        max-height: 900px;
        background: radial-gradient(circle closest-side, var(--color-primary-glow) 0%, transparent 100%);
        transform: translate(-50%, -50%);
        pointer-events: none;
        will-change: left, top;
        z-index: 2;
        opacity: 0.8;
        animation: glow-pulse 4s ease-in-out infinite alternate;
    }

    .dg-triangle-container {
        position: absolute;
        inset: 0;
        display: grid;
        grid-template-columns: repeat(var(--columns), calc(var(--triangle-base) * 2 + var(--mesh-gap)));
        width: 100%;
        height: 100%;
        z-index: 3;
        pointer-events: none;
    }

    .dg-triangle-set {
        display: inline-block;
        position: relative;
        width: calc(var(--triangle-base) * 2 + var(--mesh-gap));
        height: var(--triangle-base-height);
    }
    
    .dg-triangle-set--offset {
        transform: translateX(calc(-1 * var(--triangle-base) - 0.5 * var(--mesh-gap)));
    }
    
    .dg-triangle-set::before, 
    .dg-triangle-set::after {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        top: var(--mesh-gap);
        border-right: var(--triangle-width) solid transparent; 
        border-left: var(--triangle-width) solid transparent;
    }
    
    .dg-triangle-set::before {
        left: calc(-1 * var(--triangle-base));
        border-bottom: var(--triangle-height) solid var(--color-bg);
    }
    
    .dg-triangle-set::after {
        right: calc(var(--mesh-gap) * 2.5);
        border-top: var(--triangle-height) solid var(--color-bg);
    }

    @keyframes glow-pulse {
        0% { transform: translate(-50%, -50%) scale(0.95); opacity: 0.6; }
        100% { transform: translate(-50%, -50%) scale(1.05); opacity: 0.9; }
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

    /* ==========================================================================
       LAYOUT & MOBILE UX TWEAKS
       ========================================================================== */
    .blog-layout-container { 
        width: 100%; 
        max-width: 1280px; 
        margin: 0 auto; 
        padding: 8.5rem 1.25rem 6rem; /* Pushed down heavily for mobile header clearance */
        position: relative; 
        z-index: 10; 
    }
    @media (min-width: 768px) { .blog-layout-container { padding: 10rem 2rem 8rem; } }

    .blog-grid {
        display: grid; grid-template-columns: 1fr; gap: 2rem; align-items: start;
    }
    @media (min-width: 1024px) {
        .blog-grid { grid-template-columns: 1fr 340px; gap: 4rem; }
    }

    .blog-main-col { min-width: 0; display: flex; flex-direction: column; gap: 2rem; }
    @media (min-width: 768px) { .blog-main-col { gap: 2.5rem; } }
    
    .blog-sidebar-col { 
        min-width: 0; 
        position: -webkit-sticky !important; 
        position: sticky !important; 
        top: 8rem !important; 
        align-self: start !important; 
        height: max-content !important;
        z-index: 99 !important;
    }

    /* ==========================================================================
       BLOG HEADER
       ========================================================================== */
    .blog-header { margin-bottom: 0.5rem; }
    .blog-eyebrow {
        display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
        color: var(--color-primary); padding: 0.5rem 1.25rem; border: 1px solid var(--color-border-green);
        border-radius: 999px; background: rgba(20, 20, 22, 0.8); backdrop-filter: blur(10px); margin-bottom: 1.5rem;
    }
    .blog-status-dot {
        width: 6px; height: 6px; background-color: var(--color-primary); border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }
    .blog-title { 
        font-size: clamp(2rem, 6vw, 3.5rem); font-weight: 800; line-height: 1.15; margin-bottom: 1rem; letter-spacing: -0.02em; color: #fff;
    }
    .blog-title span { color: var(--color-primary); }
    .blog-desc { color: var(--color-muted); font-size: clamp(0.95rem, 3vw, 1.1rem); line-height: 1.6; max-width: 800px; }

    /* ==========================================================================
       BLOG CARDS (Upgraded Mobile UX)
       ========================================================================== */
    .blog-card {
        background-color: var(--color-box-bg);
        border: 1px solid rgba(255,255,255,0.05); 
        border-radius: 1.25rem; 
        overflow: hidden;
        backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
        display: flex; flex-direction: column; transition: all 0.4s var(--premium-ease);
        text-decoration: none; 
        padding: 1.5rem; /* Tighter padding for mobile */
        
        transform: translateZ(0); -webkit-transform: translateZ(0);
        backface-visibility: hidden; -webkit-backface-visibility: hidden;
        will-change: transform, box-shadow, border-color;
    }
    @media (min-width: 768px) {
        .blog-card { padding: 2.5rem; }
    }
    
    .blog-card:hover {
        transform: translateY(-5px) translateZ(0); border-color: var(--color-border-hover);
        box-shadow: 0 15px 35px rgba(0,0,0,0.6), inset 0 0 20px rgba(47,228,59,0.05);
    }
    
    .blog-card-meta {
        font-size: 0.7rem; color: var(--color-muted); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1rem; font-weight: 700;
        display: flex; gap: 0.5rem 1rem; align-items: flex-start; flex-wrap: wrap; flex-direction: column;
    }
    @media (min-width: 640px) {
        .blog-card-meta { flex-direction: row; align-items: center; font-size: 0.75rem; margin-bottom: 1.25rem; }
    }
    .blog-card-meta i { color: var(--color-primary); width: 14px; text-align: center; }
    
    .blog-card h2 { 
        /* Fluid typography to prevent breaking words on small phones */
        font-size: clamp(1.3rem, 5vw, 1.75rem); 
        font-weight: 800; color: #fff; margin-bottom: 0.75rem; transition: color 0.3s ease; line-height: 1.3; 
    }
    @media (min-width: 768px) {
        .blog-card h2 { margin-bottom: 1rem; line-height: 1.4; }
    }
    .blog-card:hover h2 { color: var(--color-primary); }
    
    .blog-card p { 
        font-size: 0.95rem; color: var(--color-muted); line-height: 1.6; margin-bottom: 1.5rem; 
    }
    @media (min-width: 768px) {
        .blog-card p { font-size: 1.05rem; line-height: 1.7; margin-bottom: 2rem; }
    }
    
    .blog-card-btn {
        display: inline-flex; align-items: center; gap: 0.5rem; color: #fff; font-size: 0.8rem;
        font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; transition: color 0.3s ease;
        margin-top: auto;
    }
    @media (min-width: 768px) {
        .blog-card-btn { font-size: 0.85rem; }
    }
    .blog-card-btn i { color: var(--color-primary); transition: transform 0.3s ease; }
    .blog-card:hover .blog-card-btn { color: var(--color-primary); }
    .blog-card:hover .blog-card-btn i { transform: translateX(5px); }

    /* ==========================================================================
       PAGINATION
       ========================================================================== */
    .blog-pagination {
        display: flex; justify-content: space-between; align-items: center; margin-top: 2rem;
    }
    @media (min-width: 768px) {
        .blog-pagination { margin-top: 3rem; }
    }
    .blog-pagination a {
        color: #fff; text-decoration: none; font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em;
        background: rgba(255,255,255,0.03); padding: 0.75rem 1.25rem; border-radius: 999px; border: 1px solid rgba(255,255,255,0.1);
        transition: all 0.3s ease;
    }
    @media (min-width: 768px) {
        .blog-pagination a { font-size: 0.85rem; padding: 0.75rem 1.5rem; }
    }
    .blog-pagination a:hover { background: rgba(47,228,59,0.1); border-color: var(--color-primary); color: var(--color-primary); }
</style>

<main class="blog-wrapper">
    
    <!-- Global Fixed Interactive Mesh Background -->
    <div class="dg-fixed-mesh-bg">
        <div class="dg-mesh-ambient"></div>
        <div id="dg-global-glow"></div>
        <div class="dg-triangle-container" id="dg-triangle-grid"></div>
    </div>

    <div class="blog-layout-container">
        <div class="blog-grid">
            
            <div class="blog-main-col">
                
                <header class="blog-header animate-fade" style="animation-delay: 0.1s;">
                    <div class="blog-eyebrow">
                        <div class="blog-status-dot"></div> Digital Insights
                    </div>
                    <h2 class="blog-title">
                        Our <span>Journal</span>
                    </h2>
                    <div class="blog-desc">
                        Explore the latest insights on engineering, design, marketing, and product development from our elite talent network.
                    </div>
                </header>

                <?php if ( have_posts() ) : ?>
                    
                    <?php 
                    $delay = 0.2;
                    while ( have_posts() ) : the_post(); 
                    ?>
                        <a href="<?php the_permalink(); ?>" class="blog-card animate-fade" style="animation-delay: <?php echo $delay; ?>s;">
                            <div class="blog-card-meta">
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
                            <div class="blog-card-btn">Read Article <i class="fa-solid fa-arrow-right"></i></div>
                        </a>
                    <?php 
                    $delay += 0.1;
                    endwhile; 
                    ?>

                    <div class="blog-pagination animate-fade" style="animation-delay: <?php echo $delay; ?>s;">
                        <div><?php previous_posts_link( '<i class="fa-solid fa-arrow-left"></i> Newer' ); ?></div>
                        <div><?php next_posts_link( 'Older <i class="fa-solid fa-arrow-right"></i>' ); ?></div>
                    </div>

                <?php else : ?>
                    
                    <div class="blog-card animate-fade" style="animation-delay: 0.2s; text-align: center;">
                        <i class="fa-solid fa-pen-nib" style="font-size: 3rem; color: rgba(47,228,59,0.3); margin-bottom: 1.5rem; display: block;"></i>
                        <h2>No Publications Yet</h2>
                        <p style="margin-bottom: 0;">We haven't published any articles yet. Check back soon for expert updates and insights.</p>
                    </div>

                <?php endif; ?>

            </div>

            <aside class="blog-sidebar-col animate-fade" style="animation-delay: 0.2s;">
                <?php get_sidebar(); ?>
            </aside>

        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // --- Interactive Mesh Engine ---
        const triangleBase = 60;
        const gridContainer = document.getElementById("dg-triangle-grid");
        const glow = document.getElementById("dg-global-glow");

        const instantiateGrid = () => {
            if(!gridContainer) return;
            gridContainer.innerHTML = '';
            
            const width = window.innerWidth;
            const height = window.innerHeight;

            let columns = Math.ceil(width / (triangleBase * 2)) + 2;
            let rows = Math.ceil(height / (triangleBase * 1.733)) + 2;
            gridContainer.style.setProperty('--columns', columns);

            const fragment = document.createDocumentFragment();

            for (let y = 0; y < rows; y++) {
                for (let x = 0; x < columns; x++) {
                    let el = document.createElement("div");
                    el.classList.add("dg-triangle-set");
                    if (y % 2 === 0) el.classList.add("dg-triangle-set--offset");
                    fragment.appendChild(el);
                }
            }
            gridContainer.appendChild(fragment);
        };

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(instantiateGrid, 200);
        });

        instantiateGrid();

        let isTickingMesh = false;
        document.addEventListener('mousemove', (event) => {
            if (!isTickingMesh) {
                window.requestAnimationFrame(() => {
                    if(glow) {
                        glow.style.left = `${event.clientX}px`;
                        glow.style.top = `${event.clientY}px`;
                    }
                    isTickingMesh = false;
                });
                isTickingMesh = true;
            }
        });
        
        if(glow) {
            glow.style.left = '50%';
            glow.style.top = '50%';
        }
        
        // --- Fallback Sidebar Overflow Fix ---
        var sidebar = document.querySelector('.blog-sidebar-col');
        if (sidebar) {
            var parent = sidebar.parentElement;
            while (parent && parent.tagName !== 'HTML') {
                var style = window.getComputedStyle(parent);
                if (style.overflow === 'hidden' || style.overflowX === 'hidden' || style.overflowY === 'hidden') {
                    parent.style.setProperty('overflow', 'visible', 'important');
                    parent.style.setProperty('overflow-x', 'visible', 'important');
                    parent.style.setProperty('overflow-y', 'visible', 'important');
                }
                parent = parent.parentElement;
            }
        }
    });
</script>

<?php get_footer(); ?>