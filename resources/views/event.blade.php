
    @include('layouts.header')


    @include('layouts.header')

    <!-- Intro Section -->
    <section class="bg-secondary text-primary py-9 pt-20 m-11">
      <div class="container mx-auto text-center px-6 md:px-0">
        <div class="bg-teal-500 text-white py-8 px-10 rounded-lg shadow-lg max-w-5xl mx-auto">
          <h2 class="text-2xl md:text-3xl font-bold">Temukan Event, Artikel, dan Tips</h2>
          <h2 class="text-2xl md:text-3xl font-bold">Yang Menarik</h2>
        </div>
      </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-10 px-6">
      <div class="container mx-auto px-4 py-8">
        <!-- Featured Article Section -->
        <h2 class="text-4xl font-bold mb-6">Featured Article</h2>
        <div class="md:flex">
          <!-- Main Featured Article -->
          <div class="md:w-2/3 p-4">
            @foreach ($artikel->take(1) as $featured)
              <div class="bg-gray-200 h-96 mb-4" style="background-image: url('{{ Storage::url($featured->foto) }}'); background-size: cover; background-position: center;"></div>
              <div class="flex items-center space-x-2 text-gray-500 mb-2">
                <span class="bg-gray-300 rounded-full h-4 w-4"></span>
                <p>{{ $featured->author }}</p>
                <span class="text-xs">&bull;</span>
                <p>{{ $featured->created_at->format('M d, Y') }}</p>
              </div>
              <h3 class="text-3xl font-bold mb-2">{{ $featured->judul }}</h3>
              <p class="text-gray-700 mb-4">{{ Str::limit($featured->isi, 150) }}</p>
              <a href="{{ route('event.detail', $featured->id) }}" class="text-blue-500">See more</a>
            @endforeach
          </div>
          
          <!-- Related Articles -->
          <div class="md:w-1/3 p-4 space-y-4">
            @foreach ($artikel->skip(1)->take(3) as $related)
              <div class="p-4 border rounded-lg">
                <div class="bg-gray-200 h-32 mb-2" style="background-image: url('{{ Storage::url($related->foto) }}'); background-size: cover; background-position: center;"></div>
                <div class="flex items-center space-x-2 text-gray-500 mb-2">
                  <span class="bg-gray-300 rounded-full h-4 w-4"></span>
                  <p>{{ $related->author }}</p>
                  <span class="text-xs">&bull;</span>
                  <p>{{ $related->created_at->format('M d, Y') }}</p>
                </div>
                <h4 class="font-bold mb-2">{{ Str::limit($related->judul, 60) }}</h4>
                <p class="text-gray-700 mb-4">{{ Str::limit($related->isi, 100) }}</p>
                <a href="{{ route('event.detail', $related->id) }}" class="text-blue-500">Read More</a>
              </div>
            @endforeach
          </div>
        </div>
        
        <!-- Tabs for Categories -->
        <div class="flex space-x-4 border-b border-gray-200 pb-2 mb-8">
          <button class="px-4 py-2 font-medium text-gray-700 border-b-2 border-blue-500 focus:outline-none" data-bs-toggle="tab" data-bs-target="#event">Events</button>
          <button class="px-4 py-2 font-medium text-gray-500 hover:text-gray-700 focus:outline-none" data-bs-toggle="tab" data-bs-target="#news">News</button>
          <button class="px-4 py-2 font-medium text-gray-500 hover:text-gray-700 focus:outline-none" data-bs-toggle="tab" data-bs-target="#tips">Tips</button>
        </div>
        
        <div class="tab-content">
          @foreach (['event', 'news', 'tips'] as $category)
            <div class="tab-pane fade {{ $category === 'event' ? 'show active' : '' }}" id="{{ $category }}" role="tabpanel">
              <div class="md:flex md:space-x-8">
                <!-- Main Content Area -->
                <div class="md:w-2/3">
                  @foreach ($artikel->where('category', $category)->skip(3) as $item)
                    <div class="p-4 border rounded-lg mb-4">
                      <div class="bg-gray-200 h-32 mb-2" style="background-image: url('{{ Storage::url($item->foto) }}'); background-size: cover; background-position: center;"></div>
                      <h4 class="font-bold mb-2">{{ $item->judul }}</h4>
                      <p class="text-gray-700 mb-4">{{ Str::limit($item->isi, 100) }}</p>
                      <a href="{{ route('event.detail', $item->id) }}" class="text-blue-500">Read More</a>
                    </div>
                  @endforeach
                </div>
                
                <!-- Sidebar with Related Articles for Each Tab -->
                <div class="md:w-1/3 mt-8 md:mt-0">
                  <div class="p-4 border rounded-lg">
                    <h5 class="font-bold mb-4">Related {{ ucfirst($category) }}</h5>
                    @foreach ($artikel->where('category', $category)->take(5) as $related)
                      <div class="d-flex mb-3">
                        <img src="{{ Storage::url($related->foto) }}" class="rounded" width="70" height="70" style="object-fit: cover;" alt="{{ $related->judul }}">
                        <div class="ms-3">
                          <h6 class="mb-1"><a href="{{ route('event.detail', $related->id) }}" class="text-dark">{{ Str::limit($related->judul, 40) }}</a></h6>
                          <small class="text-muted">{{ $related->created_at->format('M d, Y') }}</small>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            mirror: false
        });

        // Lazy loading images
        document.addEventListener("DOMContentLoaded", function() {
            var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

            if ("IntersectionObserver" in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove("lazy");
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            }
        });
    </script>

    @include('layouts.footer')
</body>

</html>
