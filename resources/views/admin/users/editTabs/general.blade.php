<style>
    /**********************************************
    Questions Select, Questions Block style Start
    **********************************************/
    .questions-select-option ul {
        overflow: hidden;
    }

    .questions-select-option li {
        position: relative;
        flex: 1 1 0px;
    }

    .questions-select-option label {
        background-color: #e8e8e8;
        padding: 6px 20px;
        margin: 0;
        border-right: 1px solid rgba(0, 0, 0, 0.1);
        width: 100%;
        text-align: center;
        height: 100%;
        cursor: pointer;
        min-height: 55px;
    }

    .questions-select-option input,
    .questions-select-number input {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .questions-select-option li:first-child label {
        border-radius: 5px 0 0 5px;
    }

    .questions-select-option li:last-child label {
        border-radius: 0 5px 5px 0;
    }

    .questions-select-option input:checked ~ label {
        background-color: var(--primary);
        color: #fff;
    }

    .questions-select-option label strong {
        font-weight: 500;
        font-size: 15px;
    }

    .questions-select-option label span {
        font-size: 14px;
    }

    .questions-select-number li {
        flex-basis: 33%;
        padding: 0 0 10px 10px;
    }

    .questions-select-number label {
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);
        width: 100%;
        text-align: center;
        margin: 0;
        border-radius: 5px;
        min-height: 70px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 700;
        cursor: pointer;
    }

    .questions-select-number label.disabled {
        background-color: inherit;
    }

    .questions-select-number label.selectable {
        background-color: #fff;
    }

    .questions-select-number input:checked ~ label {
        background-color: var(--primary);
        color: #fff;
    }

    .questions-select-number ul {
        margin: 0 0 0 -10px;
        flex-wrap: wrap;
    }

    .questions-submit-btn {
        background-color: var(--primary);
        display: block;
        width: 92%;
        color: #fff;
        font-size: 24px;
        font-weight: 700;
        border-radius: 0;
        position: relative;
        z-index: 0;
        margin: 0 auto;
        height: 55px;
    }

    .questions-submit-btn:hover {
        color: #fff;
    }

    .questions-submit-btn:before,
    .questions-submit-btn:after {
        content: "";
        position: absolute;
        display: block;
        width: 100%;
        height: 105%;
        top: -1px;
        left: -1px;
        z-index: -1;
        pointer-events: none;
        background: var(--primary);
        transform-origin: top left;
        -ms-transform: skew(-30deg, 0deg);
        -webkit-transform: skew(-30deg, 0deg);
        transform: skew(-30deg, 0deg);
    }

    .questions-submit-btn:after {
        left: auto;
        right: -1px;
        transform-origin: top right;
        -ms-transform: skew(30deg, 0deg);
        -webkit-transform: skew(30deg, 0deg);
        transform: skew(30deg, 0deg);
    }
</style>
@php $tables_no = isset( $user->timestables_no)? json_decode($user->timestables_no) : array(); @endphp
<div class="tab-pane mt-3 fade @if(empty($becomeInstructor)) active show @endif" id="general" role="tabpanel"
     aria-labelledby="general-tab">
    <div class="row">
        <div class="col-12 col-md-6 populated-data">
            <form action="{{ getAdminPanelUrl() }}/users/{{ $user->id .'/update' }}" method="Post">
                {{ csrf_field() }}

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
                    <label>{{ trans('admin/main.password') }}</label>
                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"/>
                    @error('password')
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
                    <label class="input-label">{{ trans('update.timezone') }}</label>
                    <select name="timezone" class="form-control select2" data-allow-clear="false">
                        <option value="" {{ empty($user->timezone) ? 'selected' : '' }} disabled>{{
                            trans('public.select') }}
                        </option>
                        @foreach(getListOfTimezones() as $timezone)
                            <option value="{{ $timezone }}" @if(!empty($user) and $user->timezone == $timezone) selected
                                @endif>{{ $timezone }}
                            </option>
                        @endforeach
                    </select>
                    @error('timezone')
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
                @if(auth()->user()->isAdminRole())


                    <div class="form-group">
                        <label>Year</label>
                        <select data-default_id="{{isset( $user->id)? $user->year_id : 0}}"
                                class="form-control year_class_ajax_select @error('year_id') is-invalid @enderror"
                                name="year_id">
                            <option {{ !empty($trend) ?
                        '' : 'selected' }} disabled>Select Year</option>

                            @foreach($categories as $category)
                                @if(!empty($category->subCategories) and count($category->subCategories))
                                    <optgroup label="{{  $category->title }}">
                                        @foreach($category->subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}" @if(!empty($user) and $user->year_id == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                        @endforeach
                                    </optgroup>
                                @else
                                    <option value="{{ $category->id }}" class="font-weight-bold">{{
                            $category->title }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('year_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Student Class</label>
                        <select data-default_id="{{isset( $user->id)? $user->class_id : 0}}"
                                class="class_section_ajax_select student_section form-control select2 @error('class_id') is-invalid @enderror"
                                id="class_id" name="class_id">
                            <option disabled selected>Class</option>
                        </select>
                        @error('class_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group assignment_topic_type_fields timestables_fields ">
                        <label>Timestables</label>
                        <div class="questions-select-number">
                            <ul class="d-flex justify-content-center flex-wrap mb-30">
                                <li><input type="checkbox" value="10" name="tables_no[]" {{in_array(10,$tables_no)?
                                'checked' : ''}} id="tables_ten" /> <label for="tables_ten">10</label></li>
                                <li><input type="checkbox" value="2" name="tables_no[]" {{in_array(2,$tables_no)?
                                'checked' : ''}} id="tables_two" /> <label for="tables_two">2</label></li>
                                <li><input type="checkbox" value="5" name="tables_no[]" {{in_array(5,$tables_no)?
                                'checked' : ''}} id="tables_five" /> <label for="tables_five">5</label></li>
                                <li><input type="checkbox" value="3" name="tables_no[]" {{in_array(3,$tables_no)?
                                'checked' : ''}} id="tables_three" /> <label for="tables_three">3</label></li>
                                <li><input type="checkbox" value="4" name="tables_no[]" {{in_array(4,$tables_no)?
                                'checked' : ''}} id="tables_four" /> <label for="tables_four">4</label></li>
                                <li><input type="checkbox" value="8" name="tables_no[]" {{in_array(8,$tables_no)?
                                'checked' : ''}} id="tables_eight" /> <label for="tables_eight">8</label></li>
                                <li><input type="checkbox" value="6" name="tables_no[]" {{in_array(6,$tables_no)?
                                'checked' : ''}} id="tables_six" /> <label for="tables_six">6</label></li>
                                <li><input type="checkbox" value="7" name="tables_no[]" {{in_array(7,$tables_no)?
                                'checked' : ''}} id="tables_seven" /> <label for="tables_seven">7</label></li>
                                <li><input type="checkbox" value="9" name="tables_no[]" {{in_array(9,$tables_no)?
                                'checked' : ''}} id="tables_nine" /> <label for="tables_nine">9</label></li>
                                <li><input type="checkbox" value="11" name="tables_no[]" {{in_array(11,$tables_no)?
                                'checked' : ''}} id="tables_eleven" /> <label for="tables_eleven">11</label></li>
                                <li><input type="checkbox" value="12" name="tables_no[]" {{in_array(12,$tables_no)?
                                'checked' : ''}} id="tables_twelve" /> <label for="tables_twelve">12</label></li>
                                <li><input type="checkbox" value="13" name="tables_no[]" {{in_array(13,$tables_no)?
                                'checked' : ''}} id="tables_thirteen" /> <label for="tables_thirteen">13</label></li>
                                <li><input type="checkbox" value="14" name="tables_no[]" {{in_array(14,$tables_no)?
                                'checked' : ''}} id="tables_fourteen" /> <label for="tables_fourteen">14</label></li>
                                <li><input type="checkbox" value="15" name="tables_no[]" {{in_array(15,$tables_no)?
                                'checked' : ''}} id="tables_fifteen" /> <label for="tables_fifteen">15</label></li>
                                <li><input type="checkbox" value="16" name="tables_no[]" {{in_array(16,$tables_no)?
                                'checked' : ''}} id="tables_sixteen" /> <label for="tables_sixteen">16</label></li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Class Section</label>
                        <select data-default_id="{{isset( $user->id)? $user->section_id : 0}}"
                                class="section_ajax_select student_section form-control select2 @error('section_id') is-invalid @enderror"
                                id="section_id" name="section_id">
                            <option disabled selected>Section</option>
                        </select>
                        @error('section_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    @if(auth()->user()->isTeacher())
                        <input type="hidden" id="roleId" name="role_id" value="1">
                    @else

                        <div class="form-group">
                            <label>{{ trans('/admin/main.role_name') }}</label>
                            <select class="form-control @error('role_id') is-invalid @enderror" id="roleId" name="role_id">
                                <option disabled {{ empty($user) ?
                        'selected' : '' }}>{{ trans('admin/main.select_role') }}</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ (!empty($user) and $user->role_id == $role->id) ? 'selected'
                            :''}}>{{ $role->caption }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    @endif



                    @if(!empty($currencies) and count($currencies))
                        @php
                            $userCurrency = currency($user);
                        @endphp

                        <div class="form-group">
                            <label class="input-label">{{ trans('update.currency') }}</label>
                            <select name="currency" class="form-control select2" data-allow-clear="false">
                                @foreach($currencies as $currencyItem)
                                    <option value="{{ $currencyItem->currency }}" {{ ($userCurrency== $currencyItem->currency) ?
                            'selected' : '' }}>{{ currenciesLists($currencyItem->currency) }} ({{
                            currencySign($currencyItem->currency) }})
                                    </option>
                                @endforeach
                            </select>
                            @error('currency')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    @endif







                    <div class="form-group">
                        <label>{{ trans('admin/main.bio') }}</label>
                        <textarea name="bio" rows="3" class="form-control @error('bio') is-invalid @enderror">{{ $user->bio }}</textarea>
                        @error('bio')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ trans('site.about') }}</label>
                        <textarea name="about" rows="6" class="form-control @error('about') is-invalid @enderror">{{ $user->about }}</textarea>
                        @error('about')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ trans('update.certificate_additional') }}</label>
                        <input name="certificate_additional" value="{{ $user->certificate_additional }}"
                               class="form-control @error('certificate_additional') is-invalid @enderror"/>
                        @error('certificate_additional')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ trans('/admin/main.status') }}</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                            <option disabled {{ empty($user) ?
                        'selected' : '' }}>{{ trans('admin/main.select_status') }}</option>

                            @foreach (\App\User::$statuses as $status)
                                <option value="{{ $status }}" {{ !empty($user) && $user->status === $status ? 'selected'
                            :''}}>{{ $status }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                @endif

                <div class="form-group">
                    <label class="input-label">{{ trans('auth.language') }}</label>
                    <select name="language" class="form-control">
                        <option value="">{{ trans('auth.language') }}</option>
                        @foreach($userLanguages as $lang => $language)
                            <option value="{{ $lang }}" @if(!empty($user) and mb_strtolower($user->language) ==
                            mb_strtolower($lang)) selected @endif>{{ $language }}
                            </option>
                        @endforeach
                    </select>
                    @error('language')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                @if(auth()->user()->isAdminTeacher())

                    <div class="form-group rurera-hide">
                        <label class="input-label">{{ trans('admin/main.organization') }}</label>
                        <select name="organ_id" data-search-option="just_organization_role"
                                class="form-control search-user-select2"
                                data-placeholder="{{ trans('admin/main.search') }} {{ trans('admin/main.organization') }}">

                            @if(!empty($user) and !empty($user->organization))
                                <option value="{{ $user->organization->id }}" selected>{{ $user->organization->get_full_name() }}
                                </option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Organization / School Name</label>
                        <input type="text" name="orgin_id"
                               class="form-control  @error('orgin_id') is-invalid @enderror"
                               value="{{ !empty($user) ? $user->orgin_id : old('orgin_id') }}"
                               placeholder="Organization / School Name"/>
                        @error('orgin_id')
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


                @endif




                <div class=" mt-4">
                    <button class="btn btn-primary">{{ trans('admin/main.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
