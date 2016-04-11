@extends('layouts.app')

@section('content')
    <script type="text/javascript">
        function navigate(url)
        {
            document.location.href = url;
        }
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 style="margin-top: 10px">{{$member->name}}</h2>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <img src={{url($member->photo)}} style="width: 100%" />
                        </div>
                        <div class="col-md-8">
                            <div>
                                <h3>Email</h3>
                                <p>{{$member->email}}</p>
                            </div>
                            <div>
                                <h3>Created at</h3>
                                <p>{{$member->created_at}}</p>
                            </div>
                            @if(count($projects) > 0)
                            <div>
                                <h3>Project created</h3>
                                <table class="table">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Register date</th>
                                        @if(!empty($currentUser))
                                            <th>Edit</th>
                                        @endif
                                    </tr>
                                    @foreach ($projects as $project)
                                        <tr onclick="navigate('{{url("projects/".$project->id)}}')" style="cursor : pointer">
                                            <td text-align="center" style="padding : 3px"><img src={{url($project->photo)}} height="40px" /></td>
                                            <td><p>{{ $project->name }}</p></td>
                                            <td><p>{{ $project->description }}</p></td>
                                            <td><p>{{ $project->created_at }}</p></td>
                                            @if(!empty($currentUser))
                                                @if($users[$project->id][0]->id == $currentUser->id)
                                                    <td>
                                                        <a href={{url("projects/edit/".$project->id)}} class="btn btn-primary" >
                                                        <i class="fa fa-btn fa-gear"></i>Edit
                                                        </a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="" class="btn btn-primary" disabled=true>
                                                            <i class="fa fa-btn fa-gear"></i>Not Available
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
