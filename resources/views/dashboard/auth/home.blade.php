<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:#006699;">

    <table width="800" border="1" bgcolor="white" cellpadding="4" cellspacing="0">
        <tr>
            <td height="167" colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td height="30" colspan="2" align="right"> Hallo : {{$username}} ID Kop = {{$id}}</td>
        </tr>
        <tr>
            <td width="178" height="518" valign="top">
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
            </td>
            <td width="612"><?php use Illuminate\Support\Facades\Session; $data = Session::get('id'); echo $data; ?></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
    </table>
</body>
</html>