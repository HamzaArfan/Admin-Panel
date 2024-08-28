import {
    ClassicEditor, Autoformat, AutoImage, Autosave,Bold,Essentials,FontColor,
    FontFamily,Heading,ImageBlock,ImageCaption,ImageInline,ImageInsertViaUrl,
    ImageResize,ImageStyle,ImageTextAlternative,ImageToolbar,ImageUpload,
    Italic, List,Paragraph,SelectAll,TextTransformation,Underline,Undo
} from 'ckeditor5';
const editors = {};
//Editor for taking the heading as input
const editorConfig = {
    toolbar: {
        items: [
            'undo','redo','|','selectAll','|','heading','|','fontFamily','fontColor','|','bold','italic','underline','|',
        ],
        shouldNotGroupWhenFull: false
    },
    plugins: [
        Autoformat,Bold,Essentials,FontColor,FontFamily,Heading,Italic,Paragraph,SelectAll,TextTransformation,Underline,Undo
    ],
    fontFamily: {
        supportAllValues: true
    },
    heading: {
        options: [
            {
                model: 'paragraph',
                title: 'Paragraph',
                class: 'ck-heading_paragraph'
            },
            {
                model: 'heading1',
                view: 'h1',
                title: 'Heading 1',
                class: 'ck-heading_heading1'
            },
            {
                model: 'heading2',
                view: 'h2',
                title: 'Heading 2',
                class: 'ck-heading_heading2'
            },
            {
                model: 'heading3',
                view: 'h3',
                title: 'Heading 3',
                class: 'ck-heading_heading3'
            },
            {
                model: 'heading4',
                view: 'h4',
                title: 'Heading 4',
                class: 'ck-heading_heading4'
            },
            {
                model: 'heading5',
                view: 'h5',
                title: 'Heading 5',
                class: 'ck-heading_heading5'
            },
            {
                model: 'heading6',
                view: 'h6',
                title: 'Heading 6',
                class: 'ck-heading_heading6'
            }
        ]
    },
    placeholder: 'Type or paste your content here!'
};
ClassicEditor
    .create(document.querySelector('#editor'), editorConfig)
    .then(editor => {
            editors.editor1= editor;
            });
//Editor for the image
const editorConfig2 = {
        toolbar: {
            items: [
                'undo','redo','|','insertImageViaUrl',
            ],
            shouldNotGroupWhenFull: false
        },
        plugins: [
            Autoformat,AutoImage,Autosave,ImageBlock,ImageCaption,ImageInline,ImageInsertViaUrl,ImageResize,ImageStyle,ImageTextAlternative,ImageToolbar,ImageUpload,Undo
        ],
        image: {
            toolbar: [
                'toggleImageCaption','imageTextAlternative','|','imageStyle:inline','imageStyle:wrapText','imageStyle:breakText','|','resizeImage'
            ]
        },
        menuBar: {
            isVisible: true
        },
};
    ClassicEditor
        .create(document.querySelector('#editor1'), editorConfig2)
        .then(editor => {
        editors.editor2=editor;
         });
//editor for fetching the description
 const editorConfig3 = {
        toolbar: {
            items: [ 
            'undo', 'redo','|', 'selectAll','|', 'fontFamily', 'fontColor', '|', 'bold', 'italic', 'underline','|', 'bulletedList', 'numberedList', '|',
            
           ],
            shouldNotGroupWhenFull: false
        },
        plugins: [

            Autoformat,Bold,Essentials,FontColor,FontFamily,Italic,List,Paragraph,SelectAll,TextTransformation,Underline,Undo
        ],
        fontFamily: {
            supportAllValues: true
        },
        placeholder: 'Type or paste your content here!'
    };
    ClassicEditor
        .create(document.querySelector('#editor3'), editorConfig3)
        .then(editor => {
           editors.editor3=editor;
            });

    //Editor for the purposes of fetching the price detaiils
const editorConfig4 = {
    toolbar: {
        items: [
                'undo','redo', '|','selectAll', '|', 'fontFamily', '|',
                ],
                shouldNotGroupWhenFull: false
            },
            plugins: [ 
                 Autoformat,  Essentials,FontFamily, List, Paragraph, SelectAll,TextTransformation, Undo
            ],
            fontFamily: {
                supportAllValues: true
            },
            placeholder: 'Type or paste your content here!'
        };
ClassicEditor
            .create(document.querySelector('#editor4'), editorConfig4)
            .then(editor => {
              editors.editor4=editor;
            });
            // Extracting all the contents off the editors when the submit button  in the mainForm was clicked.
            $('#mainForm').on('submit', function(event){
                event.preventDefault();
                //Storing the data in variables so we can send those in the post request
                const content1 = editors.editor1.getData();
                const content2 = editors.editor2.getData();
                const content3 = editors.editor3.getData();
                const content4 = editors.editor4.getData();
                //Displaying the data pn the console so we know we have correct data( only for debugging purposes)
                console.log(content1);
                console.log(content2);
                console.log(content3);
                console.log(content4);
                //Sending an ajax post request
                $.ajax({
                    url: 'Ck_plus_products.php',
                    type: 'POST',
                    data: {
                        content1: content1,
                        content2: content2,
                        content3: content3,
                        content4: content4
                    },
                    success: function(response) {
                        //Show the response when the data is sent succesfully
                        $('body').append(response);
                        window.location.href="ck_itemplus.php"
                    },
                    error: function() {
                        console.error('An error occurred while sending the GET request.');
                    }
                });
            });
            

            