@extends('layouts.login')
@section('style')
<link href="/assets/css/authentication.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')



                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="error-text-box">
                                    <svg viewBox="0 0 500 200">
                                        <!-- Symbol-->
                                        <symbol id="s-text">
                                            <text text-anchor="middle" x="50%" y="20%" dy=".50em">404!</text>
                                        </symbol>
                                        <!-- Duplicate symbols-->
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                        <use class="text" xlink:href="#s-text"></use>
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <h3 class="mt-0 mb-2">Whoops! Page not found </h3>
                                    <p class="text-muted mb-3">It's looking like you may have taken a wrong turn. Don't worry...
                                        it happens to the best of us. You might want to check your internet connection or go back to the previous page</p>

                                   
                                </div>
                                <!-- end row -->

                            </div> <!-- end col -->
                        </div>

<!-- Footer-->
<!-- Footer-->

@endsection
@section('script')

@endsection
