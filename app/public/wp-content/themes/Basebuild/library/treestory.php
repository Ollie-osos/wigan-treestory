<?php

function footer_custom_javascript()
{
  if (is_page_template('page-templates/page-uploads.php')) { ?>

    <script>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
      function initMap() {
        const LIVERPOOL_BOUNDS = {
          east: -2.261425,
          west: -3.881425,
          south: 53.230759,
          north: 53.630759,
        };
        const myLatlng = {
          lat: 53.40503858570688,
          lng: -3.001243779405298
        };
        const map = new google.maps.Map(document.getElementById("map"), {
          // change the map id when live to our gmap api id
          // mapId: "e41ff799a7370a8e",
          mapId: "3aac246eac7311da",
          zoom: 11,
          center: myLatlng,
          restriction: {
            latLngBounds: LIVERPOOL_BOUNDS,
            strictBounds: false,
          },
          disableDefaultUI: true,
          zoomControl: true
        });
        // Create the initial marker.
        let marker = new google.maps.Marker();

        // Configure the click listener.
        map.addListener("click", (mapsMouseEvent) => {
          marker.setMap(null);
          marker = new google.maps.Marker({
            position: mapsMouseEvent.latLng,
            icon: "https://treestory.me/wp-content/uploads/2022/10/Icon2-e1664883929647.png",
            map: map
          });

          document.getElementById("location").value = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);

        });
      }

      window.initMap = initMap;
    </script>


    <script>
      /*Form validation*/

      function validation() {

        var name = document.getElementById("name").value;
        var title = document.getElementById("title").value;
        var tree = document.getElementById("tree").value;
        var story = document.getElementById("story").value;
        var audio = document.getElementById("audio");
        var photos = document.getElementById("photos").value;
        var location = document.getElementById("location").value;
        var email = document.getElementById("email").value;
        var first_time = document.getElementById("first_time").value;
        var terms = document.getElementById("terms").value;

        if (name == "") {
          alert("Name is a required field.");
          name.focus();
          return false;
        }

        if (title == "") {
          alert("Title is a required field.");
          title.focus();
          return false;
        }

        if (story.split(" ").length > 1000) {
          alert("Story is longer than 1000 words.");
          story.focus();
          return false;
        }
        if (audio.files.length != 0) {
          // to change the filesize limit edit here
          if (audio[0].size > (1024 * 5)) {
            alert("Audio file exceeds maximum size.");
            return false;
          }
        }

        if (photos.files.length != 0 || photos.files.length <= 6) {
          for (i = 0; i < photos.length; i++) {
            if (photos[i].size > (1024 * 2)) {
              alert("Photo file exceeds maximum size.");
              return false;
            }
          }
          if (photos.files.length == 0) {
            alert("Photos are required.");
            return false;
          }
          if (photos.files.length > 6) {
            alert("You can't upload more than 6 photos");
            return false;
          }
        }

        if (location == "") {
          alert("Location is a required field.");
          location.focus();
          console.log("hey");
          return false;
        }

        if (email == "") {
          alert("Email is a required field.");
          email.focus();
          return false;
        }

        if (terms == "") {
          alert("You have to agree to our Terms & Conditions.");
          terms.focus();
          return false;
        }

      }
    </script>
  <?php
  }

  if (is_singular('treestory') || is_page_template('page-templates/page-treestories.php')) {


    //get all trees
    $posts = get_posts([
      'post_type' => 'treestory',
      'post_status' => 'publish',
      'numberposts' => -1
      // 'order'    => 'ASC'
    ]);

    $i = 0;

  ?>

    <script>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
      function initMap() {
        const myLatlng = {
          lat: 53.40503858570688,
          lng: -3.001243779405298
        };
        const map = new google.maps.Map(document.getElementById("map"), {
          // mapId: "e41ff799a7370a8e",
          mapId: "3aac246eac7311da",
          zoom: 12,
          center: myLatlng,
          disableDefaultUI: true,
          zoomControl: true

        });

        var contentString, infowindow;
        var locations = [];
        var markers = [];
        var icon_red = "https://treestory.me//wp-content/uploads/2022/10/Icon2-e1664883929647.png";
        var icon_green = "https://treestory.me//wp-content/uploads/2022/10/Icon-e1664843084869.png";
        <?php foreach ($posts as $post) { ?>

          locations[<?php echo $i ?>] = ["<?php echo get_field('name', $post->ID) ?>", <?php echo get_field('location', $post->ID) ?>, "<?php echo get_field('your_photos', $post->ID)[0]['sizes']['thumbnail'] ?>", "<?php echo get_permalink($post->ID) ?>"];

        <?php $i++;
        } ?>

        var marker, i;
        for (i = 0; i < locations.length; i++) {
          if (locations[i][1] !== undefined) {
            console.log(locations[i][1]);
            infowindow = new google.maps.InfoWindow();
            marker = new google.maps.Marker({
              position: locations[i][1],
              icon: icon_red,
              map: map
            });

            markers.push(marker);


            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                if (infowindow.anchor !== undefined && infowindow.anchor !== null)
                  infowindow.anchor.setIcon(icon_red);
                marker.setIcon(icon_green);
                infowindow.setContent('<a href="' + locations[i][3] + '">' +
                  '<div class="marker_info">' +
                  '<img src="' + locations[i][2] + '" alt="">' +
                  '<div class="marker_name">' + locations[i][0] + '</div>' +
                  '</div>');
                infowindow.open({
                  anchor: marker,
                  map,
                  shouldFocus: false,
                });
              }
            })(marker, i));

          }
        }

        // this is for the clustering. 
        // The image path is written before the extension and without the number of the image.
        // https://cloud.google.com/blog/products/maps-platform/how-cluster-map-markers

        const {
          MarkerClusterer
        } = markerClusterer;

        const clusterer = new MarkerClusterer({
          map,
          markers,
          maxZoom: 15,
          minimumClusterSize: 2,
          zoomOnClick: true,
          // Custom renderer
          renderer: {
            render: ({
              count,
              position
            }) => {
              return new google.maps.Marker({
                position,
                icon: {
                  url: "/wp-content/themes/Basebuild/dist/img/Icon1.png",
                  scaledSize: new google.maps.Size(54, 54),
                  labelOrigin: new google.maps.Point(27, 27),
                },
                label: {
                  text: String(count),
                  color: "black",
                  fontSize: "22px",
                  fontWeight: "bold",
                },
              });
            },
          },
        });

        //add event listener to close info window if map is clicked
        google.maps.event.addListener(map, 'click', function() {
          infowindow.anchor.setIcon(icon_red);
          infowindow.close();
          //Change the marker icon
        });

      }

      window.initMap = initMap;
    </script>

    <script>
      function hideLabel() {
        document.getElementById('over').style.opacity = '0';
        setTimeout(() => {
          document.getElementById('over').style.display = 'none';
        }, "500")
      }
    </script>

  <?php
  }
}
add_action('wp_footer', 'footer_custom_javascript');


function header_custom_javascript()
{
  ?>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php
}
add_action('wp_head', 'header_custom_javascript');


?>