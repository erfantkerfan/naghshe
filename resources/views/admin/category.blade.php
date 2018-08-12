@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center"  style="font-family: 'bmitra">
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">
                        ایجاد دسته بندی جدید
                    </div>

                    <div class="card-body text-right" dir="rtl">
                        <form class="form-row" enctype="multipart/form-data" method="POST" action="{{ route('category_create') }}">
                            {{ csrf_field() }}
                                <label class="col-3" for="name">عنوان دسته بندی</label>
                                <div class="col-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input type="text" class="form-control form-group" id="name" name="name">

                                        @if ($errors->has('name'))
                                            <span class="help-block" dir="ltr">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group col-2">
                                    <div>
                                        <button type="submit" class="col-12 btn btn-success">
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
