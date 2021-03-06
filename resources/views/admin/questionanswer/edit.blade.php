@extends('admin.layouts.master')

@section('content')
            <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="{{ route('questionanswer.update',['id'=>$questionanswer->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Question</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-name" name="question" value="{{ $questionanswer->question }}" placeholder="Enter Question">
                                                @error('question')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Category</span>
                                            </label>
                                            <div class="col-lg-6">
                                            <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{(old('category_id',$questionanswer->category_id)==$category->id) ? 'selected':''}}>{{$category->name}}</optioon>
                                            @endforeach
                                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Correct Answer</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-name" name="correct_answer" value="{{ $questionanswer->correct_answer }}" placeholder="Enter Question Answer">
                                                @error('correct_answer')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        @php
                                            $temp ='';
                                            foreach ($incorrectanswer as $item)
                                            {
                                                $temp = $temp.','.$item->answer;
                                            }
                                        @endphp
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Incorrect Answers</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-name" name="incorrect_answer" value="{{ ltrim($temp,",") }}" placeholder="Enter any 3 seperated by commma ','">
                                                @error('incorrect_answer')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection
