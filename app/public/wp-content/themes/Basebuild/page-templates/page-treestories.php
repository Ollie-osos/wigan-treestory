<?php
/**
* Template Name: Treestories
*
*/

get_header(); ?>

<div class="page">
    <div class="container-fluid map-container">
        <div id="map" class="treestories-map"></div>
        <div id="over">
            <div class="container">
                <div class="row u-center">
                    <div class="col-sm-12 col-md-7 col-lg-5 label"> 
                        <div class="label-inside">
                            <h3 class="pt-1 pb-3">Explore Treestories</h3>
                            <p>Click and explore the Liverpool City Region and read some Treestories from our cotributors so far.</p>
                            <h3 class="pb-4">Have your own Story?</h3>
                            <a href="/share" class="btn small">Upload here</a>
                            <p class="pt-3">Need a hand? <br>Let us guide you, explore our How To Guide below and we'll explain how it all works. </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 u-text-center explore-overlay">
                        <div class="btn large" id="explore" onclick="hideLabel();">Click to explore</div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoJKf5e3EuQAlgxhH4Cqv4GIMsdWP2ux4&map_ids=c925407723fe496a&callback=initMap&v=weekly" defer></script>
        <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
        <?php get_template_part( 'template-parts/icons',  null, array('page' => 'treestories') ); ?> 
        <?php get_template_part( 'template-parts/carousel-text', null, array( 'colour' => 'bg-white') ); ?>
    </div>
</div>
<?php get_footer();


