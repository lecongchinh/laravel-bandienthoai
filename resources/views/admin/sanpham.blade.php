@extends('admin.layout')

@section('title', 'Sản phẩm')

@section('content')
<!-- Modal add -->
<div class="modal fade addModalSanpham" id="addModalSanpham"  tabindex="-1" role="dialog" aria-labelledby="addModalLabelSanpham" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="formAddSanpham" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabelSanpham">Add New Sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_hangsx">ID Hãng Sx</label>
                        <select class="form-control id_hangsx" name="idHangsx">
                            @foreach($hangsxs as $hangsx)
                                <option value="{{$hangsx->id}}">{{$hangsx->id}} - {{$hangsx->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" accept="image/*" class="form-control image">
                        <div class="alert alert-danger show_error_image" style="display:none">
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control price" placeholder="Giá">
                        <div class="alert alert-danger show_error_price" style="display:none">
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control name" placeholder="Tên">
                        <div class="alert alert-danger show_error_name" style="display:none">
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tomtat">Tóm tắt</label>
                        <input type="text" name="tomtat" class="form-control tomtat" placeholder="Tóm tắt">
                        <div class="alert alert-danger show_error_tomtat" style="display:none">
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" name="content" class="form-control content" placeholder="Nội dung">
                        <div class="alert alert-danger show_error_content" style="display:none">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    <button type="button" onclick="addNewSanpham()" class="btn btn-primary addNewSanpham">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEditSanpham" tabindex="-1" role="dialog" aria-labelledby="modalEditSanphamLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditSanphamLabel">Sửa hãng sản xuất: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditSanpham" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" name="id" class="form-control id" disabled>
                    </div>
                    <div class="form-group">
                        <label for="id_hangsx">ID Hãng sản xuất</label>
                        <select class="form-control idHangsx" name="idHangsx">
                            @foreach($hangsxs as $hangsx)
                                <option value="{{$hangsx->id}}">{{$hangsx->id}} - {{$hangsx->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img>
                        <input type="file" name="image" accept="image/*" class="form-control image">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control price" placeholder="Giá">
                        <div class="alert alert-danger show_error_price" style="display:none">
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control name" placeholder="Tên">
                        <div class="alert alert-danger show_error_name" style="display:none">
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tomtat">Tóm tắt</label>
                        <input type="text" name="tomtat" class="form-control tomtat" placeholder="Tóm tắt">
                        <div class="alert alert-danger show_error_tomtat" style="display:none">
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" name="content" class="form-control content" placeholder="Nội dung">
                        <div class="alert alert-danger show_error_content" style="display:none">
                            <p></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" onclick="editSanpham()" class="btn btn-primary saveEditSanpham">Lưu</button>
            </div>
      </div>
    </div>
</div>

<!--content ==================== -->
<div class="card mb-3 container-fluid" id="table_sanpham">
    <div>
        <button type="button" class="btn btn-primary float-right" id="showModalAddSanpham" data-toggle="modal" data-target="#addModalSanpham">ADD</button>
    </div>
    <div class="tableSanpham">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Hãng Sx</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Name</th>
                    <th scope="col">Tóm tắt</th>
                    <th scope="col">Content</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @if(count($sanphams)==0)
                    <tr>
                        <td>Empty data!</td>
                    </tr>
                @else
                    @foreach ($sanphams as $sanpham)
                        <tr id="sanpham_id_{{$sanpham->id}}">
                            <th scope="row">{{$sanpham->id}}</th>
                            <td>{{$sanpham->hang_sx->name}}</td>
                            <td>
                                <div>
                                    <img src="/images/sanpham/{{$sanpham->image}}" style="">
                                    <hr/>
                                    <span>{{$sanpham->image}}</span>
                                </div>
                            </td>
                            <td>{{$sanpham->price}}</td>
                            <td>{{$sanpham->name}}</td>
                            <td>{{$sanpham->tom_tat}}</td>
                            <td>{{$sanpham->content}}</td>
                            <td>
                                <button type="button" data-id="{{$sanpham->id}}" class="btn btn-primary fas fa-edit setValueModalEditSanpham" data-toggle="modal" data-target="#modalEditSanpham"></button>
                            </td>
                            <td>
                                <button type="button" onclick="deleteSanpham({{$sanpham->id}})" class="btn btn-primary fas fa-trash-alt"></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection