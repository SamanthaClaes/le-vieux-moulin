<?php if (have_rows('content')):
    while (have_rows('content')): the_row();
        if (get_row_layout() === 'text-media'):
            include('text-media/text-media.php');
        elseif (get_row_layout() === 'gallery'):
            include('gallery/gallery.php');
        elseif (get_row_layout() === 'slider'):
            include('slider/slider.php');
        elseif (get_row_layout() === 'image'):
            include('image/image.php');
        elseif (get_row_layout() === 'text'):
            include('text/text.php');
        elseif (get_row_layout() === 'parcours'):
            include('parcours/parcours.php');
        endif;
    endwhile;
endif;