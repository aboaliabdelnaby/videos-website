 <div class="row">

  @php $input='name'; @endphp
       {{csrf_field()}}
        <div class="col-md-6">
          <div class="form-group">
            <label class="bmd-label-floating">Page Name</label>
            <input type="text" name="{{$input}}" class="form-control @error($input) is-invalid @enderror" value="{{isset($row) ? $row->{$input} : ''}}">
            @error($input)
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
        </div>
       
         @php $input='meta_keywords'; @endphp
        <div class="col-md-6">
          <div class="form-group">
            <label class="bmd-label-floating">Meta Keywords</label>
            <input type="text" name="{{$input}}" class="form-control @error($input) is-invalid @enderror" value="{{isset($row) ? $row->{$input} : ''}}">
               @error($input)
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
        </div>

            @php $input='des'; @endphp
           <div class="col-md-12">
          <div class="form-group">
            <label class="bmd-label-floating">Page Description</label>
            <textarea name="{{$input}}" class="form-control @error($input) is-invalid @enderror" cols="30" rows="10">{{isset($row) ? $row->{$input} : ''}}</textarea>
           
               @error($input)
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
        </div>

          @php $input='meta_des'; @endphp
           <div class="col-md-12">
          <div class="form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="{{$input}}" class="form-control @error($input) is-invalid @enderror" cols="30" rows="5">{{isset($row) ? $row->{$input} : ''}}</textarea>
           
               @error($input)
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
        </div>
 </div>