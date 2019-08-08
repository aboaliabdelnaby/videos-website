 <div class="row">

  @php $input='name'; @endphp
       {{csrf_field()}}
        <div class="col-md-6">
          <div class="form-group">
            <label class="bmd-label-floating">Skill Name</label>
            <input type="text" name="{{$input}}" class="form-control @error($input) is-invalid @enderror" value="{{isset($row) ? $row->{$input} : ''}}">
            @error($input)
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
        </div>
   
        
 </div>