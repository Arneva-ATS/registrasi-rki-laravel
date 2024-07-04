@if($username == 'inkop')
    <ul>
        <li>INKOP</li>
        <li>PUSKOP</li>
        <li>PRIMKOP</li>
    </ul>
    @elseif($username == 'puskop')
    <ul>
        <li>PUSKOP</li>
        <li>PRIMKOP</li>
    </ul>
    @elseif($username == 'primkop')
    <ul>
        <li>ANGGOTA</li>
    </ul>
    @else
    <ul>
        <li><a href="/logout">LOGOUT</a></li>
    </ul>
@endif