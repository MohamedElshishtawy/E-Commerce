<x-layout title="Log In">

  <x-slot:more_css_links>
    <link rel="stylesheet" href={{asset("css/user/user-form.css")}} type="text/css">
    </x-slot>

    <form action={{route('login_process')}} method="POST" class="grid justify-content-center ">
      @csrf
      <h1 class="h3 mb-3 fw-normal">Register</h1>


      <div>
        <label for="email">EMAIL</label>
        <input type="email" class="" id="email" name="email" placeholder="Your Email">
        @error('email')
        <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
        @enderror
      </div>

      <div>
        <label for="password">Password</label>
        <input type="password" class="" id="password" name="password" placeholder="Your Password">
        @error('password')
        <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
        @enderror
      </div>

      <button class="btn btn-danger m-10" type="submit">Login</button>

      <a href="{{route('register')}}">Don't Have Account?</a>


    </form>
</x-layout>