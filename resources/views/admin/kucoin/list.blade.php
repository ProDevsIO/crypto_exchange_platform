@extends('layouts.admin')
@section('style')
<!-- third party css -->
<link href="/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="/assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->
<style>
    .bg-orange{
        background-color:#d5450b;
    }
    #myChart{
        max-height: 300px;
    }
</style>

@endsection
@section('content')

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">

                                    <h4 class="page-title">Kucoin Accounts    <a type="button" data-bs-toggle="modal" data-bs-target="#addAccount"  class="btn btn-primary float-end mt-2 mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add Account</a></h4>

                                 
                                   
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        @include("errors.showerrors")

                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 my-1">
                                                <div class="avatar-sm bg-primary rounded p-3">
                                                    <i class="fe-users avatar-title font-22 text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark my-1"><span data-plugin="counterup"></span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Clients</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col -->  
                            
                                              
                        </div>
                       
                        <div id="addAccount" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <form action="{{ url('/admin/kucoin/add/') }}" method="post">
                                                 @csrf
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel">Add Account </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        
                                                    </div>
                                                    <hr>
                                                    <div class="modal-body">
                                                        
                                                        <div class=" row">
                                                           <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                  <label for="first_name" class="form-label">Account Name*</label>
                                                                   <input type="text" name="account_name" class="form-control" id="" value="{{old('account_name')}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                <label for="first_name" class="form-label">Api Token*</label>
                                                               
                                                                   <input type="text" name="api_token" placeholder="Please fill in your api key" class="form-control" id="" value="{{old('api_token')}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                <label for="first_name" class="form-label">Api Secret*</label>
                                                                   <input type="text" name="secret" placeholder="Please fill in your secret key" class="form-control" id="" value="{{old('secret')}}"required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                <label for="first_name" class="form-label">Passphrase*</label>
                                                                   <input type="text" name="passphrase" placeholder="Please fill in your passphrase" class="form-control" id="" value="{{old('passphrase')}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                       

                       
@endsection
@section('script')
<script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
<!-- third party js -->
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>

 <!-- Datatables init -->
 <script src="/assets/js/pages/datatables.init.js"></script>
<!-- third party js ends -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function () {
            $('#datatable-button').DataTable({
                "order": [],
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print'
                ]
            });
        });
    function action(id, url){
            var d = confirm("Are you sure you want to carry out this action?");

            if (d) {
                window.location = url + id;
            }

        }
</script>
@endsection
