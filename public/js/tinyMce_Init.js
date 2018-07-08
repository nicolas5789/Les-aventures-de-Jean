tinymce.init({
    selector: "textarea.tiny",
    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    }
});
if($this.is('[required]')){
            options.oninit = function(editor){
                $this.closest('form').bind('submit, invalid', function(){
                    editor.save();
                });
            }
        }