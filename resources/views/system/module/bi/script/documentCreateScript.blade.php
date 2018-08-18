<script>
    var createDocumentForm = $("#createDocument");

    $(document).ready(function () {
        tinymce.init({
            selector:'#documentContent',
        });

        $("#submitCreateDocumentForm").click(function () {
            // alert('xxxx');
            // createDocumentForm.submit();
        });

    })
    // ClassicEditor
    //     .create( document.querySelector( '#documentContent' ) )
    //     .then( editor => {
    //         console.log( editor );
    //     } )
    //     .catch( error => {
    //         console.error( error );
    //     } );

</script>