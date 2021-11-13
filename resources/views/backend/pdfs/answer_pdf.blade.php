<html>
    <body>
        @if($test_type == 1)
        <div>
            <h3>Your Answer</h3>
            <?php echo $answer; ?>
        </div>
        @else
        <div>
            <h3>Your Corrected Answer Sheet</h3>
            <img src="{{asset('answers')}}/{{$answer}}" alt="" width="500">
        </div>
        @endif
        <hr>
        <div>
            <h3>Tutor Feedback </h3>
            <?php echo $feedback; ?>
        </div>
        
    </body>
</html>