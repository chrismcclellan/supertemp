
(function() {
    tinymce.create('tinymce.plugins.SupertempPullquotes', {

        init : function(ed, url) {

            // Left-Aligned Pullquote
            ed.addCommand('pullquote-left', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[pullquote align="left" cite="" cite_link="" class="" size="default"]' + selected_text.replace(/<\/?p[^>]*>/g, " ") + '[/pullquote]<br/><br/>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            // Right-Aligned Pullquote
            ed.addCommand('pullquote-right', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[pullquote align="right" cite="" cite_link="" class="" size="default"]' + selected_text.replace(/<\/?p[^>]*>/g, " ") + '[/pullquote]<br/><br/>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            // Right-Aligned Pullquote
            ed.addCommand('pullquote-full', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[pullquote align="full" cite="" link="" class="" size="default"]' + selected_text.replace(/<\/?p[^>]*>/g, " ") + '[/pullquote]<br/><br/>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            // Pullquote Menu Button http://www.tinymce.com/wiki.php/api4:class.tinymce.ui.MenuButton
            ed.addButton('pullquote-menu', {
                type : 'menubutton',
                border : '1 1 1 1',
                text : '',
                tooltip : 'Pullquotes',
                icon: true,
                image : '../wp-content/themes/supertemp/assets/images/shortcodes/pullquote-icon.png',
                size : 'small',
                menu : [
                    {text: 'Left Aligned', onclick: function() {ed.execCommand('pullquote-left'); }},
                    {text: 'Right Aligned', onclick: function() {ed.execCommand('pullquote-right'); }},
                    {text: 'Full-Width', onclick: function() {ed.execCommand('pullquote-full'); }}
                ]
            });
        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                    longname : 'Pullquotes',
                    author : '',
                    authorurl : '',
                    infourl : '',
                    version : "0.0.1"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('supertemp_pullquotes', tinymce.plugins.SupertempPullquotes);
})();
