
<div class="card card-nav-tabs text-left" style="margin-top:20px;display: none">
    <div class="card-header card-header-primary">
        <h4 style="margin-top: 10px;margin-bottom: 5px">Update Profile</h4>
    </div>
    <div class="card-body">
        <form action="{{route('profile.update')}}" method="post">

            <div class="row">
                @php $input='name'; @endphp
                {{csrf_field()}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Username</label>
                        <input type="text" name="{{$input}}" class="form-control @error($input) is-invalid @enderror" value="{{isset($user) ? $user->{$input} : ''}}">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror
                    </div>
                </div>
                @php $input='email'; @endphp
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Email address</label>
                        <input type="email" name="{{$input}}" class="form-control @error($input) is-invalid @enderror" value="{{isset($user) ? $user->{$input} : ''}}">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror
                    </div>
                </div>
                @php $input='password'; @endphp
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="password" name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-info btn-sm btn-round" style="margin-top: 30px">Update Profile</button>
                </div>

                <div class="clearfix"></div>



            </div>
        </form>
    </div>

</div>

