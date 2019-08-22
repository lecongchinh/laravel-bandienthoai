@extends('auth.app')

@section('title', 'User setting')

@section('content')
<section class="user-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Setting</div>
                    <div class="card-body">
                        <form class="form-setting-user" method="POST">
                            @csrf
                            <input value="{{Auth::user()->id}}" hidden class="form-control id" name="id" type="text">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input value="{{Auth::user()->name}}" class="form-control name" name="name" type="text">
                            </div>
                            <div class="form-group">
                                <label for="Location">Location:</label>
                                <input value="" class="form-control location" name="location" type="text" placeholder="Location">
                            </div>
                            <div class="form-group">
                                <label for="province">Tỉnh/ Thành phố</label>
                                <select id="province" class="form-control province" name="province">
                                    <option value="">---Tỉnh/ Thành phố---</option>
                                    @foreach($province as $province)
                                        <option value="{{$province->provinceid}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district">Quận/ Huyện</label>
                                <select disabled id="district" class="form-control district" name="district">
                                    <option value="">----------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ward">Phường/ Xã</label>
                                <select disabled id="ward" class="form-control ward" name="ward">
                                    <option value="">----------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="village">Xóm/ Làng</label>
                                <select disabled id="village" class="form-control village" name="village">
                                    <option>----------</option>
                                </select>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary settingUser">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="container">
                    <div id="infor-user">
                        <div class="infor">
                            <h6>Information</h6>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Name: </td>
                                        <td>{{Auth::user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Role: </td>
                                        <td>{{Auth::user()->role}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td>{{Auth::user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address: </td>
                                        <td>{{Auth::user()->address}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection