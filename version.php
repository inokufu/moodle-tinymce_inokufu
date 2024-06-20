<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin version and other meta-data are defined here.
 *
 * @package     tiny_inokufu
 * @copyright   2024 Inokufu
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version = 2024061700;
$plugin->requires = 2022112802.00; // 4.1.2 (Build: 20230313)
$plugin->component = 'tiny_inokufu';
$plugin->maturity = MATURITY_STABLE;
$plugin->release = '1.0.1';
$plugin->supported = [410, 420];

$plugin->dependencies = [
    'repository_inokufu' => 2024061700  // Needs repository plugin to be useful
];