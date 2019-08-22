@extends('admin.layout')

@section('title', 'Comments')

@section('content')
<!--content ==================== -->
<div class="card mb-3 container-fluid" id="table_comment">
    <div class="tableComment">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">User</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @if(count($comments)==0)
                    <tr>
                        <td>Empty data!</td>
                    </tr>
                @else
                    @foreach ($comments as $comment)
                        <tr id="comment_id_{{$comment->id}}">
                            <th scope="row">{{$comment->id}}</th>
                            <td>{{$comment->sanpham->name}}</td>
                            <td>{{$comment->user->name}}</td>
                            <td>{{$comment->content}}</td>
                            <td>
                                <button type="button" onclick="deleteComment({{$comment->id}})" class="btn btn-primary fas fa-trash-alt"></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection