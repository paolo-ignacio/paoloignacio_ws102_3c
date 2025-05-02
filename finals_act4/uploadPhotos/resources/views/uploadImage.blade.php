<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Single Upload Image</h1>
    <form action="{{route('photos.store.single')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>

    </form>

    <h1>Multiple Images Upload</h1>
    <form action="{{route('photos.store.multiple')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple required>
        <button type="submit">Upload</button>


        @if(session('success'))
            <p style="color:green;">{{session('success')}}</p>
        @endif

    </form>

    <h1>Uploaded Images</h1>

    <div style="display: flex; flex-wrap: wrap; gap: 15px;">
        @foreach($photos as $photo)
            <div style="text-align: center;">
                <img src="{{ asset('images/' . $photo->image) }}" 
                    alt="Image" 
                    style="width: 150px; height: 100px; object-fit: cover; display: block; border: 1px solid #ccc; padding: 4px;">
                
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="page" value="{{ request('page', 1) }}">
                        <button type="submit" style="margin-top: 5px;">Delete</button>
                    </form>
            </div>
        @endforeach
    </div>

    <div style="margin-top: 20px;">
        {{ $photos->links() }}
    </div>
</body>
</html>