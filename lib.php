<?php

/**
 * Makes our changes to the CSS
 *
 * @param string $css
 * @param theme_config $theme
 * @return string 
 */
function contemporary_process_css($css, $theme) {
	
	global $CFG;

    // Set the link color
    if (!empty($theme->settings->linkcolor)) {
        $linkcolor = $theme->settings->linkcolor;
    } else {
        $linkcolor = null;
    }
    $css = contemporary_set_linkcolor($css, $linkcolor);

    // Set the banner image
    if (!empty($theme->setting_file_url('banner', 'banner'))) {
        $banner = $theme->setting_file_url('banner', 'banner');
    } else {
        $banner = $CFG->wwwroot . '/theme/contemporary/pix/banner1.jpg';
    }
    $css = contemporary_set_banner($css, $banner);

    // Set the customcss
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = contemporary_set_customcss($css, $customcss);

    // Set the blockheadercolor
    if (!empty($theme->settings->blockheadercolor)) {
        $blockheadercolor = $theme->settings->blockheadercolor;
    } else {
        $blockheadercolor = null;
    }
    $css = contemporary_set_blockheadercolor($css, $blockheadercolor);

    // Set the blockheaderbg
    if (!empty($theme->settings->blockheaderbg)) {
        $blockheaderbg = $theme->settings->blockheaderbg;
    } else {
        $blockheaderbg = null;
    }
    $css = contemporary_set_blockheaderbg($css, $blockheaderbg);

    // Set the menubg
    if (!empty($theme->settings->menubg)) {
        $menubg = $theme->settings->menubg;
    } else {
        $menubg = null;
    }
    $css = contemporary_set_menubg($css, $menubg);

    // Set the menubg
    if (!empty($theme->settings->menulinkhover)) {
        $menulinkhover = $theme->settings->menulinkhover;
    } else {
        $menulinkhover = null;
    }
    $css = contemporary_set_menulinkhover($css, $menulinkhover);

    // Set the menubg
    if (!empty($theme->settings->menucolor)) {
        $menucolor = $theme->settings->menucolor;
    } else {
        $menucolor = null;
    }
    $css = contemporary_set_menucolor($css, $menucolor);
    // Return the CSS
    return $css;
}

/**
 * Sets the link color variable in CSS
 *
 */
function contemporary_set_linkcolor($css, $linkcolor) {
    $tag = '[[setting:linkcolor]]';
    $replacement = $linkcolor;
    if (is_null($replacement)) {
        $replacement = '#1b9ef5';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

/**
 * Sets the font color of block header variable in CSS
 *
 */
function contemporary_set_blockheadercolor($css, $blockheadercolor) {
    $tag = '[[setting:blockheadercolor]]';
    $replacement = $blockheadercolor;
    if (is_null($replacement)) {
        $replacement = '#1b9ef5';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

/**
 * Sets the font color of block header variable in CSS
 *
 */
function contemporary_set_blockheaderbg($css, $blockheaderbg) {
    $tag = '[[setting:blockheaderbg]]';
    $replacement = $blockheaderbg;
    if (is_null($replacement)) {
        $replacement = '#1b9ef5';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

/**
 * Sets the font color of block header variable in CSS
 *
 */
function contemporary_set_menubg($css, $menubg) {
    $tag = '[[setting:menubg]]';
    $replacement = $menubg;
    if (is_null($replacement)) {
        $replacement = '#000000';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

/**
 * Sets the Background color of Menu Link Hover variable in CSS
 *
 */
function contemporary_set_menulinkhover($css, $menulinkhover) {
    $tag = '[[setting:menulinkhover]]';
    $replacement = $menulinkhover;
    if (is_null($replacement)) {
        $replacement = '#000000';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

/**
 * Sets the font color of Menu Link variable in CSS
 *
 */
function contemporary_set_menucolor($css, $menucolor) {
    $tag = '[[setting:menucolor]]';
    $replacement = $menucolor;
    if (is_null($replacement)) {
        $replacement = '#000000';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

/**
 * Sets the banner variable in CSS
 *
 */
function contemporary_set_banner($css, $banner) {
    global $OUTPUT;
    $tag = '[[setting:banner]]';
    $replacement = $banner;
    if (is_null($replacement)) {
        $replacement = $OUTPUT->pix_url('banner', 'theme');
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

/**
 * Sets the customcss variable in CSS
 *
 */
function contemporary_set_customcss($css, $customcss) {
    global $OUTPUT;
    $banner = null;
    $tag = '[[setting:customcss]]';
    $replacement = $banner;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $customcss, $css);
    return $css;
}
/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_contemporary_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
 if ($context->contextlevel == CONTEXT_SYSTEM && ($filearea === 'banner')) {
  $theme = theme_config::load('contemporary');
  // By default, theme files must be cache-able by both browsers and proxies.
  if (!array_key_exists('cacheability', $options)) {
   $options['cacheability'] = 'public';
  }
  return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
 } else {
  send_file_not_found();
 }
}
