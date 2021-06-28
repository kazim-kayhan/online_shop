<div>
    {{-- The whole world belongs to you. --}}
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Change Password
                    </div>
                    <div class="panel-body">
                        @if (Session()->has('password_success'))
                            <div class="alert alert_success" role="alert">{{ Session::get('password_success') }}</div>
                        @endif
                        @if (Session()->has('password_error'))
                            <div class="alert alert_danger" role="alert">{{ Session::get('password_error') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="changePassword">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Current Password</label>
                                <input type="password" placeholder="Current Password" class="form-control imput-md" name="current_password" wire:model="current_password">
                                @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">New Password</label>
                                <input type="password" placeholder="New Password" class="form-control imput-md" name="password"  wire:model="password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <input type="password" placeholder="Confirm Password" class="form-control imput-md" name="password_comfirmation"  wire:model="password_confirmation">
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
