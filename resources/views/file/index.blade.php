<x-app-layout>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Documents</h4>
                <form class="forms-sample" id="file-upload-form" action="{{route('File.add')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title"
                                value="{{old('title')}}">
                            @error('title')
                            <label id="title-error" class="error" for="title">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description"
                                placeholder="description" value="{{old('description')}}">
                            @error('description')
                            <label id="description-error" class="error" for="description">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group d-flex mb-0">
                            <div class="col-8 me-2">
                                <label for="attachment" class="form-label">File</label>
                                <input class="form-control" type="file" id="attachment" name="attachment"
                                    value="{{old('attachment')}}">
                            </div>
                            <div class="col-4 upload-info pt-5">
                                Note: only pdf,txt & doc files allowed
                            </div>
                        </div>

                        @error('attachment')
                        <label id="attachment-error" class="error" for="attachment">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="row mt-4">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-light btn-lg" type="reset" id="reset-button">Reset</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!--File Upload Scripts Starts-->

    <script>
        $(document).ready(function () {
            $('#file-upload-form').validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3,
                        maxlength: 100,
                    },
                    description: {
                        required: true,
                        minlength: 3,
                        maxlength: 500,
                    },
                    attachment: {
                        required: true,
                        extension: "pdf|txt|doc|docx",
                        filesize: 20480
                    },
                },
                messages: {
                    title: {
                        required: "Please enter a title.",
                        minlength: "Title must be at least 3 characters.",
                        maxlength: "Title cannot exceed 255 characters.",
                    },
                    description: {
                        required: "Please enter a description.",
                        minlength: "Description must be at least 3 characters.",
                        maxlength: "Description cannot exceed 255 characters.",
                    },
                    attachment: {
                        required: "Please upload a file.",
                        extension: "Only PDF, TXT, DOC, and DOCX files are allowed.",
                        filesize: "File size must not exceed 20MB."
                    },
                }
            });
        });

        $('#reset-button').click(function () {
            $('#file-upload-form').validate().resetForm();
        });


        @if (session('success'))
            toastr.success("{{ session('success') }}", "Success", {
                closeButton: true,
                progressBar: true,
                timeOut: 5000 // Time in milliseconds (5 seconds)
            });
        @elseif(session('error'))
        toastr.error("{{ session('error') }}", "Error", {
            closeButton: true,
            progressBar: true,
            timeOut: 5000 // Time in milliseconds (5 seconds)
        });
        @endif
    </script>
    
    <!--File Upload Scripts Ends-->
</x-app-layout>