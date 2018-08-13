@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <ol class="breadcrumb" style="background-color: #5fbbce">
                <div class="breadcrumb-item text-center " style="font-family: 'bmitra'" dir="rtl">
                    مطالب با دسته بندی
                    {{ \App\Category::Find(basename(url()->current()))->name }}        
                    <div class="badge badge-danger">
                         تعداد بازدید :
                        {{ \App\Category::Find(basename(url()->current()))->hits }}
                    </div>
                    @auth
                        <a href="{{ route('category_delete',['id'=>\App\Category::Find(basename(url()->current()))->id]) }}">
                            <button type="button" class="btn btn-sm btn-danger mr-3" onclick="return confirm('از حذف این دسته بندی اطمینان دارید؟')" style="float: left">
                                حذف دسته بندی
                            </button>
                        </a>
                        <a href="{{ route('category_hits',['id'=>\App\Category::Find(basename(url()->current()))->id]) }}">
                            <button type="button" class="btn btn-sm btn-warning mr-3" style="float: left">
                                صفر کردن شمارنده بازدید
                            </button>
                        </a>
                    @endauth
                </div>
            </ol>
        </div>

        <div class="justify-content-center row"  style="font-family: 'bmitra">
            @foreach($articles as $article)
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
                            <a href="{{route('article',['id'=>$article->id])}}">
                                <button type="button" class="btn btn-sm btn-secondary" style="float: left">
                                    ادامه مطلب و دانلود
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            @endforeach

        </div>
    </div>
@endsection
