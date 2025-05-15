@extends('home')

@section('content')

  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa danh mục</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('danhmuc.update',[$danhmuc->id]) }} " enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" name="title" value="{{ $danhmuc->title  }}" class="form-control" id="exampleInputEmail1" placeholder="nhập tiêu đề">

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả</label>
                    <input type="text" name="description" value="{{ $danhmuc->description }}" class="form-control" id="exampleInputPassword1" placeholder="mô tả">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File ảnh</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="form-control-file " id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        
                      </div>
                    <img height="240" width="240" src="{{ asset('uploads/danhmuc/' . $danhmuc->image) }}">
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" value="1" {{ $danhmuc->status==1? 'checked' : '' }} name="status" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">trạng thái</label>
{{-- 
                          <select name="status" class="form-control">
                          <option value="1"></option>
                          <option value="0"></option>
                          </select> --}}
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">SỬA</button>
                </div>
              </form>
            </div>
@endsection
