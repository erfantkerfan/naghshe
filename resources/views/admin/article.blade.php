@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="font-family: 'bmitra">
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">
                        ایجاد مطلب جدید
                    </div>

                    <div class="card-body text-center">
                        <form class="form-row" enctype="multipart/form-data" method="POST" action="{{ route('article_create') }}">
                            {{ csrf_field() }}

                            <span class="col-12 row" dir="rtl">

                            <label for="category" class="col-4 control-label">دسته بندی</label>
                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }} col-8">

                                <select id="category" type="text" class="form-control text-center justify-content-center" name="category"
                                        required autofocus style="text-align:center;text-align-last:center;">

                                    <option value="" class="text-center" selected>...</option>

                                    @foreach(\App\Category::all() as $category)
                                        <option class="text-center" value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block" dir="rtl">
                                    <strong>
                                        {{ $errors->first('category') }}
                                    </strong>
                                </span>
                                @endif
                            </div>

                            <label class="col-4" for="title">عنوان مطلب</label>
                            <div class="col-8 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control form-group" id="title" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block" dir="ltr">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <label class="col-4" for="summary">متن شرح مطلب</label>
                            <div class="col-8 form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                                <textarea dir="rtl" id="summary" class="form-control" name="summary" style="resize: vertical"
                                          placeholder="..." required autofocus>{{ old('summary') }}</textarea>

                                @if ($errors->has('name'))
                                    <span class="help-block" dir="ltr">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                @endif
                            </div>
                            <label class="col-4" for="provider">تهیه کننده</label>
                            <div class="col-8 form-group{{ $errors->has('provider') ? ' has-error' : '' }}">
                                <input type="text" class="form-control form-group" id="provider" name="provider" value="{{ old('provider') }}">

                                @if ($errors->has('provider'))
                                    <span class="help-block" dir="ltr">
                                                <strong>{{ $errors->first('provider') }}</strong>
                                            </span>
                                @endif
                            </div>

                            </span>

                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <div class="col-12">
                                    <input id="file" type="file" class="form-control-file" name="file">

                                    @if ($errors->has('file'))
                                        <span class="help-block">
                                            <strong>
                                                {{ $errors->first('file') }}
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group col-2 offset-5 text-center" style="float: contour">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
