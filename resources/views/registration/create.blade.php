@extends('layouts/main')
 
@section('content')

<!-- Create a Registration Form for the RegistrationController@create() method -->
 
    <h2>Register</h2>
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
        
            <label for="name">Name:</label>
            
            <input type="text" class="form-control" id="name" name="name">
          
        </div>
 
        <div class="form-group">
            <label for="email">Email:</label>
            
            <input type="email" class="form-control" id="email" name="email">
           
        </div>
 
        <div class="form-group">
            <label for="password">Password:</label>
          
            <input type="password" class="form-control" id="password" name="password">
            
        </div>

        <!-- Add Password Confirmation To Registration Form -->
        <div class="form-group">
            <label for="password_confirmation">Password Confirmation:</label>
            <input type="password" class="form-control" id="password_confirmation"
                   name="password_confirmation">
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
      
    </form>
 
@endsection