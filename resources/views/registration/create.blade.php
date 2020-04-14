@extends('layouts/main')
 
@section('content')

<!-- Create a Registration Form for the RegistrationController@create() method -->
 
    <h2>Register</h2>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value=""{{ old("name") }}>
            @if($errors->has('name'))
            @foreach($errors->get('name') as $error)
                <span style="color:red">
                        {{ $error }}
                    </span>
            @endforeach
            @endif
        </div>
 
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value=""{{ old('email') }}>
            @if($errors->has('email'))
            @foreach($errors->get('email') as $error)
                <span style="color:red">
                        {{ $error }}
                    </span>
            @endforeach
            @endif
        </div>
 
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
            @if($errors->has('password'))
            @foreach($errors->get('password') as $error)
                <span style="color:red">
                        {{ $error }}
                    </span>
            @endforeach
            @endif
        </div>

        <!-- Add Password Confirmation To Registration Form -->
        <div class="form-group">
            <label for="password_confirmation">Password Confirmation:</label>
            <input type="password" class="form-control" id="password_confirmation"
                   name="password_confirmation">
            @if($errors->has('password_confirmation'))
                @foreach($errors->get('password_confirmation') as $error)
                    <span style="color:red">
                        {{ $error }}
                    </span>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Register</button>
            <a href="{{url('register/'.$provider='google')}}" class="btn btn-primary">Register with Google</a>
            <a href="{{url('register/'.$provider='github')}}" class="btn btn-primary">Register with Github</a>
        </div>
      
    </form>
 
@endsection