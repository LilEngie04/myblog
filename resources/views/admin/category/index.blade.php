@extends('layouts.master')
@section('title', 'Category')
@section('content')



    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{  url('admin/delete-category/')  }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category with Posts</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="category_delete_id" id="category_id">
                        <h5>Are you sure? Are you really want tot delete category with posts?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid px-4">

        <div class="card mt-4">
            <div class ="card-header">
                <h4>View Category
                <a href="{{url('admin/add-category')}}" class="bnt btn-primary btn-sm float-end">Add Category</a>
                </h4>
            </div>
            <div class="card-body">
                @if(session('massage'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <table id="myDataTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <img src="{{asset('uploads/category/'.$item->image)}}" width="50px" height="40px" alt="Img">
                        </td>
                        <td>{{$item->status == '1' ? 'Hidden':'Shown'}}</td>
                        <td>
                            <a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            {{--<a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>--}}
                            <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{$item->id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
           //$('.deleteCategoryBtn').click(function (e) {
               $(document).on('click', '.deleteCategoryBtn', function (e){
               e.preventDefault();
               var category_id =  $(this).val();
               $('#category_id').val(category_id);

               $('#deleteModal').modal('show');
           });
        });
    </script>
@endsection
