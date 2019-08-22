    function addNewHangsx() {
        let name = $('.addModalHangsx .name').val();
        console.log(name);

        $.ajax({
            type:"POST",
            url: "/admin/table/hangsx",
            data: {'name':name},
            dataType: 'json',
            success: function(data) {
                $('#addModalHangsx').modal('hide');
                console.log(data);
                // $('#table_hangsx .table').load('#table_hangsx .table');
                $("#table_hangsx .tableHangsx").load("#table_hangsx table");
                $('.addModalHangsx input').val("");
                $.notify("Add completed !", "success");
                $('.formAddHangsx .alert-danger').hide();
            },
            error: function(data) {
                console.log(data['responseJSON']['errors']['name'][0]);
                let error = data['responseJSON']['errors']['name'][0];
                $('.formAddHangsx .alert-danger p').text(error);
                $('.formAddHangsx .alert-danger p').css('margin-bottom', '0');
                $('.formAddHangsx .alert-danger').show();
            }
        })
    };

    //Delete
    function deleteHangsx(id) {
        console.log('123');
        let conf = confirm('Bạn có chắc chắn muốn xóa ?');

        if (conf == true) {
            $.ajax({
                type: "DELETE",
                url: "/admin/table/hangsx/" + id,
                dataType: 'json',
                success: function() {
                    $('#hangsx_id_' + id).remove();
                    $.notify("Delete completed !", "success");
                }, 
                error: function() {
                    $.notify("Delete failed !", "error");
                }
            })
        }
    };

    function setValueModalEditHangsx(id, name) {
        $('#modalEditHangsx .tenHangsx').val(name);
        $('#modalEditHangsx .idHangsx').val(id);
        $('.formEditHangsx .alert-danger').hide();
    }
    function editHangsx() {
        let id = $('#modalEditHangsx .idHangsx').val();
        console.log(id);
        $.ajax({
            type: "PUT",
            url: "/admin/table/hangsx/" + id,
            dataType: "json",
            data: $('.formEditHangsx').serialize(),
            success: function(data) {
                $('#table_hangsx .tableHangsx').load('#table_hangsx table');
                $('#modalEditHangsx').modal('hide');
                $.notify("Edit completed !", "success");
                
            },
            error: function(data) {
                console.log(data['responseJSON']['errors']['name'][0]);
                let error = data['responseJSON']['errors']['name'][0];
                $('.formEditHangsx .alert-danger p').text(error);
                $('.formEditHangsx .alert-danger p').css('margin-bottom', '0');
                $('.formEditHangsx .alert-danger').show();
            }
        })
    }

    //Sanpham========================================

    // function showModalAddSanpham() {
    //     $('.addModalSanpham select').find('option').remove();
    //     $.ajax({
    //         type: 'GET',
    //         url: '/admin/table/hangsxs/id',
    //         dataType: 'json',
    //         success: function(data) {
    //             $(data).each(function(index) {
    //                 console.log("aaa " + data[index]['id']);
    //                 $('.addModalSanpham select').append(new Option(data[index]['id'] + " - " + data[index]['name'] , data[index]['id']));
    //             })
    //         }
    //     })
    // }

    function addNewSanpham() {
        let myForm = document.getElementById('formAddSanpham');
        let formData = new FormData(myForm);
        console.log(formData);
        $.ajax({
            type: "POST",
            dataType: 'JSON',
            url: '/admin/table/sanpham',
            data:  formData,
            cache: false,
            processData: false,
            contentType : false,

            success: function() {
                $('#addModalSanpham').modal('hide');
                $('#addModalSanpham #formAddSanpham').trigger('reset');
                $('#table_sanpham .tableSanpham').load('#table_sanpham table');
                $.notify("Add completed !", "success");
                $('#formAddSanpham .alert-danger').hide();
            },
            error: function(data) {
                $('#formAddSanpham .alert-danger').hide();
                console.log(data['responseJSON']['errors']);
                let error = data['responseJSON']['errors'];
                $.each(error,function(index, element) {
                    console.log('#formAddSanpham .show_error_' + index + ' p');
                    $('#formAddSanpham .show_error_' + index + ' p').text(element);
                    $('#formAddSanpham .show_error_' + index + ' p').css('margin-bottom', '0');
                    $('#formAddSanpham .show_error_' + index).show();
                })
            }

        })
    }

    function deleteSanpham(id) {
        let conf = confirm('Bạn có chắc chắn muốn xóa?');
        if (conf == true) {
            $.ajax({
                type: "DELETE",
                url: '/admin/table/sanpham/' + id,
                success: function() {
                    $('#table_sanpham .tableSanpham').load('#table_sanpham table');
                    $.notify("Delete completed !", "success");
                },
                error: function() {
                    $.notify("Delete failed !", "error");
                }
            })
        }
    }
    //set value of modal edit sanpham ========
    $('body').on('click', '.setValueModalEditSanpham', function() {
        let idSanpham = $(this).data('id');
        $.get('/admin/table/sanpham/' + idSanpham + '/edit', function(data) {
            $('#formEditSanpham .id').val(data.id);
            $('#formEditSanpham .price').val(data.price);
            $('#formEditSanpham .name').val(data.name);
            $('#formEditSanpham .tomtat').val(data.tom_tat);
            $('#formEditSanpham .content').val(data.content);
            $('#formEditSanpham .idHangsx').val(data.hang_sx_id);
            $('#formEditSanpham img').attr('src', '/images/sanpham/' + data.image);
            $('#formEditSanpham .alert-danger').hide();
        });
    });

    function editSanpham() {
        let id =  $('#formEditSanpham .id').val();

        let formEdit = document.getElementById('formEditSanpham');
        let form = new FormData(formEdit);
        console.log(form);
        $.ajax({
            method: 'post',
            dataType: 'json',
            url: '/admin/table/sanpham/' + id,
            data: form,
            cache: false,
            processData: false,
            contentType : false,
            success: function() {
                $('#table_sanpham .tableSanpham').load('#table_sanpham table');
                $('#modalEditSanpham').modal('hide');
                $.notify("Edit completed !", "success");
                $('#modalEditSanpham #formEditSanpham').trigger('reset');
                $('#formEditSanpham .alert-danger').hide();
            },
            error: function(data) {
                $('#formEditSanpham .alert-danger').hide();
                console.log(data['responseJSON']['errors']);
                let error = data['responseJSON']['errors'];
                $.each(error,function(index, element) {
                    console.log('#formEditSanpham .show_error_' + index + ' p');
                    $('#formEditSanpham .show_error_' + index + ' p').text(element);
                    $('#formEditSanpham .show_error_' + index + ' p').css('margin-bottom', '0');
                    $('#formEditSanpham .show_error_' + index).show();
                })
            }
        })
    }

    //Comment========================================

    function deleteComment(id) {

        let conf = confirm('Bạn có chắc chắn muốn xóa?');

        if (conf==true) {
            $.ajax({
                type: "DELETE",
                url: '/admin/table/comment/' + id,
                success: function() {
                    $('#table_comment .tableComment').load('#table_comment table');
                    $.notify("Delete completed !", "success");
                },
                error: function() {
                    $.notify("Delete failed !", "error");
                }
            })
        }
    }

    //user ==========

    function deleteUser(id) {
        let conf = confirm('Bạn có chắc chắn muốn xóa?');
        if (conf == true) {
            $.ajax({
                type: 'Delete',
                url: '/admin/table/user/' + id,
                success: function() {
                    $('#table_user .tableUser').load('#table_user table');
                    $.notify("Delete completed !", "success");
                },
                error: function() {
                    $.notify("Delete failed !", "error");
                }
            })
        }
    }