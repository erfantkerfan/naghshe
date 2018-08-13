@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <ol class="breadcrumb">
        <div class="breadcrumb-item text-center" style="font-family: 'bmitra'" dir="rtl">
            با سلام به سایت دانشجویان عمران دانشگاه شهید عباسپور خوش آمدید.
            <br>
            این سایت جهت ارائه پروژه های دانشجویان عمران تحت نظر اینجانب تهیه شده است.
            <br>
            در زیر میتوانید مطالب اخیر سایت را مشاهده کنید.
        </div>
    </ol>
    </div>
    </div>

    <div class=""  style="font-family: 'bmitra">
        @foreach($articles as $article)
            <div class="col-6 offset-3">
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
        @endforeach

    </div>
</div>
@endsection
