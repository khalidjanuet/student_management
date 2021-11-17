<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Image Editor style starts --}}
    <link type="text/css" href="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.css">
    {{-- Image Editor style ends --}}
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <form action="" onsubmit="handleSubmit(event)"
                    enctype="multipart/form-data">
                    <div class="form-group p-2">
                        <label for="title">Answer Title</label>
                        <jet-input id="title" type="text" value="{{$student->id}}" />
                    </div>

                    {{-- Any other form fields --}}

                    {{-- Image editor field --}}
                    <div class="relative image-editor-container" style="height: 600px">
                        <div id="image-editor"></div>
                    </div>
                    {{-- Image editor field --}}

                    <div class="form-group">
                        <button class="bg-green-400 p-2 rounded-md" onclick="handleSubmit(event)">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
        // Image editor
       
        var editorInstance = new tui.ImageEditor('#image-editor', {
            includeUI: {
                loadImage: {
                    path: '{{asset('img/student')}}/{{$student->profile_image}}',
                    name: '{{ $student->first_name }}',
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

            const fileName = getFileName('{{ $student->profile_image}}');
            const newCanvasDataUrl = editorInstance.toDataURL();
            //   Create file from base64
            const newFile = await dataUrlToFile(newCanvasDataUrl, fileName);
            const formData = new FormData();

            // append any other form fields to formdata
            formData.append('title', document.getElementById('title').value);
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
    {{-- Image Editor script ends --}}

</body>

</html>
