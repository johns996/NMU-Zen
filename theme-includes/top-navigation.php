<?php
//nmu-zen
$aResults = array();
$theRequire = '/htdocs/cmsphp/Admin/Includes/FunctionsCommon.php';
if (is_file($theRequire)) {
  try{
  require_once($theRequire);
  $classSqlQuery = new SqlDataQueries();
	$strQuery = "SELECT dept, display FROM www_adit.department_pulldown";
	$aResults = $classSqlQuery->MySQL_Queries($strQuery);
	}
	catch (Exception $e) {
		printR('Caught exception: ',  $e->getMessage(), "\n");
	}
}
?>

<nav class="navbar yamm navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid" id="top-nav-container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle navbar-menu" id="top-nav-toggle" data-toggle="collapse" data-target="#top-navigation-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
			<button type="button" class="navbar-toggle navbar-search" id="search-nav-toggle" data-toggle="collapse" data-target="#search-collapse-div">
				<span class="glyphicon glyphicon-search"></span>
			</button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="top-navigation-collapse">
      <ul class="nav navbar-nav nmu-audience-nav" id="audience-navigation">
	      <li class="toolbar-main-nav"><a class="allcaps" href="/about">About</a></li>
	      <li class="toolbar-main-nav"><a class="allcaps" href="/admissions/applyto">Enroll</a></li>
	      <li class="toolbar-main-nav"><a class="allcaps" href="/academics">Academics</a></li>
	      <li class="toolbar-main-nav"><a class="allcaps" href="/sports">Sports</a></li>
	      <li class="toolbar-main-nav"><a class="allcaps" href="/admissions/life">Campus Life</a></li>
	      <li class="toolbar-home"><a href="/"><span class="glyphicon glyphicon-home" title="NMU Homepage"></span></a></li>
        <li><a class="allcaps" href="/admissions">Future Students</a></li>
        <li><a class="allcaps" href="/students">Current Students</a></li>
      	<li><a class="allcaps" href="/facultystaff">Faculty & Staff</a></li>
        <li><a class="allcaps audience-single-word-nav" href="/friends">Alumni</a></li>
        <li><a class="allcaps audience-single-word-nav" href="/admissions/visit">Visitors</a></li>
      </ul>

 			<ul class="nav navbar-nav navbar-right nmu-toolbar-nav">
        <li><a href="https://mynmu.nmu.edu/">MyNMU</a></li>
        <li><a class="allcaps" href="/calendar">Events</a></li>
        <li><a class="allcaps" href="/apply">Apply</a></li>
        <li><a class="allcaps" href="/atozsearch">A-Z</a></li>
        <li><a class="allcaps" href="https://payment.nmu.edu/alumni/foundation_cc.php">Give</a></li>
        <li class="toolbar-search dropdown yamm-fw"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="search-icon"><span class="glyphicon glyphicon-search" title="Search NMU"></span></a>
					<ul class="dropdown-menu dropdown-search yamm-content" role="menu">
						<li class="dropdown-menu-width-wrapper" id="search-dropdown">
							<!-- js to add search dropdown stuff here -->
						</li>
          </ul>
        </li>
      </ul>

    </div><!-- /#top-navigation-collapse -->

		<div class="collapse navbar-collapse" id="search-collapse-div">
			<form name="searchform" action="/searchquery" method="get" id="searchform">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-1 search-options-container">
						<div class="allcaps search-label">Search Options:</div>
						<div class="row">
							<input type="hidden" value="20" name="datasource" />
							<div class="col-sm-6 search-options">
								<ul class="list-unstyled" role="menu">
									<li><label><input type="radio" id="search-az" class="search-radio" name="search-option" value="az" />A-Z Index</label></li>
									<li><label><input type="radio" id="search-keyword" class="search-radio" name="search-option" value="keyword" checked />Keyword Search</label></li>
									<li><label><input type="radio" id="search-calendar" class="search-radio" name="search-option" value="calendar" />Master Calendar</label></li>
								</ul>
							</div>
							<div class="col-sm-6 search-options search-options-second">
								<ul class="list-unstyled" role="menu">
									<li><label><input type="radio" id="search-directory" class="search-radio" name="search-option" value="directory" />Department Directory</label></li>
									<li><label><input type="radio" id="search-people" class="search-radio" name="search-option" value="people" />NMU People Search</label></li>
								</ul>
							</div>
						</div><!-- /.row -->
						</div>
						<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-1 search-inputs">
							<div class="input-group" id="general-search">
								<input type="text" id="search-query" class="form-control search-txt-box" name="query" placeholder="SEARCH NMU">
								<input type="hidden" name="return" value="yes">
								<select name="searchname" id="search-department" class="form-control search-txt-box" style="display:none;">
									<?php
										if(count($aResults) > 0)
										{
											foreach($aResults as $aRow)
												if($aRow['dept'] != '')
													print'<option value="'.$aRow['dept'].'">'.$aRow['display'].'</option>'."\n";
										}
										else
											echo '<option value="">An error has occurred.  Please notify edesign@nmu.edu if this error persists.</option>';
									?>
								</select>
								<span class="input-group-btn">
									<input type="submit" class="allcaps search-submit-button btn btn-default" name="submit" value="Submit" />
								</span>
							</div>
						</div>
				</div><!-- /.row -->
			</form>
		</div><!-- /#search-collapse-div -->

  </div><!-- /.container-fluid -->
</nav>