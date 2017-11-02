<!DOCTYPE html>
<html>
<head></head>

<body>


<h1>hello</h1>

<h5> please confirm your mail by clicking this link </h5>
<a href="{{ route('verify','token'=>$token)}}"> confirm :) </a>
 {{--  {{ url('switchinfo/'.$info->prisw.'/'.$info->secsw.'/') }}  --}}
</body>

</html>