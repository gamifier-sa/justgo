@foreach ($contacts as $contact)
<tr>
    <th scope="row">
        <div class="user">
            <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png"
                alt="" />
            <div class="info">
                <h5>{{ $contact->user->name }} </h5>
                <p>{{ $contact->user->email }}</p>
            </div>
        </div>
    </th>
    <td>{{ $contact->created_at->format('d/m/Y') }}</td>
    <td>جده</td>
    <td>
        <div class="textofComplaintStatus">{{ $contact->message }} </div>
    </td>
    <td>
        <div class="inquireStatus {{ contactUsStatus($contact->status) }}">تم الحل</div>
    </td>
</tr>
@endforeach
