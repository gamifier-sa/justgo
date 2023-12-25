@if (isset($users))
    @foreach ($users as $user)
        <tr>
            <th scope="row">
                <div class="user">
                    @if (!$user->profile_image)
                        <img src="{{ asset('dashboard/') }}/assets/images/tableUser.png" alt="">
                    @else
                        <img src="{{ getImage('Users', $user->profile_image) }}" alt=""
                            style="width: 50px;height:50px" />
                    @endif

                    <div class="info">
                        <h5>{{ $user->name }}</h5>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
            </th>
            <td>
                <div class="td">{{ $user->subscription()->count() }} مرات</div>
            </td>
            <td>{{ isset($user->subscription) ? $user->subscription->package->name : '-' }}
            </td>
            <td>
                <div class="tdProgress">


                    @if ($user->subscription()->count() > 0 && $user->subscription->package)
                        <div class="progressStatus">
                            {{ $user->subscription->package->visits_no - $user->subscription()->count() }}
                            <img src="{{ asset('dashboard/') }}/assets/icons/arrowUp.svg" alt="" />
                        </div>
                    @else
                        <div class="progressStatus">
                            0
                            <img src="{{ asset('dashboard/') }}/assets/icons/arrowUp.svg" alt="" />
                        </div>
                    @endif
                    @if ($user->subscription && $user->subscription->package)
                        @php
                            $remainingVisits = $user->subscription->package->visits_no - $user->subscription()->count();
                            $percentage = ($remainingVisits / $user->subscription->package->visits_no) * 100;
                        @endphp

                        <span>{{ $percentage }}%</span>

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%"
                                aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    @else
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width:0%" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    @endif

                </div>
            </td>

            <td>
                <div class="subscribeStatus">مشترك جديد</div>
            </td>

            <td>
                <form action="{{ route('dashboard.users.delete', $user->id) }}" method="post"
                    style="display: inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                        <i class="fa fa-trash"></i></button>
                </form>
                <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-primary  btn-sm"><i
                        class="fa fa-edit"></i></a>
            </td>
        </tr>
    @endforeach
@endif
