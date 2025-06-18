<form action="{{ getAdminPanelUrl() }}/users/{{$user->id}}/update_teacher"
      method="POST" class="mb-0">
    @csrf
    <input type="hidden" name="class_id" value="{{$class_id}}">
    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="first_name"
               class="form-control  @error('first_name') is-invalid @enderror"
               value="{{ !empty($user) ? $user->first_name : old('first_name') }}"
               placeholder="First Name"/>
        @error('first_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="last_name"
               class="form-control  @error('last_name') is-invalid @enderror"
               value="{{ !empty($user) ? $user->last_name : old('last_name') }}"
               placeholder="Last Name"/>
        @error('last_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Display Name</label>
        <input type="text" name="display_name"
               class="form-control  @error('display_name') is-invalid @enderror"
               value="{{ !empty($user) ? $user->display_name : old('display_name') }}"
               placeholder="Display Name"/>
        @error('display_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="username">{{ trans('admin/main.email') }}:</label>
        <input name="email" type="text" id="username" value="{{ $user->email }}"
               class="form-control @error('email') is-invalid @enderror" readonly>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="username">{{ trans('admin/main.mobile') }}:</label>
        <input name="mobile" type="text" value="{{ $user->mobile }}"
               class="form-control @error('mobile') is-invalid @enderror">
        @error('mobile')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Full Mailing Address</label>
        <input type="text" name="full_mailing_address"
               class="form-control  @error('full_mailing_address') is-invalid @enderror"
               value="{{ !empty($user) ? $user->full_mailing_address : old('full_mailing_address') }}"
               placeholder="Full Mailing Address"/>
        @error('full_mailing_address')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Country</label>
        <select name="country_id" class="form-control">
            <option value="">Country</option>
            @foreach($countries as $countryObj)
                <option value="{{ $countryObj->id }}" {{($countryObj->id == $user->country_id)? 'selected' : ''}}>{{ $countryObj->title }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="modal-footer px-0 pb-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Teacher</button>
    </div>
</form>
