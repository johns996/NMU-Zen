<?php
//nmu-zen

//the data-offset-top tells the navbar when to start sticking to the top.  the greater the number, the farther you have to scroll before the stick happens
//the stick just adds a class of affix which is then styled with CSS
// 131 is the default stick point
// with the fixed top nav, 106 is the stick point

//any changes to the primary navigation labels must also be made in the top navigation include

?>

<nav id="header-main-navigation" class="navbar yamm navbar-default navbar-center navbar-static-top" role="navigation" data-spy="affix" data-offset-top="87">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="main-navigation-collapse">
      <ul class="nav navbar-nav" id="main-navigaiton-ul">

       <!-- one -->
        <li class="dropdown yamm-fw">
          <a href="#" class="dropdown-toggle allcaps" data-toggle="dropdown">About</a>
          <ul class="dropdown-menu yamm-content" role="menu">
						<li class="dropdown-menu-width-wrapper">
							<div class="row">
								<div class="col-sm-3">
									<ul class="list-unstyled" role="menu">
										<li><a href="/about">About</a></li>
										<li><a href="/achievements">Achievements</a></li>
										<li><a href="/nmucampus">Campus</a></li>
										<li><a href="/publicsafety/clery-act">Clery Act Statistics</a></li>
										<li><a href="/hr">Human Resources</a></li>
										<li><a href="/naturalwonders">Marquette Area</a></li>
									</ul>
								</div>
								<div class="col-sm-3">
									<ul class="list-unstyled" role="menu">

										<li><a href="/mission">Mission and Vision</a></li>
										<li><a href="/profile">People</a></li>
										<li><a href="/president">President's Office</a></li>
										<li><a href="/technology">Technology Program</a></li>
										<li><a href="/tuition">Tuition and Fees</a></li>
									</ul>
								</div>
								<div class="col-sm-6">
									<img src="/sites/all/themes/zen_nmu/images/main-navigation/nav-about.png" align="right" />Northern Michigan University, located in Marquette, Michigan, is a dynamic four-year, public, comprehensive university that has grown its reputation based on its award-winning leadership programs, cutting-edge technology initiatives and nationally recognized academic programs.  Northern has a population of about 9,000 undergraduate and graduate students.
								</div>
							</div>
						</li>
          </ul>
        </li>

        <!-- two -->
        <li class="dropdown yamm-fw">
          <a href="#" class="dropdown-toggle allcaps" data-toggle="dropdown">Enroll</a>
					<ul class="dropdown-menu yamm-content" role="menu">
						<li class="dropdown-menu-width-wrapper">
							<div class="row">
								<div class="col-sm-3">
									<ul class="list-unstyled" role="menu">
										<li><a href="/admissions">Admissions Office</a></li>
										<li><a href="/admissions/admitted">Admitted Students</a></li>
										<li><a href="/admissions/applyto">Apply Online</a></li>
										<li><a href="/admissions/contactcounselor">Contact a Counselor</a></li>
										<li><a href="/financialaid">Financial Aid and Scholarships</a></li>
										<li><a href="/graduatestudies">Graduate Students</a></li>
									</ul>
								</div>
								<div class="col-sm-3">
									<ul class="list-unstyled" role="menu">
										<li><a href="/internationalprograms/international-students">International Students</a></li>
										<li><a href="/admissions/veterans">Military Veteran Students</a></li>
										<li><a href="/why/#enough">Request Information</a></li>
										<li><a href="/transfer">Transfer Students</a></li>
										<li><a href="/admissions">Undergraduate Students</a></li>
										<li><a href="/admissions/visit">Visit Us</a></li>
									</ul>
								</div>
								<div class="col-sm-6">
									<img src="/sites/all/themes/zen_nmu/images/main-navigation/nav-enroll.png" align="right" />Ask a few Northern students what drew them to our university and you will get a variety of answers. That's because there is no single thing that make students want to go to Northern; it is ALL the things that we do here.  Northern is big enough to offer a wide variety of academic programs but is also small enough that every time you walk across campus, you'll probably wave "hi" to someone you know.
								</div>
							</div>
						</li>
					</ul>
        </li>

        <!-- three -->
        <li class="dropdown yamm-fw">
          <a href="#" class="dropdown-toggle allcaps" data-toggle="dropdown">Academics</a>
					<ul class="dropdown-menu yamm-content" role="menu">
						<li class="dropdown-menu-width-wrapper">
							<div class="row">
								<div class="col-sm-3">
									<ul class="list-unstyled" role="menu">
										<li><a href="//it.nmu.edu/">Academic Computing</a></li>
										<li><a href="/bulletin">Course Catalog</a></li>
										<li><a href="https://educat.nmu.edu">EduCat</a></li>
										<li><a href="/gradbulletin">Graduate Course Catalog</a></li>
										<li><a href="/graduatestudies/programs">Graduate Programs</a></li>
									</ul>
								</div>
								<div class="col-sm-3">
									<ul class="list-unstyled" role="menu">
										<li><a href="/grantsandresearch">Grants and Research</a></li>
										<li><a href="http://library.nmu.edu/">Library</a></li>
										<li><a href="/programs">Majors and Minors</a></li>
										<li><a href="/internationalprograms">Study Abroad</a></li>
									</ul>
								</div>
								<div class="col-sm-6">
									<img src="/sites/all/themes/zen_nmu/images/main-navigation/nav-academics.png" align="left" />Curiosity is the raw ingredient of knowledge. It causes us to ask questions, to seek answers, to learn. At Northern Michigan University, natural curiosity and intellectual challenge meet in stimulating classes grounded in the liberal arts. So wherever your curiosity leads you, you can count on the support you need to take the next step, ask the next question, propose the next hypothesis.
								</div>
							</div>
						</li>
					</ul>
        </li>

        <!-- four -->
        <li class="dropdown yamm-fw">
          <a href="#" class="dropdown-toggle allcaps" data-toggle="dropdown">Sports</a>
					<ul class="dropdown-menu yamm-content" role="menu">
						<li class="dropdown-menu-width-wrapper">
							<div class="row">
								<div class="col-sm-9">
									<img src="/sites/all/themes/zen_nmu/images/main-navigation/nav-sports.png" align="left" />The mission of the Northern Michigan University Department of Intercollegiate Athletics, Recreational Sports and the United States Olympic Training Site is to create an environment that promotes academic excellence, interpersonal growth and social development; embraces diversity; teaches lifetime leisure skills; fosters spirit and tradition; and builds a lifelong connection to NMU.
								</div>
								<div class="col-sm-3">
									<ul class="list-unstyled" role="menu">
										<li><a href="http://www.nmuwildcats.com/">Intercollegiate Athletics</a></li>
										<li><a href="/sportsrecsports/">Recreational Sports</a></li>
										<li><a href="http://www.nmuwildcats.com/information/SportCamps">Sports Camps</a></li>
										<li><a href="/tickets">Tickets</a></li>
										<li><a href="/sportsusoec">U.S. Olympic Training Site</a></li>
										<li><a href="/wellness">Wellness</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
        </li>

        <!-- five -->
        <li class="dropdown yamm-fw">
          <a href="#" class="dropdown-toggle allcaps" data-toggle="dropdown">Campus Life</a>
					<ul class="dropdown-menu yamm-content" role="menu">
						<li class="dropdown-menu-width-wrapper">
							<div class="row">
								<div class="col-sm-6">
									<img src="/sites/all/themes/zen_nmu/images/main-navigation/nav-campus-life.png" align="left" />Yes, you'll attend your classes, but what else will you be doing as a student at Northern?  There's so much stuff to choose from. There's a student organization or club – almost 300 at last count-- for just about every interest. If you're into investigating the paranormal, anime or improv comedy, there's a group. Cheer on your fellow Wildcats at a hockey game or volleyball match. Join a competitive club sport or an intramural team.  The sky is the limit.
								</div>
								<div class="col-sm-3">
									<ul class="list-unstyled" role="menu">
										<li><a href="http://www.nmubookstore.com/">Bookstore</a></li>
										<li><a href="/studentenrichment">Center for Student Enrichment</a></li>
										<li><a href="/dso">Dean of Students</a></li>
										<li><a href="/dining">Dining Services</a></li>
										<li><a href="/healthcenter">Health Center</a></li>
										<li><a href="/housing">Housing and Residence Life</a></li>
									</ul>
								</div>
								<div class="col-sm-3">
									<ul class="list-unstyled" role="menu">
										<li><a href="/internationalprograms">International Programs</a></li>
										<li><a href="/calendar">Master Calendar</a></li>
										<li><a href="/multiculturaledandres">Multicultural Education and Resource Center</a></li>
										<li><a href="/organizations">Student Organizations</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
