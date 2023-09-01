@extends('admin.layout.master')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">About Position</h4>

                    </div>
                    {{-- <div class="pull-right">
                        <a href="#basic-table" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
                    </div> --}}
                </div>
                <table class="table">
                    <a href="{{route('about.position.create')}}"  class="badge badge-success">Add Position</a><br><br>
                    <thead>
                        <tr>

                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Job_type</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dat)
                        <tr>
                            <th scope="row">{{$dat->id}}</th>
                            <td>{{$dat->title}}</td>
                            <td>{{$dat->category}}</td>
                            <td>{{$dat->job_type}}</td>
                            <td><a data-id="{{ $dat->id }}"
                                data-action="{{ url('/about/position/destroy', $dat->id) }}"
                                onclick="deleteConfirmation({{ $dat->id }})"
                                class="badge badge-danger">Delete</a></td>
                            <td><a href="{{route('about.position.edit',$dat->id)}}" class="badge badge-success">Update</a></td>
                        </tr>
@endforeach
                    </tbody>
                </table>
                {{$data->Links()}}
            </div>

        </div>
 </div>
</div>
<script type="text/javascript">
    function deleteConfirmation(id)
 {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then(function(result) {
            if (result.isConfirmed) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/about/position/destroy') }}/" + id,
                    data: {
                        _token: CSRF_TOKEN
                    },
                    dataType: 'JSON',
                    success: function(results) {
                        Swal.fire({
                            title: "Done",
                            icon: 'success',
                            text: "Data Deleted Successfully",
                            type: "success"
                        }).then(function() {
                            location.reload();
                        });
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            }
        });
    }
</script>

@endsection
