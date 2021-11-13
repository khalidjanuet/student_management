<div style="width: 100%;text-align: center;padding:20px;">
<div style="margin-left:auto;margin-right:auto;width:600px;min-height:700px;border:1px solid #eaeaea;text-align: center;border-radius:5px;">
	<div style="background: #ff7b00;height:70px; text-align: center;color:#fff;font-size:25px;padding:0 50px">
		<span style="line-height: 70px;font-weight: 700;">Writing Test Pen & Paper</span>
	</div>

	<div style="margin-top:10px;padding:10px;">
		<table border='1' cellpadding="10px" style="text-align:center;margin:0 auto;">
		    
		    <tr>
		        <td style="width:200px;text-align:right;">Student ID</td><td style="width:200px;text-align:left;">{{$student->id}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Student Name</td><td style="width:200px;text-align:left;">{{$student->first_name}} {{$student->last_name}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Course</td><td style="width:200px;text-align:left;">{{$question->course->name}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Test Type</td><td style="width:200px;text-align:left;">{{$question->type == 1 ? 'Practice' : 'Mock'}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Session</td><td style="width:200px;text-align:left;">{{$question->session}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Task</td><td style="width:200px;text-align:left;">{{$question->task == 1 ? 'Task 1' : 'Task 2'}}</td>
		    </tr>
		    <tr>
		        <td style="width:200px;text-align:right;">Question</td><td style="width:200px;text-align:left;"><?php echo $question->question; ?></td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Answer</td><td style="width:200px;text-align:left;">{{asset('/answers')}}/{{$answer->answer_sheet}}</td>
		    </tr>
		     
		</table>
	</div>

</div>
</div>