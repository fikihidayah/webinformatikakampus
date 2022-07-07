function config_tinymce(element, cssFile) {
    var editor_config = {
        content_css: cssFile,
        content_style: "body{padding:30px}",
        path_absolute: "/",
        skin: "oxide-dark",
        selector: element,
        height: 500,
        relative_urls: false,
        plugins: [
            "advlist autolink autosave lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime nonbreaking save table directionality",
            "emoticons template paste textpattern fullscreen",
            "template imagetools",
        ],
        toolbar:
            "restoreedraft insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image fullscreen imagetools| code template spacing",
        template_preview_replace_values: {
            border: "border border-dark",
        },
        preview_styles: "body{padding:0 !important;}",
        contextmenu: "link image imagetools table",
        templates: [
            // {
            //     title: "6 Column",
            //     description: "Make column 6/12 relative in layout(bootstrap).",
            //     content: '<div class="col-md-6 {$border}">Write here...</div>',
            // },
            {
                title: "Title Mepet",
                description: "Membuat title dengan style mepet.",
                content: '<h5 class="title-mepet">Write here...</h5>',
            },
            {
                title: "Text Abu-abu",
                description:
                    "Membuat text dengan style text color warna abu-abu.",
                content:
                    ' <div class="gray-wrapper"><p>Write Text here...</p></div>',
            },
            {
                title: "Thubnail dengan Caption",
                description: "Membuat thumbnail gambar dengan caption.",
                content: `<div class="thumb-foto-wrapper float-start">
              <div class="thumb-foto"><img class="img-fluid" src="/web/assets/app/img/sambutan/okta.veza.jpg" alt="" />
              <div class="nama-kaprodi"><em>Okta Veza M.Kom</em></div>
              </div>
              </div>`,
            },
        ],
        setup: function (editor) {
            editor.ui.registry.addSplitButton("spacing", {
                // alert(tinymce.activeEditor.selection.getNode().nodeName);
                text: "Spacing",
                onAction: function (_) {},
                onItemAction: function (buttonApi, value) {
                    const thisel = tinymce.activeEditor.selection.getNode();
                    if (thisel.classList.contains(value)) {
                        thisel.classList.remove(value);
                    } else {
                        thisel.classList.add(value);
                    }
                },
                fetch: function (callback) {
                    var items = [
                        {
                            type: "choiceitem",
                            text: "Padding Left",
                            value: "ps-3",
                        },
                        {
                            type: "choiceitem",
                            text: "Padding Right",
                            value: "pe-3",
                        },
                        {
                            type: "choiceitem",
                            text: "Padding Bottom",
                            value: "pb-3",
                        },
                        {
                            type: "choiceitem",
                            text: "Padding Top",
                            value: "pt-3",
                        },
                    ];
                    callback(items);
                },
            });
        },
        file_picker_callback: function (callback, value, meta) {
            var x =
                window.innerWidth ||
                document.documentElement.clientWidth ||
                document.getElementsByTagName("body")[0].clientWidth;
            var y =
                window.innerHeight ||
                document.documentElement.clientHeight ||
                document.getElementsByTagName("body")[0].clientHeight;

            var cmsURL =
                editor_config.path_absolute +
                "laravel-filemanager?editor=" +
                meta.fieldname;
            if (meta.filetype == "image") {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: "Filemanager",
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                },
            });
        },
    };
    return editor_config;
}
