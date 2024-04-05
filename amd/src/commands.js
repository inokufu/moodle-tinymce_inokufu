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
 * Commands helper for the Moodle tiny_inokufu plugin.
 *
 * @module      tiny_inokufu/commands
 * @copyright   2024 Inokufu
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import { getButtonImage, displayFilepicker } from 'editor_tiny/utils';
import { get_string as getString } from 'core/str';
import { getImagePermissions } from './options';
import { component, inosearchButtonName, icon } from './common';

/**
 * Handle the action on a click on the plugin's icon.
 * @param {TinyMCE.editor} editor The tinyMCE editor instance.
 */
const makeInoSearch = (editor) => {
    const canShowFilePicker = getImagePermissions(editor).filepicker;

    if (canShowFilePicker) {
        displayFilepicker(editor, 'link').then((params) => {
            if (params.url !== '') {
                fetch(params.url).then(html => {
                    html.text().then(output => {
                        editor.insertContent(output);
                    });
                });
            }
            return;
        }).catch();
    }
};

/**
 * Get the setup function for the buttons.
 *
 * This is performed in an async function which ultimately returns the registration function as the
 * Tiny.AddOnManager.Add() function does not support async functions.
 *
 * @returns {function} The registration function to call within the Plugin.add function.
 */
export const getSetup = async () => {
    const [
        inosearchButtonNameTitle,
        buttonImage,
    ] = await Promise.all([
        getString('button_inosearch', component),
        getButtonImage('icon', component),
    ]);

    return (editor) => {
        // Register the Moodle SVG as an icon suitable for use as a TinyMCE toolbar button.
        editor.ui.registry.addIcon(icon, buttonImage.html);

        // Register the inosearch Toolbar Button.
        editor.ui.registry.addButton(inosearchButtonName, {
            icon,
            tooltip: inosearchButtonNameTitle,
            onAction: () => makeInoSearch(editor),
        });
    };
};
