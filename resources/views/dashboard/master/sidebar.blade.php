

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>

                <li class="submenu">
                    <a href="#"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fas fa-user-md"></i> <span> Specialization</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('specialization_list') }}">specializations List</a></li>
                        <li><a href="{{ route('specialization_create') }}">specialization Add</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fas fa-hand-holding-medical"></i> <span> service</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('service_list') }}">services List</a></li>
                        <li><a href="{{ route('service_create') }}">service Add</a></li>
                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fas fa-stethoscope"></i><span> Doctor</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('doctor_list') }}">Doctors List</a></li>
                        <li><a href="{{ route('doctor_create') }}">Doctor Add</a></li>
                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fas fa-calendar-check"></i> <span> Appointment</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('appointment_list') }}">Appointments List</a></li>
                        <li><a href="{{ route('appointment_create') }}">Appointment Add</a></li>
                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fas fa-user-injured"></i> <span> Patient</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('patient_list') }}">Patients List</a></li>
                    </ul>
                </li>



                <li class="submenu">
                    <a href="#"><i class="fas fa-file-medical-alt"></i> <span> Diagnoses</span> <span
                            class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('diagnose_list') }}">Diagnoses List</a></li>
                                <li><a href="{{ route('diagnose_create') }}">Diagnoses Add</a></li>
                            </ul>
                </li>




                <li class="submenu">
                    <a href="#"><i class="fas fa-info-circle"></i>  <span> FAQ</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('faq_list') }}">FAQ List</a></li>
                        <li><a href="{{ route('faq_create') }}">FAQ Add</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('credit_list') }}"><i class="fas fa-file-invoice"></i>  <span> Credit</span> </a>
                </li>


                <li >
                    <a href="{{ route('contact_list') }}"><i class="fas fa-headset"></i> <span> Contact Us</span> </a>

                </li>

                <li class="submenu">
                    <a href="#"><i class="fas fa-user-plus"></i>  <span> Join Us</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('join_list') }}">Join Us List</a></li>
                        <li><a href="{{ route('approve_list') }}">Approve List</a></li>
                        <li><a href="{{ route('reject_list') }}">Reject List</a></li>
                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fas fa-book"></i> <span> Bookings</span> </a>

                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-money-bill-wave"></i> <span> Payments </span> </a>

                </li>



            </ul>
        </div>
    </div>
</div>
