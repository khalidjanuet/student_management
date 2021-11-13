@if($type == 1 || $type == 2)
<table class="table table-bordered tabler-hover">

    <tr><td style="width:50%;">Tutor Name:</td> <td>{{$result->tutor_name}}</td></tr>
    <tr><td style="width:50%;">Session:</td> <td>{{$result->session}}</td></tr>
    <tr><td style="width:50%;">Test Type:</td> <td>{{$result->test_type == 1 ? 'Practice' : 'Mock'}}</td></tr>
    
    <tr><td style="width:50%;">Total Score</td> <td>{{$result->total_score}}</td></tr> 
        <tr> <td style="width:50%;">Answer Sheet:</td> <td><a target="_blank" href="{{asset('img/answer_sheets')}}/{{$result->answer_sheet}}">{{$result->answer_sheet}}</a></td></tr>
    

</table>
@elseif($type == 4)
<table class="table table-bordered tabler-hover">

    <tr><td style="width:50%;">Tutor Name:</td> <td>{{$result->tutor_name}}</td></tr>
    <tr><td style="width:50%;">Session:</td> <td>{{$result->session}}</td></tr>
    <tr><td style="width:50%;">Test Type:</td> <td>{{$result->test_type == 1 ? 'Practice' : 'Mock'}}</td></tr>
     <tr><td style="width:50%;">Problems:</td> <td>{{$result->problems}}</td></tr>
    <tr><td style="width:50%;">Suggestions:</td> <td>{{$result->suggestions}}</td></tr>
    <tr><td style="width:50%;">Fluency & Cohesion:</td> <td>{{$result->fluency_cohesion}}</td></tr>
    <tr> <td style="width:50%;">Pronunication:</td> <td>{{$result->pronunciation}}</td></tr>
    <tr><td style="width:50%;">Grammatical Range & Accuracy</td> <td>{{$result->grammatical_range_and_accuracy}}</td></tr>
    <tr><td style="width:50%;">Lexical Resource</td> <td>{{$result->lexical_resource}}</td></tr>
    <tr><td style="width:50%;">Total Score</td> <td>{{$result->total_score}}</td></tr> 
 

</table>
@else
<table class="table table-bordered tabler-hover">

    <tr><td style="width:50%;">Tutor Name:</td> <td>{{$result->tutor_name}}</td></tr>
    <tr><td style="width:50%;">Session:</td> <td>{{$result->session}}</td></tr>
    <tr><td style="width:50%;">Test Type:</td> <td>{{$result->test_type == 1 ? 'Practice' : 'Mock'}}</td></tr>
    <tr><td style="width:50%;">Feedback Introduction Part:</td><td>{{$result->feedback_1}}</td></tr>
    <tr><td style="width:50%;">Feedback Body Paragraph 1:</td><td>{{$result->feedback_2}}</td></tr>
    <tr><td style="width:50%;">Feedback Body Paragraph 2:</td><td>{{$result->feedback_3}}</td></tr>
    <tr><td style="width:50%;">Feedaback Body Paragraph 3:</td><td>{{$result->feedback_4}}</td></tr>
    <tr><td style="width:50%;">Feedback Conclusion Part:</td><td>{{$result->feedback_5}}</td></tr>
    <tr><td style="width:50%;">Task Response:</td><td>{{$result->task_response}}</td></tr>
    <tr><td style="width:50%;">Cohesion & Coherence:</td><td>{{$result->cohesion_coherence}}</td></tr>
    <tr><td style="width:50%;">Grammatical Range & Accuracy</td> <td>{{$result->grammatical_range_and_accuracy}}</td></tr>
    <tr><td style="width:50%;">Lexical Resource</td> <td>{{$result->lexical_resource}}</td></tr>
    <tr><td style="width:50%;">Total Score</td> <td>{{$result->total_score}}</td></tr>
    <tr><td style="width:50%;">Suggestions:</td> <td>{{$result->suggestions}}</td></tr>
    <tr><td style="width:50%;">Audio Recording:</td> <td><audio controls="true" src="{{asset('audio')}}/{{$result->audio_file}}"></audio></td></tr>
    <tr> <td style="width:50%;">Answer Sheet:</td> <td><a target="_blank" href="{{asset('img/answer_sheets')}}/{{$result->answer_sheet}}">{{$result->answer_sheet}}</a></td></tr>
   
    

</table>
@endif