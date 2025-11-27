<?php

/**
 * Template Name: Uploads
 *
 */

$message = '';

if (!empty($_POST['acf'])) {
    require_once(ABSPATH . 'wp-admin/includes/media.php');
    $checks = true;

    // Create post object
    $my_post = array(
        'post_type' => 'treestory',
        'post_title'    => $_POST["acf"]["title"],
        'post_content'   => $_POST["acf"]["story"],
        'tags_input'    => explode(",", $_POST['acf']['tags']),
        'post_author'   => 2
    );

    // Insert the post into the database
    $post_id = wp_insert_post($my_post);

    $attachments_array = array();
    $size = count($_FILES['acf']['name']['photos']);
    for ($i = 0; $i <= $size; $i++) {


        // last upload audio
        if ($i == $size) {
            if (empty($_FILES['acf']['tmp_name']['audio']))
                continue;

            $file_name = $_FILES['acf']['name']['audio'];
            $file_temp = $_FILES['acf']['tmp_name']['audio'];
        } else {
            $file_name = $_FILES['acf']['name']['photos'][$i];
            $file_temp = $_FILES['acf']['tmp_name']['photos'][$i];
        }


        $upload_dir = wp_upload_dir();
        $image_data = file_get_contents($file_temp);
        $filename = basename($file_name);
        $filetype = wp_check_filetype($file_name);
        $filename = $i . '-'. time() . '.' . $filetype['ext'];

        if (wp_mkdir_p($upload_dir['path'])) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }

        file_put_contents($file, $image_data);
        $wp_filetype = wp_check_filetype($filename, null);
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => sanitize_file_name($filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment($attachment, $file);
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attach_data = wp_generate_attachment_metadata($attach_id, $file);
        wp_update_attachment_metadata($attach_id, $attach_data);

        // if is audio
        if ($i == $size){
            $audio_id = $attach_id;
        }else{
            array_push($attachments_array, $attach_id);
            
        }
    }

    //update ACF fields

    update_field('name', $_POST["acf"]["name"], $post_id);
    update_field('tree_type', $_POST["acf"]["tree"], $post_id);
    update_field('your_photos', $attachments_array, $post_id);
    if (!empty($audio_id)) {update_field('audio', $audio_id, $post_id);}
    update_field('location', $_POST["acf"]["location"], $post_id);
    update_field('email_address', $_POST["acf"]["email"], $post_id);
    if (!empty($_POST["acf"]["first_time"])) {update_field('first_time', $_POST["acf"]["first_time"], $post_id);}

    // send email 

    $to = $_POST["acf"]["email"];
    $subject = 'Your TreeStory was successfully submitted!';
    $body = "Thank you for your submission to TreeStory.me Your contribution will add to our collection of amazing stories so far. We'll be in touch as soon as we've approved your Story and it's live.";
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($to, $subject, $body, $headers);

    // send email to admin

    $to = get_user_by('ID', 4)->user_email;
    $subject = 'A new tree post is waiting for approval';
    $body = get_permalink($post_id);
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($to, $subject, $body, $headers);
    // TODO check for erros
    if ($checks) {
        $message = "Upload complete, thank you!";
    } else {
        $message = "Error uploading! Please try again";
    }
}

get_header(); ?>

<div class="page">
    <?php if (empty($_POST['acf'])) {
        get_template_part('template-parts/hero-two-columns', get_post_type()); ?>
        <section class="section bg-off-white" id="upload-form">
            <form id="acf-form" class="acf-form container" action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12 col-md-6 upload-input-1">
                        <label for="name">Your Name<span class="acf-required">*</span></label>
                        <input type="text" id="name" name="acf[name]" required="required">
                    </div>
                    <div class="col-sm-12 col-md-6 upload-input-1">
                        <label for="title" style="width: 240px;">Story title <span class="acf-required">*</span></label>
                        <input type="text" id="title" name="acf[title]" required="required">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12 upload-file">
                        <label for="tree">Tree</label>
                        <p>Use this <a href="https://www.woodlandtrust.org.uk/trees-woods-and-wildlife/british-trees/a-z-of-british-trees/" title="Link to trestory guide" target="_blank">TreeGuide</a> for help.</p>
                    </div>
                    <div class="col-md-8 col-sm-12 upload-input-1">
                        <input class="input--lg" type="text" id="tree" name="acf[tree]">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 u-text-center upload-header">
                        <h4>Please share your Story with us as Text or Audio.</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12 upload-file">
                        <label for="story">Your Story</label>
                        <p>1000 words max.</p>
                    </div>
                    <div class="col-md-8 col-sm-12 upload-input-1">
                        <textarea id="story" name="acf[story]"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12 upload-file">
                        <label for="audio" class="form-label">Your Story - As audio</label>
                        <p>If you prefer to record your story, upload a voice recording here.</p>
                        <p>5MB max file size. 10 minute max file length. MP3, MP4 or MP4A audio files only.</p>
                    </div>
                    <!-- to add more file types add a comma in the accept and add another file extension -->
                    <div class="col-md-8 col-sm-12 upload-file">
                        <label for="audio" class="btn">Upload audio</label>
                        <input class="form-control" type="file" id="audio" style="visibility:hidden; position:fixed;" name="acf[audio]" accept=".mp3, .mp4, .mp4a" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-12 upload-file">
                        <label for="photos" class="form-label">Your photos <span class="acf-required">*</span></label>
                        <p>2MB max file size per image. <br>6 photos max</p>
                    </div>
                    <div class="col-md-8 col-sm-12 upload-file">
                        <label for="photos" class="btn">Upload photos</label>
                        <input class="form-control" style="visibility:hidden; position:fixed;" type="file" id="photos" name="acf[photos][]" multiple accept="image/png, image/jpeg" required="required" onclick="boomFunction(this)" />
                        <div id="file_count"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12 upload-file">
                        <label for="tags">Tags</label>
                        <p>Enter some keywords that define your image, separate each tag with a comma</p>
                    </div>
                    <div class="col-md-8 col-sm-12 upload-input-1">
                        <input class="input--lg" type="text" id="tags" name="acf[tags]">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12 upload-file">
                        <label for="location">Location<span class="acf-required">*</span></label>
                        <p>Use the map and drop a pin where your tree is. If your tree doesn't exist anymore, put a pin where it was</p>
                        <p>If your tree is in a private space or your own garden drop a pin near by.</p>
                    </div>
                    <div class="col-md-8 col-sm-12 upload-file">
                        <!-- locations added here in hidden field -->
                        <input class="input--lg" type="text" id="location" name="acf[location]" hidden required>
                        <div id="map" style="height:450px;width:100%;"></div>

                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoJKf5e3EuQAlgxhH4Cqv4GIMsdWP2ux4&map_ids=c925407723fe496a&callback=initMap&v=weekly" defer></script>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-6 col-sm-12 upload-file">
                        <label for="email">Email address<span class="acf-required">*</span></label>
                        <p class="small">We only use this information to contact you when your TreeStory is live or if we need to check any details with you. It won't be shared with any third parties.</p>
                    </div>
                    <div class="col-md-6 col-sm-12 upload-input-1">
                        <input class="input--lg" type="email" id="email" name="acf[email]" required="required">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1 col-xs-2 upload-check">
                        <input class="input--lg large-checkbox" type="checkbox" id="first_time" name="acf[first_time]">
                    </div>
                    <div class="col-sm-10 col-xs-10 upload-check">
                        <label for="first_time"> Is this the first time you have engaged with either Open Eye Gallery or dot-art?</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1 col-xs-2 upload-check">
                        <input class="input--lg large-checkbox" type="checkbox" id="terms" name="acf[terms]" required="required">
                    </div>
                    <div class="col-sm-10 col-xs-10 upload-check">
                        <label for="terms">Terms and Conditions<span class="acf-required">*</span></label>
                        <p class="small">I agree to TreeStory T&Cs. Read <a href="../terms-and-conditions/" target="_blank" title="Terms and conditions">here</a> for full details.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 pb-5">
                        <div class="g-recaptcha" data-sitekey="6LfJxnYiAAAAAAzPqoiIYFWxd_9C59T1_tsK_t-h"></div>
                    </div>
                    <div class="col-sm-12">
                        <input type="submit" form="acf-form" value="Complete Upload" class="btn large" style="width: 100%;"></input>
                    </div>
                </div>
                
            </form>

        </section>
        <script>
            $(document).ready(function() {
                $(document).on("change", '#photos', function() {
                    var total = 0;
                    $("#photos").each(function() {
                        total = total + this.files.length;
                    })
                    $('#file_count').text(total + " files selected");
                });
            });
        </script>
    <?php } else { ?>
        <section class="hero-full-colour u-text-center bg-white">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <h1><?php echo $message; ?></h1>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <section class="section" id="upload-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h2>What happen's next?</h2>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h5 class="font-normal">We'll email you as soon as we've approved your upload and let you know once your TreeStory is Live!</h5>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h2>Having trouble?<br>Let us help...</h2>
                </div>
                <div class="col-md-6 col-sm-12 bottom-custom-cta">
                    <a href="../FAQs" class="btn">FAQs</a>
                    <a href="../How-to" class="btn">How to guide</a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer();
