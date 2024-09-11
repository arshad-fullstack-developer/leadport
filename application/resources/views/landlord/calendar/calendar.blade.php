@extends('landlord.layout.wrapper') @section('content')
<!-- main content -->
<div class="container-fluid">
    <!-- page content -->
    <div class="row">
        <h1>Calendar Events</h1>
        <div class="col-12">
       <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal">
            Create Event
            </button>

            <!-- The Modal -->
            <div class="modal" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('app-admin/events/create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date & Time:</label>
                        <input type="datetime-local" class="form-control" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date & Time:</label>
                        <input type="datetime-local" class="form-control" name="end_date" required>
                    </div>
                    <button type="submit" class="btn btn-success">Create Event</button>
                    </form>
                </div>
                </div>
            </div>
            </div>

        </div>
        <div class="col-12">
        <div id='calendar'></div>
        </div>
    </div>
</div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    let appUrl = '{{ config('app.url') }}';
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        views: {
            dayGridMonth: {
                buttonText: 'Month'
            },
            timeGridWeek: {
                buttonText: 'Week'
            },
            timeGridDay: {
                buttonText: 'Day'
            }
        },
        events: @json($events),
        eventClick: function(info) {
            if (confirm('Are you sure you want to delete this event?')) {
                fetch(`${appUrl}/app-admin/events/${info.event.id}/delete`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        info.event.remove();
                    } else {
                        alert('Error deleting event: ' + (data.message || 'Unknown error'));
                    }
                });
            }
        }
    });
    calendar.render();
});
</script>

<!--main content -->
@endsection