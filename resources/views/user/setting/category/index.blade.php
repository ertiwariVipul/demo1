@extends('layouts.user.user')
@section('title')
    {{ env('APP_NAME') }} | Category
@endsection
@section('css')
    <link href="{{ asset(env('ADMIN_ASSETS_URL') . '/css/pages/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Category List</h4>
                        <div class="page-title-right d-flex align-items-center justify-content-between">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#category"><i
                                    class=""></i> Create Category</button>
                                    <ol class="breadcrumb m-2">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                                        <li class="breadcrumb-item active">Category</li>
                                    </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('user.setting.category.list')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- add category model -->
     <div class="modal fade text-left" id="category" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <label class="modal-title text-text-bold-600" id="RditProduct">Category</label>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div id="errors" style="color: red;"></div>
             <form method="post" id="category_form">
                 {{ csrf_field() }}
                 <div class="modal-body">
                     <label>Category Name</label>
                     <div class="form-group">
                         <input type="text" placeholder="Enter Category Name" class="form-control" name="categoryname"
                             id="categoryname">
                     </div>
                     <label>Quote</label>
                     <div class="form-group">
                         <input type="text" placeholder="Enter Category Quote" class="form-control" name="quote"
                             id="quote">
                     </div>
                     <label>Description</label>
                     <div class="form-group">
                         <input type="text" placeholder="Enter Category Description" class="form-control"
                             name="description" id="description">
                     </div>
                     <label>Image</label>
                     <div class="form-group">
                         <input class="form-control form-control-lg" name="image" id="imgInp"  type="file">
                     </div>
                     <img id="inuptImage" class="inuptImage" src="#" alt="your image" height="100px" width="100px"/>
                 </div>
                 <div id="errors"></div>
                 <div class="modal-footer">
                     <input type="reset" class="btn btn-secondary " data-dismiss="modal" value="close">
                     <input type="submit" class="btn btn-primary " value="Submit">
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- end add category model -->

    <!-- edit category model -->
    <div class="modal fade text-left" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="RditProduct">Edit Category</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="errors" style="color: red;"></div>
                <form method="post" id="edit_category_form">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label>Category Name</label>
                        <div class="form-group">
                            <input type="text" placeholder="Enter Category Name" class="form-control"
                                name="edit_categoryId" id="edit_categoryId" hidden>
                            <input type="text" placeholder="Enter Category Name" class="form-control"
                                name="e_categoryname" id="e_categoryName">
                        </div>
                        <label>Quote</label>
                        <div class="form-group">
                            <input type="text" placeholder="Enter Category Quote" class="form-control" name="e_quote"
                                id="e_categoryQuote">
                        </div>
                        <label>Description</label>
                        <div class="form-group">
                            <input type="text" placeholder="Enter Category Description" class="form-control"
                                name="e_description" id="e_categoryDescription">
                        </div>
                        <label>Image</label>
                        <div class="form-group">
                            <input class="form-control form-control-lg" name="e_image" id="imgInp"  type="file">
                        </div>
                        <div id="e_categoryImage"></div>
                    </div>
                    {{-- <div id="errors"></div> --}}
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-secondary " data-dismiss="modal"
                            value="close">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end edit category model -->
    
@endsection
@section('js')
    @include('user.setting.category.scripts')
@endsection
