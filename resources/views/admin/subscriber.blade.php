@extends('layouts.backend.master')

@section('title','Subscriber')

@section("css")
    <!-- JQuery DataTable Css -->
    <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">

        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Category List</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($subscribers as $key=>$subscriber)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$subscriber->email}}</td>
                                        <td>{{$subscriber->created_at}}</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm waves-effect" onclick="deleteSubscriber({{$subscriber->id}})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-subscriber-{{$subscriber->id}}" action="{{route('admin.subscriber.destroy', $subscriber->id)}}" method="POST" style="display: none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach()
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@section("js")


    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <script src="{{asset('assets/backend/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>

    <script>
        function deleteSubscriber(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    document.getElementById('delete-subscriber-'+id).submit();
                }
            })
        }
    </script>
@endsection

