<div class="container mt-5">
    <!-- Search Results -->
    <div class="row">
        <!-- Example of a single  card result -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ Vite::asset('resources/images/pdf-icon.svg') }}" alt="File icon"
                    class="search-file-icon mt-2">
                <div class="card-body">
                    <h5 class="card-title">Document 1</h5>
                    <p class="card-text">PDF Document</p>
                    <p class="card-text"><small class="text-muted">Last modified: Feb 5, 2025</small></p>
                </div>
            </div>
        </div>

        <!-- Another example of a file result -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ Vite::asset('resources/images/pdf-icon.svg') }}" alt="File icon"
                    class="search-file-icon mt-2">
                <div class="card-body">
                    <h5 class="card-title">Document 1</h5>
                    <p class="card-text">PDF Document</p>
                    <p class="card-text"><small class="text-muted">Last modified: Feb 5, 2025</small></p>
                </div>
            </div>
        </div>

        <!-- Example of an empty result (if no search results) -->
        <div class="col-12">
            <p>No results found.</p>
        </div>

    </div>
</div>
