<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_filter('infinite_scroll_credit', function() { return ''; } );

add_filter('language_attributes', function( $default ) {
    global $post;
    
	if( has_category( 'italiano', $post ) ) {
		return "lang=\"it\"";
    }
    
	return $default;
});


add_action('wp_footer', function(){
    ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-26166520-2', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- MailerLite Universal -->
    <script>
    (function(m,a,i,l,e,r){ m['MailerLiteObject']=e;function f(){
    var c={ a:arguments,q:[]};var r=this.push(c);return "number"!=typeof r?r:f.bind(c.q);}
    f.q=f.q||[];m[e]=m[e]||f.bind(f.q);m[e].q=m[e].q||f.q;r=a.createElement(i);
    var _=a.getElementsByTagName(i)[0];r.async=1;r.src=l+'?v'+(~~(new Date().getTime()/1000000));
    _.parentNode.insertBefore(r,_);})(window, document, 'script', 'https://static.mailerlite.com/js/universal.js', 'ml');

    var ml_account = ml('accounts', '1595424', 'h0u7z9u8k4', 'load');
    </script>
    <!-- End MailerLite Universal -->
<?php
});

add_filter( 'publicize_checkbox_default', '__return_false' );


function gb_exclude_italian_from_home( $query ) {
    if ( $query->is_home ) {
        $query->set( 'cat', '-233, -156' );
    }

    return $query;
}
     
add_filter( 'pre_get_posts', 'gb_exclude_italian_from_home' );