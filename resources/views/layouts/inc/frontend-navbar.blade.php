<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('assets/images/logo.png')}}" style="height: 65px; width: 70px" alt="logo"/>
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Advertise Here</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-blue">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
                <div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Головна</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/add-question') }}">Задати питання</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/questions') }}">Мої питання</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/search-question') }}">Пошук питань</a>
                        </li>
                    </ul>
                </div>
                <div class="ms-auto ">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @if(Auth::check())
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post" class="nav-link">
                                    @csrf
                                    <button type="submit" class="clear-button nav-link">Вийти</button>
                                </form>
                                <style>
                                    .clear-button {
                                        background: none;
                                        color: inherit;
                                        border: none;
                                        padding: 0;
                                        font: inherit;
                                        cursor: pointer;
                                        outline: inherit;
                                    }
                                </style>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Увійти</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Зареєструватися</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

