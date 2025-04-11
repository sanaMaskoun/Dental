@extends('dashboard.master.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif


            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ __('pages.appointments') }} </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">{{ __('pages.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('pages.appointments') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col"></div>
                    <div class="col-auto text-end float-end ms-auto">
                        <a href="{{ route('appointment_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>

            <div class="card p-4 mb-4">
                <div id='calendar'></div>
            </div>


        </div>
    </div>
@endsection
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: '{{ app()->getLocale() }}',
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },

            events: '/appointment/json',
            displayEventTime: true,



            eventContent: function(arg) {
                let timeText = arg.event.start.toLocaleTimeString('en-GB', {
                        hour: '2-digit',
                        minute: '2-digit'
                    }) +
                    ' - ' +
                    arg.event.end.toLocaleTimeString('en-GB', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                return {
                    html: `<b>${arg.event.title}</b><br><small>${timeText}</small>`
                };
            },

            eventClick: function(info) {
                const appointmentId = info.event.id;

                const startLocal = new Date(info.event.start);
                const endLocal = info.event.end ? new Date(info.event.end) : new Date(info.event
                    .start);

                const formatDate = (date) => date.toISOString().split('T')[0];
                const formatTime = (date) => {
                    const hours = String(date.getHours()).padStart(2, '0');
                    const minutes = String(date.getMinutes()).padStart(2, '0');
                    const seconds = String(date.getSeconds()).padStart(2, '0');
                    return `${hours}:${minutes}:${seconds}`;
                };

                Swal.fire({
                    title: '{{ __('pages.edit_appointment') }}',
                    html: `<label>{{ __('pages.date') }}:</label><br>
                        <input type="date" id="newDate" class="swal2-input" value="${formatDate(startLocal)}"><br>
                        <label>{{ __('pages.start_time') }}:</label><br>
                        <input type="time" id="newStartTime" class="swal2-input" value="${formatTime(startLocal)}"><br>
                        <label>{{ __('pages.end_time') }}:</label><br>
                        <input type="time" id="newEndTime" class="swal2-input" value="${formatTime(endLocal)}">`,
                    showCancelButton: true,
                    confirmButtonText: '{{ __('pages.save') }}',
                    cancelButtonText: '{{ __('pages.cancel') }}',
                    showDenyButton: true,
                    denyButtonText: '{{ __('pages.delete') }}',
                    preConfirm: () => {
                        return {
                            date: document.getElementById('newDate').value,
                            start_time: document.getElementById('newStartTime').value,
                            end_time: document.getElementById('newEndTime').value
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/appointment/update/${appointmentId}`, {
                                method: "PUT",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        "content"),
                                    "X-Requested-With": "XMLHttpRequest"
                                },
                                body: JSON.stringify(result.value)
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === "success") {
                                    Swal.fire("{{ __('message.success') }}",
                                        "{{ __('message.edit_appointment') }}",
                                        "success");
                                    calendar.refetchEvents();
                                } else {
                                    Swal.fire("Error", data.message, "error");
                                }
                            })
                            .catch(error => Swal.fire("{{ __('message.error') }}", "{{ __('message.error_edit_appointment') }}",
                                "error"));
                    } else if (result.isDenied) {
                        Swal.fire({
                            title: "{{ __(key: 'pages.are_you_sure') }}",
                            text: "{{ __(key: 'pages.text_add_appointment') }}",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "{{ __(key: 'pages.delete_appointment') }}",
                            cancelButtonText: "{{ __(key: 'pages.cancel') }}"
                        }).then((confirmResult) => {
                            if (confirmResult.isConfirmed) {
                                fetch(`/appointment/delete/${appointmentId}`, {
                                        method: "DELETE",
                                        headers: {
                                            "X-CSRF-TOKEN": document
                                                .querySelector(
                                                    'meta[name="csrf-token"]')
                                                .getAttribute("content"),
                                            "X-Requested-With": "XMLHttpRequest"
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.status === "success") {
                                            Swal.fire("{{ __('pages.delete') }}",
                                                "{{ __(key: 'message.delete_appointment') }}",
                                                "success");
                                            calendar.refetchEvents();
                                        } else {
                                            Swal.fire("Error", data.message,
                                                "{{ __(key: 'message.error') }}");
                                        }
                                    })
                                    .catch(error => Swal.fire("{{ __(key: 'message.error') }}",
                                        "{{ __(key: 'message.error_edit_appointment') }}", "error"));
                            }
                        });
                    }
                });
            }

        });

        calendar.render();
    });
</script>
