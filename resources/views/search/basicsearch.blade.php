<div class="container mt-5">
    <!-- Search Results -->
    <div class="row">
        @if (!empty($searchResults))
            @foreach ($searchResults as $searchItems)
                <!-- Example of a single  card result -->
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ Vite::asset('resources/images/pdf-icon.svg') }}" alt="File icon"
                            class="search-file-icon mt-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $searchItems->title }}</h5>
                            <p class="card-text">PDF Document</p>
                            <p class="card-text"><small class="text-muted">Last modified: Feb 5, 2025</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {!! $searchResults->links() !!}
            </div>
        @else
            <!-- Example of an empty result (if no search results) -->
            <div class="col-12">
                <p>No results found.</p>
            </div>
        @endif

    </div>
</div>

