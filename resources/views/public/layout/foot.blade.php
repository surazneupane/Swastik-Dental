<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">DentaCare.</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p>
                </div>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('public.about') }}" class="py-2 d-block">About</a></li>
                        <li><a href="{{route('public.services')}}" class="py-2 d-block">Services</a></li>
                        <li><a href="{{route('public.doctors')}}" class="py-2 d-block">Doctors</a></li>
                        <li><a href="{{route('public.blogs')}}" class="py-2 d-block">Blog</a></li>
                        <li><a href="{{route('public.contact')}}" class="py-2 d-block">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 pr-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Recent Blog</h2>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(/public/images/image_1.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                    about</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(/public/images/image_2.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                    about</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Office</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
                                    View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
                                        210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span
                                        class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>





<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>

<!-- Modal -->
<div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRequestLabel">Make an Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('public.message-appointment')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
                        <input type="text" class="form-control" id="appointment_name" placeholder="Full Name" name="name">
                    </div>
                    <div class="form-group">
                        <!-- <label for="appointment_email" class="text-black">Email</label> -->
                        <input type="text" class="form-control" id="appointment_email" placeholder="Email" name="email">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="appointment_date" class="text-black">Date</label> -->
                                <input type="text" class="form-control appointment_date" placeholder="Date" name="date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="appointment_time" class="text-black">Time</label> -->
                                <input type="text" class="form-control appointment_time" placeholder="Time" name="time">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <!-- <label for="appointment_message" class="text-black">Message</label> -->
                        <textarea  id="appointment_message" class="form-control" cols="30" rows="10"
                            placeholder="Message" name="message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Make an Appointment" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/public/js/popper.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/jquery.easing.1.3.js"></script>
<script src="/public/js/jquery.waypoints.min.js"></script>
<script src="/public/js/jquery.stellar.min.js"></script>
<script src="/public/js/owl.carousel.min.js"></script>
<script src="/public/js/jquery.magnific-popup.min.js"></script>
<script src="/public/js/aos.js"></script>
<script src="/public/js/jquery.animateNumber.min.js"></script>
<script src="/public/js/bootstrap-datepicker.js"></script>
<script src="/public/js/jquery.timepicker.min.js"></script>
<script src="/public/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="/public/js/google-map.js"></script>
<script src="/public/js/main.js"></script>

<script>
    var inputCounter = 2
    function addInputField() {
        var i = 2;
        // Create a new input element
        var newInput = document.createElement('input');
        newInput.type = 'text';

        newInput.name = 'dynamicInput_' + inputCounter ;
        newInput.placeholder = 'Enter something';

        inputCounter++;
        // Create a new button element
        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.textContent = 'Remove';
        removeButton.onclick = function() {
            removeInputField(removeButton);
        };

        // Create a new div container for the input and button
        var container = document.createElement('div');
        container.classList.add('input-container');
        container.appendChild(newInput);
        container.appendChild(removeButton);

        // Append the new container to the main container
        document.getElementById('input-container').appendChild(container);
    }

    function removeInputField(button) {
        // Get the parent container of the button (which is the input container)
        var container = button.parentNode;

        // Remove the container from the parent
        container.parentNode.removeChild(container);
    }
</script>

<script>
    // Toggle the dropdown when the button is clicked
    function toggleDropdown() {
        var dropdownContent = document.getElementById("dropdown-content");
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    }

    // Close the dropdown when clicking outside of it
    window.onclick = function(event) {
        var dropdown = document.querySelector('.dropdown');
        if (event.target != dropdown && event.target != dropdown.querySelector('.dropbtn')) {
            var dropdownContent = document.getElementById("dropdown-content");
            dropdownContent.style.display = "none";
        }
    }

</script>
<script>

    var count = 0;
    const checkedBoxes = document.querySelectorAll('input[type="checkbox"]');
    var title= document.getElementById("dropdown-title");

    for(const checkbox of checkedBoxes){

        checkbox.addEventListener('change', function() {

            if (this.checked) {
                count++
                if (count <= 1) {
                    title.value = checkbox.name;
                } else if (count == 2) {
                    title.value ="2 services";
                }else if (count == 3){
                    title.value ="3 services";
                }else{
                    title.value ="4 services";
                    console.log('Four checkbox checked');
                }
            }
            else if(this.checked == false){
                count--
                if (count == 0) {
                    title.value = "Select Services";
                }
                else if (count <= 1) {
                    const getCheckedBox = document.querySelector('input[type="checkbox"]:checked')
                    console.log(count);
                    console.log(checkbox);
                    console.log(`Current unchecked box is: ${checkbox.name}`);
                    console.log(`Remaining checked one  is:"${getCheckedBox.name}" is checked`)
                    title.value = getCheckedBox.name;
                } else if (count == 2) {
                    title.value ="2 services";
                }else if (count == 3){
                    title.value ="3 services";
                }else{
                    title.value ="4 services";
                }
            }
        });
    }

    // const checkedBoxes = document.querySelectorAll('input[type="checkbox"]:checked');
    // const x = 3;
    // console.log(x);

    // for(const checkbox of checkedBoxes)
    // {
    //
    //     checkbox.addEventListener('change', function() {
    //         if (this.checked) {
    //             console.log(`Checkbox with id "${checkbox.id}" is checked`);
    //             console.log('Checkbox is checked');
    //         } else {
    //             console.log('Checkbox is not checked');
    //         }
    //     });
    //
    // }

</script>


</body>

</html>
