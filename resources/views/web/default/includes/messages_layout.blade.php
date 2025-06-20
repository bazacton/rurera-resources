<table>
@if(!empty($mesages_list))

    @foreach($mesages_list as $email => $toastData)

        <tr>
            <td>{{$email}}
            <span>{{$toastData['msg']}}</span>
            </td>
        </tr>
    @endforeach
@endif
</table>
