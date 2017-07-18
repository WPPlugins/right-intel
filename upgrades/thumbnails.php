<?php

add_action( 'admin_notices', function() use($storedVersion) {
    ?>
    <div class="updated">
        <p>Thank you for upgrading the Right Intel WordPress Plugin. $storedVersion is <?= $storedVersion ?></p>
    </div>
    <?php
});

// TODO: show user an admin message about Right Intel upgrade:
// images are now available in the media library
// images load more quickly because they are proper thumbnails
// there is now an option for CSS3 bubbles

