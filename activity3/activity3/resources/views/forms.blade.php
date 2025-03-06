<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Personal Information</h1>
    @if(session('success'))
    <p style="color:green">{{session('success')}}</p>
    @endif
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li style="color:red">{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{route('forms')}}" method="post">
    @csrf
        <div>
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" value="{{old('firstName')}}">
            @error('firstName') 
                <span style="color:red">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" value="{{old('lastName')}}">
            @error('lastName') 
                <span style="color:red">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <label for="sex">Sex:</label>
            <input type="radio" id="male" name="sex" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="sex" value="Female">
            <label for="female">Female</label>
            @error('sex') 
                <span style="color:red">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <label for="mobile">Mobile Phone:</label>
            <input type="text" name="mobile" value="{{old('mobile')}}">
            @error('mobile') 
                <span style="color:red">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <label for="telephone">Telephone No:</label>
            <input type="text" name="telephone" value="{{old('telephone')}}">
            @error('telephone') 
                <span style="color:red">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <label for="birth_date">Birth Date:</label>
            <input type="text" name="birth_date" value="{{old('birth_date')}}">
            @error('birth_date') 
                <span style="color:red">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" value="{{old('address')}}">
            @error('address') 
                <span style="color:red">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" value="{{old('email')}}">
            @error('email') 
                <span style="color:red">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <label for="website">Website:</label>
            <input type="text" name="website" value="{{old('website')}}">
            @error('website') 
                <span style="color:red">{{ $message }}</span> 
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>

</body>
</html>