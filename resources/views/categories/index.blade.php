@extends('layouts.master')
@section('header','Category Dashboard')
@section('breadcrumb','Category')
@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category">
        Add Category
    </button>


    <div>
        <h3><b>Existing Categories</b></h3>
    </div><br>

    <table class="table table-hover">
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
            <td>{{ $category->status }}</td>
            <td>{{ $category->created_at }}</td>
        </tr>
        @empty
        @endforelse
        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Add New Category</h5><br>
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                    </div>
                </div>
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

@endsection

@push('extra_script')
    <script type="text/javascript">
            @if (count($errors) > 0){
            $('#category').modal('show');
        }
        @endif
    </script>

@endpush
