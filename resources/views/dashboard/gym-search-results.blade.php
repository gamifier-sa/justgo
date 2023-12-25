@foreach ($gyms as $gym)
    <tr>
        <th scope="row">
            <div class="user">
                @if (!isset($gym->logo))
                    <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png" alt="" />
                @else
                    <img src="{{ getImage('Gyms', $gym->logo) }}" alt="" />
                @endif
                <div class="info">
                    <h5>{{ $gym->name }}</h5>
                    <p>{{ $gym->email }}</p>
                </div>
            </div>
        </th>

        <td>{{ $gym->client_count }} عميل</td>
        <td>{{ $gym->city->name }}</td>
        <td>

            <div class="tdProgress">
                <div class="progressStatus">{{ $gym->visit_percentage }}%<img
                        src="{{ asset('dashboard/') }}/assets/icons/arrowUp.svg" alt="" /></div>
                <span>{{ $gym->visit_percentage }}%</span>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </td>
        <td>
            @if ($gym->admin_active == 'active')
                <button class="btn btn-success update-gym-admin-active-btn"
                    onclick="updateAdminActive({{ $gym->id }}, 'notactive')">مفعل</button>
            @else
                <button class="btn btn-danger update-gym-admin-active-btn"
                    onclick="updateAdminActive({{ $gym->id }}, 'active')">غير مفعل </button>
            @endif

        </td>
        <td>
            <form action="{{ route('dashboard.gyms.delete', $gym->id) }}" method="post" style="display: inline-block">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                    <i class="fa fa-trash"></i></button>
            </form>

            <a href="{{ route('dashboard.gyms.edit', $gym->id) }}" class="btn btn-primary  btn-sm"><i
                    class="fa fa-edit"></i></a>
        </td>
    </tr>
@endforeach
