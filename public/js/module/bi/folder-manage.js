var $ = jQuery.noConflict();


$(document).ready(function () {

    var ajaxContent = $(".folder-content");

    /** Clear selected folder id in local storage **/
    // localStorage.removeItem("currentSelectedFolderId");

    /** Double click to open folder on grid **/
    $(document).on("dblclick", ".bi-table-item.type-folder", function (e) {
        var _this = $(this);
        var stateUrl = "/bi/folder/view?FolderId=" + _this.attr("folder_id");
        localStorage.setItem("currentSelectedFolderId", _this.attr("folder_id"));
        var treeElement = $('li[folder_id="'+ _this.attr("folder_id") + '"]');
        $("#folderTree").jstree("open_all");
        $("#folderTree").jstree("deselect_all",true);
        $('#folderTree').jstree('select_node', treeElement.attr("id"));
        window.location.href = stateUrl;
    });
    /** Double click to open document on grid **/
    $(document).on("dblclick", ".bi-table-item.type-document", function (e) {
        var _this = $(this);
        var url = "/bi/document/view?DocumentId=" + _this.attr("document_id");
        window.location.href = url;
    });
    /** Add new attached file **/
    var attachedFileInputCount = 0;
    $(document).on("click", "#bi-addFile", function (e) {
        e.preventDefault();
        var fileContainer = $(".attachedFiles");
        if (attachedFileInputCount >= 5) {
            alert('Tối đa 5 file đính kèm');
        } else {
            var html = '<div class="attachedFileWrapper"><div class="col-sm-11" style="padding: 0px"><input  class="form-control input-md attachedFileInput" type="file" name="AttachedFiles[]"></div>';
            html = html + '<div class="col-sm-1"><a id="bi-removeAttachedFileInput" class="toolbar-btn action-on-header" href=""><i class="fa fa-times-circle"></i></a></div></div>';
            fileContainer.append(html);
            attachedFileInputCount++;
        }
    });

    /** Remove selected attached input file **/
    $(document).on("click", "#bi-removeAttachedFileInput", function (e) {
        e.preventDefault();
        var _this = $(this);
        _this.closest(".attachedFileWrapper").remove();
        attachedFileInputCount--;
    });

    /** Create new folder button click **/
    $(document).on("click", "#bi-createFolder", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var stateUrl = '/bi/folder/create/index' + '?FolderParentID=' + selectedFolderId;
        window.location.href = stateUrl;
    });
    /** Create new document button click **/
    $(document).on("click", "#bi-createDocument", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var stateUrl = '/bi/document/create/index' + '?FolderParentID=' + selectedFolderId;
        window.location.href = stateUrl;
    });
    /** Rename folder **/
    $(document).on("click", "#bi-renameFolder", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var stateUrl = '/bi/folder/rename/index?SelectedFolderId=' + selectedFolderId;
        window.location.href = stateUrl;
    });
    /** Delete folder **/
    $(document).on("click", "#bi-deleteFolder", function (e) {
        e.preventDefault();
        var selectedFolderId = localStorage.getItem("currentSelectedFolderId");
        var url = '/bi/folder/delete/execute?SelectedFolderId=' + selectedFolderId;

        $.ajax({
            url: url,
            type: "get",
            dataType: "text",
            success: function (result) {
                $(location).attr('href', '/bi')
            }
        });
    });

    /** Submit document create form **/
    $(document).on("click", "#submitCreateDocumentForm", function (e) {
        e.preventDefault();
        var documentCreateForm = $("#processDocument");
        console.log(documentCreateForm);
        documentCreateForm.submit();
    });
    /** Submit document create form **/
    $(document).on("click", "#bi-selectRelatedDocument", function (e) {
        e.preventDefault();
        var allInputs = $(".relatedDocumentIds input:checked");
        var createDocumentForm = $("#processDocument");

        $(".hidden-relatedDocumentId").each(function () {
            $(this).remove();
        });

        allInputs.each(function () {
            createDocumentForm.append("<input class='hidden-relatedDocumentId' name='relatedDocumentIds[]' type='hidden' value='"+ $(this).val() +"'>");
        });
    });


    /** Init Folder Tree **/
    $('#folderTree').jstree({
        'core': {
            'multiple': false,
        }
    });


    /** Expand all on load **/
    $("#folderTree").jstree("open_all");

    /** Detect folder selected event on Folder Tree **/
    $('#folderTree')
    // listen for event
        .on('changed.jstree', function (e, data) {
            var selectedFolderId = data.node.li_attr.folder_id;
            localStorage.setItem("currentSelectedFolderId", selectedFolderId);
            var url = "/bi/folder/view?FolderId=" + selectedFolderId;
            window.location.href = url;
            // viewFolderAjax(secretUrl);
        })
        .jstree();
});