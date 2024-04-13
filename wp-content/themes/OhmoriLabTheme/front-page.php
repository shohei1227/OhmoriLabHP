<?php
/**
 * Front Page Template
 *
 * @package Ohmori-lab Theme
 */

get_header(); ?>

<!-- Section 1: Main -->
<section id="section1-main" class="relative h-screen z-0">
    <!-- Background video -->
    <video autoplay muted loop id="myVideo" class="object-cover w-full h-full">
        <source src=<?= get_stylesheet_directory_uri() . "/assets/videos/front-page-top.mp4"?> type="video/mp4">
    </video>
    <!-- Text over video -->
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
        <h1 class="text-4xl font-bold text-white mb-4">大森研究室</h1>
        <p class="text-xl text-white">科学と技術の進歩を支える研究を行っています。</p>
    </div>
</section>

<!-- Section 2: News -->
<section id="section2-news" class="py-12 bg-primary-100">
    <div class="ohmorilab__news_inner mx-auto px-4 lg:w-4/5">
        <div class="section-title text-left">
            <p class="text-base mb-1">ニュース</p>
            <h2 class="text-5xl font-bold mb-8">NEWS</h2>
        </div>
        <?php
        // Fetch latest news
        $args = array(
            'post_type'      => 'news',
            'posts_per_page' => 6,
        );
        $news_query = new WP_Query($args);
        if ($news_query->have_posts()) :
            echo '<div class="divide-y divide-slate-400 border-y border-slate-400">';
            while ($news_query->have_posts()) : $news_query->the_post(); 
        ?>
        <div class="hover:bg-primary-200">
            <a href="<?php the_permalink()?>">
                <div class="flex flex-wrap items-center px-2 py-8">
                    <p class="text-base px-2 lg:w-1/5"><?php echo get_the_date(); ?></p>
                    <?php 
                    $news_categories = get_the_terms(get_the_ID(), 'news-category');
                    if ($news_categories && !is_wp_error($news_categories)) : ?>
                    <p class="text-sm px-2 text-gray-600 w-1/2 lg:w-1/5">
                        <?php foreach ($news_categories as $news_category) : ?>
                        <?php echo esc_html($news_category->name); ?>
                        <?php if (next($news_categories)) echo ', '; ?>
                        <?php endforeach; ?>
                    </p>
                    <?php endif; ?>
                    <h3 class="text-2xl px-4 font-semibold w-full lg:w-3/5"><?php the_title(); ?></h3>
                </div>
            </a>
        </div>
        <?php endwhile;
            echo '</div>';
            wp_reset_postdata();
        else :
            echo '<p class="text-center">No news found.</p>';
        endif;
        ?>

    </div>

</section>

<!-- Section 3: Research -->
<section id="section3-research" class="py-12 bg-primary-50">
    <div class="ohmorilab__news_inner mx-auto px-4 lg:w-4/5">
        <div class="section-title text-left">
            <p class="text-base mb-1">研究内容</p>
            <h2 class="text-5xl font-bold mb-8">RESEARCH</h2>
        </div>
    </div>
    <!-- Modern research section -->
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-6 shadow-sm rounded">
            <h3 class="font-semibold mb-3">研究分野1</h3>
            <p>研究分野1についての説明。</p>
        </div>
        <div class="bg-white p-6 shadow-sm rounded">
            <h3 class="font-semibold mb-3">研究分野2</h3>
            <p>研究分野2についての説明。</p>
        </div>
    </div>
</section>

<!-- Section 4: Access -->
<section id="section4-access" class="py-12 bg-primary-100">
    <div class="section-title text-center">
        <h2 class="text-3xl font-bold mb-8">アクセス</h2>
    </div>
    <!-- Google Map Embed -->
    <div class="max-w-6xl mx-auto">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.658605939395!2d139.73835631525875!3d35.709025980191774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfcd6f1e381%3A0x2aee8f6ad3a2f3!2sTokyo!5e0!3m2!1sen!2sjp!4v1631547958426"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>

<?php get_footer(); ?>