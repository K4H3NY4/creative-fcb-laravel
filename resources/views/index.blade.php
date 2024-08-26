<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6">Posts</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <a href="{{ route('posts.show', $post['id']) }}" class="bg-white shadow-md rounded-lg overflow-hidden block">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $post['title'] }}</h2>
                        <p class="text-gray-700">{{ Str::limit($post['body'], 100) }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">No posts available.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
