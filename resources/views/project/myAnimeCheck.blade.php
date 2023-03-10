@extends('template.projectPage')

@section('title')
    뭐만들까
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')
    <div>
        <div>뭘만들까 {{ $result_test }}</div>
        <div style="width:200px; height: 200px; background: #000">클릭</div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        (function(){
            console.log("test");
        })();
    </script>
@endpush
