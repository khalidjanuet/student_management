<div style="width: 100%;text-align: center;padding:20px;">
<div style="margin-left:auto;margin-right:auto;width:600px;min-height:700px;border:1px solid #eaeaea;text-align: center;border-radius:5px;">
	<div style="background: #ff7b00;height:70px; text-align: center;color:#fff;font-size:25px;padding:0 50px">
		<span style="line-height: 70px;font-weight: 700;">Fee Record (Verified)</span>
	</div>

	<div style="margin-top:10px;padding:10px;">
		<table border='1' cellpadding="10px" style="text-align:center;margin:0 auto;">
		    
		    <tr>
		        <td style="width:200px;text-align:right;">ID</td><td style="width:200px;text-align:left;">{{$fee->student_id}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Name</td><td style="width:200px;text-align:left;">{{$fee->student->first_name}} {{$fee->student->last_name}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Course</td><td style="width:200px;text-align:left;">{{$fee->course->name}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Total Amount</td><td style="width:200px;text-align:left;">{{$fee->total}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Discount Amount</td><td style="width:200px;text-align:left;">{{$fee->discount}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Net Total Amount</td><td style="width:200px;text-align:left;">{{$fee->net_total}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Paid Amount Now</td><td style="width:200px;text-align:left;">{{$paid_amount_now}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Total Paid Amount</td><td style="width:200px;text-align:left;">{{$fee->paid}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Remaining Amount</td><td style="width:200px;text-align:left;">{{$fee->remaining}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Location</td><td style="width:200px;text-align:left;">{{$fee->location}}</td>
		    </tr>
		     <tr>
		        <td style="width:200px;text-align:right;">Reason </td><td style="width:200px;text-align:left;">{{$fee->reason }}</td>
		    </tr>
		      <tr>
		        <td style="width:200px;text-align:right;"> Due Date</td><td style="width:200px;text-align:left;">{{$fee->due_date }}</td>
		    </tr>
		      <tr>
		        <td style="width:200px;text-align:right;">Admission Officer Name </td><td style="width:200px;text-align:left;">{{$fee->admission_officer_name }}</td>
		    </tr>
		      <tr>
		        <td style="width:200px;text-align:right;">Team Leader Name </td><td style="width:200px;text-align:left;">{{$fee->team_leader_name }}</td>
		    </tr>
		      <tr>
		        <td style="width:200px;text-align:right;"> Payment Method</td><td style="width:200px;text-align:left;">{{$fee->payment_method }}</td>
		    </tr>
		      <tr>
		        <td style="width:200px;text-align:right;">Is OutSide Country </td><td style="width:200px;text-align:left;">{{$fee->outside }}</td>
		    </tr>
		      <tr>
		        <td style="width:200px;text-align:right;">Message </td><td style="width:200px;text-align:left;">{{$fee->message }}</td>
		    </tr>
		      <tr>
		        <td style="width:200px;text-align:right;">Receipt Email </td><td style="width:200px;text-align:left;">{{$fee->email }}</td>
		    </tr>
			<tr>
		        <td style="width:200px;text-align:right;">Receipt </td><td style="width:200px;text-align:left;"><a href="{{asset('receipts')}}/{{$fee->receipt}}" target="_blank">Click To View Receipt</a></td>
		    </tr>
		   
		    
		    
		   
		   
		</table>
	</div>

</div>
</div>