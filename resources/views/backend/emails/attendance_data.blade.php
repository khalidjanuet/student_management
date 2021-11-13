<div style="width: 100%;text-align: center;padding:20px;">
<div style="margin-left:auto;margin-right:auto;width:600px;min-height:700px;border:1px solid #eaeaea;text-align: center;border-radius:5px;">
	<div style="background: #ff7b00;height:70px; text-align: center;color:#fff;font-size:25px;padding:0 50px">
		<span style="line-height: 70px;font-weight: 700;">Attendance Record</span>
	</div>

    @foreach($students as $a)
	<div style="margin-top:10px;padding:10px;">
		<table border='1' cellpadding="10px" style="text-align:center;margin:0 auto;">
		    
		    <tr>
		        <td style="width:200px;text-align:right;">ID</td><td style="width:200px;text-align:left;">{{$a->student_id}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Name</td><td style="width:200px;text-align:left;">{{$a->student->first_name}} {{$a->student->last_name}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Course</td><td style="width:200px;text-align:left;">{{$a->student->course->name}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Date</td><td style="width:200px;text-align:left;">{{Carbon\Carbon::parse($a->date)->format('m-d-Y')}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Time</td><td style="width:200px;text-align:left;">{{$a->time}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Tutor</td><td style="width:200px;text-align:left;">{{$a->tutor_name}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Session</td><td style="width:200px;text-align:left;">{{$a->session}}</td>
		    </tr>
		    
		    
		    
		    
		   
		   
		</table>
	</div>
    @endforeach

</div>
</div>