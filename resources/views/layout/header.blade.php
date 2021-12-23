<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <p class="mt-2 mb-0"><b>{{ auth()->user()->nama }} | {{ auth()->user()->role }}</b></p>
                </a>
                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{ url('/profil/'.auth()->user()->id_user) }}"><i class="fa fa-user"></i>
                        My Profile</a>
                    <a class="nav-link" data-toggle="modal" data-target="#staticModal" href="#">
                        <i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>

</header>

<!-- Modal -->
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Konfirmasi Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah Anda Ingin Keluar Dari Aplikasi Ini?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
