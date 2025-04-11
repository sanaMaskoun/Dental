<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                @role('admin')
                    <li>
                        <a href="{{ route('admin_dashboard') }}"><i class="feather-grid"></i> <span> {{ __('pages.dashboard') }}</span></a>
                    </li>
                @endrole
                @role('doctor')
                    <li>
                        <a href="{{ route('doctor_dashboard') }}"><i class="feather-grid"></i> <span>  {{ __('pages.dashboard') }}</span></a>
                    </li>
                @endrole

                @role('admin')
                    <li class="submenu">
                        <a href="#"><i class="fas fa-user-md"></i> <span> {{ __('pages.specialization') }}</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('specialization_list') }}">{{ __('pages.specializations_list') }}</a></li>
                            <li><a href="{{ route('specialization_create') }}">{{ __('pages.specializations_add') }}</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fas fa-hand-holding-medical"></i> <span> {{ __('pages.services') }}</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('services_list') }}">{{ __('pages.services_list') }}</a></li>
                            <li><a href="{{ route('service_create') }}">{{ __('pages.service_add') }}</a></li>
                        </ul>
                    </li>


                    <li class="submenu">
                        <a href="#"><i class="fas fa-stethoscope"></i><span> {{ __('pages.doctor') }}</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('doctor_list') }}">{{ __('pages.doctors_list') }}</a></li>
                            <li><a href="{{ route('doctor_create') }}">{{ __('pages.doctor_add') }}</a></li>
                        </ul>
                    </li>
                @endrole

                @role('doctor')
                    <li class="submenu">
                        <a href="#"><i class="fas fa-calendar-check"></i> <span> {{ __('pages.appointment') }}</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('appointment_list') }}">{{ __('pages.appointments_list') }}</a></li>
                            <li><a href="{{ route('appointment_create') }}">{{ __('pages.appointment_add') }}</a></li>
                        </ul>
                    </li>
                @endrole

                <li class="submenu">
                    <a href="#"><i class="fas fa-user-injured"></i> <span> {{ __('pages.patient') }}</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('patient_list') }}">{{ __('pages.patients_list') }}</a></li>
                    </ul>
                </li>



                <li class="submenu">
                    <a href="#"><i class="fas fa-file-medical-alt"></i> <span> {{ __('pages.diagnose') }}</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('diagnose_list') }}"> {{ __('pages.diagnoses_list') }}</a></li>
                        @role('doctor')
                            <li><a href="{{ route('diagnose_create') }}"> {{ __('pages.diagnose_add') }}</a></li>
                        @endrole
                    </ul>
                </li>


                @role('admin')
                    <li class="submenu">
                        <a href="#"><i class="fas fa-info-circle"></i> <span> {{ __('pages.faq') }}</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('faq_list') }}">{{ __('pages.faq_list') }}</a></li>
                            <li><a href="{{ route('faq_create') }}">{{ __('pages.faq_add') }}</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('credit_list') }}"><i class="fas fa-file-invoice"></i> <span> {{ __('pages.credit') }}</span> </a>
                    </li>


                    <li>
                        <a href="{{ route('contact_list') }}"><i class="fas fa-headset"></i> <span> {{ __('pages.contact_us') }}</span> </a>

                    </li>

                    <li class="submenu">
                        <a href="#"><i class="fas fa-user-plus"></i> <span> {{ __('pages.join_us') }}</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('join_list') }}">{{ __('pages.join_us_list') }}</a></li>
                            <li><a href="{{ route('approve_list') }}">{{ __('pages.approve_list') }}</a></li>
                            <li><a href="{{ route('reject_list') }}">{{ __('pages.reject_list') }}</a></li>
                        </ul>
                    </li>
                @endrole

                <li>
                    <a href="{{ route('booking_list') }}"><i class="fas fa-book"></i> <span> {{ __('pages.bookings') }}</span> </a>

                </li>
                <li>
                    <a href="{{ route('payments_list') }}"><i class="fas fa-money-bill-wave"></i> <span> {{ __('pages.payments') }} </span> </a>

                </li>



            </ul>
        </div>
    </div>
</div>
