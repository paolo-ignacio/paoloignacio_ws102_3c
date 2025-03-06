<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">
    <div>
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="{{firstName}}">
        <span style="color:red"></span>
    </div>
    <div>
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="{{lastName}}">
        <span style="color:red"></span>
    </div>
    <div>
        <input type="radio" id="male" name="sex" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="sex" value="female">
        <label for="female">Female</label>
    </div>
    <div>
        <label for="mobile">Mobile Phone:</label>
        <input type="text" name="first_name" value="{{first_name}}">
        <span style="color:red"></span>
    </div>

</form>
    
</body>
</html>