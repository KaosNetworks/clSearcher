<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>The Craigslist Job Searcher</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Branden Martin">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse"
						data-target=".nav-collapse"> <span class="icon-bar"></span> <span
						class="icon-bar"></span> <span class="icon-bar"></span>
					</a> <a class="brand" href="#">The Craigslist Job Searcher</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li><a href="http://brandenmartin.com/" target="_blank">Meet The
								Developer</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="span4" id="searchPane" data-spy="affix">
				<div class="well row-fluid">
					<div id="searchSpecs" class="span12">
						<span>SEARCH SPECIFICATIONS</span>
					</div>
					<hr>
					<div class="row-fluid"
						style="padding-bottom: 10px; text-align: center;">
						<div class="span12 searchElement">Common Date Ranges</div>
						<div class="span12">
							<button class="btn" id="dateToday">Today</button>
							<button class="btn" id="dateYesterday">Yesterday</button>
							<button class="btn" id="datePastWeek">Past Week</button>
							<button class="btn" id="datePastMonth">Past Month</button>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12 searchElement">Start Date</div>
						<div class="span12">
							<select id="startMonth" class="span10" style="float: left;">
								<option value="">Select Month</option>
								<option value="Jan">January</option>
								<option value="Feb">February</option>
								<option value="Mar">March</option>
								<option value="Apr">April</option>
								<option value="May">May</option>
								<option value="Jun">June</option>
								<option value="Jul">July</option>
								<option value="Aug">August</option>
								<option value="Sep">September</option>
								<option value="Oct">October</option>
								<option value="Nov">November</option>
								<option value="Dec">December</option>
							</select>
							<input type="text" placeholder="Day" id="startDay" class="span2" style="float: right;">
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12 searchElement">End Date</div>
						<div class="span12">
							<select id="endMonth" class="span10" style="float: left;">
								<option value="">Select Month</option>
								<option value="Jan">January</option>
								<option value="Feb">February</option>
								<option value="Mar">March</option>
								<option value="Apr">April</option>
								<option value="May">May</option>
								<option value="Jun">June</option>
								<option value="Jul">July</option>
								<option value="Aug">August</option>
								<option value="Sep">September</option>
								<option value="Oct">October</option>
								<option value="Nov">November</option>
								<option value="Dec">December</option>
							</select>
							<input type="text" placeholder="Day" id="endDay"
								class="span2" style="float: right;">
						</div>
					</div>
					<hr>
					<div class="row-fluid">
						<div class="span12 searchElement">Options</div>
						<div class="span12">
							<label class="checkbox"><input type="checkbox" name="addOne" value="telecommuting" checked> Telecommute</label> <label
								class="checkbox"><input type="checkbox" name="addTwo"
								value="contract"> Contract</label> <label class="checkbox"><input
								type="checkbox" name=addThree " value="Internship"> Internship</label>
							<label class="checkbox"><input type="checkbox" name="addFour"
								value="part-time"> Part Time</label> <label class="checkbox"><input
								type="checkbox" name="addFive" value="non-profit"> Non-Profit</label>
						</div>
					</div>
					<hr>
					<div class="row-fluid">
						<div class="span12 searchElement">Keywords</div>
						<div class="span12">
							<input type="text" id="search" placeholder="Search Phrase"
								class="span12">
						</div>
					</div>
					<hr>
					<div class="row-fluid">
						<div class="span12" style="text-align: right;">
							<button id="go" class="btn btn-primary">Go!</button>
						</div>
					</div>
				</div>
				
			</div>
			<div class="row-fluid">
				<div class="offset3 span9" id="results">
				
				</div>
			</div>
		</div>
		<script src="js/jquery.js"></script>
		<script src="js/jquery-json.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>