@extends('public.layout.main')
@section('body')


        <section class="home-slider owl-carousel">
            @foreach($sliders as $slider)
            @php
                $image = $slider->image;
            @endphp
{{--            <img src="{{Storage::disk('public')->url($image['file_path'])}}"/>--}}
            <div class="slider-item" style="background-image: url('{{Storage::disk('public')->url($image['file_path'])}}')">
                <div class="overlay"></div>

                <div class="container">
                    <div class="row slider-text align-items-center" data-scrollax-parent="true">
                        <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$slider->text->heading}}</h1>
                            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$slider->text->description}}</p>
                            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                                <a href="#"  class="btn btn-primary px-4 py-3">Make an Appointment</a></p>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </section>


    <section class="ftco-intro">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-3 color-1 p-4">
                    <h3 class="mb-4">Emergency Cases</h3>
                    <p>A small river named Duden flows by their place and supplies</p>
                    <span class="phone-number">+ (123) 456 7890</span>
                </div>
                <div class="col-md-3 color-2 p-4">
                    <h3 class="mb-4">Opening Hours</h3>
                    <p class="openinghours d-flex">
                        <span>Monday - Friday</span>
                        <span>8:00 - 19:00</span>
                    </p>
                    <p class="openinghours d-flex">
                        <span>Saturday</span>
                        <span>10:00 - 17:00</span>
                    </p>
                    <p class="openinghours d-flex">
                        <span>Sunday</span>
                        <span>10:00 - 16:00</span>
                    </p>
                </div>
                <div class="col-md-6 color-3 p-4">
                    <h3 class="mb-2">Make an Appointment</h3>
                    <form action="/make/appointment" class="appointment-form" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="dropdown">
                                    <input type="button" class="dropbtn"  value="Select Services" onclick="toggleDropdown()">
                                    <div id="dropdown-content" class="dropdown-content">
                                        <label for="option1"><input type="checkbox" id="option1" class="checkbox" name="whitening">Teeth Whitening</label>
                                        <label for="option2"><input type="checkbox" id="option2" class="checkbox" name="cleaning">Teeth Cleaning</label>
                                        <label for="option3"><input type="checkbox" id="option3" class="checkbox" name="brackets">Quality Brackets</label>
                                        <label for="option4"><input type="checkbox" id="option3" class="checkbox" name="anesthetic">Modern Anesthetic</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="icon-user"></span></div>
                                    <input type="text" class="form-control" id="appointment_name" placeholder="Name" name="name">
                                    @error('name')
                                    <p class="error-text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="icon-paper-plane"></span></div>
                                    <input type="text" class="form-control" id="appointment_email" name="email"
                                        placeholder="Email">
                                    @error('email')
                                    <p class="error-text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="ion-ios-calendar"></span></div>
                                    <input type="text" class="form-control appointment_date" placeholder="Date" name="date" >
                                    @error('date')
                                    <p class="error-text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="ion-ios-clock"></span></div>
                                    <input type="text" class="form-control appointment_time" placeholder="Time" name="time">
                                    @error('time')
                                    <p class="error-text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="icon-phone2"></span></div>
                                    <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
                                    @error('phone')
                                    <p class="error-text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
{{--                            <input type="submit" value="Make an Appointment" class="btn btn-primary">--}}
                            <button type="submit" >Make an Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-services">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">Our Service Keeps you Smile</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                </div>
            </div>
            <div class="mlt-3">
            @foreach($services as $service)
                @php
                    $icon = $service->image;
                @endphp


            <div class="row mw-24 inline-block mr-6">
                <div class="d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <img class="w-24 mw-100" src="{{Storage::disk('public')->url($icon['file_path'])}}" alt="" class="logo"/>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">{{$service->title}}</h3>
                            <p>{{$service->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
        <div class="container-wrap mt-5">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 img" style="background-image: url(/public/images/about-2.jpg);">
                </div>
                <div class="col-md-6 d-flex">
                    <div class="about-wrap">
                        <div class="heading-section heading-section-white mb-5 ftco-animate">
                            <h2 class="mb-2">Dentacare with a personal touch</h2>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>Well Experience Dentist</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                    there live the blind texts.</p>
                            </div>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>High Technology Facilities</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                    there live the blind texts.</p>
                            </div>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>Comfortable Clinics</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                    there live the blind texts.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">Meet Our Experience Dentist</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                        paradisematic country, in which roasted parts of sentences</p>
                </div>
            </div>

            <div class="row">
                @foreach($staffs as $staff)
                    @php
                         $staff_image = $staff->image;
                    @endphp

                <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url({{Storage::disk('public')->url($staff_image['file_path'])}});"></div>

{{--                        <img class="w-24" src="{{Storage::disk('public')->url($staff_image['file_path'])}}" alt="" class="logo"/>--}}
                        <div class="info text-center">
                            <h3>{{$staff->name}}</h3>
                            <span class="position">{{$staff->position}}</span>
                            <div class="text">
                                <p>{{$staff->about}}</p>
                                <ul class="ftco-social">
                                    @if(isset($staff->twitter))
                                    <li class="ftco-animate"><a href={{$staff->twitter}}><span class="icon-twitter"></span></a>
                                    </li>
                                    @endif
                                    @if(isset($staff->facebook))
                                    <li class="ftco-animate"><a href={{$staff->facebook}}><span class="icon-facebook"></span></a>
                                    </li>
                                     @endif
                                     @if(isset($staff->instagram))
                                    <li class="ftco-animate"><a href={{$staff->instagram}}><span class="icon-instagram"></span></a>
                                    </li>
                                     @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row  mt-5 justify-conten-center">
                <div class="col-md-8 ftco-animate">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi vero accusantium sunt sit aliquam
                        ipsum molestias autem perferendis, incidunt cumque necessitatibus cum amet cupiditate, ut accusamus.
                        Animi, quo. Laboriosam, laborum.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(/public/images/bg_1.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-3 aside-stretch py-5">
                    <div class=" heading-section heading-section-white ftco-animate pr-md-4">
                        <h2 class="mb-3">Achievements</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
                <div class="col-md-9 py-5 pl-md-5">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="14">0</strong>
                                    <span>Years of Experience</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="4500">0</strong>
                                    <span>Qualified Dentist</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="4200">0</strong>
                                    <span>Happy Smiling Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="320">0</strong>
                                    <span>Patients Per Year</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">Our Best Pricing</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                </div>
            </div>
            <div class="row">
                @foreach($packages as $package)
                <div class="col-md-3 ftco-animate">
                    <div class="pricing-entry pb-5 text-center">
                        <div>
                            <h3 class="mb-4">{{$package->type}}</h3>
                            <p><em>Npr.</em><span class="price">{{$package->price}}</span> <span class="per">/ session</span></p>
                        </div>
                        @php
                              $id = $package->id;
                              $package_services = \App\Models\packageService::where('package_id',$id)->get();
                            @endphp
                        <ul>
                            @foreach($package_services as $package_service)
                            <li>{{$package_service->name}}</li>
                            @endforeach
                        </ul>
                        <p class="button text-center"><a href="#"
                                class="btn btn-primary btn-outline-primary px-4 py-3">Order now</a></p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <h2>Subcribe to our Newsletter</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts. Separated they live in</p>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-8">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">Testimony</h2>
                    <span class="subheading">Our Happy Customer Says</span>
                </div>
            </div>
            <div class="row justify-content-center ftco-animate">
                <div class="col-md-8">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        @foreach($statements as $statement)
                            @php
                                $person_image = $statement->image;
                            @endphp
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{Storage::disk('public')->url($person_image['file_path'])}});">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5">{{$statement->quote}}</p>
                                    <p class="name">{{$statement->name}}</p>
                                    <span class="position">{{$statement->position}}</span>
                                    <span class="company">{{$statement->company}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-gallery">
        <div class="container-wrap">
            <div class="row no-gutters">
                <div class="col-md-3 ftco-animate">
                    <a href="#" class="gallery img d-flex align-items-center"
                        style="background-image: url(/public/images/gallery-1.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="#" class="gallery img d-flex align-items-center"
                        style="background-image: url(/public/images/gallery-2.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="#" class="gallery img d-flex align-items-center"
                        style="background-image: url(/public/images/gallery-3.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="#" class="gallery img d-flex align-items-center"
                        style="background-image: url(/public/images/gallery-4.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">Latest Blog</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="{{route('public.blog','url')}}html" class="block-20" style="background-image: url('/public/images/image_1.jpg');">
                        </a>
                        <div class="text d-flex py-4">
                            <div class="meta mb-3">
                                <div><a href="#">Sep. 20, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <div class="desc pl-3">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about
                                        the blind texts</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry" data-aos-delay="100">
                        <a href="{{route('public.blog','url')}}html" class="block-20" style="background-image: url('/public/images/image_2.jpg');">
                        </a>
                        <div class="text d-flex py-4">
                            <div class="meta mb-3">
                                <div><a href="#">Sep. 20, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <div class="desc pl-3">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about
                                        the blind texts</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry" data-aos-delay="200">
                        <a href="{{route('public.blog','url')}}html" class="block-20" style="background-image: url('/public/images/image_3.jpg');">
                        </a>
                        <div class="text d-flex py-4">
                            <div class="meta mb-3">
                                <div><a href="#">Sep. 20, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <div class="desc pl-3">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about
                                        the blind texts</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-quote">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pr-md-5 aside-stretch py-5 choose">
                    <div class="heading-section heading-section-white mb-5 ftco-animate">
                        <h2 class="mb-2">DentaCare Procedure &amp; High Quality Services</h2>
                    </div>
                    <div class="ftco-animate">
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small line of blind text by the name of Lorem Ipsum
                            decided to leave for the far World of Grammar. Because there were thousands of bad Commas, wild
                            Question Marks and devious Semikoli</p>
                        <ul class="un-styled my-5">
                            <li><span class="icon-check"></span>Consectetur adipisicing elit</li>
                            <li><span class="icon-check"></span>Adipisci repellat accusamus</li>
                            <li><span class="icon-check"></span>Tempore reprehenderit vitae</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 py-5 pl-md-5">
                    <div class="heading-section mb-5 ftco-animate">
                        <h2 class="mb-2">Get a Free Quote</h2>
                    </div>
                    <form action="/public/message" method="post" class="ftco-animate">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name" name="name" value="{{old('name')}}">
                                    @error('name')
                                    <p class="error-text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email" name="email" value="{{old('email')}}">
                                    @error('email')
                                    <p class="error-text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone" name="phone" value="{{old('phone')}}">
                                    @error('phone')
                                    <p class="error-text">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" name="subject" value="{{old('subject')}}">
                                @error('subject')
                                <p class="error-text">{{$message}}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="body" id="" cols="30" rows="7" class="form-control" placeholder="Message" >{{old('body')}}</textarea>
                                    @error('body')
                                    <p class="error-text">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Get a Quote" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div id="map"></div>
@endsection
