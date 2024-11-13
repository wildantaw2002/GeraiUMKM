
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
     
    <ul class="nav nav-tabs mb-4" id="articleTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="event-tab" data-bs-toggle="tab" data-bs-target="#event" type="button" role="tab" aria-controls="event" aria-selected="true">Events</button>
            </li>
            <li class="nav-item" role="presentation" py-10 px-6>
                <button class="nav-link" id="news-tab" data-bs-toggle="tab" data-bs-target="#news" type="button" role="tab" aria-controls="news" aria-selected="false">News</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tips-tab" data-bs-toggle="tab" data-bs-target="#tips" type="button" role="tab" aria-controls="tips" aria-selected="false">Tips</button>
            </li>
        </ul>

        <div class="tab-content" id="articleTabsContent">
            @foreach (['event', 'news', 'tips'] as $category)
                <div class="tab-pane fade {{ $category === 'event' ? 'show active' : '' }}" id="{{ $category }}" role="tabpanel" aria-labelledby="{{ $category }}-tab">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                @foreach ($artikel->where('category', $category)->skip(3) as $item)
                                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                        <div class="card">
                                            <img src="{{ Storage::url($item->foto) }}" class="card-img-top" alt="{{ $item->judul }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->judul }}</h5>
                                                <div class="article-meta">
                                                    <span class="me-3"><i class="far fa-clock"></i> {{ $item->created_at->diffForHumans() }}</span>
                                                    <span><i class="far fa-comment"></i> {{ rand(5, 50) }} Comments</span>
                                                </div>
                                                <p class="card-text">{{ Str::limit($item->isi, 80) }}</p>
                                                <a href="{{ route('event.detail', $item->id) }}" class="btn btn-read-more">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Related {{ ucfirst($category) }}</h5>
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
                </div>
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
