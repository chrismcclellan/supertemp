
(function() {
    tinymce.create('tinymce.plugins.SupertempHighlighter', {

        init : function(ed, url) {

            ed.addCommand('highlighter', function() {
                var selected_text = ed.selection.getContent();
                var return_text = '';
                return_text = '[highlighter]' + selected_text.replace(/<\/?p[^>]*>/g, " ") + '[/highlighter]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addButton('highlighter-menu', {
                border : '1 1 1 1',
                text : '',
                tooltip : 'Highlighter',
                icon: true,
                image : '../wp-content/themes/supertemp/assets/images/shortcodes/highlighter-icon.png',
                size : 'small',
                cmd : 'highlighter'
            });
        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                    longname : 'Highlighter',
                    author : '',
                    authorurl : '',
                    infourl : '',
                    version : "0.0.1"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('supertemp_highlighter', tinymce.plugins.SupertempHighlighter);
})();
