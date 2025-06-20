@if($total_errors > 0)
    <div class="error-alert">
    Errors have occurred with {{$total_errors}} teachers imported.
    <a href="javascript:;" class="invitation-back-btn">Go back and fix errors.</a>
</div>
@endif
<div class="table-sm">
    <form action="/admin/users/teachers_invitation_submit" method="POST" class="mb-0">
        {{ csrf_field() }}
        <input type="hidden" name="role_id" value="{{$role_id}}">
        <input type="hidden" name="school_id" value="{{$userObj->school_id}}">
        <table>
            <thead>
            <tr>
                <th>Email</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>

            @if(!empty($mesages_list))

                @foreach($mesages_list as $email => $toastData)

                    @php $status = isset($toastData['status'])? $toastData['status'] : '';
                    $tr_class = ($status == 'error')? 'error-row' : '';

                    @endphp
                    @if($status == 'success')
                        <input type="hidden" name="invitation_emails[]" value="{{$email}}">
                    @endif
                    <tr class="{{$tr_class}}">
                        <td>
                            <span class="{{($status == 'error')? 'error-highlight' : ''}}">{{$email}}</span>
                        </td>
                        <td><div class="{{($status == 'error')? 'error-message' : ''}}">{{$toastData['msg']}}</div></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        @if($total_errors == 0)
            <input type="submit" value="Submit">
        @endif
    </form>
</div>
