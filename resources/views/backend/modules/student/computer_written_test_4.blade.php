<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Student Report Card</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    body{
        background-color: #dbe5f5 !important;
        color:#000 !important;
    }
    .banner .help-container {
        min-height: 26px;
    }
    .banner.black .help-container {
        background: #000;
    }
    .banner .help-container ul {
        margin: 0;
        padding: 0;
        width: 100%;
    }
    .banner .help-container ul li {
        padding: 6px 0;
        width: 33%;
        height: 100%;
        box-sizing: border-box;
        list-style-type: none;
        display: inline-block;
        font-size: 14px;
    }
    .banner .help-container ul li:first-child {
        position: relative;
        padding-left: 30px;
        text-align: left;
        color: #ddfed9;
        float: left;
    }
    .banner .help-container ul li:first-child:before {
        content: "";
        display: block;
        position: absolute;
        top: 5px;
        left: 10px;
        width: 16px;
        height: 16px;
        background-image: url("{{asset('img/computer_written_3_icon_1.png')}}");
        background-size: cover;
    }
    .banner .help-container ul li:nth-child(2) {
        position: relative;
    }
    .banner .help-container ul li:nth-child(2):before {
        content: "";
        display: block;
        position: absolute;
        top: 6px;
        left: calc(50% - 80px);
        width: 16px;
        height: 16px;
        background-image: url("{{asset('img/computer_written_3_icon_2.png')}}");
        background-size: cover;
    }
    .timer-container {
        text-align: center;
    }
    .timer-container {
        display: block;
        top: 2px;
        left: calc(50% - 45px);
        font-size: 21px;
        cursor: pointer;
        font-size: 14px;
        padding-left: 10px;
        color: #fff0bd;
    }
    .timer-container .show-hover {
        display: none;
    }
    .timer-container .font-big
    {
        font-size: 21px;
        position: absolute;
        top: -5px;
        left: -35px;
    }
    .timer-container .hide-hover {
        display: inline-block;
        position: relative;
        padding-left: 25px;
    }
    .banner .help-container ul li:nth-child(3) {
        padding: 0 10.5px;
        text-align: right;
        float: right;
    }
    .banner .help-container ul li:nth-child(3) button {
        font-size: 14px;
        margin-top: 2px;
        display: inline-block;
        padding: 4.2px 14px;
        background-color: #6aade4;
        color: #050608;
        border-radius: 6px;
        border: none;
        box-shadow: inset 0 1px 0 hsl(0deg 0% 100% / 30%), inset 0 0 2px hsl(0deg 0% 100% / 30%), 0 1px 2px rgb(0 0 0 / 29%);
    }
    .banner .help-container ul li:nth-child(3) button:first-child {
        padding-right: 36px;
        position: relative;
        margin-right: 8px;
    }
    .banner .help-container ul li:nth-child(3) button:first-child:after {
        content: "";
        display: block;
        position: absolute;
        top: 4px;
        right: 14px;
        width: 16px;
        height: 16px;
        background-image: url("{{asset('img/computer_written_3_icon_3.png')}}");
        background-size: cover;
    }
    .banner .help-container ul:after {
        content: "";
        display: block;
        height: 0;
        clear: both;
    }
    .main-content-container {
        border-top: 1px solid transparent;
        background-image: url("{{asset('img/written_test_bg_1.png')}}");
        background-repeat: repeat-x;
        min-height: 500px;
    }
    .main-content-container.full-height {
        height: calc(100vh - 70px);
        min-height: 0;
    }
    .banner.black+.main-content-container {
        border-top: 1px solid #000;
    }
    .highlight-notes-container {
        position: fixed;
        z-index: 1;
        width: 0;
        height: 0;
        top: 0;
        left: 0;
        background-color: transparent;
        display: none;
        overflow: visible;
    }
    .highlight-notes-container .context-menu-list {
        display: none;
        margin: 0;
        padding: 0;
        min-width: 120px;
        position: absolute;
        list-style-type: none;
        border: 1px solid #ddd;
        background: #eee;
        box-shadow: 0 2px 5px rgb(0 0 0 / 50%);
        font-size: 11px;
    }
    .highlight-notes-container .context-menu-list .context-menu-item {
        font-weight: 700;
        padding: 2px 2px 2px 24px;
        background-color: #eee;
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
        min-height: 18px;
        background-repeat: no-repeat;
        background-position: 4px 2px;
        font-family: Verdana,Arial,Helvetica,sans-serif;
        text-align: left;
    }
    .highlight-notes-container .context-menu-list .context-menu-item.icon-highlight {
        display: none;
        background-image: url("{{asset('img/computer_written_3_icon_4.png')}}");
    }

    .test-container {
        text-align: left;
        position: relative;
        overflow: hidden;
    }
    .main-content-container.full-height .test-container {
        height: 100%;
    }
    .test-container .title {
        margin: 12px 10px;
        padding: 12px 10.5px;
        color: #000;
        background-color: #fff;
        font-size: 18.5px;
        font-weight: 700;
        box-shadow: 0 0.0714em 0.214em rgb(0 0 0 / 25%);
    }
    .test-container .content {
        display: -webkit-flex;
        display: flex;
        vertical-align: top;
        margin: 12px 10.5px;
        border-radius: 6px;
        box-shadow: 0 0.0714em 0.214em rgb(0 0 0 / 25%);
        background-color: #dde3ee;
    }
    .main-content-container.full-height .test-container .content {
        height: calc(100% - 130px);
    }
    .test-container .content .answer, .test-container .content .question {
        padding: 0 10.5px;
        width: 50%;
        overflow-y: auto;
    }
    .test-container .content .answer p, .test-container .content .question p {
        margin-bottom: 20px;
    }

    .test-container .content p {
        font-size: 14px;
        line-height: 1.5;
    }
    .test-container .content .answer, .test-container .content .question {
        padding: 0 10.5px;
        width: 50%;
        overflow-y: auto;
    }
    .answer>div {
        width: 100%;
        height: 100%;
    }
    .answer>div .text-area-container {
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        padding: 12px 5px 10px 0;
    }
    .test-container .content .answer>div>div {
        padding-left: 14px;
    }
    .answer>div .text-area-container textarea {
        resize: none;
        width: 100%;
        height: calc(100% - 40px);
        border-radius: 2.2px;
        border: 1px solid #0370a7;
        font-family: Arial,Helvetica,sans-serif;
    }


    .answer>div .text-area-container p {
        display: block;
        margin-bottom: 40px;
        margin-top: 0;
    }
    .test-container .content .answer p, .test-container .content .question p {
        margin-bottom: 20px;
    }
    .test-container .content p {
        font-size: 14px;
        line-height: 1.5;
    }
    .footer-nav {
        position: fixed;
        width: 100%;
        left: 0;
        bottom: 0;
        padding: 0 3px;
    }
    .footer-nav>div:first-child {
        position: absolute;
        bottom: 10px;
        left: 5px;
    }
    .footer-nav>div {
        display: inline-block;
    }
    .footer-nav .question-nav {
        margin-left: 75px;
        height: auto;
        position: relative;
        background-color: #dde3ee;
        width: calc(100% - 220px);
        border: 1px solid #fff;
        border-bottom: 0;
        padding: 4px 14px 4px 7px;
        background: hsla(0,0%,100%,.25);
        border-radius: 8px 8px 0 0;
        box-shadow: 0 1px 3px rgb(0 0 0 / 50%);
    }
    .footer-nav .question-nav ul {
        margin: 0;
        padding: 0;
        width: calc(100% - 200px);
    }
    .footer-nav .question-nav ul li {
        display: inline-block;
        list-style-type: none;
        width: 23px;
        height: 23px;
        font-size: 14px;
        color: #fff;
        background-color: #000;
        border: 1px solid #000;
        font-weight: 700;
        border-radius: 2px;
        margin: 4px 1px;
        text-align: center;
        padding-top: 2.5px;
        box-sizing: border-box;
        box-shadow: 0 1px 3px rgb(0 0 0 / 50%);
        cursor: pointer;
    }
    .footer-nav .question-nav ul li.current {
        border-color: #34b2f1!important;
        background-image: url("{{asset('img/computer_written_3_bg_2.png')}}");
        text-shadow: 0 0 2px #000, 0 0 2px #000;
        color: #fff!important;
    }
    .footer-nav .question-nav ul li span {
        padding: 0;
    }
    .footer-nav .question-nav ul li .hover-message, .footer-nav .question-nav ul li span.arrow-down {
        display: none;
    }
    .footer-nav .question-nav ul li .hover-message, .footer-nav .question-nav ul li span.arrow-down {
        display: none;
    }
    .footer-nav .question-nav button {
        position: absolute;
        display: block;
        width: 28px;
        height: 28px;
        right: 4px;
        bottom: 4px;
        background-color: initial;
        border: none;
        background-image: url("{{asset('img/computer_written_3_icon_5.png')}}");
        background-size: cover;
        background-repeat: no-repeat;
        outline: none;
    }
    .footer-nav>button {
        position: absolute;
        width: 56px;
        height: 56px;
        background: transparent;
        border: none;
        background-size: auto;
        background-repeat: no-repeat;
        background-image: url("{{asset('img/computer_written_3_icon_6.png')}}");
    }
    .footer-nav>button.previous {
        bottom: 0;
        right: 64px;
        background-position: 0 100%;
    }
    .footer-nav>button.next {
        bottom: 0;
        right: 8px;
        background-position: 0 0;
    }
    .task2{
       display: none;
    }
    .task2-active{
        height:100% !important;
    }
  
    .banner.black+.main-content-container {
    border-top: 1px solid #000;
    }  
    .confirm-container, .confirm-finish-container {
        text-align: center;
        width: 760px;
        margin: 60px auto 10px;
    
    }
    .confirm-container h1, .confirm-finish-container h1 {
        text-align: left;
        color: #fff;
        padding: 7px 12px 7px 70px;
        font-size: 16px;
        font-weight: 700;
        text-shadow: 0 1px 2px rgb(0 0 0 / 75%);
        margin-bottom: 3px;
        position: relative;
    }
    .confirm-container h1:before, .confirm-finish-container h1:before {
        content: "";
        display: block;
        position: absolute;
        left: 10px;
        bottom: -6px;
        width: 48px;
        height: 48px;
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAEt1JREFUeNrEWQmUVOWV/t5WW1dVd1fv0N00NN2AgCugMUhUcFCJcU7GJErmuCXHZCKJB+MS4wxmNOqcOC5jMhpBJ2o0hpjBjFGjkTjukRalaWgQ6H3v6q6urvXV2+f+/6vqBm2ImjnxcX7qvVddr+5373fv/e5fguM4ONrx/Wuvrbdt+2uAs9A0rRNNy1qia5pHzeWg0aLX9nQ6vScxOfnY7ra2F/EZHMIMAMLXX3fdGlEUv+fxeL4gShJgO9ANHbquI0eG51zjoWaz/DWbVZFMJZ4lIN/s7u4Z+1sCkD9845ZNm7ZVVVWtlhUFhu4abZoGBFOAIssIlJXB5/NheHgIgwRAoM9IkoCy0rIvaWrufmO885K/heFKeePMADRd92VHR1FcXIzly5ejvLyc3zctE319/ejq6kJPTw9qamowNjbGowFHgG5qULyeixtOWHVHz+7X93xmESCv/8Qn2Q91HPyg+v1du7iBjm3DoiWKFAVJRNCnoPPQATQvPA6JRBIWgZuMJxgAIiXW02Nu+ixzAK8/+q9bKyqrvhoKhSDJLkb2dxZRyaBcMAjUB71DePDZnchkMkjT0nIa/D4/RqOj73W3vrbsM6MQOyRZKmfJKwji1D2G08VqA3R73qwIaiN+HMio5HSWCQ69b7PP1B/ri5+67+YgOeWHgWDxt+g7bFmSAqIgipZltOlarkXT1C0XfedHbZ+aQuygB4a56cJhN4lCDl/s1EWz+pQGHByI5REKBIGgCJCO9mW/uu+H1ZHy6terZtc3CfSHyck4RS6LomARfd5eYei+FdmMsuG3D9z6P6ahf/via3488pcAiDPyShRC4N4X8rbbVEktstmic5O+y4Jh6ij2WpQjGl07PAIS5Ydt2TOW0Sfuuam6ctacnfVNi5qKQmH4iwIoiZSxL7MESYGX6OcPBBAKh1BSEr7Q5/e3br1/06mfCgAdIWYQ87JNCWpZFvHfpHJq8ldNTSObjCOXyWFFUwRrl0bQXOUrZNV7Mz2woqbulzX182bLlFOSKFKUJUp6LyLllVIsNgFVt5BOpaDnWGl24PUoVVS2tz9x901LPzEA27JsVllM8rJpGLDzr4aWRSYVowaWomQ24JUcrJwfRmO5B2cvikBXVYs+/vKHn/f0g7dfWlFTu0YSBZ4vDnOOwKgqwOPxoqgohP1tu9HZ3YvxiUnkNI1REbJHCtJHHn/8rhulTwSAGlfKMDTeyJjhOTWDbDpOxsdBiUb3dP6aY0vN8b+zDN3IqGqcLDtCUvzXnd/3RMqr7mXG2rZLQfIPzyPGPNYko0PddsP8+h1fWX+hufz0FVCITjlNh0Q0VjyeE8mbF32iJNbU7IiaURY5JuO3yYzjtd4g+jBjNfJQLqdSJFQ6z7FoWNv3Jx6xHfttKqFHJJ4/VPxtqjoRixxiCmS0KHPvsv+YE/o79iOtqrvPW3naqb5wGKGyCtQ1zkVvZxf2tLxPIATWf66hT2z92BGIjQ29nZyIIpMgnmcz3GAScVzAscaWZbU/leVaiNX//SPaS53j+i8OvvunXx7+nIdu/R7ZLm+0yBGM2+QYdxH4VHwc/YfaMZlI2KefeUalEi6B5A1QgfcDHh/mzJ+Pz69e5VJNEj+3+bZrln7sCFCivqnSF7HOK1E/oBDCoOXSSXVX1m1e3aNJahy+g3veer7lo1S0z6Ui0GBq9PdUf2VZp6IjcjCpyQlkiX45w949u3HeSVIgSJbKbn6YItUCIFJZiaWnHI8db7SQTfbZ9Mg9HwUQ63PPyqb7D1GiJZPOWtR9qafJnLs6ow+PAvNmXpHS9YHBBGqq5AUzFgPHXqdn08jJAkxdc53D6MieZ5jIZHP251afWaqQ8ZLiJW9T82SNxuGVBI4lob5hDgF4h0XiHLr7Hx+LQpffuW0inUlvTyaTSCYTtFJI03kmneL0YfxnsmJf/yTry1BK65acc/GGwEf6iYCzWdVhilbNEBBaTJZTvvPk1x2nbW7z/AaZKpEjUqGh6PD+w5KEXgXGAFmBK3ec445NoUIkComsaf9GCbuW1WxW+JiYswzTFXaU0D1jKcQyBqvXCM8+ri4imNF1Vz909/6uwTvo43rXH26ljBXqXQ1lukYxM+jzBj2HZgh79QVraxUynksW25UorNVzg5kscVx5YplUvSyn/pM0Mlx9y5ZXk4bnBcZ1xnmDqFNoZkMTGYwkdYSDflTWzkOovJ7yzlPUMDuyac3pJw3WVxQtmXfeJpm6t4d1cWYA+yxzgElLoxKpW87+murKcok5myqdQBElZHDY7GHRIgqRp3jUuBKwLeljJfHstTdKi5csW1oWKXu0b2j+CVedWYrxPS+CxSGTMzGWpfDTs8pKisloHxrP/CqyhoJgsASlZRGyQStbfsrxrbNGM49pxotR07JrmARh2ofnJzOKABy3uMkjMbaAokP54cgmj4TAIsH4T82TUCMxEafyzRxgWccEQIYr1dV1DStOPevRSGn56ZKTwPGLF2Dp2guw5c1XINo5eGlK8wdJw3h98Ph9OHntlSiuacTO1g9IKszhEWHhN/WEqGryFclYpRYyM6TzHM5nhkA3LBYBfWFzfaPIEpZygkkWwZa4GMyXQTcilo7hgSFOOaqCE0cFQMbTJIKahrkLnptVU9PsJc/2HOrEl/7uDIRDXsw77mQk+lrhJ+3ioRWqqMVp6y5HbUMT+gajRCkDgWA1lXCZxk4JouMnr/koMRd79Yk3ISgy9ywHx2jiOFmvpJRQdlMFyHFx6CavCFfusgpEi5pfT08//4yuGx0zAhiWeG4UV1Y0XDm3YU6zP1AEL01WqayFM5bNRyjkx7lfuRxP3LURpcEIlq35ByxefgZJ4BCS6SziNJEZKIHgCYCIwqkmikUIhsmA4Eqkh18hTaNwPcVLNNFBlATTJtrY5H1bJ8CUHw4rFkJ+rsjTKJdKpnt7h4KsDxGA12YEsGzNJUIwVFMb8IU3ZtJpVFRUkv4gqvhDKC8tIm/pSPW/jvXrz4KlVKJ2wQKwSY1VpWQihbdbh0gW15Iok/L9wsJ4fIwMtuh+NeS6s6GOvAFFdHhDZAnNyouanKAc8nNBJykEggA4+cGIUcohcIcOdr9Fwm6ti8d+5qhVqH7OCVf5AkWh2FiMOq8MWfFA9hVR08rgsfs2Ys68ZjQ3N6KpOoM/PPYDPPLAXRgdT6CjfwwZM0Ra3ss/J4iup4cGRjEWz1CHJrl88teR9TeS54k+ls2FHIHwDo+MIjU+DDVf4Uzq/DZ1bEfPwaJOTX0j/cf/bdEtg3lff++2Lb9pObLHCO5a9vd3+6uqqoerygLFJ568lLd6RoS33t6Bc4/XsKxuHMVOByrmUyf3lCJNX/r4SwMYGInDKT0VFbObiHJePtRQteZdOj0ZpSfYWDKPxJkUd7361x+sCj3IuvHa0xZ1eCrmuxQKBCNfsHW1OE61XSQtYrMhhv7JVONWnLYKs4piSHcOQC4/nTwaxMD+J/D5VWvw1G9foqSNkOeVvEvYV1CVySapW6exaI4fpywqR3v7JH+TaSpZZkvmS1HYUqZePR4lfz19r/B37LNEMWlgoH/Dvn372Ld9dyoHFMFZZVHYo+MjTLsQt4l/FGa2WSV7wwhU1CD6fhwHf/8tWOVnwShexeAhKc5FA8lfgXGbVw6mc1KkNjMYHBjGmhPnkPEdeLp7OzKW6hZIoTCkUoy5WhA5hympeS5w8cjUJ7vPzulNNhMwhVFdUoGbL7weBw4c2HAEAHrIQhEy5/DE2BhC1KBI3hNyEMfjqPZ0o7T2BOoDKjp7BoGwgN0HxhAsLuONh3GaKwCq2XEaDVt37ULTgsUQ8jxlxifUZJ6zbqXk0zY3Dq7esVwQMp1TkPiuAE9uh64Fdi0ilfNxYIIgHJnEVIMXkd6mKciHro6D1BQNrv+99MCeQaJP/59Q0vxlFC/+BqoqWOlM4bWWXgRoAC+MnWyvaHCoF227dqJmdh3KKqtc75A1BSDiDMYXPM6jzZbMzt1rNn7KYv49WeCDzYxViCauKuZJheTsQE8XZTwbFVVSgQKGqFIoikNfTgVOCkAuXYjWna+xKYvTho+WlLQjg10Y7OnkUSmvnIUADf0uAHf6KohMTpfDjRenjVeY4eyazyACKqjnhKgSyvn32d8zTcSObedfUjEFwLKsMDNG4rofiMdjNKzQMEPJPDYepy+lJjO5G1r/VkRHOvHuAZ13YzbUs+E7nRhBhmp6RjVRTvkSIiNOenWzu3umKAVZzSPAjBeFgoddY6eNF6aMn1NSh00X3oKbzv9nRALFeQDOFAA6uWcKgGloFleKbKOAnjrU30/qk8Y+w8bgcBSecCN3n6pq6OvrhOmto3pu8LHQ0hIEII7Orl6UV9UgQA1uyR9/jkavG25WWUQcRp+8x8W8oQXjxTwgdj0vUo8bvngDPZukuuDFpaddRfKE5YHAt3fYEZTli55YsIDPHyLxt43Rhr9JQ0U/UYGNk/FkBuPjMWiRdbAjZ2HcqMFzu4r5gKGTmnSMLEVkEK2te1BaXoOiUAlKulrRrMdIKptTAJhlU54Xp7mtSPmElaap1FQ2D9etu5FKcY5yy+I7di/v/50LUgS/x46AbfsounwbX4yNdDzEhnVdJ6o4bPQzEBuP0ryaRUnYj2deakFGc9CbrEfXZDUfBQ1dxdhoHzo7OhCOVHDjWWlc1rINZVRaqyUpD8AzXVEOM555WjrMeFZ9FlQ04dp110NNZ7jkLiktweZX78Fwpov/PaMh24LhAIjesuOs5AA6W7Y8N9ix41k1m7U0nQQYBX24v49HIRjw4a0drYhGR/D8K7u4jlGJOkZ2DJMTMbLZS3NAKcllGd7+g6jV0/CT0b5EYgqAmOdvVVEE93/9di7SdvW9j72De9Ab60EyN+kaf/51lEspzvOS0lLX+GwXr0yK7NKQyWq++UwAPIJwCgcwFHdG+vY+c+e+Pz/+74n4aL9pU+1OpmkGTiGlGjjQ0Ye+9t+jZdchygsTIY8Ojaa00bE4/EUlsASFD/dl3W0U8iAEiiDV4SkK6WyDjK7vvezHvLJs/uZPMTdSx5VBWotTp6/GNeddi4nYGB/2mfEPv3YvRsh4RXJ/j2BllFFI140pAUcgGg8fKXekYwcf2/f6z34weOjPWzVdG2HeiI4lYJJHXmnpQjproiQk8C2R9r0fkIALwyEZwTZ306RKZ48dItnsgaPluOosRODAcAdSlOw5yjM233oECT+//GeYXzYXa5vPwX2X/RTj0VE+6BcTbX7y/M3oTx/MG+/2AEYhVUvzylfYKWdMeqSysoQPNBQFprb2zyoVesZ739ob63/n6aKyplOpA1+waOG85ncPqqJHZjonjT3te6kPVMIUPKR5yNOCxutkWYqUbGUdaXwDhdmPVyGK/WhmGP/44BV48p9+AYWyooQkytYNv+G7ekMD/fxvKmtq8KNt16AjsQseSpQwzSVFXj/bvIZhZ5FLzpqKAHMqy5PtExP6ETMxAVHppY2A7EtF972hZUZfSEdrVmq6sbSyur4paokB01KKdN3yOMlUkazoRfmtBJSaJIcJiFXwUj4CvBFRgg8k+3DFw1fikW88DIlo2t19iEeKbewy42/93UZ0Jsl4ReBl03JIUpsq57/Md7Md3vH5jonF6KdFnzJNacadOQLCsiVKw06S9H2HmEuWx2JRj54mnupZydRpzrUMKT+SSrMEwYe6uudyrBbZ9tSgzZWkKPJrBmQ43Y8Nj1+F/7x0M0pLynjHryLjbyPjD02+lzf+QyuvkUS+v+Q6J0VOakunP6BTr3wsAb5z+1PMpgECMugJltN16xHCniLFO9ZKSQpoZHiGyrFATdErilNSggs0cZrPI9l+fPfJy3D7l++H5BHJ83nakPEe+aMA5HypFXgVcgGM5HL6lokJ9jOULX+cSYKAzDiRXFJb6/yKOjeJtcDXDCMeymRKWXoV5SUE/zGDJaPgAigYlTDHsHHben7OjC543vMhw91Xt48InEJuGb1ndPTlmGW9TacZNhMf03hTNY763urpU7XXsvYGEokzAmS8ngfAfnJihtjikQCmqYIZvX44AEl0AYiYjkB7LvdrenmB7QBSdMVjApjdcMLR32zbUTjLbEul/uVSQfh1lddbLec7MdPvrPt+2Mip6yna4EjO5wHIeZHH5whhWkrQ8d+0cg4dcv+7T37qIXV93ebCb8gO0egddWLii2cFgzcsUpRzK207zN5bMKsR3VGKBJFQMsmTNrOEqgyXqERi1qDy84KY/9mJVRyxYDjc+xFvKd9Xyi/1mL8PfJqDHqoRiLb3EonvRASh9o729s09S5eueODy+/N7mzYXjMyL/Ncew+Lahu+6sT3TqXMjf11YlvsjI63a2mp0dBx65C/+wPFXgDAIxMSE46THbXtDS0vL1e3t7Zf9fz0/b/yDh9/7PwEGALdyAaHS1Ju6AAAAAElFTkSuQmCC);
        background-size: cover;
        background-repeat: no-repeat;
    }
    .confirm-finish-container h1:before {
        background-image: url(data:image/png;base64,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);
    }
    .confirm-container>div, .confirm-finish-container>div {
        padding: 12px;
        border: 1px solid #fff;
        min-height: 150px;
        border-radius: 0 0 12px 12px;
    }
    .confirm-finish-container p {
        font-size: 15px!important;
        color: #000!important;
        margin-top: 13px!important;
        margin-bottom: 26px!important;
    }
    .confirm-container>div p, .confirm-finish-container>div p {
        text-align: left;
        font-size: 16px;
        color: #454545;
        margin: 5px 0;
    }
    .confirm-container button, .confirm-finish-container button, .introduction-container button {
        color: #1e415b;
        font-size: 15.4px;
        font-weight: 700;
        margin: 0 auto 16px!important;
        padding: 6px 16px;
        background: transparent;
        text-shadow: 0 1px 1px #fff;
        box-shadow: 0 1px 1px rgb(0 0 0 / 50%);
        border-radius: 5px;
        border: none;
    } 
    .help-popup-container, .hide-popup-container {
        background-color: #555;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        z-index: 100;
    }
    .help-popup-container {
        background-color: rgba(0,0,0,.5);
    }

    .confirm-container, .confirm-finish-container {
        text-align: center;
        width: 760px;
        margin: 60px auto 10px;
    }
    .help-popup-container .confirm-container, .hide-popup-container .confirm-container {
        width: 770px;
        border-radius: 12px;
    }
    .help-popup-container .confirm-container {
        padding-top: 30px;
        margin: 0 auto;
        position: absolute;
        top: 30px;
        left: calc(50% - 385px);
    }
    .confirm-container h1, .confirm-finish-container h1 {
        text-align: left;
        color: #fff;
        padding: 7px 12px 7px 70px;
        font-size: 16px;
        font-weight: 700;
        text-shadow: 0 1px 2px rgb(0 0 0 / 75%);
        margin-bottom: 3px;
        position: relative;
    }
    .help-popup-container .confirm-container h1, .hide-popup-container .confirm-container h1 {
        font-size: 15.4px;
        background: #000;
        padding-top: 10px;
        padding-bottom: 8px;
        border-radius: 12px 12px 0 0;
    }
    .help-popup-container .confirm-container h1 {
        cursor: move;
    }
    .confirm-container h1:before, .confirm-finish-container h1:before {
        content: "";
        display: block;
        position: absolute;
        left: 10px;
        bottom: -6px;
        width: 48px;
        height: 48px;
        background-image: url(data:image/png;base64,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);
        background-size: cover;
        background-repeat: no-repeat;
    }
    .help-popup-container .confirm-container h1:before {
        background-image: url(data:image/png;base64,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)!important;
    }
    .confirm-container button, .confirm-finish-container button, .introduction-container button {
        color: #1e415b;
        font-size: 15.4px;
        font-weight: 700;
        margin: 0 auto 16px!important;
        padding: 6px 16px;
        background: transparent;
        text-shadow: 0 1px 1px #fff;
        box-shadow: 0 1px 1px rgb(0 0 0 / 50%);
        border-radius: 5px;
        border: none;
    }
    .help-popup-container .confirm-container h1 button.close, .hide-popup-container .confirm-container h1 button.close {
        position: absolute;
        padding: 0;
        top: 12px;
        right: 12px;
        width: 16px;
        height: 16px;
        border: none;
        box-shadow: none;
        border-radius: 0;
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAJsSURBVHjalFO7a5NRFP/d75mkjwQbogatLgoOQdGlIA5uNt3cO4e20BcdnF3aqaVQcOkfUChKIdhOhcSgHUoo0cHFpZ0yNGkS8vge+fJ5zs1TnBo43zn33pzf+Z3fuVek0+kPABbIpnG73y+yT5oQYjMcicJqWtBNAwHThMk+wL4bszcMHbquQ9M1qIqCer2eyGazC5qqqrBaNsqbHwG/A4UOBUGzV4QAFZAJo3uaYeDt5y/MIqHwl6sI+FA8D+h0IKiioNi0LIRaLaiuC4XZkL9TqwF01ul4so8uANHlSiA2j2Zn8f74GA+TSXSIskfV4nNzeHd0hBh5d2xMMmm32xJA4w/3zdQQCuHV2po8eLm+jkKPcmJlRe49W1rC97MzKI4zAJAMAkFTompE93xri6SgNmj9fHVVJnPMe793djBOLTCobbtDgKAZkD1rl5e42t9HjhJ9WnPiIHl7G04mg2i9Los5tj1sgTW4vrhA7OYGXjAIuO5/Q2flPaqsc1Vm4NhDBgZNQfF9tAIBxOfn8WZvD4IEZRZ9Jk+of31mBtfVKmqFAmzLGZkCqc2zbk1M4PXu7iD5fHEReUqUILT3dGMDRRqtTwJa9ggD3egCRJtN/Eil0G40ZLJzeIg2WWF5GR6d/SRB75ZKPRGdoQaqqkiAB5RYpnl/PT1FjOLHlYr8Q/HgAJmTE8RoAtMEUIxE/hVRCAXj8Tj+EM3+dS1NTqIcDsu4f6U5kU3cuw/H7V0kj/qrkTDJfB5e24NL/bk0BYcuC9MceKpoO7x24ZJNTUXQaFSymu/7qW+5HD/nF7d5y42rapaf818BBgB9BBQb6mEZsQAAAABJRU5ErkJggg==);
        background-size: cover;
        background-repeat: no-repeat;
    }
    .confirm-container>div, .confirm-finish-container>div {
        padding: 12px;
        border: 1px solid #fff;
        min-height: 150px;
        border-radius: 0 0 12px 12px;
    }
    .help-popup-container .confirm-container .content, .hide-popup-container .confirm-container .content {
        border: none;
        background-color: #dbe5f5;
    }
    .help-popup-container .confirm-container .content ul.switch-content {
        text-align: left;
        padding-left: 8px;
        border-bottom: 1px solid #7d7d7e;
    }
    .help-popup-container .confirm-container .content ul.switch-content li {
        margin-bottom: -1px;
        margin-right: 8px;
        list-style-type: none;
        display: inline-block;
        font-size: 15.4px;
        font-weight: 700;
        color: #333;
        background: rgba(0,0,0,.1);
        cursor: pointer;
        min-width: 110px;
        text-align: center;
        padding: 5px;
        border-radius: 6.5px 6.5px 0 0;
        border: 1px solid rgba(0,0,0,.2);
        border-bottom-color: #7d7d7e;
    }
    .help-popup-container .confirm-container .content ul.switch-content li.active {
        background-color: #dbe5f5;
        border-color: #7d7d7e #7d7d7e #dbe5f5;
    }
    .help-popup-container .confirm-container .content .info-container {
        text-align: left;
        margin-top: 25px;
        margin-bottom: 50px;
    }
    .help-popup-container .confirm-container .content p, .hide-popup-container .confirm-container .content p {
        font-size: 15.4px;
        margin: 15px 0;
        color: #000;
    }
    .help-popup-container .confirm-container .content .info-container p {
        font-size: 13.2px;
        margin-bottom: 20px;
    }
    .help-popup-container .confirm-container .content .info-container ul {
        padding-left: 16px;
    }
    .help-popup-container .confirm-container .content .info-container ul li {
        margin: 8px 0;
        font-weight: 300;
        font-size: 12px;
    }
    .help-popup-container .confirm-container .content .task-help-container, .help-popup-container .confirm-container .content .test-help-container {
        max-height: 400px;
        overflow-y: scroll;
        text-align: left;
        margin-bottom: 20px;
    }
    .help-popup-container .confirm-container .content .task-help-container p, .help-popup-container .confirm-container .content .test-help-container p {
        font-size: 12px;
        line-height: 1.5;
        margin: 10px 0;
    }
    .help-popup-container .confirm-container .content .task-help-container table.icon-buttons-container, .help-popup-container .confirm-container .content .test-help-container table.icon-buttons-container {
        margin: 20px 0;
    }
    .help-popup-container .confirm-container .content .task-help-container table td, .help-popup-container .confirm-container .content .test-help-container table td {
        font-size: 12px;
    }
    .help-popup-container .confirm-container .content .task-help-container table.icon-buttons-container .icon, .help-popup-container .confirm-container .content .test-help-container table.icon-buttons-container .icon {
        padding: 10px;
    }
    .help-popup-container .confirm-container .content .task-help-container table.icon-buttons-container .icon span, .help-popup-container .confirm-container .content .test-help-container table.icon-buttons-container .icon span {
        font-size: 14.5px;
        padding: 4px 14px;
        color: #050608;
        border-radius: 6px;
        background-color: #6aade4;
    }
    .help-popup-container .confirm-container .content .task-help-container table.icon-buttons-container .icon.help span, .help-popup-container .confirm-container .content .test-help-container table.icon-buttons-container .icon.help span {
        position: relative;
        padding-right: 35px;
    }
    .help-popup-container .confirm-container .content .task-help-container table.icon-buttons-container .icon.help span:after, .help-popup-container .confirm-container .content .test-help-container table.icon-buttons-container .icon.help span:after {
        content: "";
        display: block;
        position: absolute;
        top: 5px;
        right: 10px;
        width: 16px;
        height: 16px;
        background-image: url(data:image/png;base64,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);
        background-size: cover;
        background-repeat: no-repeat;
    }
    .help-popup-container .confirm-container .content .task-help-container p.title, .help-popup-container .confirm-container .content .test-help-container p.title {
        margin-top: 30px;
        margin-bottom: 20px;
    }
</style>
    
</head>
<body class="light" >

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
        <div class="banner black">
            <div class="help-container">
                <ul>
                    <li>{{$student->first_name}} {{$student->last_name}} - {{$student->phone}}</li>
                    <li id="timer_li">
                        <span class="timer-container">
                            <span>
                                <span class="show-hover">
                                    <span class="font-big" > </span>left
                                </span>
                                <span class="hide-hover">
                                    <span class="font-big"><span id="countdown"></span> </span> left
                                </span>
                            
                            </span>
                        </span>
                    </li>
                    <li>
                        <button style="cursor:pointer;" onclick="$('.help-popup-container').css('display','block');">Help</button>
                        <button>Hide</button>
                    </li>
                </ul>
            </div>
            <div class="help-popup-container" style="display:none;">
                <div class="confirm-container">
                    <h1>Help<button class="close" style="cursor:pointer;" onclick="$('.help-popup-container').css('display','none');"></button></h1>
                    <div class="content">
                        <ul class="switch-content">
                            <li class="active" id="help1" onclick="help(1)">Information</li>
                            <li class="" id="help2" onclick="help(2)">Test help</li>
                            <li class="" id="help3" onclick="help(3)">Task help</li>
                        </ul>
                        <div class="info-container" id="help_content1">
                            <p><b>INSTRUCTIONS TO CANDIDATES</b></p>
                            <ul>
                                <li>Answer <b>both</b> parts.</li>
                                <li>You can change your answers at any time during the test.</li>
                            </ul>
                            <p><b>INFORMATION FOR CANDIDATES</b></p>
                            <ul>
                                <li>There are two parts in this test.</li>
                                <li>Part 2 contributes twice as much as Part 1 to the writing score.</li>
                                <li>The test clock will show you when there are 10 minutes and 5 minutes remaining.</li>
                            </ul>
                        </div>
                        <div class="test-help-container" id="help_content2" style="display:none;">
                            <p><b>At the top of the screen you can see:</b></p>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALoAAAAbCAIAAABELALtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ODMxRjAxNjg2MEFGMTFFMkJGQzM4OUVDRjc0QTU1MjkiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6ODMxRjAxNjk2MEFGMTFFMkJGQzM4OUVDRjc0QTU1MjkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4MzFGMDE2NjYwQUYxMUUyQkZDMzg5RUNGNzRBNTUyOSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MzFGMDE2NzYwQUYxMUUyQkZDMzg5RUNGNzRBNTUyOSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Psk0VQcAAAbsSURBVHja7Fp5UBNX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" height="37">
                            <p>Your name and candidate number.</p>
                            <img src="data:image/png;base64,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" height="27" alt="screen clock">
                            <p>A clock, which tells you how much time you have left. When you hover over the time you can see the seconds.</p>
                            <table class="icon-buttons-container">
                                <tr>
                                    <td class="icon help"><span>Help</span></td>
                                    <td>Click to view the help.</td>
                                </tr>
                                <tr>
                                    <td class="icon"><span>Settings</span></td>
                                    <td>Click to change your screen settings.</td></tr>
                                    <tr><td class="icon"><span>Hide</span></td>
                                    <td>Click to hide the screen content temporarily.</td>
                                </tr>
                            </table>
                            <p class="title"><b>Navigation</b></p>
                            <p>At the bottom of the screen you can see the navigation bar</p>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAoAAAAA1CAIAAABeN82bAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAGSJJREFUeNrsXQl4HMWV7nt6ei5JI9mSjI2xbINlS9gGAg4bTA4IVyALwWYXm5AlizchJHFCDgw4EPJhZ80GQrIGLxACXrzr5OOyzREcCOz3gYF8Ng6YY1c+sCxZ8qFjDs1MT1/7umumNdbc0gzSSO+nadX0VL8Zv3ldf72qV6/ots4BCoFAIBAIxKcLBlWAQCAQCAQSMAKBQCAQSMAIBAKBQCCQgBEIBAKBQAJGIBAIBAKBBIxAIBAIREWBQxWMTRhJQMl8SRmoEwQCUSBo+M/8MwjUycgbZLtM9Jl6RgIeP7+0ruuapmqqqmm6bsB/OrmOykEgEPnZlxADwzA0w3KsBc58hTRcJHSzAdahSQbNcSxolAI1knbabJx1QzMoXaMYlh2eepGAx9zvDdSrxOOGoTXUeX1ukWMZlsHHBoFAFAdNN1RND4RjXUeDKsPygkBoGDVTkPaAYDWVYynJyQsOgbTDAKBhUkHVLN9IM5UcjamxWFw3KJbji9IwjZmwxhT7qqoSi8Vqfc6T6n1RWY/ImvUzo24QCERxYCynTXKwTgfT3tXfG4yJosgVyRATth1mKL2qyik5Lepl82hMVXVV08IhOTAgg+ILVzJ6wGMFBvi8GnSjYtVuYcpk3/GgoqhIvAgEYrhEYlBx1Yir6oBMT62v0vXe/nDM6QQvjsex6ByNsKLI1R5HdY0XiJeoKW9DzHIMHILAe7zi8ePBcCTicIjm7fn0jF2hMdTtUuJxTZGnNdb0IPsiEIgSARqTnpBycmONqsjQyOhWTAkivQWOx+OUHj95SrXf72WT7Fs4gG0FgWuor57S4FHVmKLE8wbuIAGPlZ6Xrmvg/k5t8EfjuqIh+yIQiFJyMDQs0xpqZFk25y0xovNEaFbojcgbjfVVnBltNaIRAskpTqmv4lkDODh3dwcJeKwQsApdpli0xidFZQ0VgkAgSouorFd7XdDIQFODBDyUfdW45KBr/W5gX/BkDWvYeXgHxZi3gytc63dxrA7EnkPbOAc8VghYUzVZjvEcq2hqpXznIYuVSwb6BKA2UpWA8seBtYyOE6zpPM9BI2MGdgpIwCnOjxIXeMNXJbEca1gjySO2SdPGQdvVPufx3rASN3jBkdE4kYDHCnRDVxWVpqmK6Jvai5UVBToMqrkgrkRfGzTAMAzLcTzPV8rixXJrg7EWclKJpREayq9oaxk9KwXfjIZGBpoa1Ib95MblGG2oVV4PZ0760mYCE4MqVd4jURR8HmdPf4RWGZ4XkIDHdhNeOQ8GCReMRiJf/1CiKL4cH/F4c8QpSRURsWlrY+7MhjJ9xLsfHoSWYcGck1F+Rnywt6tSrGV0oZEJYByCJm6PpsXjcn2dR3CYjRhRCg3qyWdEoWBQdDqh25elRSCyaFC1JDnicaU/JJN+KBLwGG7H9UoiYFVVBwYGKEr6yRnuksv/5c4wCCepAypKG1R1dXXJ5ff19QWDQfJMo/yM8ivIWkbdVpF9E+yr67FYzCWxDpE37PSSVJ4x6Gg0+vyW5x5+aL3TKZ11zjm3rb4zI/9SKYOZHq8UCB5TFI5hxCEdRLTXsfFUVFqqZ2viRIlEgHLqepSy+Bwg3O12C4KjorRBlckDC4UCxEZQfqVby6gbK+ogMRhgzhlFG+trh5ilkVN77+7a+dtf33fwk0/g1d92v9vZ0bH23l95PJ4TaPvEqUR4w1/t7joa4kzwSMBjtWdaaf1HsF8oxMqTqQuEV9CCRVsbZSIYRY4nO9Yov+KtZdSbGtzcRdPMZZ8el2DHPNvUm8NANV3v7DjUfvAgMTaGYba/9KLT6bzlp6sm19fbtm0kdtAZPARR4DlaicdZlkt9BJCAEcN/iMmktV4eAjZ3oTCoiolJS2qjTHn+NEMjE1Mov+KtBTEmeszg/8oevy9Blikj0Ln72bGYnGrGQOQvPb+N5/lv3fzdqdNOzirEMDwesT8gC4KD5TgkYETpnA/MVZ2CcifaRfkIxMg7zOCMgktKWQk37PbL3m4QTrIsBwKBdAI2s2WdaMbgSb+wdQtcufGm70ybdjIZi04uSbQ8YKvgcPC6HlY1FQkYUVLnBkf+UlDuKFyUj8gI+fguQ4uIk/8OVVGIIws86nJxKYv3KSNJvWCjmzY+8fabbwyEw+n3Hj1yhBBwqiVHIpFtzz2rG8Z3f/DDyfUNFDW4lMlc4JL8BJ43l4EJwqC3jQSMGCmimLYaPVT0gEcVgfd/RYUfZDmj/+iKqpYfoULyecC6qiks5zTJ2DBoiyPhKiHVTU88cf+9v+zr7c3WWYTrjIVUq45Go9uefUZV1Tt+/guX222kUK9d4HkuFjODFez1SEjAiJGiP54/d6auxtVYFCyPExycIFLjtxVGgkQC/rQfwD33U4GHTvvSEYrW217f0P8eVdWKHJwLmqaZYco6FHQgU5OBacPMwKGbJLz9pReAfR0OR1G2CpVlWd7y9FNyNLbugd8wDGtyurljsEW/JgNTHMOoipwaqYAEjBgp8mwdoetqLBLq7ggdaYfepmvyFF/jdE5yj1dtIEEiAY/YPzNYhiRkyl2N0gy6//0HjP71zRd000Ezhe2s87r/97UNvX+ja06/BTWZTb26plGWy5sK4phC4fixY1CNLWAzwXTPOB6PP7/1OYZlfnnfA1bjp1Mp8i0iNrPBsUnmzUDAn//OukI+7C+/xU7Wp4qTasXUl/963/p/XP5PxQrp7Di0bctTK779/WwVNm383Y9XfrvjeKxwmWoOAtZ1ORwIduw/suftTT9cNr2x/gt3/Y73+CWHa4xrY//etocfemDj7x++4MuXfvWqpVdcuaTwhzB3hTVr1lx22WUejwf6y/v377/44ouLfchzV9i0aVNLS0v55BNce+21q1evBi9h+vTppZX/ibXCMhXFfkRFA1ppSaD8Pme+asbhY6GePQ9SfQ/OvaibDqtkYx06pJ96fvfHf3moZzfln48cnFV7hqGBd6rpOg0HdAqBKcE0DTNS30iulyu2s0jGpaPR6Kt/3v7JgQPTpk/Xk+PP8EFagoANI68H/Nq6pakSrRxanPk/Z57h5dzrfz3klllThjapbZ0DhX91uL2o+gigSTgXyzpnz58F54yUc/zY0af+uOnu1T8t9pvEs0dhqZFwqKv90gbu0ku+PmVyHVzp79xfddoZXPWksawNYN/zzmkh5e1/eh4OKBTIwbkJBtj3mmuuIWVgrzlz5rz44ouXXHJJqQjsySef/OxnP5sq/8033zz33HNLTsArV64E+VTxQVW56992223D/krjA6qq+GryjA+BD/Xxvo7ovse50KPzLu5igH0pM4cxibil+/XTFnd/BBy8i/IvRA7O4AGTvFcJl9TM4q4R9oUysN1IQlrIjiAgp6fn+EnTpiWyxOs6+SyT2g37861VeXn5PJ19s/ULgEFTj3RKzgFk3wIBvikcb+9us1mHcOeG9feDUwjHujV3wkvbTYQDXn7j2qtuveVm22sk14dInj9nWjDQn9HXTK+cCkXTsx3ghEUCfTdetEjgE0EHsYGwYm5ZoOc+Rlcb2182GXfzMy+B8P95630o33TjdQVqg8mJ8847D+rs2LGjqalp8+bNUAaOZPKhcPnEWQTJIP+RRx6BcmNjYwnlE4CTTdi3wPqFyz/llFNs/dgoSn6lIx6Pc2ziXxQKDxw81DXkaO/o3r2nLfjhI0zf70z2DaiUntJBARcO2OSYPuf8bnpgQ6TzDWwzM3dirD0ZddsxtTGCJCXm1g7xOND5nLnzmmbP1lPYVxuUTxmFzAHnYF844+83pvDYI+t//W9rSRkKvT09a+79TSqzkkHa3ELu+Pla8AVtOYUjxxywAs0BL3X1BhZccGX3ztcsu9dU3cgzbWx1JUdXG4BzP3c+nGfMNL3k5df/cwk9yOXLl0M18PaWLl0aCoWK8vByVyYEb/fEoXDgwIESygfceuutixYtevTRR2+44YaSe8DQXYDzvHnz9u3bB723Xbt2ga4m1uiolghplOPKO7s/djjEtB4Ma7Rv5sMbWy8/zPSq5kpWsuRFS57hUCn6sO6ri/Yefkeaci62kOlOqjmDbrEilDWSQ41YJk17fT7bUS6KfRULLfMX3LLqdklyEd7VUtjX0My4rNR9M5lhsO8wupzgDZPDfpn6VvqV3JXTyxMHxAMjY6f//h9PkIs/uvVO4gvu/qgdXm78/cOpt0A1eOsrV3zNntkllYdIzjYxnLHykCHobIfOO9iayVdu+JPgT2wTBEYY1/Uct5BjdLUBqrCvPPf0H1IJOK826JxYvHjxrFmzSHnr1q1Q//XXX6fzoXD5Nt59910gSGD3Cy+8sLTylyxZsnv37rVr1xb+fQqX77PaPjOzrjWEDky/cePGouSPG0QiMb+/rrbK6WN7J02utw/u8DNM32OnX3aYOapSGk3Bs6KbjGseCjyNiaNjb9Wxnn/xnbqEQmR4SCnNADZM8KJmbpOZOAPmtbZSVnqNSBZEo1HVcqBTA7jA9wX2bZ2/YPUv1jS3tCbEJkFGoFVzK6oT+qA5CDgr+xZLwGR+t8Bx6aIqT2QAkaTOSnZ2HNr+p+fB+Uuv+YUvXWQ2al5vmb4JuLPZDo3maa+fr2lkPVUJAjbMoC0l3zFGtAHse9ON121+5qXmea2lVdqWLVvmzJmzY8eOlStXluNHWbhw4ebNm4HJXn755dJ+bWhorr766rKOwYJ7Dd2UV199lXjDE/MBh2ZWYOLdL1wU/tuywHuPOJ0SHKEPHleObFh4RRd7xBp5NtLZ1zDZd1/VEfWmquZ/ELxTsKnMoFuWBe2ZYVhk8FkbHCEGslxx8/eWLl9+SlOTngVaSn3ykrDvvNbTb7/7npmzZ+uallrHSFaTZZnnhVQC5bL89rnYNxsBD+HLHNO6hFztc25lDalc+I3jEhndrw/3vHfh+Z957MmnvvHNb6ePIZePehMtpprbYWVUijWMZOpU3VBUI98tY0IbG9bff/fqn2556fWFZ55dWo2B19vY2AgEs2LFipJLrq2tnTt3LpRvv/32pUuXklnVUgE6DeYj2dY2+Hi2tQFZlkr+4sWLB8chVqwA4cQbnpgjpYYmU7RxxlcO//XZ9V1vAW3wsUMPnHnVYfawYs7RkJlAMmKdGHyG7i116EDVEfom/9wlYnUTcm1GxQKp8Twfi8U5gWNJyipVI/s0MowBb/5o1c/MXBknjrLAGVj2j5s2rrlzNWHuRJtmYV7r/B/f/rOmWbNt5k34vloi3Br+RKNxr8eTOoebmYBzs2+OIKxULzYHN+d1gtFKisK6NXfBecHCs4JpyUs/BSj5dqFRdWvkhRirOQ6jK+XcuKYk2li35k4g75dfe6fkvu9bb73l9/u3bdtWDt8XutiCIICfevnll993333EoawgS961axcwLvju0Hsg3z8UCk3kR1vXKLZNOeuKjrefWa8p9DlXH+Y7FdPrJbG6ejLnIfGDNar9gK+L/lbt6UtE/ywKkc0noBnwREOhsOR2JrswNMldZeeogrKZb9JKOWkTMAnSosgCX2qw0DJ/wXdW3tLc0mo7volCkn3NoqpqKsXxfP7dkHKzL00zBfqshXjDOYgcUSDqG8zQFRJedMGXLyXLZjKCvHtSrVj4wlkS9Jtj4jPviLFGs5SQjBwWRHiZf5CZGU1tPPf0H4jrDJ70EG87rzZyB25s3boV2BcKl1kgF2fOnFn4vy63fPCqb7jhBvBTbSd1586dxcaS5Hg39avu3bu32C+fV/6ePXsWLVq01AK58sILLxgTdo8jwyRgSqbY/9M+8/eHDYPmDykm3dJJ0rXZ1wq8aj/o66BWTP3MUkdNEzximHY7qxPMMILg0DToniqCgycbutnRz7pFw8B0Zl4sa72QzcFQw+mUwHu254Dh4rzT56+4+XvzzzxLTR2atstGIrg6PBAVeAGINf8ccG72Hcnvanu3hQwjZ6w8kcefs+GHP7mDRAnd8fO16+5/kEqGDqXjjrvWAutYjkWwVJ8eV/Xch8aJnD8xFwUFeJn3ltHVxrNPbR5+m5kTM2bMKPaWIfSTu+Y999wD7iPxGuH8yiuvLFu2rITy0+8qvGYh9eHb7tixA/x48v3h37Jq1aqi5I8v/rUI2Jzfpbk2lT+omGV9kHET876grRh1aL+3Xftmw/yvTWtqUazFMNgwZu3eMwzHc0Clwf7QkNncBFQTWhqA+SbVT66bPJkMQcO5eV7Lt773gzPPXpS8SdWsG60QaGsA2iqrijoQiooWeRfkAY+QfdMps0DvtqjKEwo5vK7auklr7v2NvdgmNb53SM0ZM2c99uRTRX1K3qxYSr7tCHWHm5/aPP37ZkiUMLUZXua9hR9VbeRQUVE5wtLR3NxcbjtZZeFTMMimprJMMQIH48OeaJ0FTzzCmVxLW1yrWx4TnSTnVN/3kLedWVG/4MoZc84w+8RxmeVxsWjOFobjJckVDgWi0ZjTKSa6O7TBUOD1mj4wbSXloJnEGLQ9Hzx9xsyLL//q0//9X76qqlmnnrZk2XXNLa0KOMR6IqTLSPF6SRGuBwMhgReB8ocs4s0ahFUs+6aTZd4h6GwViqqMGHXkz5vBCmz9KY6aetO0BKfGClq+W/iK1Ua5HTKUP6GgkXW9jMW1hCXooex78JB350eNc6690j351KSSUXP5nGCWdYiiy+0N9PaJjQ5zQbBh0FZ4k5kky5oANvNVkZXCSQKGd91e71XXXHv2uZ8THaLH6/XX1WnJ4WjiE+uJrM+JS2Z2DkWNRRR/bY3gEIZEUGUm4PRMkwhEdgIuIKuG4DKPZKgmpY3fYUMkSCTgUumKDEFrSa+XSXrANvtqwL6+v37Y0HL944662aqqoNIKBLApzwtujzcSGQj0BX3V1uIIK1yUOL0me9KJpBmMFfZkh2K5XK7Zp56W6CGp5h4Y+uDGgwkaJtRLDD7QE3A63ZIkcdxQzyIDAeMuC4iioJYzpBkJGOVPZOgaTSlJNmaSQTtJAv6kw/fOB42t33jMM6VFlmMUBl0VA5ZlRVH0en29vcc5MSY5RcoKuSKJmok3nBx41hPlFBWToC2bZQcjEk6MTgB2NygWfGXB4UgfQsbtCBEjJmANm1QkSCTg8qiLBFtRyQngFAI2VGpvV3Xjouu9U1tRUcMDuKRutwf6LgN9IZamBYdATJQkqzRPSdq1udMu2NSbOBuJPzb1giscCUfkqOLz1UguF8tmYFskYMTIPWBsUlNcljKPB6D8iWVOiSTPhpn3KjUCS6eAIc7/Zvsr//ngvpeppgtvRl0NAwzDOByir6pGU7Vg/4DLrYuSaA00mw6uPeZM2YVsvckk6dp/dN2IRaPRgbjL5QUnm+eFjBFUSMAIJGAkMCTgMWtOyWzPmmHuuzAYAg2UTHE7tC8ua//zEw8FD33eMWkmqmsYYDlOkiSjxt/bczzYH1Y11e1xJYiVbBpopDBxFgJO9YatX80IB0Pg+7pd3qqqmvQdNZCAESWDhgScsVOM8kdD/ngCzQqqTL/1cWOuSh9Qrhol0nsYCBingIfJwSwnuVxAsH29xyPBsCIrbp+H57khzJrRhU1f5h6LyaH+MPjPXo8PfGun0wkcn+2jkYARw2sbTGskwYECW5YHnzGXvSX3CKscbZSJYFiatZLlofzKt5bC4JJEQYidd+eO7p3bctcUHO760y+UY1Gvx4kt0/AeX3My2OVmGTYYdASD/Uc7j0hel8/nBbOy62QzXfu6osQDvUFFVgWHs7qmxu32gO+bg32RgBEjaPLMbDJmVP1Jk2rLIR+EV9Be67Y2uru7yyGfdwgkUx7KHwfWUphbxpzcUBVXtLovfK2g+l63wGN7PnwOBqZ0ShLHc8CawMHhcCgc6JTcksfnAevK3XGUZTkUCMcGYqJDrK6udXu8IGrIxkdIwIiS9hl5M5XM3e4P+/v6YrFoqVLfWWsDnFXV1ZJUNyRx+djXxouv7iiHNrw+n9vtha7289vfCAYDKD+TtbgqxVryYiASdUlOwsFOdji9CqBtzoED0sMxJ4YROWBipxMsdmAgFA6FOvu6WI52uiRBFDiGE5xmpLSuG0C6mqLJ0VgsEqUMRnK5av2TXG4P3CsIDoZlC7FGJGDEsAdtOJfLzK3hdEqqouhGaYJrGJohZAYYkrh8wmoDOMbhcFA0BX1zl9uN8ivaWvJwAMft/aRr1vQGSRrOeLKiqAc7j2g6gzsxjOBZ5hmG5QUB7MrrrZLlGHQZgW4H+qHjqJK+I9nTkGU5QRDddT7LwkUwcrgLLhaufCRgxHBHbFgyYsO73W57l65SSDaHc6EZ4nm+KFMex9pgrGedsLuueVF+RVtLbgi8EGWFv77XFo/Lxc6Xm+TBch6vr7qmZpwNyH/KsJIvC2BWoiiauyso5h4L8JckeCbKJhmayb6BnGV+JIVWUR+EBIwYJuVY1maaHVl9XmLpJ26FjdqwX6H8SreWPC0yz/u8PqfTSXIcFs0c1lbz2VadIoruWAO9cuDmJhM7U4OmS9aEpW4YPJyfG7WMGEm7h3pAbSBKa0i8AG6wgKoYc093GQYVcJhibPzA5CfGUSMEAlHWpoZ4bJg2emzg/wUYAAFlIcZkwHeuAAAAAElFTkSuQmCC" height="53" alt="screen nav">
                            <p>Click on a number to go to that question.</p>
                            <table>
                                <tr><td class="icon"><img src="data:image/png;base64,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" height="56" alt="next question button"></td><td>Click to go to the next question.</td></tr>
                                <tr><td class="icon"><img src="data:image/png;base64,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" height="56" alt="previous question button"></td><td>Click to go to the previous question.</td></tr>
                                <tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEQAAAAVCAIAAABwo9+3AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAQhJREFUeNpivP30K8NwAUwMwwiMemawAhY0vmNONzHa9k8pHQKeAYID3eHQWIMCZmZmFhBmAZFArnbCRDQtqtLcaCIklStA7VQph1hwpj8cPgEKYVWP5hqS3EetEpWJVJ8AyaFUAOD3Ca6YwZ+KIAgzTULYaCL4FeNK2NiTGX6fkOoZ5PRGMO2RpJhIz+DzCS7PoAUVHncApSAOJca5aIrxa8TiGfw+IVgAYNqENUngiRxqlmb4fcLIyERkWJJXWFFSsmFxGX6fMDIykm0ZPNSJSWNYFePXiD1mKPQJpvVEhjpJioktAEj1CabFBJMZLgUkKSbsGczWylABjKOds1HPjHqGJAAQYAAg5pHwD2V6CQAAAABJRU5ErkJggg==" height="21" alt="screen review"></td><td>Click if you want to look at this question again later. The question number in the navigation bar will turn into a circle.</td></tr>
                                <tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAcCAYAAACQ0cTtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABKNJREFUeNq0lntsU1UYwL97e8vabX1sdQ862MRsdU4CZFNIfCwo0bFEgxj5wwdgomlEjS+iTCYYEoFpIjEBXZjBqPEPjCa4GF//TA0xo4AUxtqVVbqtHV03JlC70cd9HL/Te++4a4vWMU/y3cc5536/8z3udw7jOlQHN9JWPeOfeUZd9+CtGPt+zDWXJRLAjYjajn1c915xeeKoxR7/AZ/f/99gvQfr9haXJV+/9b5xqG2OgKUq/hr2ZQGZ3zodcPeWQSYWi9WzLFucr/skSYqbTCYPfr/HVJFoa3ggAkxMSI8RMwvnfqmEK6HCfah76yzrpqent5P/0CgoGAy2/HrA0XH6qxrCxxYQcYwlYkQRfBamONL/7SJy9EPHjIUMSoEo4hSWteZpUbKnp8cpnt6yoqKaf3Vp6xiuVpBVsdQsOgkvkmzhwM+VcHmkcF/zS4NbKcyEi/1LVYZWDk9MTJzJBWIYhrhcru8M/reWL75FeHHZw2FgowhiFZAKE1EEfMAhchML3p6FcGm4sJXDbp2qjOf5Kw0NDY+hiyhcysETj+yqfbmKgh5C0CUFRDQQ9Z4G4gLDEljK4jB5vvB+TqspHo8PIejC2xvtBbV2Q83GdwMntePf73bsLLWnXllOQRMKaMa/mrugCA8wOmyFQa+tE986Z8EwbuSNDQuNq5uKAkYrDz/tqe/A7jeV4V2miuS2xnVjoBunS2bkiEsaUIYLRwNW8HnLKehAy3bfEJcZE2sRZwCGQBPG48Q39rZo2ECHUuaK5M6mR8KgC/NyMqjOFzNAogwKDVlhQAZ1tu7weekULjvbUPAjnZ+HO9eNguvIojaRZ+CO9WHQX+BlK1hyzWVqvFT34bfBIQv0D5R36fTGg63t7rOq7iwYEZk0DJIIHBRhJUIIYUAf4mWljEa5FqQkRHDEAmc8lZ8sW//OePlta2ugvahPmZVO1pyWyQFmgPMLoB/h5XdptmKaAJCSFwYJdF3ADO6+ys8cLe2Rm5se3TE5OVmgzfYsWOhiKpq6yl1LX15RJuaAaEDBITP8ftb+6ZLm57319z65jeqKRqMLFF/khtHiKqqKtZZoYRlWjQyb4WS/HabiUldl4wazao0gCLP0Z7uRKG7UKs4UjWUjGKMTCBIFWLVpv+9UMpnkrlfqshNEognCyArVlGY1y9IkxPCoBY577JhAcNfj+z3HsdfwT3U1exW0gKpWqemdA0Zw/I+xEpAE6HjiI09vPkU8O2ZEdqWcHES2UJsQijD4865+Nggl1fG2L567fe+cYOmYoStnftIUyQKlF4F3rleENU8FobQ60fa5c+nKf4NlulF3Lnw18WCyFI757Plt2R6AolIeLkrGJfjWhyVPlxfMaDQ6dnd9XXWq6wWDyJdszvuIFYLo04f6v3Q6nRabzbbmetPoD2fFzfOyZieOoZyfy7EOrSrT6XRV6rvb7d7U2Nh4WIm6bFkikQgZDIbFyjZjQlkB89D8fn9ArYtqK+7u7t6MG2eEzFPDHX/K4/F8gLpt2tpI3UjrFz3slNLDj7aWzbERJY+jKH/KlVO2jlFEr0A5mJ8mav7OmbPM3wIMAOug7LZni7/oAAAAAElFTkSuQmCC" height="28" alt="IconMinimise"></td><td>Click to make the navigation smaller.</td></tr>
                                <tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAcCAYAAACQ0cTtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABIZJREFUeNqslm1MW1UYx59zb99ooVPqGAJjAR1iE6eO6ByGZQGTZdG4ZU43XeK+ofjB14wZSUj6YZpJNEuWuMW4BT/ug1kwWYxhqVl0waIbsLSwAGNQyvvAlVL6cl+Oz+m9t9xeWu0WTvJPb29Pn9/5P895I74L2+EhWjmqBbXZ8L4Q9VSW/qOocyYqPzDIQjgaKt95H8w2KeMH3kzBtklY94f4sqlu1FsCDwNLUpnsWBx23KrdOwNmKwIJpEVlqvSSdeKt+B7cJlkm8HLLMIlEIrUcxxXmSxy6fOD84FXy/tP1U2C2I9CELzmkEaJ0YEwGFvFRoMA4JgRx0Wj0c7vdfipfEKU0XrLn4sG7P78SHvc/dnL7rjkFojkE7ZMoVByLLCvjMdtsthP5gmRZTni93vek/pZ9JVuFT6ob7mFiieKE6jtq7hRR1bwF0/eI1gddjs/Pzw9kAxFCqM/nu2IdbqurfEL68JlXZ4CLYCTO4IhBpDUR/C5LxMJgvBZMEIT7brf7cDAYXFbHZGzSZc+TH1VUM9A0cEuiUie9GzDAcHJyODtkCQpM+kixWOwugqbwMWJISqpdOVXT5ipLfvzsa9PA3xOVOvFqT2JIIZOoiCaRq6Yx3TCd7G/RX7+sjWZx5Snakvji+ddngJ/TgWRDDrQ6pZwpszE1QSSSCWM1Yd1lKQuoJNled2AaTDOCYkNLvqSDpEEUZieLoPjRVbCYJBWmlHZ9YaQMeeyuRPsLhybBHBKAIIvg+iEYkIgoXEMkiUqgYopCI5ug76/HL/X2VIAQ5VLupFwwWSSaPI5iof2lwyEwT2DvpC5FLD1JVQm2JykKIqj/ZulF937PKHHsutTTWwnJVZ7FWsgOU2y3O1zJ9t1Hg2C+o4L09RBUaTDU5JgT+gZKf6zZ1zZb9eJbbdv2n/5pacnS7PNVsHjncsDIp/ZiwVN/dBIsQ6IyamltdmVANEcIunGrrLNqzweDtQ3HTrI44XDY8sbp252rK+aKg18NXVgHq95i47Ek3+w+EgJrAKPGSHaQLoXBcSf87S+DlZj8fenON53a2hVFMRX/0NeDU6nZboSNzcUlSYDPejtLQVxmxaVrKTOC0NHEhBN6ESSJUP/u2ds3E4mEKddWlyuN384vODqu9VWCGOMyJ0JiLX0TQSf4/OUIIvVHzgz2GJZ2fjC2aaJaFxbtKpAYUkchGCqCPxEki9Dw9tlATz6beHZnclqtc0v2jt/6VSBCUqBpJ1z3V7C1s/ed7wJ/5Hti5IARvRDo6PAObANR4CA454TfUyDShL9de5Aj3ljM1CzKclVgDuGXG1UnlletbABN+M6b4xji83JWUFBQ093dXXX8Bz+hlJ3IGWr9J2LbgY6s+OzV3utbc3Oz1eVyNeXlDHd9e2Nj43U81+7km5pj5zNcbeZ5vvw/YfF4fBKvBltVYBHqOdiANjIyMmY8Fwu7urqO48E5SzeoYWZWAoHAGYzt0t8E2CK0oNgdpBhl/b+Fmc/lS93YwqhFdfeksHa1BLMKNcHGNEm3uaXn9r8CDAC9qpO2o5YuGAAAAABJRU5ErkJggg==" height="28" alt="iconMaximise"></td><td>Click to make the navigation bigger.</td></tr>
                                <tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAArCAIAAACM4/3uAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAslJREFUeNrsWD9vEzEUvzv/Sc65Qv6QJk2oVDaUDfUbILG0W2dEN2YkBmbExBdAYkFi4TuwsTJ0Qx07VEFtBSQNSS6XO9vHc0KiNijntvIlkejTRbIj+72f3/v52c9282dgLVscawXkFsRE8Ew/viDQMWnKviRzQYBhKaUQPIoiwTm0TcEAo47jIIwJIQhhaF/EMQsCEAx8f/+QWRZJw/MfG77LmG2TJBCc836/b1ns1bZnHMHbgx4oJ5SCM5LCAZHwfQBR/hXZaXgClHueR2kmiZjAA8ABjUDGaYAA5WAicXeM9oSM5QhNKiBAuSL7ZcLjuZDTAXGlPDEVIa3lgxjwFfDEeSj0AeYhDwZANEwzmGYhHxkGEYlET8AmCvzuabN7dgxky1Xqd2tbmHmGQfAEEFIOe53fzaOzb18/vXy6Vas+fv2BrJVYJmcYRDifmdzvdU+Odzfw7s5+vVJWsft+lH+4jQvrxsMxF0Q4HPqd9vNnOz9arfE/Qb8XqUNPLo4TUWxbhJ20Oo+e7J0efFH7mQvIKxoajU5TY+GQJIOKlb33n2lpY0KSOJQy1HsCmdsdcBDfKZFiDa3lJ8lYEfkKnrguMXnyshxuoTh2Juk1jnism3IDTkiNRrh4ick5BA3oaqeYTlZg2EYWZMmx0Cx09eFwDIfDEjiLS/W/Wkp16OrDQa8dDs2yZMYjm42tF++U8s0GdLVTiMFkNdluFFUfZIpV5WbqCkSFbgoxzgmVeWhOfRAaxc3xz+wBJhd3q7nRKbo4EPIWxDQTLwnEqFx2bJXYKEqlAgPlqghNqMrVIMeByhka99fvpbJoQpx/7sN4xhEwiLHcG+/wvN0OgoEQwohthFA26+YLBcbKYCLpfUKBwDiXU/nHdZmqG2NpKgrj5YGACQ0IKNpdxmAC1M7pPZJoQIzeUNS4pT0XTUf+j693KwHijwADAEEeaSuwExQ/AAAAAElFTkSuQmCC" height="43" alt="Screen Nav Current"></td><td>The blue highlighting shows the question you are looking at.</td></tr>
                                <tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAAmCAIAAAAnX375AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAZdJREFUeNrUVz1vgzAQvUQezhKVQEqlZGuqdun/nzt175YOlUi3DB2MlEi+wVJ65iMQioCATRJPPjju+c7nZ95sp44w7ZjD5EPUHxjvIKIKpg2BIXKKiowgUAo8QYkS75Csn0L28VHM7U8igzBDyyE5v4SIJ5xiFZOylY40BdjgSDbXHJIryfU8KIBlre61lAebNniAYGx5844lu5Eeu5SDn1pk7rdXm4I3nEvyZrZRAZ1PnJitVCAqrib3GmN2QTZuqhlnijvlWClntvX1cQDIkCwzPGdZUnNjlyOSsr9zQUM4trBqr6MHOZg9LoZUSpc+TiCJr0zR9+Oeha0R/rzjXBp3ZhsVjD/7rTsl/t0y1H9XLnJ29LtlJmSfeLsbDHkDHEugb4XW316fO2NtvuM7Fwibr9hVA18hy+sWVmSqRU6Ck+ojmU7XL0sfiBwcz5RXqscwiN4/PpNfRUQayA0SII/wMYoWKyj0nihWwX8LCIuVRNTGnVhIi8fJhIiZ7KrUmN+x/kNifTSVpM1XZPWY9Hz4/wQYAIg1rFd+NIWsAAAAAElFTkSuQmCC" height="43" alt="Screen Nav Answered"></td><td>The underlining shows that you have answered this question.</td></tr>
                                <tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAArCAIAAACM4/3uAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABVpJREFUeNrsWFtv3EQU9vru3WZv2WSTTdJtmtAqiEqAEC9IfeHHIPUXFAEPSIh/UYm3ip8AUoVQRZFalYsaQEGlbULSpLnsbnbXXnvssfnGk3W3seN1IlB46EmymUlmvvP5nDNnznFuc98WzltE4X8gr0kMRT7thiAI+CeX6O+5ofDxf0UCKn3fxw/1qed5fMx5MOUiE1mWJVHi4+xU5OzqKfVc1/UcUirqtaKhKkwj14QFnkeJ6/ZN0ulasqYqiiJJckYqufQjym2OBycu8V3v4nzV0BSm0g8oM4PAvoASekCCJZjS3MBxn222ZEVWFVWS5chNZyHBDeB5rj0YNKbLpQkdWr1QbeSF0UA5CghBkHKCmBMOe/bz3Y5uGLKspJtETGdAiGNZ1huXpsHA9QOXP3i67wSBrfQDbMFGbAeIP4ye05HgDPr9/srSDOxMaOAHwjGglCkWYws2rlyeMU3ThTd9/3QkuBfwEG8uNeBvwrz/yuEUMkzxCxvhhZXLs+ABwJN4iMmOoBRxsDBTQYzDsOkPnT7FdkWW5uplAAI20Sliohkc4niuUy7mHeQEcAq/g+Hg5Th0dfoU2wFSLRYIsZ0wOMaTYAeSerZtLy82qB941I+SI8eNxtHn2CnyGqhcWZwDbKIx5DgJZCScCSQjy/WO5eYz+8XxaF5TBpZlGAbPHGmWAFOXkEa9xizpvzTDSfLVrVtFXR27jIY2XJitEceBijRLhKspIaRaniLh7TD6r1H6mO7v7319+/ZnH9/ElFI6Nj27lFYqF14cdKFCCl4xhhgLCOo4jiKLrsfYR8Jz1+j0yqVmp90ezWzpAkBcJwCnsbBIIIGQQI6l40A//+LLm598Gh2oseJRitwN8DiJ4+4IWJryYCvX81ISLeSjGzfo0Ls05ubEkw9YgAexFJ5wOtiiGG7KjRWROOm/fIo7jI2TLpHkegJLhTCkM1YlfoaVcHFwwrLjJHiNhKDEHpLByNndgahksJIUP0dynAEKJocQFE7mYJAThiYdFi+J0yN3pC7WFAWwAM/FaovjJCRJUhR1+8VBc37moH2Y1R10vDvyhvZ0YxsFjhQzRgIJTdOerm8tNedkSULZmA699mQ9S0yg5kRt8Wzj7+n6fAYSoqRCNL192JuslLZ2dv+VzqJWKbU6PVUrAJuV4+l3BwJH1bR8vnD/p0cGbKKp/sgNfrZvPcR58HAVsACHivGnQ5EVrDb1/ObO3lx96q+NrdHgv3Z1eexzP1p7HI1hfFyHm8939TykAPD46RDjJMBUN/SJYum3Px73zcHF2XpiyzW2UeCLLzbqvb71+9oTAAI28YgmlPy80TDNfrvdwlX54fX38cf1rW2aOW1ENmjOzQLuzt0HtdpUtToJS8SLieTybmgMo1gsl8uVb+784DhkuTkP1waZBfG03Fywbefb734ECKA0PdkMJ6btsKtU8oW8H1Qx/f7ew7evXV1caJjWYGfvADknxQCaqs5MTRbyxsbWzq+rf07WpsqVKqB4C3S6DoyXCLh5LdPqdjvtVstx7OsfvFctFV3P7ZmWObDRmeKyZSkZGhS5gEgqIPSkVqd79959HMhKtQobgAESYEoTlrUNRBfU6x52u13HHrz7zlsLc7PI6wz2aCW6nYC43sbm9s+/rGq6USqVEImFQiFLG5ipIUZViGodtbJlmgNYxjIxDmskj0erxERGNjCY5A08O9TruqZqPA7Si78xrwaiVx+6KKLbBy65MIH2EHUoPMUrFLYsvPZgc/DAp3rKVwOZ3k/wOwWI7HFVjfr5c3hJMkolABWBPfT5vC6KlJ1BzetXiNnkHwEGAKVZXKcUv6xpAAAAAElFTkSuQmCC" height="43" alt="Screen Nav Review"></td><td>The circle shows that you want to look at this question again (marked for review).</td></tr>
                                <tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAAmCAIAAAAnX375AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6N0EwRjJDNEQxMkNCMTFFMkJDMjBCMDc5RTk1ODg1MjQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6N0EwRjJDNEUxMkNCMTFFMkJDMjBCMDc5RTk1ODg1MjQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo3QTBGMkM0QjEyQ0IxMUUyQkMyMEIwNzlFOTU4ODUyNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo3QTBGMkM0QzEyQ0IxMUUyQkMyMEIwNzlFOTU4ODUyNCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PlfZLh4AAAHfSURBVHjaxFfLboJAFGV4BJCmltRNt9pdP8ClX+TKD3TnustuSRtj0hKaKoiBgR4ZRLRYoZmZnoW5M0w4nvsY7iVvH7EiBXmeZ1kGQ1VkAZTM0Kt1BeXwjA/IHvUNvZJMaZokCU1T2LxIwaUCGqADMI+U4NtG0dPjgyCvPr+8Os4NYy0p0zQNwxC267rc+YIg2KzXpmmC8qgSPo2ikHlehMrN5qvfv1OsWvogfmAVR5nsEiRMLWOLPM2KLRZh7sgUWpZDpbKCIMp6Ceg/q0jUVXCJUpBKJoTpkedYohCpsTyhaLoRr2M+n3ue1/LwWaJ0ppxOp4vFYjgctv9/h1j+tUhms5nv+12jUC+SziqXy+V4PO4UhapImjP2al1OJpPqTPsiZgeZYyV1BUWRXEgfCb2ITErSHMu8Sw/S/jArkuY7VhBlcZA0U7bEaDTq/iXhobJbJA8vl0d58eMliJJdtFJV/taIsElFalcgiLJQmctOn9N2q7iJVKKKo9SIRs4cu59ODAPGarUSQWmYBuYvpodgiqaU7nbxZxD4/jt+43iLHT7iNM2y7Ns+4N4PBr2eU6qEXsxEjrNf23YPw0mW80kiBAvOA6tl27pulNkLlf8w0kIlFoQYeCBhcP8WYACwlhEpUp5k4QAAAABJRU5ErkJggg==" height="43" alt="Screen Nav Normal"></td><td>The black highlighting shows that you have not answered the question.</td></tr>

                            </table>
                            <p class="title"><b>Highlighting</b></p>
                            <p>To highlight something in the test:</p>
                            <p><b>Select the text you want to highlight using the mouse. </b></p>
                            <p><b>Right click over the text. </b></p>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQkAAABqCAIAAAAgHTNzAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MURBNDZCQUQxMkNCMTFFMkI2QkVDMEIxNUUxNDc4RTgiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MURBNDZCQUUxMkNCMTFFMkI2QkVDMEIxNUUxNDc4RTgiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxREE0NkJBQjEyQ0IxMUUyQjZCRUMwQjE1RTE0NzhFOCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxREE0NkJBQzEyQ0IxMUUyQjZCRUMwQjE1RTE0NzhFOCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PmUCafIAAA8xSURBVHja7F1rjGRF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" height="106" alt="Screen Right Click">
                            <table>
                                <tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAVCAIAAAACbL0BAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAcdJREFUeNpifPfuHcMooD1gGg0C+gAWZI6goCBJmt+/fz8aguQENPFgwdRSJjYO35Ci0RCkYdEBCWVGZpbR4KNhQMNDWVnNdDT4aBXQyKH86ePr0eCjSUBv3zAHOZRfv3wwGnw0Cehnj67++/UDHsr///6hrlOEwIB4cVLNGRqtjsXz2niEZPgFRW5d3M/MyQMMZWCgY/oQSMJ7QMhcNClKIoNsc6jlBhqm6Ncn1SMd/n18+wzIllDQ+f3hDTCU//8hIUW/AwPKnUstcwZjigaGsqBoLJOYTEoS37Spx/iExVh4BZ7evsjJr0h2akLL2shhB5fCGqBkmwPnDlS6ZiIylBn+f2L8dT874f6754+A4mxsHEJC3HiKSDylJNyrWH0LFydYzpJkDlzNQOUJFuJDmeH3VYZ/d6PdHy7dyVDcsgpXFxxXchttdWAHjw8ZYIbym8csFy8wFNQtHA04qqVoZoYXyKH888u9z29BoeySfnM01CgN6G835CEMTl5WCaOOF+cqINwPH9iA5Bv2FJf0Oqq0HKjS1CXVHGT19C+mGZGtpP8w6WBoXw9Aiqbb+DJyMqQkdKhlDr1T9CgYFGMdo4ASABBgAGP+Be7vP9JqAAAAAElFTkSuQmCC" height="21" alt="ScreenRightHighlight"></td><td style="padding-left: 50px;">Click to highlight the text you have selected.</td></tr><tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAVCAIAAAACbL0BAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAoZJREFUeNpifPfuHcMooD1gHA3ogQnoZ8+evXr16t+/f1hVi4iIyMjIMDExjQYcqYAFjQ8MZUtLSxYWFkZGRjSpP3/+HDp0CMgYDWsqBDQwLQND+efPn/CABoYvUPDXr1/CwsJa0h+/nJ/7/oHu1zcHhQ0SuJU8R0OQnID+//8/qDRhZGRmZgamWUgBAmQAxYGC319sYn5xWkIvhl/R6MN99dsHV6mMBjTZKRoCICUDJKyBgQ4M6H/v9/7+e1NIzfrdnetsjL94+SQ4eYVHg48KAQ0pOoCMv3///vt4nO33VX4l95/PV7BxMz48f+Pnb0Zxp6LR4CMeYK/T4AU0kPHr7ZF/H/bzK3v/eDabkfU9Kw8v9/9370Qd2fgkRoOP0oCGg5c3Nn19totfxf/H02lMrL9/fVJ4ffiisEvLPy4soSwkJERQBFMBQTXDP6Bf3tz66elxMW3vXy9mM7P9//lJ/vXhc6IBU9jFNfAE3GjiJaGMBoLbx1b8+3z1D6PU88uTBcXYfryT/XDmhmTIdGZeSYKJFGtvEzkOIArgIhAGmiBcBJf2YZKiLx2bp2Wbzv74yM0NR8/veHdr7wUxrw6CoYwZWGhBiawAHl6Y4rhiAi41fAL69r3Xv65uVjSw5eFWf3n5rnpoL7uIEhMYkBfWxANcBfeQLtBxFh1X77zqnzndVFORT1nPJXUBl5A08YYCw5qSQMFMsxAD8RdNQzWgF+96SmA4CmMwBFfQUJK0kYuXIV3ZsqCFHRD8+fOHhYUFjx6gAmIGlZDDGi2NIwcfXBxS/mJVNtRrQgbMYdKnT5++evUKMuiBs1xnYhIVFZWWlmYYBWQH9CgYDejRgB4FRACAAAMA2Mw6rnks6i0AAAAASUVORK5CYII=" height="21" alt="ScreenRightNotes"></td><td style="padding-left: 50px;">Click to highlight the text you have selected and to add notes about what you have highlighted.</td>
                                </tr>
                            </table>
                            <p class="title"><b>Notes</b></p>
                            <p>To close the notes click on X in the top right. To view the notes right-click on the highlighted text (anything you write in Notes will be deleted at the end of the test).</p>
                            <img src="https://computer.ieltsessentials.com/academic-writing/static/media/screenNotes.afb8a83a.png" height="317" alt="ScreenNotes">
                            <p>You can locate those areas of highlighted text containing notes by hovering over each highlighted text. If a small orange box appears the highlighted text contains notes.</p>
                            <img src="data:image/png;base64,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" height="66" alt="ScreenNotesIcon">
                            <p>To clear your highlighting right click on the highlighted text.</p>
                            <img src="data:image/png;base64,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" height="110" alt="ScreenRightClickHighlight">
                            <table><tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAVCAIAAAACbL0BAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAitJREFUeNrslz9Lw0AYxvOvJSoSbUuNUNSODgUdHDpIB8FFUEEH3URBUHDyA3TyAwiCivgFFASrdhOkizi5FCcVkbba2NaioqQkja89PSRNo41VMd4zHJfrmx793dMnb+hcLkcRfb8YguBnxOFZKpWSJKlYLBrWeTwen8/HMORgvgwaKAeDQY7jaJrWFSmKEovFYEJY1wA0eBkoy7KMQQNfWCwUCm63OxAIxONxwvqrGa1pGoyAmGVZwM28iS4JPhIEAfyezWYTiQShVoOHIXIrGgE6Yg1zp9PJ83woFMpkMuhUiCxGBwaNyMJEVVVgDYjz+TxkCCSJ1+slyGoDGgc0ihE8R9Cr/XaXywUjadUNQOugI7goqc0TAzFFImSrA40Q4zD5vHPhkrCuDjRinYosX+2uPFyeOlpa1c5+qrvb/JZKlCu53nAdH5498qdiR6y9CSjfHW12jU71LUV6Bkea00fp6JqFnTAvhEwH13C9/NK2jgbQF1uLPeMz/NkBFVuoFwR/W3s8uioOTFvbzxCcCU3bRBBnkhhAGcbC1SXf6qcG5l9vCIvKddbyfuXg3ieDbfxbddfxUuEVH4/3GrZn5af0I0Xd37GMR/zQth868b89MDnMFASvJPD+ravoGJ472V/3NddxrOP+RjmXGHFostynrpJM/u+VanTrdhWNf3AymZQkybBZZo535MMN7vZGbXI39o51ToRJu2YdNNHvtHdEBPSf1LMAAwBf5/Kkh1wKYgAAAABJRU5ErkJggg==" height="21" alt="ScreenRightClear"></td><td style="padding-left: 50px;">Click to clear the highlighting. This will also clear any notes you have made.</td></tr><tr><td class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAVCAIAAAACbL0BAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NEU5MTczQTA2MEIyMTFFMjhBNEVDODJCRTI4MjM3QkQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NEU5MTczQTE2MEIyMTFFMjhBNEVDODJCRTI4MjM3QkQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0RTkxNzM5RTYwQjIxMUUyOEE0RUM4MkJFMjgyMzdCRCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0RTkxNzM5RjYwQjIxMUUyOEE0RUM4MkJFMjgyMzdCRCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PoaqNvkAAAMRSURBVHja7JhNbxJRFIbv53wxHWaoQClQahM1ao3GrozuXerCpQt3unRj4i8x8S/oShsTf4Gaqq2RLkybopN+USBIsUxhhpnrpTTYEGgppbVN5g0L7p0zM5lnzn3PuQOLxSLwdfxCPoKTEek46zhOLpcrl8uVSoUPA4GApmmRSIRS6iMbGOhsNmv+zNhLn93skoABhmATUitxMRu/Hh8fHxkZ8akNALRpmqvpGevjay0cw4rcnIQQoo0FlvlaqN6z7WtjY2M+uD5BM8Y4zeXl5ZX0p/qXt/roeQ9Cl1s4Y7vHASHBYTY3XaN4FeN4PO6z6zOjbdteXzHt2XdaJOECyBFz0yCEIcB2I5iHtZA3N50TjWg0Sgjx8fXTdeTz+erCjKqHefZSwCTCROpJkEkIKIg1f9RzkKCoa+lCoeCz6xN0qVRiG4tEIBJFskAIpggKLhJcIjJREdWgagzrQ6pEEFv/0Xv3HdrRST7S3jue/N0Pto5qtUrqVQQ0gtCtZy86RmdePmXmbJ0Guc90fMLWf38f1BU0QghjnsjAY263aCvzTakUtgy9G+UWXz70WXcGLQhCXVSxU9tc+v7m4RWJUkWgoiRIhPCGpBmjuWVMIQqEePD+1+1GuVvWd5xvvby2t3gW19A/0LquO4kLvz+8MpxSUGAqASpkct0TAUOQh8FG28Hqv6jhxi6HDKM/92wRabpni85euG2rYR+T3ees0ws6HA7nxqfA3HvmVWRky4jJ2JMpAlQAEO+UTW/bcfM0VktN8eCjFKseJw9M1VNS6A7XdXA3OBcdNe4+LhN9C4qN9o6wBmUsAkS4hVs2S7ux7Rv3o8mJozTRxT1qy/RDpWR/Z/1/0FzJZFJOTeoPnpfCV1fcoaInA9cDdXu7WsvWwLx8afv2I33yTi/bwl5y7Qzl48Cso1XuUqlUVhTX8JOt3PyfnLlYMBtHI6NuKG4lbiZSE90+KjVLVotdxyzrFtM23/vKOD1t8oGCHYk4jsM3inwLY1kWHyqKwksl92X/M+mAQfs6Xo/25YM+8/orwADYYVhOa0V44wAAAABJRU5ErkJggg==" height="21" alt="ScreenRightNotes"></td><td style="padding-left: 50px;">Click to clear all highlighting including notes.</td></tr></table>
                            <p class="title"><b>Copy and paste</b></p>
                            <p>When writing your response you can use the following keyboard shortcuts:</p>
                            <p><b><i>Ctrl + C</i></b> to copy what you have written and selected. </p>
                            <p><b><i>Ctrl + V</i></b> to paste what you have copied.</p>
                        </div>
                        <div class="task-help-container" id="help_content3" style="display:none;">
                            <p>To choose a question click on the question number at the bottom of the screen.</p>
                            <p class="title"><b>Part 1 and Part 2</b></p>
                            <p>Write your answer in the space on the right side of the screen.</p>
                        </div>
                        <button style="cursor:pointer;" onclick="$('.help-popup-container').css('display','none');">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <form id="test_form" action="{{route('student-writing-test-submit')}}" method="post">
            @csrf
            <input type="hidden" name="student_id" value="{{$student->id}}">
            <input type="hidden" name="course_id" value="{{$course->id}}">
            <input type="hidden" name="question_1" value="{{$question->id}}">
            <input type="hidden" name="type" value="{{$type}}">
            
            
            <div id="main_content_container" class="main-content-container full-height">
                <div class="highlight-notes-container ">
                    <ul class="context-menu-list mode- " style="top: 82px; left: 257px;">
                        <li class="context-menu-item icon-highlight">
                            <span>Highlight</span>
                        </li>
                        <li class="context-menu-item icon-note">
                            <span>Notes</span>
                        </li>
                        <li class="context-menu-item icon-clear" title="Clears this highlighting">
                            <span>Clear</span>
                        </li>
                        <li class="context-menu-item icon-clearAll" title="Clears all highlighting on this page">
                            <span>Clear all</span>
                        </li>
                    </ul>
                    <div class="notes-container">

                    </div>
                </div>
                <div class="test-container" id="task1">
                    
                        <div class="title">
                            <h4 style="font-weight:700;color:#000;">Academic Writing Part 1 & 2</h4>
                            <p style="margin:0;"><b>You should spend about 60 minutes on this task. Write at least 300 words.</b></p>
                        </div>
                        
                        <div class="content">
                            <div class="question">
                                <div>

                                </div>
                            <div>
                                <?php echo($question->question); ?>
                            </div>
                            <hr>
                            
                        </div>
                        
                        <div class="answer">
                            <div>
                                <div class="text-area-container">
                                    <textarea spellcheck="false" name="task1_answer" id="task1_textarea" onkeyup="wordCounter1()"></textarea>
                                    <p>Word Count: <span id="count1">0</span></p>
                                </div>
                            </div>
                        </div>
                    
                    
                
                </div>
                
            </div>
         
            <div class="footer-nav" id="footer_nav">
                <div><input type="checkbox"><label>Review</label></div>
                <div class="question-nav ">
                    <ul>
                        <li class="current  ">
                            <span class="question-number">1</span>
                            <div class="hover-message">Question 1</div>
                            <span class="arrow-down"></span>
                        </li>
                    </ul>
                    <button type="button"></button>
                </div>
                <button type="button" class="previous" onclick="previous()" id="previous" style="cursor:pointer;"></button>
                <button type="button" class="next" onclick="next()" style="cursor:pointer;"></button>
            </div>
        </form>
        
    </div>
    
    <div class="main-content-container" id="confirm_container" style="display:none;">
        <div class="confirm-finish-container">
            <h1>Test ended</h1>
            <div>
                <p>Your test has finished.</p>
                <p>All of your answers have been stored.</p>
                <p>Please wait for further instructions.</p>
                <button style="cursor:pointer;" onclick="review_answers();">Review answer</button>
            </div>
        </div>
    </div>
<!--/#app -->
<script src="{{asset('js/app.js')}}"></script>
<script>
    var active = 1;
function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) 
        {
            element.innerHTML = "Time up!";
            next();
        } 
        else 
        {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}
function wordCounter1()
{

  var text = $('#task1_textarea').val();
  var wordCount = 0;
  for (var i = 0; i <= text.length; i++) {
    if (text.charAt(i) == ' ') {
      wordCount++;
    }
    }
  $('#count1').html(wordCount) ;
}


function help(id)
{
    $('#help1').removeClass('active');
    $('#help_content1').css('display','none');
    $('#help2').removeClass('active');
    $('#help_content2').css('display','none');
    $('#help2').removeClass('active');
    $('#help_content2').css('display','none');
    if(id == 1)
    {
        $('#help1').addClass('active');
        $('#help_content1').css('display','block');
    }
    else if(id == 2)
    {
        $('#help2').addClass('active');
        $('#help_content2').css('display','block');
    }
    else if(id == 3)
    {
        $('#help3').addClass('active');
        $('#help_content3').css('display','block');
    }
}
$(document).ready(function() {
    countdown( "countdown", 60, 0 );
    if(active == 1)
    {
        $('#previous').css('display','none');
    }
    //countdown( "countdown2", 100, 0 );
} );
function next()
{
    var text = $('#task1_textarea').val();
    var wordCount = 0;
    for (var i = 0; i <= text.length; i++) {
        if (text.charAt(i) == ' ') {
        wordCount++;
        }
        }
    if(wordCount < 2 )
    {
        alert('Words should be atleast 300');
        return;
    }
    if(active == 1)
    {
        $('#task1').css('display','none');
        $('#main_content_container').removeClass('full-height');
        $('#main_content_container').removeClass('main-content-container');
        $('#footer_nav').css('display','none');
        $('#confirm_container').css('display','block');
        active = 2;
        $('#timer_li').css('display','none');
        //$('#test_form').submit();
    }
   
}

function review_answers()
{
    active = 1;
    $('#main_content_container').addClass('main-content-container');
    $('#main_content_container').addClass('full-height');
        
    $('#task1').css('display','block');
        
        $('#footer_nav').css('display','block');
        $('#confirm_container').css('display','none');
}

</script>
</body>
</html>