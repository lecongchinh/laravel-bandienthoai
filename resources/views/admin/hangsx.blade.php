@extends('admin.layout')

@section('title', 'Table Hang SX')

@section('content')

    <!-- Modal add -->
    <div class="modal fade addModalHangsx" id="addModalHangsx"  tabindex="-1" role="dialog" aria-labelledby="addModalLabelHangsx" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="formAddHangsx" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabelHangsx">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control name" placeholder="Tên hãng sản xuất">
                            <div class="alert alert-danger" style="display:none">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <button type="button" onclick="addNewHangsx()" class="btn btn-primary addNewHangsx">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEditHangsx" tabindex="-1" role="dialog" aria-labelledby="modalEditHangsxLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditHangsxLabel">Sửa hãng sản xuất: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="formEditHangsx" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="recipient-id" class="col-form-label">ID:</label>
                            <input type="text" disabled name="id" class="form-control idHangsx" id="recipient-id">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên hãng:</label>
                            <input type="text" name="name" class="form-control tenHangsx" id="recipient-name">
                            <div class="alert alert-danger show_error" style="display:none">
                                <p></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" onclick="editHangsx()" class="btn btn-primary saveEditHangsx">Lưu lại</button>
                </div>
          </div>
        </div>
    </div>

    <!--content ==================== -->
    <div class="card mb-3 container-fluid" id="table_hangsx">
        <div>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModalHangsx">ADD</button>
        </div>
        <div class="tableHangsx">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EDIT</th>
                        <th scope="col">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($hangsxs)==0)
                        <tr>
                            <td>Empty data!</td>
                        </tr>
                    @else
                        @foreach ($hangsxs as $hangsx)
                            <tr id="hangsx_id_{{$hangsx->id}}">
                                <th scope="row">{{$hangsx->id}}</th>
                                <td>{{$hangsx->name}}</td>
                                <td>
                                    <button type="button" onclick="setValueModalEditHangsx({{$hangsx->id}}, '{{$hangsx->name}}')" class="btn btn-primary fas fa-edit editHangsx" data-toggle="modal" data-target="#modalEditHangsx"></button>
                                </td>
                                <td>
                                    <button type="button" onclick="deleteHangsx({{$hangsx->id}})" class="btn btn-primary fas fa-trash-alt deleteHangsx"></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection