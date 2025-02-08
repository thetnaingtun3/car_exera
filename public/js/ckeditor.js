function initializeCKEditor(selector, livewireProperty) {
    ClassicEditor.create(document.querySelector(selector), {
        toolbar: [
            "bold",
            "italic",
            "link",
            "bulletedList",
            "numberedList",
            "blockQuote",
        ],
    })
        .then((editor) => {
            editor.model.document.on("change:data", () => {
                window.livewire.emit(
                    "updateCKEditorData",
                    livewireProperty,
                    editor.getData()
                );
            });
        })
        .catch((error) => {
            console.error(error);
        });
}
