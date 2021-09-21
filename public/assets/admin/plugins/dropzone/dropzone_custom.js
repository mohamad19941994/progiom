$(document).ready(function () {
    Dropzone.autoDiscover = false;
    var uploadeUrl = $('#product').attr('action');
    var getUrl = $('#product').attr('getOld');
    var pathFiles = $('#product').attr('path');
    var product_id = $('#product').attr('Fid');
    var nemo = $('#product').attr('status');
     alert(uploadeUrl);
    $('#product').dropzone({
        maxFiles: 50,
        url: uploadeUrl,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        totaluploadprogress: true,
        uploadMultiple: true,
        parallelUploads: 1,
        params: {'product_id': product_id},
        addRemoveLinks: true,
        paramName: 'images',
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        dictDefaultMessage: "قم بالضغط لرفع الصور او قم بسحبها هنا",

        success: function (file, response) {
            file.previewElement.classList.add("dz-success");
            file.previewTemplate.name = response;
            var fileuploded = file.previewElement.querySelector("[data-dz-name]");
            fileuploded.innerHTML = response;
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        },
        init: function () {
            thisDropzone2 = this;
            $.get(getUrl, function (data) {
                console.log(data.product);
                // $images=data.product;
                if (data.product != '') {
                    $.each(data.product, function (key, value) {
                        var mockFile = {name: value.name, size: value.size};
                        thisDropzone2.emit("addedfile", mockFile);
                        thisDropzone2.options.thumbnail.call(thisDropzone2, mockFile, pathFiles + value.name);
                        thisDropzone2.emit("complete", mockFile);
                    });
                }


            });
        }, removedfile: function (file) {
            if (nemo == 'add') {
                var name = file.previewTemplate.name;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/removePic',
                    data: {'name': name},
                    dataType: 'json'
                });
            }
            else {
                var name = file.name;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/removePic',
                    data: {'name': name, 'product_id': product_id},
                    dataType: 'json'
                });
            }


            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        }

    });
    $("#product").sortable({
        items: '.dz-preview',
        cursor: 'move',
        opacity: 0.5,
        containment: '#product',
        distance: 20,
        tolerance: 'pointer',
        stop: function () {
            var order = [];
            $('.dz-filename span').each(function () {
                order.push($(this).text());
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/orderZone',
                data: {'order': order, 'product_id': product_id},
                dataType: 'json'
            });
        }
    });

});
