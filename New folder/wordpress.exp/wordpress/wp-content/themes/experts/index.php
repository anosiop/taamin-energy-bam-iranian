<?php get_header(); ?>
<h1>Hello, this is my first wordpress theme</h1>

<?php if(have_posts()) : ?>
    <?php while(have_posts()) : ?>
    
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?> 