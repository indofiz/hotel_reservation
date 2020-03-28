<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/daterangepicker.css"); ?>" />
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	
	.inactiveroom,.activeroom,.spann,.spann2 {
		padding: 20px;
		margin: 5px;
		text-align: center;
		font-weight: 700;
		color:#fff;
	}
	.inactiveroom {
		background: #4aada8;
	}
	.activeroom {
		background: #cc333f;
	}
	.spann {
		background: #dedede;
	}
	.inactiveroom:hover {
		background: #288b86;
		cursor: default; 
	}
	.spann2 {
		background: #594f4f;
		margin: 0;	
	}

	</style>
</head>
<body>

<div class="container">
	<h1>Dashboard</h1>
	
	<div id="body">
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="myModalLabel">Booking Room <span>217</span></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
			        <input type="text" name="daterange" value="01/01/2020 - 01/02/2020" placeholder="01/01/2020 - 01/02/2020" class="form-control" />
		        </div>
				<div class="dropdown">
				  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Dropdown link
				  </a>

				  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				    <a class="dropdown-item" href="#">Action</a>
				    <a class="dropdown-item" href="#">Another action</a>
				    <a class="dropdown-item" href="#">Something else here</a>
				  </div>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="row pb-3">


		</div>
		<table width="100%">
		  <tr>
		    <td class="activeroom">218</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="217">217</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="215">215</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="213">213</td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann2" colspan="2" rowspan="6"></td>
		    <td class="spann"></td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="210">210</td>
		    <td class="activeroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="209">209</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="207">207</td>
		    <td class="activeroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="205">205</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="203">203</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="201">201</td>
		  </tr>
		  <tr>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="219">219</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="216">216<br></td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="214">214</td>
		    <td class="activeroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="212">212</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="211">211</td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="208">208</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="206">206</td>
		    <td class="activeroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="204">204</td>
		    <td class="activeroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="202">202</td>
		  </tr>
		  <tr>
		    <td class="spann2" colspan="6" rowspan="2"> &nbsp; </td>
		    <td class="spann2" colspan="7" rowspan="2"> &nbsp; </td>
		  </tr>
		  <tr>
		  </tr>
		  <tr>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="activeroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="227">227</td>
		    <td class="activeroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="226">226</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="225">225</td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		  </tr>
		  <tr>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="spann"></td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="224">224</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="223">223</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="222">222</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="221">221</td>
		    <td class="inactiveroom" data-toggle="modal" data-target="#myModal" onclick="get_room(this.id)" id="220">220</td>
		    <td class="spann"></td>
		  </tr>
		</table>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.4.1.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/moment.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/daterangepicker.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/hotel.js"); ?>"></script>

</body>
</html>