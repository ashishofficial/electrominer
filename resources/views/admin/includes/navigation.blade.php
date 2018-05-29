<div class="col-md-3 dashboard-left">
            <ul>
            <li><a href="">DASHBOARD</a></li>
            <li class="active"><a href="">MINING</a></li>
            <li><a href="">ORDERS</a></li>
            <li><a href="">BALANCE</a></li>
            <li><a href="">COIN INFOR</a></li>
            <li><a href="">STATISTICS</a></li>
            <li><a href="">SETTIING</a></li>
            <li><a href="">FAQ</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">LOGOUT</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </ul>
        </div>