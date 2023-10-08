@extends('admin.layout')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic form</h4>
            {{-- <p class="card-description"> THêm danh mục </p> --}}
            <div class="card-header">Thêm Danh Mục</div>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="cart-body">
                @if(Session('status'))
                <div class="aler aler-success" role="alert">
                    {{Session('status')}}
                </div>
                @endif
            </div>

            <form class="forms-sample" action="{{ route('admin.products.store') }}" method="post">
                {{ csrf_field() }}
               

                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">desc</label>
                    <input type="text" name="desc" value=""  class="form-control" id="exampleInputEmail3" placeholder="Email">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail3">img</label>
                    <input type="text" name="img" value=""  class="form-control" id="exampleInputEmail3" placeholder="them ảnh">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">price</label>
                    <input type="text" name="price" value=""  class="form-control" id="exampleInputEmail3" placeholder="price">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">category</label>
                    <input type="text" name="category" value=""  class="form-control" id="exampleInputEmail3" placeholder="category">
                </div>

                
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection