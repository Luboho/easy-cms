@extends('layouts.app')

@section('title', 'Registrovaní užívatelia')


@section('content')



<div class="container">
    
    @include('inc.messages')
    
        @if (Session::has('message'))
    
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        
        @endif
            
            <table class="col-12 border border-black pt-3 align-items-center nowrap ml-2 card-body">
                <p class="col-12 card-header align-items-center nowrap ml-2">Registrovaní Užívatelia</p>
                        <tr class="border border-secondary">
                            <th class="p-2 border border-secondary"><strong>Meno</strong></th>
                            <th class="p-2 border border-secondary"><strong>Email</strong></th>
                            <th class="p-2 border border-secondary"><strong>Profil</strong></th>
                            <th class="p-2 border border-secondary"><strong>Registrovaný</strong></th>
                            <th class="p-2">
                                @can('isHeadAdmin')
                                    <div class="d-flex justify-content-center">
                                            <a href="{{ route('invitation.create') }}" class="create-user-icon" type="submit" title="Nový Užívateľ"><i class="p-1 fa fa-user-plus"></i></a>
                                    </div>
                                @endcan
                            </th>
                        </tr>
                    @foreach($users as $user)
                        <tr class="border border-secondary">
                            <td class="p-2 border border-secondary">{{ $user->username }}</td>
                            <td class="p-2 border border-secondary">{{ $user->email }}</td>
                            <td class="p-2 border border-secondary">{{ $user->role }}</td>
                            <td class="p-2 border border-secondary">{{ $user->created_at->format('d.m Y') }}</td>
                            <td class="p-2 border border-secondary">
                                @can('delete', $user)
                                    <form action="/profiles/{{ $user->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        
                                        @if($user->role == 'head_admin')
                                            @can('isHeadAdmin')
                                                <div class="d-flex justify-content-center">
                                                    @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}">
                                                            <i class="fa fa-edit edit-icon"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            @endcan
                                        @endif

                                        @if($user->role == 'admin' )
                                            <div class="">
                                                {{-- @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        <i class="fa fa-edit edit-icon"></i>
                                                    </a>
                                                @endif --}}
                                                <div class="d-flex justify-content-center"><button type="submit" style="background:none;" title="Zmazať príspevok"><i id="trash-confirm" class="fa fa-trash delete-icon"></i></button></div>
                                            </div>
                                        @endif
                                        
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                </table>
        </div>
@endsection