<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name1">Tên thuộc tính</label>
            <input type="text" name="name1" value="{{ old('name1') }}" id="name1" class="form-control" placeholder="Nhập tên sản phẩm"> 
            @if ($errors->has('name1'))
              <div class="text-danger">{{$errors->first('name')}}</div>
            @endif 
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="value1">Giá trị</label>
            <input type="text" name="value1" value="{{ old('value1') }}" id="value1" class="form-control" placeholder="Nhập tên sản phẩm"> 
            
        </div>
        
    </div>          
</div>
