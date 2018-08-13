@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"  style="font-family: 'bmitra">
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ $article->tittle }}
                    <span class="badge badge-light" dir="rtl" style="float: left">
                    {{str_after($article->date_time,' ').'  '}}
                    {{str_replace('-','/',str_before($article->date_time,' '))}}
                    </span>
                </div>

                <div class="card-body text-right" dir="rtl">
                    {!! nl2br(e($article->summary)) !!}
                    <br>
                    <div class="badge badge-info">
                        <a href="{{route('category',['id'=>$article->category_id])}}" style="color: inherit;text-decoration:none;">
                             دسته بندی :
                            {{ $article->category()->first()->name }}
                        </a>
                    </div>
                    <div class="badge badge-primary">
                         تهیه کننده :
                        {{$article->provider}}
                    </div>
                    <div class="badge badge-success">
                         تعداد بازدید :
                        {{$article->hits}}
                    </div>
                    @if($article->file==null)
                        <button type="button" class="btn btn-sm btn-warning" style="float: left">
                            فایلی برای دانلود موجود نیست
                        </button>
                    @else
                    <a href="{{'/file/'.$article->id.'.'.$article->file}}">
                        <button type="button" class="btn btn-sm btn-warning" style="float: left">
                            دانلود
                        </button>
                    </a>
                    @endif
                    @auth
                        <a href="{{ route('article_delete',['id'=>$article->id]) }}">
                            <button type="button" class="btn btn-sm btn-danger ml-3" style="float: left">
                                حذف مطلب
                            </button>
                        </a>
                        <a href="{{ route('article_hits',['id'=>$article->id]) }}">
                            <button type="button" class="btn btn-sm btn-warning ml-3" style="float: left">
                                صفر کردن شمارنده بازدید
                            </button>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
