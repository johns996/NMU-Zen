<?php
//nmu-zen
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
	      <li class="toolbar-main-nav"><a class="allcaps" href="#">About</a></li>
	      <li class="toolbar-main-nav"><a class="allcaps" href="#">Enroll</a></li>
	      <li class="toolbar-main-nav"><a class="allcaps" href="#">Academics</a></li>
	      <li class="toolbar-main-nav"><a class="allcaps" href="#">Sports</a></li>
	      <li class="toolbar-main-nav"><a class="allcaps" href="#">Campus Life</a></li>
	      <li class="toolbar-home"><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a class="allcaps" href="#">Future Students</a></li>
        <li><a class="allcaps" href="#">Current Students</a></li>
      	<li><a class="allcaps" href="#">Faculty & Staff</a></li>
        <li><a class="allcaps audience-single-word-nav" href="#">Alumni</a></li>
        <li><a class="allcaps audience-single-word-nav" href="#">Visitors</a></li>
      </ul>

 			<ul class="nav navbar-nav navbar-right nmu-toolbar-nav">
        <li><a href="#">MyNMU</a></li>
        <li><a class="allcaps" href="#">Events</a></li>
        <li><a class="allcaps" href="#">Apply</a></li>
        <li><a class="allcaps" href="#">A-Z</a></li>
        <li><a class="allcaps" href="#">Give</a></li>
        <li class="toolbar-search dropdown yamm-fw"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="search-icon"><span class="glyphicon glyphicon-search"></span></a>
					<ul class="dropdown-menu dropdown-search yamm-content" role="menu">
						<li class="dropdown-menu-width-wrapper" id="search-dropdown">
							<!-- js to add search dropdown stuff here -->
						</li>
          </ul>
        </li>
      </ul>

    </div><!-- /#top-navigation-collapse -->

		<div class="collapse navbar-collapse" id="search-collapse-div">
			<div class="row">
				<div class="col-md-4 col-md-offset-1  col-sm-6 col-sm-offset-3">
					<div class="allcaps search-label">Search Options:</div>
					<div class="row">
						<div class="col-sm-6 search-options">
							<ul class="list-unstyled" role="menu">
								<li><label><input type="radio" class="search-radio" name="search-option" value="az" />A-Z Index</label></li>
								<li><label><input type="radio" class="search-radio" name="search-option" value="keyword" checked />Keyword Search</label></li>
								<li><label><input type="radio" class="search-radio" name="search-option" value="map" />Campus Map</label></li>
							</ul>
						</div>
						<div class="col-sm-6 search-options">
							<ul class="list-unstyled" role="menu">
								<li><label><input type="radio" class="search-radio" name="search-option" value="directory" />Department Directory</label></li>
								<li><label><input type="radio" class="search-radio" name="search-option" value="calendar" />Master Calendar</label></li>
								<li><label><input type="radio" class="search-radio" name="search-option" value="people" />NMU People Search</label></li>
							</ul>
						</div>
					</div><!-- /.row -->
				</div>
				<div class="col-md-6 col-md-offset-1 col-sm-9 col-sm-offset-3 search-inputs">
					<input type="text" size="50" class="search-txt-box" />
					<input type="submit" value="Submit" name="submit" class="allcaps search-submit-button" />
				</div>
			</div><!-- /.row -->
		</div><!-- /#search-collapse-div -->

  </div><!-- /.container-fluid -->
</nav>