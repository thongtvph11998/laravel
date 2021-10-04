@include('frontend/header');

@section('title')
		home page
@endsection
<div class="m-5" style="margin-left: 500px;
    width: 500px;">
<h2 class="text-center"> dang ky </h2>
<form method="POST" action="{{route('frontend.register-user')}}" class="mt-5">
@csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{old('name')}}" />
         @error('name')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>Email</label>
        <input class="mt-3 form-control" type="email" name="email"value="{{old('email')}}"  />
        @error('email')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror

    </div>
     <div>
        <label>password</label>
        <input class="mt-3 form-control" type="password" name="password" />
         @error('password')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror

    </div>
    <div>
        <label>Address</label>
        <input class="mt-3 form-control" type="text" name="address"value="{{old('address')}}"  />
        @error('address')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror

    </div>
    <div>
        <label>Gender</label>
        <select class="mt-3 form-control" name="gender">
            <option value="{{config('common.user.gender.male')}}"
             {{old('gender',config('common.user.gender.male'))== config('common.user.gender.male') ? "selected":""}}>
              Male
            </option>
            <option value="{{config('common.user.gender.female')}}"
             {{old('gender',config('common.user.gender.male'))== config('common.user.gender.female') ? "selected":""}}>
              Female
            </option>
        </select>
    </div>
     <div>
        <label>Role</label>
        <select class="mt-3 form-control" name="role">
            <option value="{{config('common.user.role.user')}}"
            {{old('role')==config('common.user.role.user')? "selected":""}}>
              User
            </option>
        </select>
         @error('role')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <button class="mt-3 btn btn-primary">Create</button>
</form>
</div>

