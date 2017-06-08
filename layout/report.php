<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepost) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost) {
    $bodyclasses[] = 'content-only';
}

if ($hascustommenu) {
    $bodyclasses[] = 'has-custom-menu';
}

echo $OUTPUT->doctype()
?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title><?php echo $PAGE->title ?></title>
        <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme') ?>" />
<?php echo $OUTPUT->standard_head_html() ?>
        <script type="text/javascript">
    <!--
            function toggle_visibility(id) {
                var e = document.getElementById(id);
                if (e.style.display == 'block')
                    e.style.display = 'none';
                else
                    e.style.display = 'block';
            }
    //-->
        </script>
    </head>

    <body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses . ' ' . join(' ', $bodyclasses)) ?>">
        <h1>4</h1>
<?php echo $OUTPUT->standard_top_of_body_html() ?>

        <div id="page">

<?php if ($hasheading || $hasnavbar) { ?>
                <div id="wrapper" class="clearfix">

                    <!-- START OF HEADER -->
                    <div class="top-bar">
                        <div class="headermenu">
                            <?php
                            if (!empty($PAGE->layout_options['langmenu'])) {
                                echo $OUTPUT->lang_menu();
                            }
                            if (method_exists($OUTPUT, 'user_menu')) {
                                echo $OUTPUT->user_menu(); // user menu, for Moodle 2.8+
                                echo $OUTPUT->navbar_plugin_output(); // Moodle 3.2+
                                echo $OUTPUT->search_box();
                            } else {
                                echo $OUTPUT->login_info(); // login_info, Moodle 2.7 and before
                            }
                            echo $PAGE->headingmenu;
                            ?>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div id="page-header" class="inside">
                        <div id="page-header-wrapper" class="wrapper clearfix">

    <?php if ($hasheading) { ?>
                                <h1 class="headermain"><?php /* echo $PAGE->heading */ ?></h1>

                            <?php } ?>
    <?php if ($hascustommenu) { ?>

                                <div id="custommenu"><div class="toggle"><a  onclick="toggle_visibility('responsive-menu');"><img src="<?php echo $OUTPUT->pix_url('nav-menu', 'theme'); ?>" alt="" /></a></div><div id="responsive-menu"><?php echo $custommenu; ?><div class="clearfix">&nbsp;</div></div></div>
    <?php } ?>
                        </div>
                    </div>

    <?php if ($hasnavbar) { ?>
                        <div class="navbar">
                            <div class="wrapper clearfix">
                                <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
                                <div class="navbutton"> <?php echo $PAGE->button; ?></div>
                            </div>
                        </div>
    <?php } ?>

                    <!-- END OF HEADER -->

<?php } ?>


                <!-- START OF CONTENT -->

                <div id="page-content-wrapper" class="wrapper clearfix">
                    <div id="page-content" class="clearfix">
                        <div id="report-main-content">
                            <div class="region-content">
<?php echo $OUTPUT->main_content() ?>
                            </div>
                        </div>
<?php if ($hassidepost) { ?>
                            <div id="report-region-wrap">
                                <div id="report-region-pre" class="block-region">
                                    <div class="region-content">
    <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                                    </div>
                                </div>
                            </div>
<?php } ?>
                    </div>
                </div>

                <!-- END OF CONTENT -->

<?php if ($hasheading || $hasnavbar) { ?>
                    <div class="myclear"></div>
                </div>
<?php } ?>

            <!-- START OF FOOTER -->

<?php if ($hasfooter) { ?>
                <div id="page-footer" class="wrapper">
                    <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
                    <?php
                    echo $OUTPUT->login_info();
                    echo $OUTPUT->home_link();
                    echo $OUTPUT->standard_footer_html();
                    ?>
                </div>
<?php } ?>

        </div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
    </body>
</html>
