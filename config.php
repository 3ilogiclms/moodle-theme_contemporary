<?php

// This file is part of Moodle - http://moodle.org/
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
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
$THEME->name = 'contemporary';


// Name of the theme. Most likely the name of
// the directory in which this file resides.



$THEME->parents = array('canvas', 'base');


// Which existing theme(s) in the /theme/ directory
// do you want this theme to extend. A theme can
// extend any number of themes. Rather than
// creating an entirely new theme and copying all
// of the CSS, you can simply create a new theme,
// extend the theme you like and just add the
// changes you want to your theme.



$THEME->sheets = array('core', 'settings');

// Added by Azmat
$THEME->layouts = array(
    'popup' => array(
        'file' => 'report.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'noblocks' => true, 'nonavbar' => true, 'nocustommenu' => true),
    ),
    'report' => array(
        'file' => 'report.php',
        'regions' => array('side-post'),
        'defaultregion' => 'side-post',
    ), 'frontpage' => array('file' => 'frontpage.php', 'regions' => array('side-pre', 'side-post'), 'defaultregion' => 'side-post'));


// Name of the stylesheet(s) you've including in
// this theme's /styles/ directory.

$THEME->enable_dock = true;
// Do you want to use the new navigation dock?

$THEME->editor_sheets = array('editor');

// An array of stylesheets to include within the
// body of the editor.
$THEME->csspostprocess = 'contemporary_process_css';
