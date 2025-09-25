<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Post</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-[#091017] text-[#e6eef0] font-inter p-10"
      style="background:
        radial-gradient(1000px 600px at 20% 50%, rgba(17,48,47,0.15), transparent),
        radial-gradient(800px 500px at 80% 40%, rgba(4,16,24,0.14), transparent),
        #091017;">

  <div class="w-full max-w-[600px]">
    <div class="bg-gradient-to-b from-white/5 to-white/0 rounded-[14px] p-7 shadow-[0_8px_30px_rgba(2,8,12,0.7)] border border-white/5">
      <h2 class="text-[#0fb28f] text-xl font-bold mb-2">New Post</h2>
      <div class="text-[#98a0a6] text-sm mb-4">Write your content and optionally attach media.</div>

      <form id="postForm" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
          <label for="title" class="block text-sm text-[#98a0a6] mb-1">Title *</label>
          <input id="title" name="title" type="text" placeholder="Good morning..."
                 class="w-full p-3 rounded-lg bg-transparent border border-white/5 text-sm focus:border-[#12b3a9] outline-none" required>
        </div>

        <div>
          <label for="content" class="block text-sm text-[#98a0a6] mb-1">Content (optional)</label>
          <textarea id="content" name="content" placeholder="Write something..."
                    class="w-full min-h-[140px] p-3 rounded-lg bg-transparent border border-white/5 text-sm resize-y focus:border-[#12b3a9] outline-none placeholder:text-[#98a0a6]/80"></textarea>
        </div>

        <div class="grid grid-cols-[1fr_120px] gap-3 items-end">
          <div>
            <label for="media" class="block text-sm text-[#98a0a6] mb-1">Image / Video</label>
            <div id="fileDrop"
                 class="relative border border-dashed border-white/5 p-3 rounded-lg text-center text-sm text-[#98a0a6]">
              <input id="media" name="media[]" type="file" accept="image/*,video/*" multiple
                     class="absolute inset-0 opacity-0 cursor-pointer z-10">
              <div class="pointer-events-none">Drag & drop or click to select</div>
            </div>
            <div id="previewContainer" class="hidden mt-3  grid-cols-[repeat(auto-fill,minmax(120px,1fr))] gap-2 rounded-lg border border-white/5 bg-gradient-to-b from-white/5 to-transparent p-2 max-h-[300px] overflow-y-auto"></div>
          </div>

          <div>
            <label for="privacy" class="block text-sm text-[#98a0a6] mb-1">Privacy</label>
            <select id="privacy" name="privacy"
                    class="hover:bg-white/10 w-full p-3 rounded-lg bg-transparent border border-white/5 text-sm cursor-pointer focus:border-[#12b3a9] focus:ring-0">
              <option value="public" class="bg-[#0f1a20]">Public</option>
              <option value="friends" class="bg-[#0f1a20]">Friends</option>
              <option value="private" class="bg-[#0f1a20]">Private</option>
            </select>
          </div>
        </div>

        <div class="flex justify-between items-center mt-4">
          <!-- زر Clear -->
          <button type="button"
            class="border border-white/5 text-[#98a0a6] px-4 py-2 rounded-lg 
                  hover:bg-white/10 hover:text-[#e6eef0] transition-colors 
                  cursor-pointer hover:shadow-[0_0_1px_#6AF0E7,0_0_30px_#0fb28f]"
            onclick="clearForm()">Clear</button>

          <!-- زر Post -->
          <button type="submit"
            class="bg-gradient-to-b from-[#12b3a9] to-[#0fb28f] text-[#04201f] font-bold 
                  px-5 py-3 rounded-lg cursor-pointer 
                  hover:brightness-110 transition-all shadow-[0_0_1px_#6AF0E7,0_0_30px_#0fb28f]">Post</button>
        </div>
      </form>
    </div>
  </div>

  <script src="{{ asset('assets/js/socialPostForm.js') }}"></script>
</body>
</html>


{{-- filepath: resources/views/postform.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
    <!-- Add Tailwind or other CSS here if needed -->
</head>
<body>
    <!-- Your form HTML here -->

    <script src="{{ asset('js/postform.js') }}"></script>
</body>
</html>
