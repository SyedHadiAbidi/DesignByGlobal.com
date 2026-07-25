<style id="dg-sidebar-styles">
    /* ==========================================================================
       SIDEBAR STYLES
       ========================================================================== */
    .dg-sidebar {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .dg-widget {
        background: linear-gradient(135deg, rgba(20,20,22,0.8) 0%, rgba(10,10,12,0.9) 100%);
        border: 1px solid rgba(255,255,255,0.05);
        border-radius: 1.25rem;
        padding: 2rem 1.5rem;
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }

    .dg-widget h2 {
        font-size: 1.1rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 1.25rem;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        border-bottom: 1px solid rgba(47, 228, 59, 0.2);
        padding-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .dg-widget h2 i {
        color: var(--color-primary);
    }

    /* Search Form */
    .dg-search-form {
        display: flex;
        position: relative;
    }
    .dg-search-input {
        width: 100%;
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 999px;
        padding: 0.75rem 3rem 0.75rem 1.25rem;
        color: #fff;
        font-family: inherit;
        font-size: 0.85rem;
        outline: none;
        transition: all 0.3s ease;
    }
    .dg-search-input:focus {
        border-color: var(--color-primary);
        background: rgba(47, 228, 59, 0.05);
        box-shadow: 0 0 10px rgba(47, 228, 59, 0.1);
    }
    .dg-search-submit {
        position: absolute;
        right: 0.25rem;
        top: 0.25rem;
        bottom: 0.25rem;
        width: 2.5rem;
        background: transparent;
        border: none;
        color: var(--color-muted);
        cursor: pointer;
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .dg-search-input:focus + .dg-search-submit,
    .dg-search-submit:hover {
        color: var(--color-primary);
    }

    /* Lists (Categories, Recent Posts) */
    .dg-widget ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .dg-widget ul li {
        margin-bottom: 0.85rem;
        padding-bottom: 0.85rem;
        border-bottom: 1px solid rgba(255,255,255,0.03);
    }
    .dg-widget ul li:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    .dg-widget ul li a {
        color: var(--color-muted);
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-block;
    }
    .dg-widget ul li a:hover {
        color: var(--color-primary);
        transform: translateX(5px);
    }

    /* Small Tag Style for Post Counts in Categories */
    .dg-widget ul li {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .dg-post-count {
        font-size: 0.7rem;
        background: rgba(255,255,255,0.05);
        padding: 0.2rem 0.5rem;
        border-radius: 999px;
        color: #fff;
    }
</style>

<aside class="dg-sidebar">
    
    <!-- Search Widget -->
    <div class="dg-widget">
        <h2><i class="fa-solid fa-magnifying-glass"></i> Search</h2>
        <form role="search" method="get" class="dg-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" class="dg-search-input" placeholder="Search articles..." value="<?php echo get_search_query(); ?>" name="s" required />
            <button type="submit" class="dg-search-submit">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>
    </div>

    <!-- Categories Widget -->
    <div class="dg-widget">
        <h2><i class="fa-solid fa-folder-open"></i> Topics</h2>
        <ul>
            <?php
            $categories = get_categories( array(
                'orderby' => 'name',
                'order'   => 'ASC'
            ) );
            
            foreach( $categories as $category ) {
                echo '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a> <span class="dg-post-count">' . esc_html( $category->count ) . '</span></li>';
            }
            ?>
        </ul>
    </div>

    <!-- Latest Articles Widget -->
    <div class="dg-widget">
        <h2><i class="fa-solid fa-newspaper"></i> Latest Insights</h2>
        <ul>
            <?php
            $recent_posts = wp_get_recent_posts( array(
                'numberposts' => 5,
                'post_status' => 'publish'
            ) );
            
            foreach( $recent_posts as $post ) {
                echo '<li><a href="' . esc_url( get_permalink( $post['ID'] ) ) . '">' . esc_html( $post['post_title'] ) . '</a></li>';
            }
            ?>
        </ul>
    </div>

</aside>