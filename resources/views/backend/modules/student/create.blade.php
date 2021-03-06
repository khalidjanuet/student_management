<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Student Registration Form</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
</head>
<body class="light">
@if(Session::has('saved_success'))
<div class="toast"
    data-title="Success!"
    data-message="Student Data Saved Successfully."
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
        <h1 class="page-title">Student Registration</h1>
       
    </div>
    <div class="banner-overlay"></div>
</div>
    <div id="primary" class="p-t-b-50 height-full" style="background:#fff;padding:0 10px;">
        <div class="container" style="background:#f3f5f8;border-radius:10px;padding:20px 0;">
            <div class="row">
                <div class="col-lg-12 mx-md-auto" style="color:#000;">
                    <div class="text-center">
                        <img src="{{asset('img/ielts_master_logo.jpeg')}}" style="width:120px;margin:10px auto 30px auto;" alt="" style="">
                        <h1 class="mt-2" style="color:#000;font-weight:600;">Student Registration Form</h1>    
                    </div>
                    <form action="{{route('student-save')}}" method="POST" enctype="multipart/form-data" style="padding:50px;">
                        <div class="row">
                            
                            <div class="col-md-3">
                                <h5>Name:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first_name" id="" placeholder="First" required value="{{old('first_name')}}"> 
                                    @if($errors->first('first_name'))
                                        <p class="text-danger">{{$errors->first('first_name')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" id="" placeholder="Last" value="{{old('last_name')}}" required>
                                    @if($errors->first('last_name'))
                                        <p class="text-danger">{{$errors->first('last_name')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Location:<span style="color:red;">*</span></h5>
                            </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                   
                                   <input type="text" class="form-control" name="location" id="" value="{{old('location')}}" required>
                                   @if($errors->first('location'))
                                       <p class="text-danger">{{$errors->first('location')}}</p>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="row">
                        <div class="col-md-3">
                                <h5>Mobile Number:<span style="color:red;">*</span></h5>
                            </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                  
                                   <input type="text" class="form-control" name="phone" id="" value="{{old('phone')}}" required>
                                   @if($errors->first('phone'))
                                       <p class="text-danger">{{$errors->first('phone')}}</p>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="row">
                            <div class="col-md-3">
                                <h5>WhatsApp Number: <span style="color:red;">*</span></h5>
                                <span style="font-size:10px;">(Please Mention Country Code)</span>
                            </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                 
                                   <input type="text" class="form-control" name="whatsapp" value="{{old('whatsapp')}}" id="" required>
                                   @if($errors->first('whatsapp'))
                                       <p class="text-danger">{{$errors->first('whatsapp')}}</p>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="row">
                            <div class="col-md-3">
                                <h5>Email:<span style="color:red;">*</span></h5>
                            </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                   <input type="email" class="form-control" name="email" id="" value="{{old('email')}}" required>
                                   @if($errors->first('email'))
                                       <p class="text-danger">{{$errors->first('email')}}</p>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="row">
                            <div class="col-md-3">
                                <h5>Which IELTS Module do you require?</h5>
                            </div>
                           <div class="col-md-4">
                                <div class="form-group">
                                   <input type="radio" name="module" id="module" value="academic"> Academic
                                   <input type="radio" name="module" id="module" value="general" style="margin-left:50px;"> General
                                  
                               </div>
                           </div>
                       </div>
                      <!-- <div class="row mt-3">
                            <div class="col-md-3">
                                <h5>Course:<span style="color:red;">*</span></h5>
                            </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                   <select class="form-control select2" name="course_id" id="" required>
                                       
                                           <option value="">Choose Course</option>
                                           @foreach($courses as $course)
                                               <option value="{{$course->id}}">{{$course->name}}</option>
                                           @endforeach
                                   </select>
                                   @if($errors->first('course_id'))
                                       <p class="text-danger">{{$errors->first('course_id')}}</p>
                                   @endif
                               </div>
                           </div>
                       </div> -->
                       <div class="row mt-3">
                            <div class="col-md-3">
                                <h5>Have you attended IELTS test before? <span style="color:red;">*</span></h5>
                            </div>
                           <div class="col-md-4">
                                <div class="form-group">
                                   <input type="radio" name="attempt" id="attempt" value="YES"> Yes
                                   <input type="radio" name="attempt" id="attempt" value="NO" style="margin-left:50px;" checked="true"> No
                                  
                               </div>
                           </div>
                       </div>
                       <div class="row mt-3">
                            <div class="col-md-3">
                                <h5>If yes, Please enter you score details:</h5>
                            </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                   <input type="text" class="form-control" name="previous_score" value="{{old('previous_score')}}" id="" >
                                   @if($errors->first('previous_score'))
                                       <p class="text-danger">{{$errors->first('previous_score')}}</p>
                                   @endif
                               </div>
                           </div>
                       </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <h5>Your Overall Target Score:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="overall_target_score" id="" class="form-control">
                                        <option value="5">5 Band</option>
                                        <option value="5.5">5.5 Band</option>
                                        <option value="6">6 Band</option>
                                        <option value="6.5">6.5 Band</option>
                                        <option value="7">7 Band</option>
                                        <option value="7.5">7.5 Band</option>
                                        <option value="8">8 Band</option>
                                        <option value="8.5">8.5 Band</option>
                                        <option value="9">9 Band</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Listening Target Score:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="listening_target_score" id="" class="form-control">
                                        <option value="5">5 Band</option>
                                        <option value="5.5">5.5 Band</option>
                                        <option value="6">6 Band</option>
                                        <option value="6.5">6.5 Band</option>
                                        <option value="7">7 Band</option>
                                        <option value="7.5">7.5 Band</option>
                                        <option value="8">8 Band</option>
                                        <option value="8.5">8.5 Band</option>
                                        <option value="9">9 Band</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Reading Target Score:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="reading_target_score" id="" class="form-control">
                                        <option value="5">5 Band</option>
                                        <option value="5.5">5.5 Band</option>
                                        <option value="6">6 Band</option>
                                        <option value="6.5">6.5 Band</option>
                                        <option value="7">7 Band</option>
                                        <option value="7.5">7.5 Band</option>
                                        <option value="8">8 Band</option>
                                        <option value="8.5">8.5 Band</option>
                                        <option value="9">9 Band</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Writing Target Score:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="writing_target_score" id="" class="form-control">
                                        <option value="5">5 Band</option>
                                        <option value="5.5">5.5 Band</option>
                                        <option value="6">6 Band</option>
                                        <option value="6.5">6.5 Band</option>
                                        <option value="7">7 Band</option>
                                        <option value="7.5">7.5 Band</option>
                                        <option value="8">8 Band</option>
                                        <option value="8.5">8.5 Band</option>
                                        <option value="9">9 Band</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Speaking Target Score:</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <select name="speaking_target_score" id="" class="form-control">
                                        <option value="5">5 Band</option>
                                        <option value="5.5">5.5 Band</option>
                                        <option value="6">6 Band</option>
                                        <option value="6.5">6.5 Band</option>
                                        <option value="7">7 Band</option>
                                        <option value="7.5">7.5 Band</option>
                                        <option value="8">8 Band</option>
                                        <option value="8.5">8.5 Band</option>
                                        <option value="9">9 Band</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Special Attention you require/ Problems you face in English or IELTS:</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="problems" id="" cols="30" rows="5">{{old('problems')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Address with pin code: <span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="street_1" value="{{old('street_1')}}" placeholder="Street Address" required>
                                    <input type="text" class="form-control mt-1" name="street_2" value="{{old('street_2')}}" placeholder="Street Address Line 2">
                                    <div class="row mt-1">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="city" value="{{old('city')}}" placeholder="City" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="region" value="{{old('region')}}" placeholder="Region" required>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="zipcode" value="{{old('zipcode')}}" placeholder="Zip Code">
                                        </div>
                                        <div class="col-md-6">
                                            <select id="country" name="country" class="form-control">
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="??land Islands">??land Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India" selected="">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Preferred Day and Time to attend your sessions?</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="session_day_time" id="" cols="30" rows="2">{{old('session_day_time')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>On which date would you like to start your course?</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="admission_date" id="" placeholder="DD-MM-YYYY">
                                    @if($errors->first('admission_date'))
									    <p class="text-danger">{{$errors->first('admission_date')}}</p>
								    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Upload your photo:<span style="color:red;">*</span></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="profile_image" id="" required>
                                    @if($errors->first('profile_image'))
									    <p class="text-danger">{{$errors->first('profile_image')}}</p>
								    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {{csrf_field()}}
                                <input type="submit" class="btn btn-success btn-lg btn-block" value="Submit Form" style="background:#ff7b00;width:300px;margin:10px auto;">
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
</body>
</html>