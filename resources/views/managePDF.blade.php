@php
$date = new DateTime("now", new DateTimeZone('Europe/Tirane') );

@endphp

<div>
    <div>
      <h1>Workshop participants Managment</h1>
    </div>
    <div>
      <p>Pending</p>
      <table>
        <tr>
          <td>User Name</td>
          <td>User Email</td>
          <td>Applied On</td>
        </tr>

        @foreach($pendingParticipants as $pendingParticipant)
        <tr>
          <td>{{$pendingParticipant->name}}</td>
          <td>{{$pendingParticipant->email}}</td>
          <td><a href="#"> {{$pendingParticipant->appliedOn}}</a></td>
        </tr>
        @endforeach
      </table>
      @if(count($pendingParticipants) == 0) <p> No pending participant found</p> @endif
      <div>
        {{ $pendingParticipants->links() }}
      </div>
    </div>

    <div>
      <p>Approved</p>
      <table>
        <tr>
          <td>User Name</td>
          <td>User Email</td>
          <td>Applied On</td>
        </tr>

        @foreach($approvedParticipants as $approvedParticipant)
        <tr>
          <td>{{$approvedParticipant->name}}</td>
          <td>{{$approvedParticipant->email}}</td>
          <td><a href="#"> {{$approvedParticipant->appliedOn}}</a></td>
        </tr>
        @endforeach
      </table>
      @if(count($approvedParticipants) == 0) <p> No approved participant found</p> @endif
      <div>
        {{ $approvedParticipants->links() }}
      </div>
    </div>

    <div>
      <p>Not Approved</p>
      <table>
        <tr>
          <td>User Name</td>
          <td>User Email</td>
          <td>Applied On</td>
        </tr>

        @foreach($notapprovedParticipants as $notapprovedParticipant)
        <tr>
          <td>{{$notapprovedParticipant->name}}</td>
          <td>{{$notapprovedParticipant->email}}</td>
          <td><a href="#"> {{$notapprovedParticipant->appliedOn}}</a></td>
        </tr>
        @endforeach
      </table>
      @if(count($notapprovedParticipants) == 0) <p> No not approved participant found</p> @endif
      <div>
        {{ $notapprovedParticipants->links() }}
      </div>
    </div>

  </div>
</div>
