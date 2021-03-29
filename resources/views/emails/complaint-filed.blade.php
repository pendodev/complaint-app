@component('mail::message')
# New Complaint Filed

**Date**: {{$complaint->date->toFormattedDateString()}}

**Client Name**: {{$complaint->client_name}}

**Complaint Type**: {{$complaint->type}}

**Complaint Person**: {{$complaint->person}}

**Job Title**: {{$complaint->job_title}}

**Complaint Person Name**: {{$complaint->author}}

**Complaint**: {{$complaint->message}}

**Submitted By**: {{$complaint->submitted_by}}

**Submitted At**: {{$complaint->created_at->toDayDateTimeString()}}
@endcomponent
