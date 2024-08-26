<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-6">
        <a href="{{ url('/') }}" class="text-blue-500 hover:underline">Back to Posts</a>
        <div class="bg-white shadow-md rounded-lg overflow-hidden mt-6">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4">{{ $post['title'] }}</h1>
                <p class="text-gray-700">{{ $post['body'] }}</p>
            </div>
        </div>
    </div>
</body>
</html>
