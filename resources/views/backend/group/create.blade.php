@extends('backend.layouts.master')
@section('title','Ecommerce Laravel || Brand Create')
@section('main-content')

<div class="card">
    <h5 class="card-header">Add Group</h5>
    <div class="card-body">
      <form method="post" action="{{route('group.store')}}" id="myForm"  >
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Name En <span class="text-danger">*</span></label>
        <input id="name_en" type="text" name="name_en" placeholder="Enter Name En"  value="{{old('title')}}" class="form-control">
            <span class="text-danger" id="span_hide_en" >Name Validation</span>
        </div>

          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Name Th <span class="text-danger">*</span></label>
              <input id="name_th" type="text" name="name_th"  placeholder="Enter Name Th"  value="{{old('title')}}" class="form-control">
              @error('title')
              <span class="text-danger">{{$message}}</span>
              @enderror

              <span class="text-danger" id="span_hide" >Name Validation</span>
          </div>

          <div class="form-group">
              <label for="inputPhoto" class="col-form-label">Photo</label>
              <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
                  <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
              </div>
              <div id="holder" style="margin-top:15px;max-height:100px;"></div>

              <span class="text-danger" id="span_hide_image" >Name Validation</span>
          </div>


        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control" id="status">
              <option value="Y">Active</option>
              <option value="N">Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="button"  id="validateButton">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')





@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#span_hide').hide();
    $('#span_hide_en').hide();
    $('#span_hide_image').hide();

    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    document.getElementById('validateButton').onclick = function() {
        // Perform client-side validation here


        let name_en = document.querySelector('input[name="name_en"]');
        let name_th = document.querySelector('input[name="name_th"]');
        let thumbnail = document.querySelector('input[name="photo"]');
        var check = true;
        if (name_en.value.trim() === '') {
            var check = false;
            $('#span_hide_en').show();
        }
        if (name_th.value.trim() === '') {
            var check = false;
            $('#span_hide').show();
        }
        if (thumbnail.value.trim() === '') {
            var check = false;
            $('#span_hide_image').show();
        }

        if(check == false){
            return false; // Prevent form submission
        }

       document.getElementById('myForm').submit();
    };
</script>
@endpush
