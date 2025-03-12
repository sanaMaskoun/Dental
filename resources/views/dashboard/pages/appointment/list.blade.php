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
                        <h3 class="page-title">Appointment </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Appointment</li>
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
            locale: 'en',
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

                Swal.fire({
                    title: 'Edit Appointment',
                    html:
                        `<label>Date:</label><br>
                        <input type="date" id="newDate" class="swal2-input" value="${info.event.start.toISOString().substr(0, 10)}"><br>
                        <label>Start Time:</label><br>
                        <input type="time" id="newStartTime" class="swal2-input" value="${info.event.start.toISOString().substr(11, 8)}"><br>
                        <label>End Time:</label><br>
                        <input type="time" id="newEndTime" class="swal2-input" value="${info.event.end.toISOString().substr(11, 8)}">`,
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    cancelButtonText: 'Cancel',
                    showDenyButton: true, // ✅ زر الحذف
                    denyButtonText: 'Delete',
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
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                                "X-Requested-With": "XMLHttpRequest"
                            },
                            body: JSON.stringify(result.value)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === "success") {
                                Swal.fire("Success", "Appointment updated successfully!", "success");
                                calendar.refetchEvents(); // ✅ تحديث التقويم
                            } else {
                                Swal.fire("Error", data.message, "error");
                            }
                        })
                        .catch(error => Swal.fire("Error", "Something went wrong!", "error"));
                    } else if (result.isDenied) {
                        // ✅ تنفيذ الحذف عند الضغط على "Delete"
                        Swal.fire({
                            title: "Are you sure?",
                            text: "This appointment will be deleted permanently.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Yes, delete it!",
                            cancelButtonText: "Cancel"
                        }).then((confirmResult) => {
                            if (confirmResult.isConfirmed) {
                                fetch(`/appointment/delete/${appointmentId}`, {
                                    method: "DELETE",
                                    headers: {
                                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                                        "X-Requested-With": "XMLHttpRequest"
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.status === "success") {
                                        Swal.fire("Deleted!", "Appointment has been deleted.", "success");
                                        calendar.refetchEvents(); // ✅ تحديث التقويم بعد الحذف
                                    } else {
                                        Swal.fire("Error", data.message, "error");
                                    }
                                })
                                .catch(error => Swal.fire("Error", "Something went wrong!", "error"));
                            }
                        });
                    }
                });
            }
        });

        calendar.render();
    });

</script>
