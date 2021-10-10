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

        .cslist li {
            line-height: 33px;
            border-bottom: 1px solid #ccc
        }

        .slink {
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
                                <h4>All Attributes</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addAttribute') }}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body"> @if (Session::has('message')) <div class="alert alert-success" role="alert"> {{ Session::get('message') }} </div> @endif <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> @foreach ($pattributes as $attribute) <tr>
                                    <td>{{ $attribute->id }}</td>
                                    <td>{{ $attribute->name }}</td>
                                    <td>{{ $attribute->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.editAttribute',['attribute_id'=>$attribute->id]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="#" onclick="confirm('Are you sure, you want to delete this attribute?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAttribute({{ $attribute->id }})" style="margin-left: 10px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr> @endforeach </tbody>
                        </table> {{ $pattributes->links() }} </div>
                </div>
            </div>
        </div>
    </div>
</div>
