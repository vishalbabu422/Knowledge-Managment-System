<x-app-layout>
    <table class="table" id="directory-list" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Attachment</th>
                <th>Created By</th>
                <th>Created On</th>
                <th>Modified On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catalogues as $catalogue)
            <tr>
                <td>{{$catalogue->title}}</td>
                <td>{{$catalogue->description}}</td>
                <td>
                    @php
                    $parts = explode('/', $catalogue->path);
                    $filename = end($parts);
                    @endphp

                    <a class="nav-link" href="{{ route('File.download', ['filename' => $filename]) }}"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download {{$filename}}">
                        <i class="mdi mdi-download"></i>
                    </a>
                </td>
                <td>{{$catalogue->description}}</td>
                <td>{{$catalogue->created_at->format('d-m-Y')}}</td>
                <td>{{$catalogue->updated_at->format('d-m-Y')}}</td>
                <td class="d-flex">
                    <a class="nav-link" href="{{ route('File.edit')}}" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Edit">
                        <i class="mdi mdi-file-edit-outline"></i>
                    </a>
                    <a class="nav-link" href="{{ route('File.delete') }}" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Delete">
                        <i class="mdi mdi-delete-outline"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>