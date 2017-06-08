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
/**
 * Theme version info
 *
 * @package    theme
 * @subpackage contemporary
 * @copyright � 2012 - 2013 | 3i Logic (Pvt) Ltd.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));
$hasbanner = (!empty($PAGE->theme->settings->banner));
$hasfooter = (!empty($PAGE->theme->settings->footertext));

$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hassidepre || $hassidepost) {
    $bodyclasses[] = 'background';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}

echo $OUTPUT->doctype()
?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
    <head>
        <title><?php echo $PAGE->title ?></title>
        <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme') ?>" />
        <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
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
        <?php echo $OUTPUT->standard_top_of_body_html() ?>
        <div id="page">
            <div id="wrapper" class="clearfix"> 

                <!-- START OF HEADER -->
                <div class="top-bar">
                    <div class="headermenu">
                    <ul>
                        <?php
                        if (!empty($PAGE->layout_options['langmenu'])) {
                            echo '<li>'.$OUTPUT->lang_menu().'</li>';
                        }
                        if (method_exists($OUTPUT, 'user_menu')) {
                            echo '<li class="notifications">'.$OUTPUT->navbar_plugin_output().'</li>'; // Moodle 3.2+
                            echo '<li>'.$OUTPUT->user_menu().'</li>'; // user menu, for Moodle 2.8
                            echo '<li>'.$OUTPUT->search_box().'</li>';
                        } else {
                            echo '<li>'.$OUTPUT->login_info().'</li>'; // login_info, Moodle 2.7 and before
                        } ?>
                        </ul>
                        <?php echo $PAGE->headingmenu; ?>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                </div>
                <div id="page-header" class="clearfix">
                    <div id="page-header-wrapper">
                        <h1 class="headermain"></h1>
                    </div>
                </div>
                <?php if ($hascustommenu) { ?>

                    <div id="custommenu"><div class="toggle"><a  onclick="toggle_visibility('responsive-menu');"><img src="<?php echo $OUTPUT->pix_url('nav-menu', 'theme'); ?>" alt="" /></a></div><div id="responsive-menu"><?php echo $custommenu; ?><div class="clearfix">&nbsp;</div></div></div>
                <?php } ?>
                <!-- END OF HEADER --> 

                <!-- START OF NAVIGATION BAR -->
                <?php if ($hasnavbar) { ?>
                    <div class="navbar clearfix">
                        <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?> </div>
                        <div class="navbutton"> <?php echo $OUTPUT->page_heading_button(); ?> </div>
                    </div>
                <?php } ?>
                <!-- END OF NAVIGATION BAR --> 

                <!-- START OF CONTENT -->
                <div id="page-content-wrapper">
                    <div id="page-content"> 
                        <!--<marquee>AVAILABLE COURSES</marquee>-->
                        <div id="region-main-box">
                            <div id="region-post-box">
                                <div id="region-main-wrap">
                                    <div id="region-main">
                                        <div class="region-content"> <?php echo core_renderer::MAIN_CONTENT_TOKEN ?> </div>
                                    </div>
                                </div>
                                <?php if ($hassidepre) { ?>
                                    <div id="region-pre" class="block-region">
                                        <div class="region-content"> <?php echo $OUTPUT->blocks_for_region('side-pre') ?> </div>
                                    </div>
                                <?php } ?>
                                <?php if ($hassidepost) { ?>
                                    <div id="region-post" class="block-region">
                                        <div class="region-content"> <?php echo $OUTPUT->blocks_for_region('side-post') ?> </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END OF CONTENT --> 

            </div>

            <!-- START OF FOOTER -->

            <div id="page-footer">
                <?php
                if ($hasfooter) {
                    echo $PAGE->theme->settings->footertext;
                } else {
                    ?>
                    <p class="helplink"> </p>
                    <?php
                    echo $OUTPUT->login_info();
                    // echo $OUTPUT->home_link();
                    echo $OUTPUT->standard_footer_html();
                }
                ?>
            </div>

            <!-- END OF FOOTER --> 
        </div>
        <?php echo $OUTPUT->standard_end_of_body_html() ?>
    </body>
</html>
