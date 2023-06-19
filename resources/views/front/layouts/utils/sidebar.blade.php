<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarPanel">
    <div class="offcanvas-body">
        <!-- profile box -->
        <div class="profileBox">
            <div class="image-wrapper">
                <img src="{{__(auth()->user()['detail']['picture'])}}" alt="image"
                     class="imaged rounded">
            </div>
            <div class="in">
                <strong>{{ __(auth()->user()->name )}}</strong>
                <div class="text-muted">
                    <ion-icon name="location"></ion-icon>
                    {{Str::words(auth()->user()['detail']['address'],5)}}
                </div>
            </div>
            <a href="#" class="close-sidebar-button" data-bs-dismiss="offcanvas">
                <ion-icon name="close"></ion-icon>
            </a>
        </div>
        <!-- * profile box -->
        <ul class="listview flush transparent no-line image-listview mt-2">
            <li>
                <a href="#" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Notifications</div>
                        <span class="badge badge-danger">{{\App\Models\Notification::all(['id'])->count() }}</span>
                    </div>
                </a>
            </li>
            <li>
                <a data-bs-toggle="offcanvas" class="item" href="#offcanvas-right">
                    <div class="icon-box bg-primary">
                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                    </div>
                    Right
                </a>
            </li>

        </ul>
    </div>
    <!-- sidebar buttons -->
    <div class="sidebar-buttons ">
        <form action="{{ route("home.logout") }}" method="post" class="ms-2 button">
            @csrf
            <button type="submit" href="" class="btn btn-amazon btn-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                    <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                </svg>
            </button>
        </form>
        <a href="{{ route('home.me.profile', ['tab'=>'profile']) }}" class="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
            </svg>
        </a>
    </div>
    <!-- * sidebar buttons -->
</div>


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-right" style="visibility: hidden;" aria-modal="true"
     role="dialog">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Notifications</h5>
        <a href="#" class="offcanvas-close" data-bs-dismiss="offcanvas">
            <ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
        </a>
    </div>
    <div class="offcanvas-body">
        <div class="section">
            <div class="pt-2 pb-2">
                <!-- comment block -->
                <div class="comment-block">
                    @foreach(\App\Models\Notification::all() as $nf)

                        <div class="item">
                            {{--                        <div class="avatar">--}}
                            {{--                            <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w32 rounded">--}}
                            {{--                        </div>--}}
                            <div class="in">
                                <div class="comment-header">
                                    <h4 class="title">{{$nf['title']}}</h4>
                                    <span class="time">{{$nf['created_at']}}</span>
                                </div>
                                <div class="text">
                                 {{$nf['body']}}
                                </div>
                                {{--                            <div class="comment-footer">--}}
                                {{--                                <a href="#" class="comment-button">--}}
                                {{--                                    <ion-icon name="heart-outline" role="img" class="md hydrated" aria-label="heart outline"></ion-icon>--}}
                                {{--                                    Like (523)--}}
                                {{--                                </a>--}}
                                {{--                                <a href="#" class="comment-button">--}}
                                {{--                                    <ion-icon name="chatbubble-outline" role="img" class="md hydrated" aria-label="chatbubble outline"></ion-icon>--}}
                                {{--                                    Reply--}}
                                {{--                                </a>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    @endforeach


                </div>
                <!-- * comment block -->
            </div>
        </div>
    </div>
</div>


