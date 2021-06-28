<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Settings
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent = "saveSettings">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Company Name</label>
                                <div class="col-md-4">
                                    <input type="text" id="name" placeholder="Company Name..." class="form-control input-md" wire:model = "name"/>
                                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Company Slogan</label>
                                <div class="col-md-4">
                                    <input type="text" id="slogan" placeholder="Company Slogan..." class="form-control input-md" wire:model = "slogan"/>
                                    @error('slogan') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Developer</label>
                                <div class="col-md-4">
                                    <input type="text" id="developer" placeholder="Developer..." class="form-control input-md" wire:model = "developer"/>
                                    @error('developer') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="email" id="" placeholder="email..." class="form-control input-md" wire:model = "email"/>
                                    @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone</label>
                                <div class="col-md-4">
                                    <input type="text" id="phone" placeholder="Phone..." class="form-control input-md" wire:model = "phone"/>
                                    @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone2</label>
                                <div class="col-md-4">
                                    <input type="text" id="phone2" placeholder="Phone2..." class="form-control input-md" wire:model = "phone2"/>
                                    @error('phone2') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-4">
                                    <input type="text" id="adress" placeholder="Adress..." class="form-control input-md" wire:model = "address"/>
                                    @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Map</label>
                                <div class="col-md-4">
                                    <input type="text" id="map" placeholder="Map..." class="form-control input-md" wire:model = "map"/>
                                    @error('map') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Twiter</label>
                                <div class="col-md-4">
                                    <input type="text" id="twiter" placeholder="Twiter..." class="form-control input-md" wire:model = "twiter"/>
                                    @error('twiter') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Facebook</label>
                                <div class="col-md-4">
                                    <input type="text" id="facebook" placeholder="Facebook..." class="form-control input-md" wire:model = "facebook"/>
                                    @error('facebook') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Github</label>
                                <div class="col-md-4">
                                    <input type="text" id="github" placeholder="Github..." class="form-control input-md" wire:model = "github"/>
                                    @error('github') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">LinkedIn</label>
                                <div class="col-md-4">
                                    <input type="text" id="linkedin" placeholder="LinkedIn..." class="form-control input-md" wire:model = "linkedin"/>
                                    @error('linkedin') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Youtube</label>
                                <div class="col-md-4">
                                    <input type="text" id="youtube" placeholder="Youtube..." class="form-control input-md" wire:model = "youtube"/>
                                    @error('youtube') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
