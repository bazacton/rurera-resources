@extends(getTemplate().'.layouts.app')

@section('content')
<section class="lms-status-page">
    <div class="post-show mt-30">
        {!! nl2br($page->content) !!}
    </div>
</section>
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
@endpush
