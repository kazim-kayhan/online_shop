<div>
    {{-- Stop trying to control. --}}
    {{-- Do your work, then step back. --}}
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>All Slides</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addHomeSlider') }}" class="btn btn-success pull-right">Add New Slide</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-stripped table-bordered">
                            <thead>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Price</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td><img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}" alt="{{ $slider->title }}" width="120"></td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->subtitle }}</td>
                                        <td>{{ $slider->price }}</td>
                                        <td>{{ $slider->link }}</td>
                                        <td>{{ $slider->status == 1 ? "Active" : "Inactive"}}</td>
                                        <td>{{ $slider->created_at }}</td>
                                        <Td>
                                            <a href="{{ route('admin.editHomeSlider',['slide_id'=>$slider->id]) }}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                            <a href="#" wire:click.prevent = "deleteSlide({{ $slider->id }})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </Td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

