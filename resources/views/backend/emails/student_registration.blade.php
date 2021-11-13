<div style="width: 100%;text-align: center;padding:20px;">
<div style="margin-left:auto;margin-right:auto;width:600px;min-height:700px;border:1px solid #eaeaea;text-align: center;border-radius:5px;">
	<div style="background: #ff7b00;height:70px; text-align: center;color:#fff;font-size:25px;padding:0 50px">
		<span style="line-height: 70px;font-weight: 700;">New Student Registration</span>
	</div>

	<div style="margin-top:10px;padding:10px;">
		<table border='1' cellpadding="10px" style="text-align:center;margin:0 auto;">
		    
		    <tr>
		        <td style="width:200px;text-align:right;">ID</td><td style="width:200px;text-align:left;">{{$student->id}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Name</td><td style="width:200px;text-align:left;">{{$student->first_name}} {{$student->last_name}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Location</td><td style="width:200px;text-align:left;">{{$student->location}}</td>
		    </tr>
		    <!-- <tr>
		        <td style="width:200px;text-align:right;">Course</td><td style="width:200px;text-align:left;">{{$student_course->course->name}}</td>
		    </tr> -->
			
		     <tr>
		        <td style="width:200px;text-align:right;">Email</td><td style="width:200px;text-align:left;">{{$student->email}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Mobile Number</td><td style="width:200px;text-align:left;">{{$student->phone}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">WhatsApp</td><td style="width:200px;text-align:left;">{{$student->whatsapp}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Module</td><td style="width:200px;text-align:left;">{{$student->module}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Previous Attempt</td><td style="width:200px;text-align:left;">{{$student->attempt}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Previous Score</td><td style="width:200px;text-align:left;">{{$student->previous_score}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Overall Target Score</td><td style="width:200px;text-align:left;">{{$student->overall_target_score}}</td>
		    </tr>
		    <tr>
		        <td style="width:200px;text-align:right;">Listening Target Score</td><td style="width:200px;text-align:left;">{{$student->listening_target_score}}</td>
		    </tr>
		    <tr>
		        <td style="width:200px;text-align:right;">Reading Target Score</td><td style="width:200px;text-align:left;">{{$student->reading_target_score}}</td>
		    </tr>
		    <tr>
		        <td style="width:200px;text-align:right;">Writing Target Score</td><td style="width:200px;text-align:left;">{{$student->writing_target_score}}</td>
		    </tr>
		    <tr>
		        <td style="width:200px;text-align:right;">Speaking Target Score</td><td style="width:200px;text-align:left;">{{$student->speaking_target_score}}</td>
		    </tr>
		    <tr>
		        <td style="width:200px;text-align:right;"> Problems </td><td style="width:200px;text-align:left;">{{$student->problems }}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;"> Street Address 1</td><td style="width:200px;text-align:left;">{{$student->street_1 }}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Street Address 2 </td><td style="width:200px;text-align:left;">{{$student->street_2 }}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">City </td><td style="width:200px;text-align:left;">{{$student->city }}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;"> Region</td><td style="width:200px;text-align:left;">{{$student->region }}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Zipcode </td><td style="width:200px;text-align:left;">{{$student->zipcode }}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Country </td><td style="width:200px;text-align:left;">{{$student->country }}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Preferred Day & Time </td><td style="width:200px;text-align:left;">{{$student->session_day_time }}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Starting Date </td><td style="width:200px;text-align:left;">{{$student->admission_date }}</td>
		    </tr>

		    
		   
		   
		</table>
	</div>

</div>
</div>