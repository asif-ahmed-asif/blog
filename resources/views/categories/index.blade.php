@extends('layouts.master')
@section('header','Category Dashboard')
@section('breadcrumb','Category')
@section('content')
    <div>
        @include('flash_message')
    </div>
    <!-- Button add category modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category-add">
        Add Category
    </button>

    <div>
        <h3><b>Existing Categories</b></h3>
    </div><br>

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Category Name</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->category_name }}</td>
            <td>
                @if($category->status == true)
                    <span class="label label-success">Active</span>
                @elseif($category->status == false)
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
            <td>{{ $category->created_at }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="editCategory({{ $category->id }})">Edit</button>
                    <a href="" class="btn btn-danger">Delete</a>
                </div>
            </td>
        </tr>
        @empty
        @endforelse
        </tbody>
    </table>


    <!-- Modal add category -->
    <div class="modal fade" id="category-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Add New Category</h5><br>
                </div>
                @include('error_message')
                <div class="modal-body">
                    <form role="form" action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input name="category_name" type="text" class="form-control" id="category_name" placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal edit category -->
    <div class="modal fade" id="category-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Edit Category</h5><br>
                </div>
                @include('error_message')
                <div class="modal-body">
                    <form role="form" action="{{ route('category.update') }}" method="POST">
                        <input type="hidden" name="category_id" id="category_id">
                        @csrf
                        <div class="form-group">
                            <label for="category_edit">Category Name</label>
                            <input name="category_name" type="text" class="form-control" id="category_edit" placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status_edit">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
            @if (count($errors) > 0){
            $( document ).ready(function() {
                $('#category-add').modal('show');
            });
        }
        @endif
    </script>

    <script>
        function editCategory(id){
            var category_id = id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]') .attr('content')
                }
            });
            $.ajax({
                type:'GET',
                url:'{{ route("category.update") }}',
                data:{
                    id:category_id
                },
                success:function (data){
                    $("#category_id").val(data.id);
                    $("#category_edit").val(data.category_name);
                    $("#status_edit").val(data.status);
                    $("#category-edit").modal('show');
                }
            });
        }
    </script>
@endsection

