@extends('admin.layouts.master')

@section('content')
    <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Question Answer Info</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">S.No</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Correct Answer</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quizes as $quiz)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $quiz->category->name }}</td>
                                            <td>{{ $quiz->question }}</td>
                                            <td>{{ $quiz->correct_answer }}</td>
                                            <td>
                                                <a href="{{ route('questionanswer.create') }}" data-toggle="tooltip" data-placement="top" title="Add"><span class="btn btn-success"><i class="fa fa-plus color-muted m-r-5"></i></span></a>
                                                <a href="{{ route('questionanswer.edit',['id' => $quiz->id]) }}" data-toggle="tooltip" data-placement="top" title="Edit"><span class="btn btn-info"><i class="fa fa-pencil color-muted m-r-5"></i></span></a>
                                                <form method="POST" action="{{ route('questionanswer.destroy',['id' => $quiz->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete"><span class="btn btn-danger"><i class="fa fa-trash color-muted m-r-5"></i></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
