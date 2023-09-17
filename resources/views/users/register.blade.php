<x-layout title="Register">
  <x-slot:more_css_links>
    <link rel="stylesheet" href={{asset("css/user/user-form.css")}} type="text/css">
  </x-slot>
  <form action={{route('store_register_process')}} method="POST" class="grid justify-content-center ">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Register</h1>

    <div>
      <label for="name">NAME</label>
      <input type="text" class="" id="name" name="name" placeholder="Your Name" value={{old("name")}}>
      @error('name')
      <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
      @enderror
    </div>

    <div>
      <label for="email">EMAIL</label>
      <input type="email" class="" id="email" name="email" placeholder="Your Email" value={{old("email")}}>
      @error('email')
      <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
      @enderror
    </div>

    <div>
      <label for="phone">PHONE</label>
      <input type="tel" class="" id="phone" name="phone" placeholder="Your Phone" value={{old("phone")}}>
      @error('phone')
      <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
      @enderror
    </div>


    <div>
      <label for="password">NEW Password</label>
      <input type="password" class="" id="password" name="password" placeholder="Your New Password">
      @error('password')
      <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
      @enderror
    </div>

    <div>
      <label for="password_confirmation">PASSWORD CONFIRMATION</label>
      <input type="password" class="" id="password_confirmation" name="password_confirmation"
        placeholder="Confrime Password">
      @error('password_confirmation')
      <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
      @enderror
    </div>

    <div>
      <label for="sex">YOUR SEX</label>
      <select name="sex" id="sex">
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
      @error('sex')
      <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
      @enderror
    </div>

    <div>
      <label for="birth">BIRTH DAY</label>
      <input type="date" name="birth" id="birth">
      @error('birth')
      <div class="text-danger text-xs mt-1 text-capitalize small">{{$message}}</div>
      @enderror
    </div>

    <button class="btn btn-danger m-10" type="submit">Rrgister</button>

    <a href="{{route('login')}}">Have Account?</a>


  </form>
</x-layout>