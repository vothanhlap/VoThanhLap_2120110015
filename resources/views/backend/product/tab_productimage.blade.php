<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar[]" value="{{ old('avatar') }}" id="avatar" class="form-control" > 
            @if ($errors->has('avatar'))
              <div class="text-danger">{{$errors->first('avatar')}}</div>
            @endif 
        </div>
        <div class="mb-3">
            <label for="image">Hình ảnh</label>
            <input type="file" name="image[]" multiple value="{{ old('image') }}" id="image" class="form-control"  > 
            @if ($errors->has('image'))
              <div class="text-danger">{{$errors->first('image')}}</div>
            @endif 
        </div>
    </div>          
</div>
