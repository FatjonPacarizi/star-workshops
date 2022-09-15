@php
$date = new DateTime("now", new DateTimeZone('Europe/Tirane') );

@endphp

<div>
    <div>
      <h1 style="text-align: center;">Workshop participants Managment</h1>
    </div>
    <div>
      <p style="font-family: Arial, Helvetica, sans-serif; color:orange;">Pending</p>
      <table style="font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%;">
        <tr style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: gray;">
          <td>User Name</td>
          <td>User Email</td>
          <td>Applied On</td>
        </tr>

        @foreach($pendingParticipants as $pendingParticipant)
        <tr style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
          <td>{{$pendingParticipant->name}}</td>
          <td>{{$pendingParticipant->email}}</td>
          <td><a href="#"> {{$pendingParticipant->appliedOn}}</a></td>
        </tr>
        @endforeach
      </table>
      @if(count($pendingParticipants) == 0) <p style="text-align: center;"> No pending participant found</p> @endif
      <div>
        {{ $pendingParticipants->links() }}
      </div>
    </div>

    <div>
      <br>
    <p style="font-family: Arial, Helvetica, sans-serif; color:green;">Approved</p>
      <table style="font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%;">
      <tr style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: gray;">
          <td>User Name</td>
          <td>User Email</td>
          <td>Applied On</td>
        </tr>

        @foreach($approvedParticipants as $approvedParticipant)
        <tr style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
          <td>{{$approvedParticipant->name}}</td>
          <td>{{$approvedParticipant->email}}</td>
          <td><a href="#"> {{$approvedParticipant->appliedOn}}</a></td>
        </tr>
        @endforeach
      </table>
      @if(count($approvedParticipants) == 0) <p style="text-align: center;"> No approved participant found</p> @endif
      <div>
        {{ $approvedParticipants->links() }}
      </div>
    </div>

    <div>
      <br>
    <p style="font-family: Arial, Helvetica, sans-serif; color:red;">Not Approved</p>
      <table style="font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%;">
      <tr style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: gray;">
          <td>User Name</td>
          <td>User Email</td>
          <td>Applied On</td>
        </tr>

        @foreach($notapprovedParticipants as $notapprovedParticipant)
        <tr style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
          <td>{{$notapprovedParticipant->name}}</td>
          <td>{{$notapprovedParticipant->email}}</td>
          <td><a href="#"> {{$notapprovedParticipant->appliedOn}}</a></td>
        </tr>
        @endforeach
      </table>
      @if(count($notapprovedParticipants) == 0) <p style="text-align: center;"> No not approved participant found</p> @endif
      <div>
        {{ $notapprovedParticipants->links() }}
      </div>
    </div>

  </div>
</div>
