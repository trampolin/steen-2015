<?php function getAdmin($user) {
    require_once(ROOT_DIR.'/view/content/venues.php');
    require_once(ROOT_DIR.'/view/content/gigs.php');


    $mode = isset($_GET['m']) ? $_GET['m'] : null;
    ?>
    <div id="admin_content" class="content_box_container">
        <?php if($user->isUserLoggedIn()) : ?>

            <?php

            if($mode == 'overview' || $mode == null) { ?>
                <p>Eingetragene Venues:<?php $vi = new VenueInterface(); echo $vi->countRecords()->data;?></p>
                <p>Eingetragene Gigs:<?php $vi = new GigInterface(); echo $vi->countRecords()->data;?></p>
                <p>Eingetragene Videos:<?php $vi = new VideoInterface(); echo $vi->countRecords()->data;?></p>
            <?php

            } else if ($mode == 'venues') {
                getVenues();
            } else if ($mode == 'gigs') {
                getGigs();
            } else if ($mode == 'videos') {

            } else { ?>
                <p>Mode not found!</p>
            <?php }

            ?>

        <?php else:
            if (isset($user)) {
                if ($user->errors) {
                    foreach ($user->errors as $error) {
                        echo $error;
                    }
                }
                if ($user->messages) {
                    foreach ($user->messages as $message) {
                        echo $message;
                    }
                }
            }
            ?>

            <!-- login form box -->
            <form method="post" action="index.php?p=admin" name="loginform">

                <label for="login_input_username">Username</label>
                <input id="login_input_username" class="login_input" type="text" name="user_name" required />

                <label for="login_input_password">Password</label>
                <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />

                <input type="submit"  name="login" value="Log in" />

            </form>
        <?php endif; ?>
    </div>
<?php }