<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        .container {
            text-align: center !important;
        }

        .cslist {
            list-style: none;
        }
        .cslist li{
            line-height: 33px;
            border-bottom: 1px solid #ccc
        }
        .slink{
font-size: 16px;
margin-left: 12px;
        }

    </style>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>All Categories</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addCategory') }}" class="btn btn-success pull-right">Add Catg</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body"> @if (Session::has('message')) <div class="alert alert-success" role="alert"> {{ Session::get('message') }} </div> @endif <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Sub Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> @foreach ($categories as $category) <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <ul class="cslist"> @foreach ($category->subCategories as $category) <li><i class="fa fa-caret-right"></i>{{ $category->name }} 
                                            <a href="{{ route('admin.editCategory',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug ]) }}" class="slink"><i class="fa fa-edit"></i></a> 
                                            <a href="#" onclick="confirm('Are yoy sure, you want to delete this sub category?') || event.stopImmediatePropagation()" wire:click.prevent='deleteSubcateogory({{ $scategory->id }})' class="slink"><i class="fa fa-times tex-danger"></i></a>
                                        </li> @endforeach </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.editCategory',['category_slug'=>$category->slug]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="#" onclick="confirm('Are you sure, you want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{ $category->id }})" style="margin-left: 10px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr> @endforeach </tbody>
                        </table> {{ $categories->links() }} </div>
                </div>
            </div>
        </div>
    </div>
</div>