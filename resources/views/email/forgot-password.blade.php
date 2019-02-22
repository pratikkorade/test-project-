<?php
	$baseUrl = config('app.url');
?>

<td width="36"></td>
		<td width="528" align="left" style="border-collapse:collapse; color:#444444; font-size:11pt;" valign="top">
			<span style="font-size:18px;">Hello {{ $name }},</span>
			<br /><br />
			We have received your Password Reset request. If you did not request a password reset, please ignore this email.
			<br /><br />
			<center>
				<a style="background-color: #55c353; border: 1px #55c353 solid; border-radius: 26px;
         color: white; display: block; font-size: 15px; margin: 6px auto; max-width: 200px; padding: 10px 4px; text-align: center;
          text-decoration: none; width: 200px;" href="{{$baseUrl}}forgot-password/{{ $id }}/{{ $password_reset_code }}" target="_blank">Reset Password</a>
			</center>
