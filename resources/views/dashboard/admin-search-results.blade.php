@if(isset($admins))
@foreach ($admins as $admin)
<tr>
    <th scope="row">
        <div class="user">
            <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png"  alt="">
            <div class="info">
                <h5>{{ $admin->name }}</h5>
                <p>{{ $admin->email }}</p>
            </div>
        </div>
    </th>
    <td>
        <div class="td">{{ $admin->email }} </div>
    </td>
    <td>
        <div class="td">{{ $admin->phone }} </div>
    </td>

    <td>
        <form action="{{route('dashboard.admins.delete',$admin->id)}}"
            method="post"
            style="display: inline-block">
          @csrf
          @method('delete')
          <button type="submit"
                  class="btn btn-danger btn-sm delete-btn">
              <i class="fa fa-trash"></i></button>
        </form>
              <a href="{{route('dashboard.admins.edit', $admin->id )}}"
                class="btn btn-primary  btn-sm"><i
                     class="fa fa-edit"></i></a>
    </td>
</tr>
@endforeach
@endif