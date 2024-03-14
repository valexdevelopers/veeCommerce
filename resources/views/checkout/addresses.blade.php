<!DOCTYPE html> 
<html>
    <head>
        <title>Checkout Address | Vee Commerce</title>
        @include('layouts.storeHeadContent')
    
    
    </head>
    <body>
        <div class="wrapper">
            <div class="page-wrapper">
                @include('layouts.storeHeader')
                <section class="cart-section">
                    <div class="row-l">
                        <div class="cart-wrap">
                            <div class="cart-header-wrap width-100-percent ">
                                <h1 class="text-center">Checkout</h1>
                                
                                <div class="cart-body-wrap">
                                    <div class="cart-details-wrap">
                                        <ul class="cart-details-header width-100-percent display-flex space-between">
                                            <li class="cart-pages width-33-percent cart-list-active">Cart Overview</li>
                                            <li class="cart-pages width-33-percent cart-list-active">Address</li>
                                            <li class="cart-pages width-33-percent">Confirmation</li>
                                        </ul>
                                        
                                        <div class="cart-items-wrap width-100-percent">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form method="post" action="{{ route('auth.checkout.create') }}" id="addressesform">
                                                @csrf
                                                <section id="billing_form_details">
                                                    @if(is_null($address))
                                                
                                                    <div class="row form-row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">FirstName <span class="star-required">*</span></label>
                                                                <input required="required" class="form-control @error('billing_firstname') is-invalid @enderror"   required="required" type="text" name="billing_firstname"  value="{{ old('billing_firstname') }}">
                                                            @error('billing_firstname')
                                                                <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label >LastName<span class="star-required">*</span></label>
                                                                <input type="text" required="required" class="form-control @error('billing_lastname') is-invalid @enderror"  name="billing_lastname" placeholder=""  value="{{ old('billing_lastname') }}">
                                                            @error('billing_lastname')
                                                                <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        
                                                        <div class="col-sm-12">
                                                            <div class="form-group ">
                                                                <label >Street Address<span class="star-required">*</span></label>
                                                                <input type="text" id="billing_street" required="required" class="form-control @error('billing_street') is-invalid @enderror"  name="billing_street" placeholder=""  value="{{ old('billing_street') }}">
                                                            @error('billing_street')
                                                                <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    <div class="row form-row">
                                                        
                                                        <div class="col-sm-12">
                                                            <div class="form-group ">
                                                                <label >Apartment (Optional)</label>
                                                                <input type="text" id="billing_apartment"  class="form-control @error('billing_apartment') is-invalid @enderror"  name="billing_apartment" placeholder="Apartment, suite, unit etc "  value="{{ old('billing_apartment') }}">
                                                            @error('billing_apartment')
                                                                <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    <div class="row form-row">
                                                        
                                                        <div class="col-sm-12">
                                                            <div class="form-group ">
                                                                <label >Country<span class="star-required">*</span></label>
                                                                <select class="form-select"  id="country" name="billing_country">
                                                                    <option value="">Select country</option>
                                                                    <option value="Afghanistan">Afghanistan</option>
                                                                    <option value="Aland Islands">Aland Islands</option>
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
                                                                    <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
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
                                                                    <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curacao">Curacao</option>
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
                                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="India">India</option>
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
                                                                    <option value="Kosovo">Kosovo</option>
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
                                                                    <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav Republic of</option>
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
                                                                    <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                                    <option value="Saint Helena">Saint Helena</option>
                                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                                    <option value="Saint Martin">Saint Martin</option>
                                                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Serbia">Serbia</option>
                                                                    <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Sint Maarten">Sint Maarten</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                                    <option value="South Sudan">South Sudan</option>
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
                                                                    <option value="Timor-Leste">Timor-Leste</option>
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
                                                                    <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
                                                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                                    <option value="Western Sahara">Western Sahara</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                    <div class="row form-row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Phone <span class="star-required">*</span></label>
                                                                <input required="required" class="form-control @error('billing_phone') is-invalid @enderror"   required="required" type="tel" name="billing_phone"  value="{{ old('billing_phone') }}">
                                                            @error('billing_phone')
                                                                <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group ">
                                                                <label >Region/State<span class="star-required">*</span></label>
                                                                <input type="text" required="required" class="form-control @error('billing_region') is-invalid @enderror"  name="billing_region" placeholder=""  value="{{ old('billing_region') }}">
                                                                @error('billing_region')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="image_preview_wrap" class="row form-row display-flex space-between">
                                                    
                                                    </div>
                                                    
                                                    <div class="row form-row " >
                                                        
                                                        
                                                        <div class="col-sm-6">
                                                            <div class="form-group ">
                                                                <label >City/Town<span class="star-required">*</span></label>
                                                                <input type="text" required="required" class="form-control @error('billing_city') is-invalid @enderror" id="billing_city" name="billing_city" placeholder=""  value="{{ old('') }}">
                                                            @error('billing_city')
                                                                <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group ">
                                                                <label >Postal Code<span class="star-required">*</span></label>
                                                                <input type="text" id="billing_postalcode" required="required" class="form-control @error('billing_postalcode') is-invalid @enderror"  name="billing_postalcode" placeholder=""  value="{{ old('') }}">
                                                            @error('product_postalcode')
                                                                <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    @else
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <strong>You have previously set your default delivery address. You can <a href="#">edit</a> your address here</strong> 
                                                            
                                                        </div>
                                                        <div class="row form-row " >
                                                            <div class="col-sm-12">
                                                                <div class="form-group ">
                                                                    <label >{{ $address->firstname }} {{ $address->lastname }}</label> 
                                                                    <input type="hidden" value="{{ $address->firstname }}" name="billing_firstname" />
                                                                    <input type="hidden" value="{{ $address->lastname }}" name="billing_lastname" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row form-row " >
                                                            <div class="col-sm-12">
                                                                <div class="form-group ">
                                                                    <label >{{ $address->street }}</label> 
                                                                    <input type="hidden" value="{{ $address->street }}" name="billing_street" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row form-row " >
                                                            <div class="col-sm-12">
                                                                <div class="form-group ">
                                                                    <label >{{ $address->apartment }}</label> 
                                                                    <input type="hidden" value="{{ $address->apartment }}" name="billing_apartment" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="row form-row " >
                                                            <div class="col-sm-12">
                                                                <div class="form-group ">
                                                                    <label >{{ $address->town }}</label> 
                                                                    <input type="hidden" value="{{ $address->town }}" name="billing_town" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row form-row " >
                                                            <div class="col-sm-12">
                                                                <div class="form-group ">
                                                                    <label >{{ $address->region }}</label> 
                                                                    <input type="hidden" value="{{ $address->region }}" name="billing_region" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row form-row " >
                                                            <div class="col-sm-12">
                                                                <div class="form-group ">
                                                                    <label >{{ $address->country }}</label> 
                                                                    <input type="hidden" value="{{ $address->country }}" name="billing_country" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row form-row " >
                                                            <div class="col-sm-12">
                                                                <div class="form-group ">
                                                                    <label >{{ $address->postal_code }}</label> 
                                                                    <input type="hidden" value="{{ $address->postal_code }}" name="billing_postalcode" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row form-row " >
                                                            <div class="col-sm-12">
                                                                <div class="form-group ">
                                                                    <label >{{ $address->mobile }}</label> 
                                                                    <input type="hidden" value="{{ $address->phone  }}" name="billing_phone" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>


                                                                
                                                    @endif
                                                </section>
                                                
                                                <div class="row form-row">
                                                
                                                    <div class="col-sm-12">
                                                        <div class="form-group ">
                                                            <label >Order Notes<span class="star-required">*</span></label>
                                                            <textarea id="" class="form-control @error('order_notes') is-invalid @enderror"  name="order_notes" placeholder="Enter additonal information about your order delivery here"></textarea>
                                                           @error('order_notes')
                                                            <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>    
                                                
            
                                               
                                            </form>
                                        </div>
                                    </div>



                                    <div class="cart-pricing-wrap">
                                        <table class="cart-pricing-table">
                                            <tr >
                                                <th>Subtotal</th>
                                                <td>₦{{ number_format($itemsInCart->sum('subtotal'), 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>
                                                    <p>Shipping options will be updated during at checkout confirmation.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td class="cart-total">₦{{ number_format($itemsInCart->sum('subtotal'), 2) }}</td>
                                            </tr>
                                        </table>
                                        <div class="coupon-wrap">
                                            
                                            <div class="cart-proceed-wrap width-100-percent" >
                                                <a id="place_order" role="button" class="cart-proceed-btn width-100-percent" onclick="placeOrder()" >Proceed to checkout</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>

               
                <!--Footer starts here-->
                @include('layouts.storeFooter')
                <!--Footer ends here-->
            </div>
        </div>
        <script>
            const minus = document.getElementById('minus')
            const plus = document.getElementById('plus')
            

            function deduct(cartId){
                const quantity = document.getElementById(`quantity_${cartId}`)
                var currentquantity = quantity.value

                if(currentquantity == 1){
                    var newquantity = 1 
                }else{
                    var newquantity = currentquantity - 1
                }
                
                quantity.setAttribute('value', newquantity)
            }

            function add(cartId){
                const quantity = document.getElementById(`quantity_${cartId}`)
                var currentquantity = parseInt(quantity.value)
                var newquantity = currentquantity + 1
                quantity.setAttribute('value', newquantity)
            }



            function display_shipping_form(){
                
                const checkboxForShipping  = document.getElementById('flexCheckDefault')
                const shipping_form_details  = document.getElementById('shipping_form_details')
                if(checkboxForShipping.checked){
                    shipping_form_details.style.display = 'block';
                }else{
                    shipping_form_details.style.display = 'none';
                }
               
            }

            function placeOrder(){
               document.getElementById("addressesform").submit()
            }
        </script>

        @include('layouts.footer')
    </body>
</html>