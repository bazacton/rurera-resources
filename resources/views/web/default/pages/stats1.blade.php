@extends(getTemplate().'.layouts.app')

@section('content')
<section class="lms-status-page">
    {!! nl2br($page->content) !!}
</section>
@endsection

