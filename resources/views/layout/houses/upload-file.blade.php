
@extends('master')

@section('content')
    <div class="container">
        <h3>Gallery</h3>
        <div class="submit-section">
            <form action="{{ route('house.upload', $house->id) }}" class="dropzone" enctype="multipart/form-data">
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('script')
    <!-- DropZone | Documentation: http://dropzonejs.com -->
    <script type="text/javascript" src="{{ asset('scripts/dropzone.js') }}"></script>
    <script>
        $(".dropzone").dropzone({
            addRemoveLinks: true,
            dictDefaultMessage: "<i class='sl sl-icon-plus'></i> Click here or drop files to upload",
            autoQueue: true,
            dictRemoveFile: 'Remove file',
            removedfile: function (file) {
                console.log(file.name)
            }
        });
    </script>
@endsection
