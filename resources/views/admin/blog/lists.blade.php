@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ trans('admin/main.blog') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{ trans('admin/main.blog') }}</div>
            </div>
        </div>

        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form action="{{ getAdminPanelUrl() }}/blog" method="get" class="mb-0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('admin/main.search') }}</label>
                                    <input name="title" type="text" class="form-control" value="{{ request()->get('title') }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('admin/main.start_date') }}</label>
                                    <div class="input-group">
                                        <input type="date" id="from" class="text-center form-control" name="from" value="{{ request()->get('from') }}" placeholder="Start Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('admin/main.end_date') }}</label>
                                    <div class="input-group">
                                        <input type="date" id="to" class="text-center form-control" name="to" value="{{ request()->get('to') }}" placeholder="End Date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('admin/main.category') }}</label>
                                    <select name="category_id" data-plugin-selectTwo class="form-control populate">
                                        <option value="">{{ trans('admin/main.all_categories') }}</option>

                                        @foreach($blogCategories as $category)
                                            <option value="{{ $category->id }}" @if(request()->get('category_id') == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('admin/main.author') }}</label>
                                    <select name="author_id" data-plugin-selectTwo class="form-control populate">
                                        <option value="">{{ trans('admin/main.all_authors') }}</option>

                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}" @if(request()->get('author_id') == $author->id) selected="selected" @endif>{{ $author->get_full_name() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('admin/main.status') }}</label>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                        <option value="">{{ trans('admin/main.all_status') }}</option>
                                        <option value="pending" @if(request()->get('status') == 'pending') selected @endif>{{ trans('admin/main.draft') }}</option>
                                        <option value="publish" @if(request()->get('status') == 'publish') selected @endif>{{ trans('admin/main.publish') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="input-label">Indexed</label>
                                    <select name="is_indexed" data-plugin-selectTwo class="form-control populate">
                                        <option value="">{{ trans('admin/main.all_status') }}</option>
                                        <option value="" @if(request()->get('is_indexed') == '') selected @endif>All</option>
                                        <option value="0" @if(request()->get('is_indexed') == '0') selected @endif>No</option>
                                        <option value="1" @if(request()->get('is_indexed') == '1') selected @endif>Yes</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group mt-1">
                                    <label class="input-label mb-4"> </label>
                                    <input type="submit" class="text-center btn btn-primary w-100" value="{{ trans('admin/main.show_results') }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @can('admin_blog_create')
                                <a href="{{ getAdminPanelUrl() }}/blog/create" class="btn btn-success">{{ trans('admin/main.create_blog') }}</a>
                            @endcan

                            @can('admin_blog_categories')
                                <a href="{{ getAdminPanelUrl() }}/blog/categories" class="btn btn-primary ml-2">{{ trans('admin/main.create_category') }}</a>
                            @endcan
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th>{{ trans('admin/main.title') }}</th>
                                        <th>{{ trans('admin/main.category') }}</th>
                                        <th>{{ trans('admin/main.author') }}</th>
                                        <th>Indexed</th>
                                        <th>{{ trans('public.date') }}</th>
                                        <th>{{ trans('admin/main.status') }}</th>
                                        <th>{{ trans('admin/main.action') }}</th>
                                    </tr>
                                    @foreach($blog as $post)
                                        <tr class="{{ ($post->is_indexed == 1)? 'indexed_blog_row' : 'noindexed_blog_row'}}">
                                            <td>
                                                <a href="{{ $post->getUrl() }}" target="_blank">{{ $WebBlogController->getPostContent($post, $post->title) }}</a>
                                            </td>
                                            <td>{{ $post->category->title }}</td>
                                            @if(!empty($post->author->get_full_name()))
                                                <td>{{ $post->author->get_full_name() }}</td>
                                            @else
                                                <td class="text-danger">Deleted</td>
                                            @endif
                                            <td class="{{ ($post->is_indexed == 1)? 'indexed_blog_col' : 'noindexed_blog_col'}}">
                                                {{ ($post->is_indexed == 1)? 'Yes' : 'No'  }}
                                            </td>
                                            <td>{{ dateTimeFormat($post->updated_at, 'j M Y | H:i') }}</td>
                                            <td>
                                                <span class="text-{{ ($post->status == 'pending') ? 'warning' : 'success' }}">
                                                    {{ ($post->status == 'pending') ? trans('admin/main.pending') : trans('admin/main.published') }}
                                                </span>
                                            </td>

                                            <td width="150px">
                                                @can('admin_blog_edit')
                                                    <a href="{{ getAdminPanelUrl() }}/blog/{{ $post->id }}/edit" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan

                                                <a href="/admin/blog/{{ $post->id }}/duplicate_blog" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Duplicate">
                                                    <i class="fa fa-copy"></i>
                                                </a>
                                                @include('admin.includes.delete_button',['url' => getAdminPanelUrl('/blog/'. $post->id .'/delete'), 'btnClass' => ''])

                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="text-right">
                                Records found: <b>{{$total_records}}</b>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            {{ $blog->appends(request()->input())->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

