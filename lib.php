<?php

/**
 * Makes our changes to the CSS
 *
 * @param string $css
 * @param theme_config $theme
 * @return string 
 */
function contemporary_process_css($css, $theme) {

    // Set the link color
    if (!empty($theme->settings->linkcolor)) {
        $linkcolor = $theme->settings->linkcolor;
    } else {
        $linkcolor = null;
    }
    $css = contemporary_set_linkcolor($css, $linkcolor);

    // Set the banner image
    if (!empty($theme->settings->banner)) {
        $banner = $theme->settings->banner;
    } else {
        $banner = null;
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
        $replacement = '#32529a';
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
        $replacement = '#32529a';
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
        $replacement = '#32529a';
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
    $tag = '[[setting:customcss]]';
    $replacement = $banner;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $customcss, $css);
    return $css;
}
