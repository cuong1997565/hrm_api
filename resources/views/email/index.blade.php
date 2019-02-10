<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>A Simple Responsive HTML Email</title>
	<style type="text/css">
	body {margin: 0; padding: 0; min-width: 100%!important;}
	.content {width: 100%; max-width: 600px;}
	.header {padding: 15px 30px 20px 30px;}
	.col425 {width: 425px!important;}
	.subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
	.h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
	.h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
	.innerpadding {padding: 30px 30px 10px 30px;}
	.innerpadding2 {padding-top: 0px; padding-bottom: 10px; padding-left: 30px; padding-right: 30px;}
	.borderbottom {border-bottom: 1px solid #f2eeed;}
	.h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
	.button {text-align: center; font-size: 15px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
	.button a {color: #ffffff; text-decoration: none;}
	.bodycopy {font-size: 16px; line-height: 22px;}
	img {height: auto;}
</style>
<style type="text/css">
@media only screen and (min-device-width: 601px) {
	.content {width: 600px !important;}
	@media only screen and (min-device-width: 601px) {
		.content {width: 600px !important;}
		.col425 {width: 425px!important;}
		.col380 {width: 310px!important;}
	}
}
</style>
</head>
<body yahoo bgcolor="#f6f8f1">
	<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
                	<!--[if (gte mso 9)|(IE)]>
					<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
					    <tr>
					        <td>
					        <![endif]-->
					        <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#f7f4f4">
					        	<tr>
					        		<td class="header" bgcolor="#222">
                            	<!--[if mso]>
								   </td><td>
								   <![endif]-->

								<!--[if (gte mso 9)|(IE)]>
								<table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
								    <tr>
								        <td>
								        <![endif]-->
								        <table class="col425" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">
								        	<tr>
								        		<td height="70">
								        			<table width="100%" border="0" cellspacing="0" cellpadding="0">
								        				<tr>
								        					<td class="subhead" align="center">
								        						<img src="http://nguyenhats.com/images/logo.png" width="115" height="115" border="0" alt="" />
								        					</td>
								        				</tr>
								        				<tr>
								        					<td class="h1" style="padding: 5px 0 0 0;color: #fff" align="center">
								        						Kế hoạch tuyển dụng
								        					</td>
								        				</tr>
								        			</table>
								        		</td>
								        	</tr>
								        </table>
								        <!--[if (gte mso 9)|(IE)]>
								        </td>
								    </tr>
								</table>
							<![endif]-->
						</td>
					</tr>
					<tr>
						<td class="innerpadding borderbottom">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="h2">
										Chào sếp!
									</td>
								</tr>
								<tr>
									<td class="bodycopy">
										Công ty có một kế hoạch tuyển dụng nhân sự mới cần duyệt.
										<br>Chi tiết như sau:
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="innerpadding2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="bodycopy" style="text-align: center; text-transform: uppercase; font-weight: 900; ">
										{{$plan->title}}
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="innerpadding2">
							<table width="20%" align="left" border="0" cellpadding="0" cellspacing="0">  
								<tr>
									<td>
										<strong>Thời gian:</strong>
									</td>
								</tr>
							</table>
						    <!--[if (gte mso 9)|(IE)]>
						      	<table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
						        	<tr>
							          	<td>
							          	<![endif]-->
							          	<table width="80%" align="left" border="0" cellpadding="0" cellspacing="0">  
							          		<tr>
							          			<td>
							          				<table width="100%" border="0" cellspacing="0" cellpadding="0">
							          					<tr>
							          						<td class="bodycopy">
							          							Từ {{date("d/m/Y", strtotime($plan->date_start))}} đến {{date("d/m/Y", strtotime($plan->date_end))}}
							          						</td>
							          					</tr>
							          				</table>
							          			</td>
							          		</tr>
							          	</table>
						    <!--[if (gte mso 9)|(IE)]>
						          		</td>
						        	</tr>
						    	</table>
						    <![endif]-->
						</td>
					</tr>

					<tr>
						<td class="innerpadding2">
							<table width="20%" align="left" border="0" cellpadding="0" cellspacing="0">  
								<tr>
									<td>
										<strong>Số lượng:</strong>
									</td>
								</tr>
							</table>
						    <!--[if (gte mso 9)|(IE)]>
						      	<table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
						        	<tr>
							          	<td>
							          	<![endif]-->
							          	<table width="80%" align="left" border="0" cellpadding="0" cellspacing="0">  
							          		<tr>
							          			<td>
							          				<table width="100%" border="0" cellspacing="0" cellpadding="0">
							          					@if(count($plan->details)) @foreach($plan->details as $detail)
							          					<tr>
							          						<td class="bodycopy">
							          							{{$detail->department->name}} - {{$detail->position->name}} - {{$detail->quantity}} người
							          						</td>
							          					</tr>
							          					@endforeach
							          					@endif
							          				</table>
							          			</td>
							          		</tr>
							          	</table>
						    <!--[if (gte mso 9)|(IE)]>
						          		</td>
						        	</tr>
						    	</table>
						    <![endif]-->
						</td>
					</tr>
					
					<tr>
						<td class="innerpadding2">
							<table width="115" align="left" border="0" cellpadding="0" cellspacing="0">  
								<tr>
									<td>
										<strong>Nội dung:</strong>
									</td>
								</tr>
							</table>
						    <!--[if (gte mso 9)|(IE)]>
						      	<table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
						        	<tr>
							          	<td>
							          	<![endif]-->
							          	<!-- <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 310px;">  
							          		<tr>
							          			<td>
							          				<table width="100%" border="0" cellspacing="0" cellpadding="0">
							          					<tr>
							          						<td class="bodycopy">
							          							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							          							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							          							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							          							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							          							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							          							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							          						</td>
							          					</tr>
							          				</table>
							          			</td>
							          		</tr>
							          	</table> -->
						    <!--[if (gte mso 9)|(IE)]>
						          		</td>
						        	</tr>
						    	</table>
						    <![endif]-->
						</td>
					</tr>

					<tr>
						<td class="innerpadding2 borderbottom">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="bodycopy" style="text-align: justify;">
										{{$plan->content}}
									</td>
								</tr>
							</table>
						</td>
					</tr>

					
					<tr>
						<td class="innerpadding2">
							<table width="115" align="left" border="0" cellpadding="0" cellspacing="0">  
								<tr>
									<td>
										<strong>&nbsp;</strong>
									</td>
								</tr>
							</table>
						    <!--[if (gte mso 9)|(IE)]>
						      <table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
						        <tr>
						          <td>
						          <![endif]-->
						          <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 380px;">  
						          	<tr>
						          		<td>
						          			<table width="115" align="left" border="0" cellpadding="0" cellspacing="0">  
						          				<tr>
						          					<td>
						          						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						          							<tr>
						          								<td style="padding: 20px 0 0 0;">
						          									<table class="buttonwrapper" bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0">
						          										<tr>
						          											<th class="button" height="45">
						          												<a href="#">Duyệt</a>
						          											</th>
						          										</tr>
						          									</table>
						          								</td>
						          							</tr>
						          						</table>
						          					</td>
						          				</tr>
						          			</table>
						          			<table width="160" align="left" border="0" cellpadding="0" cellspacing="0">  
						          				<tr>
						          					<td>
						          						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						          							<tr>
						          								<td style="padding: 20px 0 0 0;">
						          									<table class="buttonwrapper" bgcolor="#a29d9b" border="0" cellspacing="0" cellpadding="0">
						          										<tr>
						          											<th class="button" height="45">
						          												<a href="#">Không duyệt</a>
						          											</th>
						          										</tr>
						          									</table>
						          								</td>
						          							</tr>
						          						</table>
						          					</td>
						          				</tr>
						          			</table>
						          		</td>
						          	</tr>
						          </table>
						    <!--[if (gte mso 9)|(IE)]>
						          </td>
						        </tr>
						    </table>
						<![endif]-->
					</td>
				</tr>
			</table>
                    <!--[if (gte mso 9)|(IE)]>
					        </td>
					    </tr>
					</table>
				<![endif]-->
			</td>
		</tr>
	</table>
</body>
</html>