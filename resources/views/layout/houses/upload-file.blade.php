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
    <!-- DropZone | Documentation: http://dropzonejs.com -->

@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('scripts/dropzone.js') }}"></script>
    <script>
        $(".dropzone").dropzone({
            addRemoveLinks: true,
            dictDefaultMessage: "<i class='sl sl-icon-plus'></i> Click here or drop files to upload",
            autoQueue: true,
            acceptedFiles: 'image/*',
            dictInvalidFileType: "You can't upload files of this type.", // Default: You can't upload files of this type.
            dictUploadCanceled: "Upload canceled.", // Default: Upload canceled.
            dictRemoveFile: 'Remove',
            // removedfile: function (file) {
            //     let name = file.name.replace(/\s+/g, '-').toLowerCase();
            //     console.log(file.upload_ticket)
            // }
        });
    </script>
@endsection
