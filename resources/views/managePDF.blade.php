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
        <td>{{$pendingParticipant->user->name}}</td>
        <td>{{$pendingParticipant->user->email}}</td>
        <td><a href="#"> {{$pendingParticipant->created_at}}</a></td>
      </tr>
      @endforeach
    </table>
    @if(count($pendingParticipants) == 0) <p style="text-align: center;"> No pending participant found</p> @endif
    <div>
<<<<<<< HEAD
      <h1 style="text-align: center;">{{$workshopName[0]->name}}</h1>
      <h3 class ="text-align: center;">Workshop participants Managment</h3>
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
          <td>{{$pendingParticipant->user->name}}</td>
          <td>{{$pendingParticipant->user->email}}</td>
          <td><a href="#"> {{$pendingParticipant->created_at}}</a></td>
        </tr>
        @endforeach
      </table>
      @if(count($pendingParticipants) == 0) <p style="text-align: center;"> No pending participant found</p> @endif
      <div>
        {{ $pendingParticipants->links() }}
      </div>
=======
      {{ $pendingParticipants->links() }}
>>>>>>> 0db32f5439fb71e8b1b10c2c093308e70d685c72
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
        <td>{{$approvedParticipant->user->name}}</td>
        <td>{{$approvedParticipant->user->email}}</td>
        <td><a href="#"> {{$approvedParticipant->created_at}}</a></td>
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
        <td>{{$notapprovedParticipant->user->name}}</td>
        <td>{{$notapprovedParticipant->user->email}}</td>
        <td><a href="#"> {{$notapprovedParticipant->created_at}}</a></td>
      </tr>
      @endforeach
    </table>
    @if(count($notapprovedParticipants) == 0) <p style="text-align: center;"> No not approved participant found</p>
    @endif
    <div>
      {{ $notapprovedParticipants->links() }}
    </div>
  </div>

</div>
</div>