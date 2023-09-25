<div class="row breadcrumbs">
	<div class="medium-12 columns">
		<?php
        global $post;
        echo '<a href="' . get_home_url() . '">' . __('Home', 'lifopro') . '</a>';
        if ($post->post_parent) {
            $have_parent = true;
        }
        $parent_pages = [];
        if ( is_singular( 'offerings' ) ) {
            if ($system_page = get_field('services_page','options')){
                echo '<a href="' . $system_page . '">' . __('Offerings', 'lifopro') . '</a>';
            }
        }
        if ( is_singular( 'resources' ) ) {
            if ($projects_page = get_field('resources_page','options')){
                echo '<a href="' . $projects_page . '">' . __('Resources', 'lifopro') . '</a>';
            }
        }
        if ( is_singular( 'our_team' ) ) {
            if ($projects_page = get_field('our_team_page','options')){
                echo '<a href="' . $projects_page . '">' . __('Our Team', 'lifopro') . '</a>';
            }
        }
if ( is_singular( 'post' ) ) {
            echo '<a href="' . get_site_url() . '/blog/">' . __('Blog', 'lifopro') . '</a>';
        }
        while ($have_parent) {
            $parent_pages[] = '<a href="' . get_the_permalink($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a>';
            $post = get_post($post->post_parent);
            if ($post->post_parent) {
                $have_parent = true;
            } else {
                $have_parent = false;
            }
        }
        wp_reset_query();
        for ($i = count($parent_pages); $i >= 1; $i--) {
            echo $parent_pages[$i - 1];
        }
        echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
        ?>
	</div>
</div>