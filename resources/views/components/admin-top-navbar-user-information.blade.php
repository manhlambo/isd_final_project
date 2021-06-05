<li class="nav-item dropdown ">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
        @if(Auth::check())
            {{auth()->user()->name}}
            @else
             Khách 
        @endif
    </span>
    <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

    @if(Auth::check())
    <a class="dropdown-item" href="{{route('user.profile.show', auth()->user()->id)}}">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Hồ Sơ
    </a>
    @endif

    @if(Auth::check())
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Đăng xuất
    </a>
    </div>
    @endif

</li>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đăng xuất</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn đã sẵn sàng kết thúc phiên hiện tại của mình. </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
        <form action="/logout" method='post'>
            @csrf
            <button class='btn btn-danger'>Đăng Xuất</button>
        </form>
    </div>
    </div>
</div>
</div>