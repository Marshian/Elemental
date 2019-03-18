/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config
    config.height = 500;
    config.contentsCss = ['/frontend/css/style.css','/frontend/css/bootstrap.css','/frontend/css/all.css'];
    // config.extraPlugins = 'showprotected';
    config.uploadUrl = '/uploader/upload.php';
	// The toolbar groups arrangement, optimized for two toolbar rows.
	// config.toolbarGroups = [
	// 	{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
	// 	{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
	// 	{ name: 'links' },
	// 	{ name: 'insert' },
	// 	{ name: 'forms' },
	// 	{ name: 'tools' },
	// 	{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
	// 	{ name: 'others' },
	// 	'/',
	// 	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	// 	{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
	// 	{ name: 'styles' },
	// 	{ name: 'colors' },
	// 	{ name: 'about' }
	// ];
    //
	// // Remove some buttons provided by the standard plugins, which are
	// // not needed in the Standard(s) toolbar.
	// config.removeButtons = 'Underline,Subscript,Superscript';
    //
	// // Set the most common block elements.
	// config.format_tags = 'p;h1;h2;h3;pre';
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

    // See the most common block elements.
    config.format_tags = 'p;h1;h2;h3;h4;h5;h6;pre';

    // Protect Blade tags
    // config.protectedSource.push(/{{[\s\S]*?}}/g);
    // config.protectedSource.push(/@[\s\S]*?\([\s\S]*?\)/g);
    // config.protectedSource.push(/{!![\s\S]*?!!}/g);
    // config.protectedSource.push(/\[[\s\S]*?\]/g);
    // config.protectedSource.push(/<\?[\s\S]*?\?>/g); // PHP
    //
    // // Allow Empty i tags for font icons
    // config.protectedSource.push(/<i[\s\S]*?\>/g); //allows beginning <i> tag
    // config.protectedSource.push(/<\/i[\s\S]*?\>/g); //allows ending </i> tag

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
};
