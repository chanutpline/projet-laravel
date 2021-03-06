@extends('layouts/main')
 
@section('content')
<!-- Create a Log In Form for the SessionsController@create() method -->
<div class="row medium-10 large-10">
    <h2>Log In</h2>
    
    <form method="POST" action="/login">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
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
 
        <div class="form-group">
            <input type="submit" value="Login">
            <a href="{{url('register/'.$provider='google')}}" class="boutonGoogleGithub">Login with Google</a>
            <a href="{{url('register/'.$provider='github')}}" class="boutonGoogleGithub">Login with Github</a>
        </div>
    </form>
</div>
@endsection