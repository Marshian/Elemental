/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here.
    // For the complete reference:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config
    config.skin = 'flat';
    config.height = 500;
    config.contentsCss = '/css/app.css';
    config.extraPlugins = 'showprotected';

    // The toolbar groups arrangement, optimized for two toolbar rows.
    config.toolbarGroups = [
        {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
        {name: 'links'},
        {name: 'insert'},
        {name: 'document', groups: ['mode', 'document', 'doctools']},
        //'/',
        {name: 'paragraph', groups: ['list', 'align']},
        {name: 'tools'},
        {name: 'styles'}
    ];

    config.filebrowserImageBrowseUrl = '/admin/filemanager?type=images';
    config.filebrowserBrowseUrl = '/admin/filemanager?type=files';

    // Remove some buttons, provided by the standard plugins, which we don't
    // need to have in the Standard(s) toolbar.
    config.removeButtons = 'Underline,Subscript,Superscript,Anchor';
    config.allowedContent = true;
    // Se the most common block elements.
    config.format_tags = 'p;h1;h2;h3;h4;h5;h6;pre';

    // Make dialogs simpler.
    config.removeDialogTabs = 'image:advanced;link:advanced';

    // Protect Blade tags
    config.protectedSource.push(/{{[\s\S]*?}}/g);
    config.protectedSource.push(/@[\s\S]*?\([\s\S]*?\)/g);
    config.protectedSource.push(/{!![\s\S]*?!!}/g);
    config.protectedSource.push(/\[[\s\S]*?\]/g);
    config.protectedSource.push(/<\?[\s\S]*?\?>/g); // PHP

    // Allow Empty i tags for font icons
    config.protectedSource.push(/<i[\s\S]*?\>/g); //allows beginning <i> tag
    config.protectedSource.push(/<\/i[\s\S]*?\>/g); //allows ending </i> tag

};