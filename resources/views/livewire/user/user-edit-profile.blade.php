<div>
    <div class="container">
        <div class="row">
            <div class="pane panel-default"> Edit Profile </div>
            <div class="panel-body">
                @if(Seesion::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>    
                @endif
                <form wire:submit.prevent='updateProfile'>
                    <div class="col-md-4"> @if($newIimage)
                        <img src="{{ $newImage->temporaryUrl() }}" width="100%">
                        @elseif($image)
                            <img src="{{ asset('assets/images/profile') }}/{{ $image }}" alt="{{ auth()->user()->name }} photo" width="100%">
                        @else 
                            <img src="{{ asset('assets/images/profile/default.png') }}" alt="{{ auth()->user()->name }} photo" width="100%"> 
                        @endif
                            <input type="file" class="form-control" wire:model="newImage">
                    </div>
                    <div class="col-md-8">
                        <p><b>Name: </b><input type="text" class="form-control" wire:model='name'></p>
                        <p><b>Email: </b>{{ $email }}</p>
                        <p><b>Phone: </b><input type="text" class="form-control" wire:model='mobile'></p>
                        <hr>
                        <p><b>Line1: </b><input type="text" class="form-control" wire:model='line1'></p>
                        <p><b>Line2: </b><input type="text" class="form-control" wire:model='line2'></p>
                        <p><b>City: </b><input type="text" class="form-control" wire:model='city'></p>
                        <p><b>Province: </b><input type="text" class="form-control" wire:model='province'></p>
                        <p><b>Country: </b><input type="text" class="form-control" wire:model='country'></p>
                        <p><b>Zip Code: </b><input type="text" class="form-control" wire:model='zipcode'></p>
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>