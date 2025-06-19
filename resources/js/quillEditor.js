window.quillEditorComponent = function (entangledContent) {
    return {
        quill: null,
        content: entangledContent, 
        init() {
            this.quill = new Quill(this.$refs.quillEditor, {
                theme: 'snow',
                placeholder: 'Tulis deskripsi produk...',
                modules: {
                    toolbar: [
                        [{ 'font': ['ibm', 'serif', 'monospace'] }], 
                        [{ 'size': ['small', false, 'large', 'huge'] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                        ['link'],
                        ['clean']
                    ]
                },
                formats: [
                    'font', 'size', 'bold', 'italic', 'underline',
                    'list', 'link'
                ]
            });


            this.quill.root.innerHTML = this.content;

            this.quill.on('text-change', () => {
                this.content = this.quill.root.innerHTML;
            });
        }
    };
};
