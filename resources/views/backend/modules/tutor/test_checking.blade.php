@extends('backend.layouts.master')
@section('title', 'Tests')
@section('page_title','Writing Tests')
@section('styles')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
{{-- Image Editor style starts --}}
    <link type="text/css" href="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.css">
    {{-- Image Editor style ends --}}
@endsection
@section('content')
@if(Session::has('delete_success'))
<div class="toast"
    data-title="Success!"
    data-message="Test Deleted Successfully."
    data-type="warning">
</div>
@endif
<div class="container">
    <div class="row">
       <div class="col-md-4">
           <h5>Student Name: {{$test->student->first_name}} {{$test->student->last_name}}</h5>
       </div>
       <div class="col-md-4" >
           <h4 >Checking Timer: <b id="spent_time"></b></h4>
       </div>
       <div class="col-md-4" style="text-align:right">
           <h5>Test: {{$test->question->type == 1 ? 'Practice' : 'Mock'}}, Task {{$test->question->task}} {{$test->question->session}} </h5>
       </div>
       <div class="col-md-12">
           <h5>Student ID: {{$test->student->id}}</h5>
       </div>
       <div class="col-md-12">
           <h4><b>Academic Writing Part 1</b> Answer</h4>
       </div>
       
    </div>
    <form action="{{route('tutor-writing-test-checked')}}" id="answer_form" method="post" onsubmit="handleSubmit(event)" enctype="multipart/form-data">
        <div class="row">
            @if($test->test_type == 1)
            <div class="col-md-8">
                <h4>Answer</h4>
                <textarea id="summernote" name="answer" rows="10">{{$test->answer}}</textarea>
            </div>

           
            <div class="col-md-4">
                <h4>Feedback Area</h4>
                <textarea id="summernote_2" name="feedback" rows="10"></textarea>
            </div>
            @else
            {{-- Image editor field --}}
            <div class="col-md-12">
                <div class="relative image-editor-container" style="height: 600px">
                    <div id="image-editor"></div>
                </div>
            </div>
            {{-- Image editor field --}}
            <div class="col-md-12">
                <h4>Feedback Area</h4>
                <textarea id="summernote_2" name="feedback" rows="10"></textarea>
            </div>
            @endif
            <div class="col-md-12 mt-5" style="border:1px solid #efefef;padding-top:50px;">
                <h3>Writing Evaluation Form</h3>
            
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

                @if($test->test_type==2)
                <div class="row">
                    <div class="col-md-3">
                        <h5>Corrected Answer Sheet:</h5>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="file" class="form-control" name="answer_sheet" required>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-12" style="text-align:right;">
            {{csrf_field()}}
                <input type="hidden" name="student_id" value="{{$test->student_id}}">
                <input type="hidden" name="question_id" value="{{$test->question->id}}">
                <input type="hidden" name="spent_timer" id="spent_timer" value="00:00:00">
                <input type="hidden" name="test_type" value="{{$test->test_type}}">
                <button type="submit" class="btn btn-primary" onclick="handleSubmit(event)">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="{{asset('js/app2.js')}}"></script>
{{-- Image Editor script starts --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.0/fabric.js"></script>
    <script type="text/javascript" src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"></script>
    <script type="text/javascript" src="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js">
    </script>
    <script src="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.js"></script>
    <script type="text/javascript" src="{{ asset('js/white-theme.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/black-theme.js') }}"></script>
<script>

$(document).ready(function() {
    $('#user_table').DataTable();
    $('#summernote').summernote({
        height:500
    });
    $('#summernote_2').summernote({
        height:400
    });
    startTime();
} );
var h = 00;
var m = 00;
var s = 00;
function startTime()
{
    s++;
   
    if(s>=60)
    {
        m++;
        s=0;
    }
    if(m>=60)
    {
        h++;
        m=0;
    }
    var time = h.toLocaleString("en-US", {
    minimumIntegerDigits: 2,
    useGrouping: false,
})+":"+m.toLocaleString("en-US", {
    minimumIntegerDigits: 2,
    useGrouping: false,
})+":"+s.toLocaleString("en-US", {
    minimumIntegerDigits: 2,
    useGrouping: false,
});
    $('#spent_time').html(time);
    $('#spent_timer').val(time);
    t=setTimeout(function(){startTime()},1000);
}

function checkTime(i)
{
    if (i<10)
    {
    i="0" + i;
    }
    return i;
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

</script>
<script>
        // Image editor
       
        var editorInstance = new tui.ImageEditor('#image-editor', {
            includeUI: {
                loadImage: {
                    path: '{{asset('answers')}}/{{$test->answer_sheet}}',
                    name: '{{ $test->id }}',
                },
                theme: blackTheme, // or whiteTheme
                initMenu: 'filter',
                menuBarPosition: 'bottom',
            },
            cssMaxWidth: 700,
            cssMaxHeight: 500,
            usageStatistics: false
        });

        window.onresize = () => editorInstance.ui.resizeEditor();
        document
            .querySelector(".tui-image-editor-wrap")
            .addEventListener("click", () => {
                document.querySelector(".tui-image-editor-main").className =
                    "tui-image-editor-main";
            });
        async function handleSubmit(event) {
            event.preventDefault();

            const fileName = getFileName('{{ $test->answer_sheet}}');
            const newCanvasDataUrl = editorInstance.toDataURL();
            //   Create file from base64
            const newFile = await dataUrlToFile(newCanvasDataUrl, fileName);
            const formData = new FormData();

            // append any other form fields to formdata
           // formData.append('title', document.getElementById('title').value);
            formData.append('answer', newFile);
            formData.append('_method', 'PUT');
            const response = await axios.post(event.target.getAttribute('action'), formData);
        };

        function getFileName(url) {
            return url.split("\\").pop().split("/").filter(Boolean).pop();
        };

        async function dataUrlToFile(dataURI, fileName) {
            // To create a blob from a dataURL:
            const blob = await fetch(dataURI).then((urlData) => urlData.blob());
            // separate out the mime component
            const mimeString = dataURI.split(",")[0].split(":")[1].split(";")[0];

            const newFile = new File([blob], fileName, {
                type: mimeString,
                lastModified: new Date(),
            });
            return newFile;
        };
    </script>
@endsection