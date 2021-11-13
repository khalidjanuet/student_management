<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Writing Evaluation Form</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
</head>
<body class="light">
@if(Session::has('saved_success'))
<div class="toast"
    data-title="Success!"
    data-message="Evaluation Data Saved Successfully."
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
        <h1 class="page-title">Writing Evaluation</h1>
       
    </div>
    <div class="banner-overlay"></div>
</div>

    <div id="primary" class="p-t-b-50 height-full" style="background:#fff;padding:0 10px;">
        <div class="container" style="background:#f3f5f8;border-radius:10px;padding:20px 0;">
            <div class="row">
                <div class="col-lg-12 mx-md-auto" style="color:#000;">
                    <div class="text-center">
                        <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;margin:10px auto 30px auto;" alt="" style="">
                        <h1 class="mt-2" style="color:#000;font-weight:600;">IELTS MASTER WRITING EVALUATION FORM</h1>    
                    </div>
                    <form action="{{route('writing-evaluation-save')}}" method="POST" enctype="multipart/form-data" style="padding:50px;">
                        
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Student Name:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <select name="student_id_name" id="student_id_name" class=" form-control select2" onchange="change_student_id()" required>
                                       <option value="0">Choose Student</option>
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}">ID: {{$student->id}} | {{$student->first_name }} {{$student->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Student ID:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="student_id" name="student_id" value="{{old('student_id')}}" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Tasks:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="task" id="task" class="form-control" required >
                                        <option value="">Select Task</option>
                                        <option value="1">Task 1</option>
                                        <option value="2">Task 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Test Type:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="test_type" id="test_type" class="form-control" onchange="get_sessions()" required>
                                        <option value="">Select Test Type</option>
                                        <option value="1">Practice</option>
                                        <option value="2">Mock Test</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Question Number:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control select2" name="session" required id="session">
                                        <option value="">Select Practice Number</option>
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                       
                        
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Feedback-Introduction Part:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="feedback_1" id="" cols="30" rows="4" required>{{old('feedback_1')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Feedback-Body Paragraph 1:<span style="color:red;" required>*</span></h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="feedback_2" id="" cols="30" rows="4" required>{{old('feedback_2')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Feedback-Body Paragraph 2:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="feedback_3" id="" cols="30" rows="4" required>{{old('feedback_3')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Feedback-Body Paragraph 3:</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="feedback_4" id="" cols="30" rows="4">{{old('feedback_4')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Feedback-Conclusion Part:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="feedback_5" id="" cols="30" rows="4" required>{{old('feedback_5')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Task Response:<span style="color:red">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="task_response" id="" class="form-control" required>
                                         <option value="3">Band 3</option>
                                        <option value="3.5">Band 3.5</option>
                                        <option value="4">Band 4</option>
                                        <option value="4.5">Band 4.5</option>
                                        <option value="5">Band 5</option>
                                        <option value="5.5">Band 5.5</option>
                                        <option value="6">Band 6</option>
                                        <option value="6.5">Band 6.5</option>
                                        <option value="7">Band 7</option>
                                        <option value="7.5">Band 7.5</option>
                                        <option value="8">Band 8</option>
                                        <option value="8.5">Band 8.5</option>
                                        <option value="9">Band 9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Cohesion & Coherence:<span style="color:red">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="cohesion_coherence" id="" class="form-control"  required>
                                        <option value="3">Band 3</option>
                                        <option value="3.5">Band 3.5</option>
                                        <option value="4">Band 4</option>
                                        <option value="4.5">Band 4.5</option>
                                        <option value="5">Band 5</option>
                                        <option value="5.5">Band 5.5</option>
                                        <option value="6">Band 6</option>
                                        <option value="6.5">Band 6.5</option>
                                        <option value="7">Band 7</option>
                                        <option value="7.5">Band 7.5</option>
                                        <option value="8">Band 8</option>
                                        <option value="8.5">Band 8.5</option>
                                        <option value="9">Band 9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Grammatical Range and Accuracy:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="grammatical_range_and_accuracy" id="" class="form-control" required>
                                        <option value="3">Band 3</option>
                                        <option value="3.5">Band 3.5</option>
                                        <option value="4">Band 4</option>
                                        <option value="4.5">Band 4.5</option>
                                        <option value="5">Band 5</option>
                                        <option value="5.5">Band 5.5</option>
                                        <option value="6">Band 6</option>
                                        <option value="6.5">Band 6.5</option>
                                        <option value="7">Band 7</option>
                                        <option value="7.5">Band 7.5</option>
                                        <option value="8">Band 8</option>
                                        <option value="8.5">Band 8.5</option>
                                        <option value="9">Band 9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Lexical Resource:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="lexical_resource" id="" class="form-control" required>
                                        <option value="3">Band 3</option>
                                        <option value="3.5">Band 3.5</option>
                                        <option value="4">Band 4</option>
                                        <option value="4.5">Band 4.5</option>
                                        <option value="5">Band 5</option>
                                        <option value="5.5">Band 5.5</option>
                                        <option value="6">Band 6</option>
                                        <option value="6.5">Band 6.5</option>
                                        <option value="7">Band 7</option>
                                        <option value="7.5">Band 7.5</option>
                                        <option value="8">Band 8</option>
                                        <option value="8.5">Band 8.5</option>
                                        <option value="9">Band 9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Total Score:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <select name="total_score" id="" class="form-control" required>
                                        <option value="3">Band 3</option>
                                        <option value="3.5">Band 3.5</option>
                                        <option value="4">Band 4</option>
                                        <option value="4.5">Band 4.5</option>
                                        <option value="5">Band 5</option>
                                        <option value="5.5">Band 5.5</option>
                                        <option value="6">Band 6</option>
                                        <option value="6.5">Band 6.5</option>
                                        <option value="7">Band 7</option>
                                        <option value="7.5">Band 7.5</option>
                                        <option value="8">Band 8</option>
                                        <option value="8.5">Band 8.5</option>
                                        <option value="9">Band 9</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Suggestions for Improvement:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="suggestions" id="" cols="30" rows="4" required>{{old('suggestions')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Answer Sheet Corrected By:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tutor_name" value="{{old('tutor_name')}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Corrected Answer Sheet:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="answer_sheet">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Recording:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   
                                    <main>
                                            <div class="controls">
                                                <button type="button" id="mic">Get Microphone</button>
                                                <button type="button" id="record" hidden>Record</button>
                                            </div>
                                            <ul id="recordings"></ul>
                                    </main>
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
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="{{asset('js/app2.js')}}"></script>
<script>
    function change_student_id()
    {
        var student = $('#student_id_name').val();
        $('#student_id').val(student);
       
    }
    function get_sessions()
    {
        var student = $('#student_id').val();
        $.ajax({
                type:'GET',
                url:"{{route('student-course-session-details-ajax')}}",
                data:{'student_id':student,'type':4,'task':$('#task').val(),'test_type': $('#test_type').val()},
                success:function(data){
                    $('#session').html(data);
                   
                }
		    });
    }
    window.addEventListener('DOMContentLoaded', () => {
        const getMic = document.getElementById('mic');
        const recordButton = document.getElementById('record');
        const list = document.getElementById('recordings');
        if ('MediaRecorder' in window) {
          getMic.addEventListener('click', async () => {
            getMic.setAttribute('hidden', 'hidden');
            try {
              const stream = await navigator.mediaDevices.getUserMedia({
                audio: true,
                video: false
              });
              const mimeType = 'audio/webm';
              let chunks = [];
              const recorder = new MediaRecorder(stream, { type: mimeType });
              recorder.addEventListener('dataavailable', event => {
                if (typeof event.data === 'undefined') return;
                if (event.data.size === 0) return;
                chunks.push(event.data);
              });
              recorder.addEventListener('stop', () => {
                const recording = new Blob(chunks, {
                  type: mimeType
                });
                renderRecording(recording, list);
                chunks = [];
              });
              recordButton.removeAttribute('hidden');
              recordButton.addEventListener('click', () => {
                if (recorder.state === 'inactive') {
                  recorder.start();
                  recordButton.innerText = 'Stop';
                } else {
                  recorder.stop();
                  recordButton.innerText = 'Record';
                }
              });
            } catch {
              renderError(
                'You denied access to the microphone so this demo will not work.'
              );
            }
          });
        } else {
          renderError(
            "Sorry, your browser doesn't support the MediaRecorder API, so this demo will not work."
          );
        }
      });

      function renderError(message) {
        const main = document.querySelector('main');
        main.innerHTML = `<div class="error"><p>${message}</p></div>`;
      }

      function renderRecording(blob, list) {
        const blobUrl = URL.createObjectURL(blob);
        const li = document.createElement('li');
        const audio = document.createElement('audio');
        const anchor = document.createElement('a');
        const file = document.createElement('input');
        file.setAttribute('type','file');
        file.setAttribute('id','audio_file');
        file.setAttribute('name','audio_file');
       
        anchor.setAttribute('href', blobUrl);
        const now = new Date();
        anchor.setAttribute(
          'download',
          `recording-${now.getFullYear()}-${(now.getMonth() + 1)
            .toString()
            .padStart(2, '0')}-${now
            .getDay()
            .toString()
            .padStart(2, '0')}--${now
            .getHours()
            .toString()
            .padStart(2, '0')}-${now
            .getMinutes()
            .toString()
            .padStart(2, '0')}-${now
            .getSeconds()
            .toString()
            .padStart(2, '0')}.webm`
        );
        anchor.innerText = 'Download';
        audio.setAttribute('src', blobUrl);
        audio.setAttribute('controls', 'controls');
        li.appendChild(audio);
        li.appendChild(anchor);
        li.appendChild(file);
        list.appendChild(li);

      }

      	//upload link
	
</script>
</body>
</html>