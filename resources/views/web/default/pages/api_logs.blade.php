@extends(getTemplate().'.layouts.app')

    @section('content')



        <section class="mt-0 mt-md-0 pt-30">
            <div class="row">
                <div class="col-12">
                    <table class="table text-center custom-table table-striped">
                        <thead>
                        <tr>
                            <th class="text-left">Error Date</th>
                            <th class="text-center">Target API</th>
                            <th class="text-center">Error</th>
                            <th class="text-center">Device Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( !empty( $error_logs ) )
                            @foreach( $error_logs as $errorObj)
                                @php $api_data = isset($errorObj->api_data)? json_decode($errorObj->api_data) : (object) array();
                                $device_info = isset($api_data->device_info)? $api_data->device_info : (object) array();

                                @endphp
                                <tr>
                                    <td class="text-left">{{dateTimeFormat($errorObj->updated_at,'j M Y H:i')}}</td>
                                    <td class="text-center">{{$api_data->target_api}}</td>
                                    <td class="text-center">{{$api_data->error}}</td>
                                    <td class="text-center">
                                        @if(isset($device_info->model))
                                            <strong>Model:</strong> {{$device_info->model}} <br>
                                        @endif
                                        @if(isset($device_info->brand))
                                            </strong>Brand:</strong> {{$device_info->brand}}
                                        @endif

                                    </td>
                                </tr>

                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endsection
