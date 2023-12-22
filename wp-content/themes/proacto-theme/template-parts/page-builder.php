<?php if( have_rows('page-builder') ):
    /*
    
    Example how to add modules commented below
    
    */


    while ( have_rows('page-builder') ) : the_row(); 

        if( get_row_layout() =='acf_template_name' ):
            get_template_part('template-parts/modules/modle_name');

        elseif( get_row_layout() =='acf_template_name' ):
            get_template_part('template-parts/modules/modle_name');

        endif;

    endwhile; 
    
endif;
?>