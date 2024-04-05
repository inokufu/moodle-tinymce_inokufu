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
 * Tiny Inokufu Plugin to interact with their API LO V3 plugin for Moodle.
 *
 * @package     tiny_inokufu
 * @copyright   2024 Inokufu
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tiny_inokufu;

use context;
use editor_tiny\editor;
use editor_tiny\plugin;
use editor_tiny\plugin_with_buttons;
use editor_tiny\plugin_with_configuration;

class plugininfo extends plugin implements plugin_with_buttons, plugin_with_configuration {
    /**
     * Whether the plugin is enabled
     *
     * @param context $context The context that the editor is used within
     * @param array $options The options passed in when requesting the editor
     * @param array $fpoptions The filepicker options passed in when requesting the editor
     * @param editor $editor The editor instance in which the plugin is initialized
     * @return boolean
     */
    public static function is_enabled(
        context $context,
        array $options,
        array $fpoptions,
        ?editor $editor = null
    ): bool {
        // Disabled if:
        // - Not logged in or guest.

        return isloggedin() && !isguestuser();
    }

    public static function get_available_buttons(): array {
        return [
            'tiny_inokufu/plugin',
        ];
    }

    public static function get_plugin_configuration_for_context(
        context $context,
        array $options,
        array $fpoptions,
        ?editor $editor = null
    ): array {

        // TODO Fetch the actual permissions.
        $permissions = [
            'image' => [
                'filepicker' => true,
            ]
        ];

        return array_merge([
            'permissions' => $permissions,
        ], self::get_file_manager_configuration($context, $options, $fpoptions));
    }

    protected static function get_file_manager_configuration(
        context $context,
        array $options,
        array $fpoptions
    ): array {
        global $USER;

        $params = [
            'area' => [],
            'usercontext' => \context_user::instance($USER->id)->id,
        ];

        $keys = [
            'itemid',
            'areamaxbytes',
            'maxbytes',
            'subdirs',
            'return_types',
            'removeorphaneddrafts',
        ];
        if (isset($options['context'])) {
            if (is_object($options['context'])) {
                $params['area']['context'] = $options['context']->id;
            } else {
                $params['area']['context'] = $options['context'];
            }
        }
        foreach ($keys as $key) {
            if (isset($options[$key])) {
                $params['area'][$key] = $options[$key];
            }
        }

        return [
            'storeinrepo' => true,
            'data' => [
                'params' => $params,
                'fpoptions' => $fpoptions,
            ],
        ];
    }
}
