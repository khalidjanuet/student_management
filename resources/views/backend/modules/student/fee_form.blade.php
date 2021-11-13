<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Student Fee Form</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
</head>
<body class="light">
@if(Session::has('success'))
<div class="toast"
    data-title="Success!"
    data-message="Fees Data Saved Successfully."
    data-type="success">
</div>
@endif
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<main>
<div class="content-banner">
    <div class="container">
        <h1 class="page-title">Payment Form</h1>
       
    </div>
    <div class="banner-overlay"></div>
</div>

    <div id="primary" class="p-t-b-50 height-full" style="background:#fff;padding:0 10px;">
        <div class="container" style="background:#f3f5f8;border-radius:10px;padding:20px 0;">
            <div class="row">
                <div class="col-lg-12 mx-md-auto" style="color:#000;">
                    <div class="text-center">
                        <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;margin:10px auto 30px auto;" alt="" style="">
                        <h1 class="mt-2" style="color:#000;font-weight:600;">IELTS MASTER STUDENT PAYMENT FORM</h1>    
                    </div>
                    <form action="{{route('student-fee-save')}}" method="POST" enctype="multipart/form-data" style="padding:50px;">
                        
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Student:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="student_id" id="student_id" class=" form-control select2" onchange="get_student_details()">
                                       <option value="0">Choose Student</option>
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">ID: {{$student->id}} | {{$student->first_name}} {{$student->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Course Name:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="course_id" id="course_id" class=" form-control select2" required>
                                       
                                        
                                    </select>
                                </div>
                            </div>
                        </div> 
                      
                      
                         
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Location:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="location" id="location">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Total Fee:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="total" id="total" required>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Discount:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="discount" id="discount" value="0" onkeyup="calculate_net_total()" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Net Total Fee:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="net_total" id="net_total" value="0" readonly="true" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Total Paid Amount:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="paid" id="paid" value="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Paid Amount Now:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="paid_now" id="paid_now" value="0" onkeyup="calculate_remaining()" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Balance Fee:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="remaining" id="remaining" value="0" readonly="true" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Due Date:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="due_date" id="due_date"  required>
                                </div>
                            </div>
                        </div>
                       
                       
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Admission Officer Name:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="admission_officer_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Team Leader:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="business_leader_id" id="business_leader_id" class="form-control select2" onchange="get_business_administrators();" required>
                                        <option value="">Select Business/Team Leader</option>
                                        @foreach($business_leaders as $business_leader)
                                            <option value="{{$business_leader->id}}">{{$business_leader->name}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Business Administrators:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="business_administrators_div">
                                    <select class="form-control select2" required>
                                        <option value="">Select Business Administrator</option>
                                        
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Reason For Payment:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="reason" id="reason" class="form-control" required>
                                        <option value="New Course Fee">New Course Fee</option>
                                        <option value="Balance Fee">Balance Fee</option>
                                        <option value="Extension Fee">Extension Fee</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Payment Method:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="radio">
                                    <label style="font-size:15px;margin-bottom:10px;line-height:1;"><input type="radio" id="payment_method" name="payment_method_1">Website Link</label>
                                </div>
                                <div class="radio">
                                    <label style="font-size:15px;margin-bottom:10px;line-height:1;"><input type="radio" id="payment_method" name="payment_method_2">G Pay</label>
                                </div>
                                <div class="radio">
                                    <label style="font-size:15px;margin-bottom:10px;line-height:1;"><input type="radio" id="payment_method" name="payment_method_3">Phone Pay</label>
                                </div>
                                <div class="radio">
                                    <label style="font-size:15px;margin-bottom:10px;line-height:1;"><input type="radio" id="payment_method" name="payment_method_4">Paytm</label>
                                </div>
                                <div class="radio">
                                    <label style="font-size:15px;margin-bottom:10px;line-height:1;"><input type="radio" id="payment_method" name="payment_method_5">Net Banking</label>
                                </div>
                                <div class="radio">
                                    <label style="font-size:15px;margin-bottom:10px;line-height:1;"><input type="radio" id="payment_method" name="payment_method_6">Fed</label>
                                </div>
                                <div class="radio">
                                    <label style="font-size:15px;margin-bottom:10px;line-height:1;"><input type="radio" id="payment_method" name="payment_method_7">Cash</label>
                                </div>
                                <div class="radio">
                                    <label style="font-size:15px;margin-bottom:10px;line-height:1;"><input type="radio" id="payment_method" name="payment_method_8">Other</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <h5>Is this payment transaction from out side India ? If yes please mention bank name:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="outside">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Message to Academic Department:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea rows="5" class="form-control" name="message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Email:</h5>
                                <span style="display:block;margin-top:-3px;font-size:11px;">It is compulsory for sending payment reciept</span>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Payment Receipt:<span style="color:red;">*</span></h5>
                                <span style="display:block;margin-top:-3px;font-size:11px;">Upload Payment Transaction Reciept</span>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="receipt">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-8">
                                {{csrf_field()}}
                                <input type="submit" class="btn btn-success btn-lg btn-block" value="Submit Form" style="background:#0C6B59;width:200px;margin:10px 0;">
                            </div>
                        </div>
                        
    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

</div>
<!--/#app -->
<script src="{{asset('js/app.js')}}"></script>
<script>
    function change_student_id()
    {
        var student = $('#student_id_name').val();
        $('#student_id').val(student);
    }
    function get_student_details()
    {
        var student = $('#student_id').val();
            $.ajax({
                type:'GET',
                url:"{{route('student-details-ajax')}}",
                data:{'student_id':student},
                success:function(data){
                    if(data.exists == 0)
                    {
                        $('#course_id').html("<option value="+data.course_id+">"+data.course_name+"</option>");
                        $('#location').val(data.location);
                        $('#total').val(data.total);
                        $('#net_total').val(data.total);
                        $('#paid').attr('readonly','true');
                    }
                    else if(data.exists == 1)
                    {
                        $('#course_id').html("<option value="+data.course_id+">"+data.course_name+"</option>");
                        $('#total').val(data.total);
                        $('#discount').val(data.discount);
                        $('#location').val(data.location);
                        $('#discount').attr('readonly','true');
                        $('#net_total').val(data.net_total);
                        $('#net_total').attr('readonly','true');
                        $('#paid').val(data.paid);
                        $('#paid').attr('readonly','true');
                        $('#remaining').val(data.remaining);
                        $('#remaining').attr('readonly','true');
                    }
                    
                }
		    });
        
    }
    function get_business_administrators()
    {
        var business_leader_id = $('#business_leader_id').val();
            $.ajax({
                type:'GET',
                url:"{{route('student-fee-business-administrators-list-ajax')}}",
                data:{'business_leader_id':business_leader_id},
                success:function(data){
                    $('#business_administrators_div').html(data);
                    $('#business_administrator_id').select2();
                   
                }
		    });
    }
    function check_for_balance_fee()
    {
        var reason = $('#reason').val();
        if(reason == "Balance Fee")
        {
            var student = $('#student_id').val();
            var course = $('#course_id').val();
            $.ajax({
                type:'GET',
                url:"{{route('student-fee-details-ajax')}}",
                data:{'student_id':student,'course_id':course},
                success:function(data){
                    $('#total').val(data.total);
                    $('#discount').val(data.discount);
                    $('#net_total').val(data.net_total);
                    $('#paid').val(data.paid);
                    $('#remaining').val(data.remaining);
                }
		    });
        }
    }
    function calculate_net_total()
    {
        var total = parseInt($('#total').val());
        var discount = parseInt($('#discount').val());
        var net_total = total - discount;
        $('#net_total').val(net_total);
    }
    function calculate_remaining()
    {
        var net_total = parseInt($('#net_total').val());
        var paid = parseInt($('#paid').val());
        var paid_now = parseInt($('#paid_now').val());
        //var remaining = net_total - paid;
        var remaining = (net_total - paid ) - paid_now;
        $('#remaining').val(remaining);
    }
</script>
</body>
</html>