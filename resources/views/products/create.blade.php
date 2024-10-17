@extends('layouts.master')
@section('content')
    <!-- Page-content -->
    <h1>test</h1>
    <!-- End Page-content -->
    @section('script')
        <!--product create init js-->
        <script src="{{ URL::to('assets/js/pages/apps-ecommerce-product-create.init.js') }}"></script>
    @endsection
@endsection
