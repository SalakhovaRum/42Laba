ClassicEditor
    .create(document.querySelector('#editor'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                { model: 'hearding1', view: 'h1', title: 'Hearding 1', class: 'ck-heading_heading1'},
                { model: 'hearding2', view: 'h2', title: 'Hearding 2', class: 'ck-heading_heading2'},
            ]
        }
    } )
    .catch(error => {
        console.log(error);
    })